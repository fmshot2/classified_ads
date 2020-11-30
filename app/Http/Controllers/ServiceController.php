<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            'slug' => 'unique:services,slug',
            'city' => 'required',
            'state' => 'required',
        ]); 

        $image = $request->file('image');

        $slug = Str::of($request->name)->slug('-');

        $service = new Service();

        // Image set up
        if ( $request->hasFile('file') ) {
            $path = Storage::disk('public')->putFile('services',$request->file('file'));
            $service->image = $path;
        }


        $service->user_id = Auth::id();
        $service->category_id = $request->category_id;
        $service->name = $request->name;
        $service->slug = $slug;
        $service->image = $image;
        $service->description = $request->description;
        $service->state = $request->state;

        $service->save();

        $request->session()->flash('success', 'Task was successful!');
        return 'success';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
