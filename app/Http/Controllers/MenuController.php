<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ImageUpload;
use App\Models\Product;
use App\Models\ProductQuery;
use App\Models\Menu;
use App\Models\Logo;
use App\Models\Project;
use App\Models\ApkManager;
use App\Models\AppManager;
use App\Models\OneKeyInstaller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        $projects = Project::where('status', true)->get();

        return view('menus.index', compact('menus'))->with(compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::where('status', true)->get();

        return view('menus.create', compact('projects'));
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
            'name'         => 'required',
            'status'       => 'required',
        ]);

        $menu = new Menu;
        $user = auth()->user();

        $menu->proj_id  = $request->proj_id;
        $menu->name     = $request->name;
        $menu->tag      = $request->tag;
        $menu->type     = $request->type;
        $menu->status   = $request->status;
        $menu->user_id  = $user->id;

        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $menu->icon = env('APP_URL').$file->file_path;
        }
        $menu->save();

        return redirect()->route('menus.index')
                        ->with('success','Menu created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $projects = Project::where('status', true)->get();

        return view('menus.edit', compact('menu'))
               ->with(compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'proj_id'      => 'required',
            'name'         => 'required',
            'status'       => 'required',
        ]);

        $user = auth()->user();
        $menu->proj_id  = $request->proj_id;
        $menu->name     = $request->name;
        $menu->tag      = $request->tag;
        $menu->type     = $request->type;
        $menu->status   = $request->status;
        $menu->user_id  = $user->id;

        if ($request->file()) {
            $file = ImageUpload::fileUpload($request);
            if ($file == null) {
                return back()->with('image', $fileName);
            }
            $menu->icon = env('APP_URL').$file->file_path;
        }
        $menu->save();

        return redirect()->route('menus.index')
                        ->with('success','Menu created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')
                        ->with('success','Menus deleted successfully');
    }

    public function queryLogo($proj_id)
    {
        $logo = Logo::where('proj_id', $proj_id)
                     ->orderBy('updated_at', 'desc')
                     ->first();
        $result = null;

        if ($logo) {
            $result = array(
                  'name'      => $logo->name,
                  'image'     => $logo->image,
                  'link_url'  => $logo->link_url,
                  'status'    => $logo->status,
            );
        }

        return $result;
    }

    public function queryMenus($proj_id)
    {
        $menus = Menu::select('name', 'icon', 'tag', 'type')
                     ->where('proj_id', $proj_id)
                     ->where('status', true)
                     ->orderBy('updated_at', 'asc')
                     ->get();

        $result = null;

        if ($menus) {
            $result = $menus->toArray();
        }
        return $result;
    }

    public function queryOneKeyInstaller($proj_id)
    {
       $result = null;
       $apks = AppManager::leftJoin('apk_managers', 'apk_id', 'apk_managers.id')
                         ->select('apk_managers.package_name', 'app_managers.delaytime')
                         ->where('app_managers.proj_id', $proj_id)
                         ->where('app_managers.installer_flag', true)
                         ->get();

       if ($apks) {
           $result = $apks->toArray();
       }

       return $result;
    }

    public function query(Request $request)
    {
        $product = null;
        $proj_id = $this->checkProject($request);
        if ($proj_id == 0) {
            return json_encode(null);
        }
/*
        if ($request->input('mac')) {
            $mac = str_replace(':', '', $request->input('mac'));
            $mac = strtoupper($mac);
            $product = Product::where('ether_mac', '=', $mac)
                                ->orWhere('wifi_mac', '=', $mac)
                                ->first();
            if ($product) {
                $proj_id = $product->proj_id;
            } else {
                $proj = Project::where('is_default', true)->first();
                $proj_id = $proj->id;
            }
        } else if ($request->input('id')) {
            $proj_id = $request->input('id');
        }
        if ($request->input('aid')) {
            $aid = $request->input('aid');
            $product1 = Product::where('android_id', $aid)->first();
            if ($product1 == null) {
                if ($product) {
                    $data = $product->toArray();
                    $data['android_id'] = $request->input('aid');
                    $product->update($data);
                    $proj_id = $product->proj_id;
                } else {
                    $arr = [
                         'android_id'   => $aid,
                         'type_id'      => 14,
                         'status_id'    => 1,
                         'proj_id'      => 9,
                         'user_id'      => 2,
                         'expire_date'  => '2075-12-31 00:00:00',
                    ];
                    $product = Product::create($arr);
                    $proj_id = 9;
                }
            } else {
                $proj_id = $product1->proj_id;
            }
        }
*/
        $logo = $this->queryLogo($proj_id);
        $menus = $this->queryMenus($proj_id);
        $onekey = $this->queryOneKeyInstaller($proj_id);

        $result = array(
                     'logo'             => $logo,
                     'menus'            => $menus,
                     //'onekeyinstaller'  => $onekey,
                  );
        $response = json_encode($result);
        if ($product && ProductQuery::enabled()) {
            $record = array(
                      'product_id'  => $product->id,
                      'keywords'    => 'Menu',
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
        $proj_id = 0;
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
                     'serialno'     => 'menus',
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
