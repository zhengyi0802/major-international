<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Middleware\ImageUpload;

class BusinessController extends Controller
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

        if ($proj_id > 0) {
            $businesses = Business::where('proj_id', $proj_id)->get();
            $projects = Project::where('proj_id', $proj_id)->get();
        } else {
            $businesses = Business::get();
            $projects = Project::where('status', true)->get();
        }

        return view('businesses.index', compact('businesses'))->with(compact('projects'));
    }

    public function browse()
    {
        $page = 8;
        $user = auth()->user();
        $projects = $user->projects();
        $projIds = $projects->pluck('id')->toArray();
        $businesses = Business::where('status', true)
                              ->whereIn('proj_id', $projIds)
                              ->orderBy('id', 'DESC')
                              ->paginate($page);

        return view('businesses.browse', compact('businesses'))
               ->with(compact('projects'))
               ->with('i', (request()->input('page', 1) - 1) * $page);
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
            return view('businesses.create', compact('projects'));
        } else {
            $projects = Project::where('id', $proj_id)->get();
            return view('businesses.create', compact('projects'));
        }

    }

    public function create2(Project $project)
    {
        $business = new Business;
        $business->id = 0;

        return view('businesses.create2', compact('business'))
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
            'status'       => 'required',
        ]);

        $business = new Business;
        $user = auth()->user();

        $business->proj_id   = $request->proj_id;
        $business->serial    = $request->serial;
        $business->link_url  = $request->link_url;
        $business->intervals = $request->intervals;
        $business->status    = $request->status;
        $business->user_id   = $user->id;

        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $business->logo_url = env('APP_URL').$file->file_path;
        }
        $business->save();

        return redirect()->route('businesses.index')
                        ->with('success','Business Logo created successfully');
    }

    public function store2(Request $request, Project $project, Business $business)
    {
        $request->validate([
            'seria;'       => 'serial',
            'status'       => 'required',
        ]);

        $data = $request->all();
        $user = auth()->user();
        $data['user_id'] = $user->id;
        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $data['logo_url'] = env('APP_URL').$file->file_path;
        }

        $data['proj_id'] = $project->id;

        if ($business->id > 0) {
            $business->update($data);
        } else {
            Business::create($data);
        }

        return redirect()->route('frontend_views.edit', compact('project'))
                        ->with('success','Business created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        $id = $business->id;
        $proj_id = $business->proj_id;
        $business = Business::where('businesses.proj_id', $proj_id)
                            ->where('businesses.id', $id)
                            ->first();

        return view('businesses.edit', compact('business'));

    }

    public function edit2(Project $project)
    {
        $business = Business::where('status', true)
                            ->where('proj_id', $project->id)
                            ->orderBy('updated_at', 'desc')
                            ->first();

        if ($business == null) {
            return $this->create2($project);
        }

        return view('businesses.edit2', compact('business'))
               ->with(compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
       $request->validate([
            'serial'       => 'required',
            'status'       => 'required',
        ]);
        $user = auth()->user();

        $business->serial    = $request->serial;
        $business->link_url  = $request->link_url;
        $business->intervals = $request->intervals;
        $business->status    = $request->status;
        $business->user_id   = $user->id;

        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $business->logo_url = env('APP_URL').$file->file_path;
        }
        $business->save();

        return redirect()->route('businesses.index')
                        ->with('success','Business Logo created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();

        return redirect()->route('businesses.index')
                        ->with('success','Business Logo deleted successfully');
    }

    public function query(Request $request)
    {

    }

}
