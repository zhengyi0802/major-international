<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Product;
use App\Models\ProductQuery;
use App\Models\AppAdvertising;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\ImageUpload;

class AppAdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $proj_id = $user->proj_id;

        if ($proj_id == 0) {
            $appadvertisings = AppAdvertising::get();
            $projects = Project::where('status', true)->get();
        } else {
            $appadvertisings = AppAdvertising::where('proj_id', $proj_id)->get();
            $projects = Project::where('id', $proj_id)->get();
        }

        return view('appadvertisings.index', compact('appadvertisings'))->with(compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $proj_id = $user->proj_id;

        if ($proj_id == 0) {
            $projects = Project::where('status', true)->get();
            return view('appadvertisings.create', compact('projects'));
        } else {
            $projects = Project::where('id', $proj_id)->get();
            return view('appadvertisings.create', compact('projects'));
        }
    }

    public function create2(Project $project)
    {
        $appadvertising = new AppAdvertising;
        $appadvertising->id = 0;

        return view('appadvertisings.create2', compact('appadvertising'))
               ->with(compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'proj_id'      => 'required',
            'interval'     => 'required',
            'status'       => 'required',
        ]);

        $user = auth()->user();
        $appadvertising = new AppAdvertising;

        $appadvertising->proj_id  = $request->proj_id;
        $appadvertising->interval = $request->interval;
        $appadvertising->link_url = $request->link_url;
        $appadvertising->link_image = $request->link_image;
        $appadvertising->status   = $request->status;
        $appadvertising->user_id  = $user->id;

        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $appadvertising->thumbnail = env('APP_URL').$file->file_path;
        }
        if ($appadvertising->link_image) {
            $appadvertising->link_url = $appadvertising->thumbnail;
        }
        $appadvertising->save();

        return redirect()->route('appadvertisings.index')
                        ->with('success','APP Advertising created successfully');

    }

    public function store2(Request $request, Project $project, AppAdvertising $appadvertising)
    {
        $request->validate([
            'interval'     => 'required',
            'status'       => 'required',
        ]);

        $data = $request->all();
        $user = auth()->user();
        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $data['thumbnail'] = env('APP_URL').$file->file_path;
        } else {
            $data['thumbnail'] = $advertising->thumbnail;
        }
        if ($data['link_image']) {
            $data['link_url'] = $data['thumbnail'];
        }
        $data['proj_id'] = $project->id;
        $data['user_id'] = $user->id;
        if ($appadvertising->id > 0) {
            $appadvertising->update($data);
        } else {
            AppAdvertising::create($data);
        }

        return redirect()->route('frontend_views.edit', compact('project'))
                        ->with('success','APP Advertising created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(AppAdvertising $appadvertising)
    {
        return view('appadvertisings.show', compact('appadvertising'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit(AppAdvertising $appadvertising)
    {
        $projects = Project::where('status', true)->get();

        return view('appadvertisings.edit', compact('appadvertising'))
               ->with(compact('projects'));
    }

    public function edit2(Project $project)
    {
        $appadvertising = AppAdvertising::where('proj_id', $project->id)
                            ->orderBy('updated_at', 'desc')
                            ->first();

        if ($appadvertising == null) {
            return $this->create2($project);
        }

        return view('appadvertisings.edit2', compact('appadvertising'))
               ->with(compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppAdvertising $appadvertising)
    {
       $request->validate([
            'proj_id'      => 'required',
            'status'       => 'required',
        ]);

        $appadvertising->proj_id  = $request->proj_id;
        $appadvertising->interval = $request->interval;
        $appadvertising->link_url = $request->link_url;
        $appadvertising->link_image = $request->link_image;
        $appadvertising->status   = $request->status;

        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $appadvertising->thumbnail = env('APP_URL').$file->file_path;
        }
        if ($appadvertising->link_image) {
            $appadvertising->link_url = $appadvertising->thumbnail;
        }
        $appadvertising->save();

        return redirect()->route('appadvertisings.index')
                        ->with('success','APP Advertising created successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppAdvertising $appadvertising)
    {
        $appadvertising->delete();

        return redirect()->route('appadvertisings.index')
                        ->with('success','APP Advertising deleted successfully');
    }

    public function query(Request $request)
    {
       $proj_id = $this->checkProject($request);
       if ($project_id == 0) {
           return json_encode(null);
       }
       $product = null;

       $appadvertistings = AppAdvertising::select('thumbnail as image', 'link_url')
                                     ->where('proj_id', $proj_id)
                                     ->where('status', true)
                                     ->orderBy('id', 'asc')
                                     ->get();
        $result = $appadvertistings->toArray();
        $response = json_encode($result);

        if ($product && ProductQuery::enabled()) {
            $record = array(
                      'product_id'  => $product->id,
                      'keywords'    => 'AppAdvertising',
                      'query'       => $request->fullUrl(),
                      'response'    => $response,
            );
            ProductQuery::create($record);
        }

        return $response;
    }

    function checkProject(Request $request)
    {
        $data = $request->all();
        $proj_Id = 0;
        $mac = null;
        if (isset($data['mac'])) {
            $mac = str_replace(':', '', $data['mac']);
            $mac = strtoupper($mac);
            $mproduct = Product::where('ether_mac', '=', $mac)
                               ->orWhere('wifi_mac', '=', $mac)->first();
        } else {
            $mproduct = null;
        }
        if (isset($data['aid'])) {
            $aproduct = Product::where('android_id', $data['aid'])->first();
            $aid = $data['aid'];
        } else {
            $aproduct = null;
            $aid = null;
        }
        if (isset($data['id'])) {
            $proJ_id = $data['id'];
        }

        if ($aproduct != null) {
            $proj_id = $aproduct->proj_id;
        } else if ($mproduct != null) {
            $proj_id = $mproduct->proj_id;
            $mproduct->android_id = $aid;
            $mproduct->save();
        } else {
            $project = Project::where('is_default', true)->first();
            $proj_id = $project->id;
            if ($aid != null) {
                $arr = [
                     'android_id'   => $aid,
                     'serialno'     => 'appadvertising',
                     'wifi_mac'     => $mac,
                     'type_id'      => 14,
                     'status_id'    => 1,
                     'proj_id'      => $proj_id,
                     'user_id'      => 2,
                     'expire_date'  => '2075-12-31 00:00:00',
                     'query_string' => json_encode($data),
                   ];
                $product = Product::create($arr);
            }
        }

        return $proj_id;
    }

}
