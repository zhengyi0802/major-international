<?php

namespace App\Http\Controllers;

use App\Models\VideoCatagory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideoCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $catagories = VideoCatagory::get();

        return view('videocatagories.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = VideoCatagory::where('status', true)->get();

        return view('videocatagories.create',compact('catagories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $request->merge(['user_id' => $user_id]);
        VideoCatagory::create($request->all());

       return redirect()->route('videocatagories.store')
                        ->with('success', 'Catagory stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoCatagory  $videoCatagory
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCatagory $videocatagory)
    {
        return view('videocatagories.show', compact('videocatagory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoCatagory  $videoCatagory
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoCatagory $catagory)
    {
        $parents = VideoCatagory::where('status', true)
                                ->where('id', '<>', $catagory->id)
                                ->get();

        return view('videocatagories.edit', compact('catagory'))
               ->with(compact('parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoCatagory  $videoCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoCatagory $catagory)
    {
        //
       return redirect()->route('videocatagories.index')
                        ->with('success', 'Catagory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoCatagory  $videoCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoCatagory $catagory)
    {
        $catagory->delete();

        return redirect()->route('videocatagories.index')
                        ->with('success', 'Catagory deleted successfully');
    }
}
