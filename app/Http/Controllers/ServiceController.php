<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('seller/service.create');
    }



    public function createService()
    {
        return view ('seller.addService');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function storeTeacher(Request $request)
    {


       
        $category_id = $request->category_id;
        $name = $request->name;
        //$service->slug = $slug;
        //$service->image = $image;
        $description = $request->description;
        $service->address = $request->address;

       // $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        $service = new Service();
        $service->name = $name;
        $service->image = $imageName;
        $service->description = $description;
        $service->address = $address;

         

        $service->save();
        return redirect('/teachers');
    }



    public function store(Request $request)
    {
        
       $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            //'slug' => 'unique:services,slug',
            //'city' => 'required',
            //'state' => 'required',
        ]); 

        $image = $request->file('image');

        $slug = Str::of($request->name)->slug('-');

        $service = new Service();

        // Image set up
        if ( $request->hasFile('file') ) {
            $path = Storage::disk('public')->putFile('service',$request->file('file'));
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
        $service = Service::find($id);
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $service = Service::find($id);
        return response()->json($service);

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
        
       $service = Service::find($id);

       $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]); 

        $image = $request->file('image');

        // Image set up
        if ( $request->hasFile('file') ) {
            Storage::disk('public')->delete($service->image);
            $path = Storage::disk('public')->putFile('service',$request->file('file'));
            $driver->image = $path;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $service = Service::findOrFail($id);
        Storage::disk('public')->delete($service->image);
        $service->delete();

    }
}
