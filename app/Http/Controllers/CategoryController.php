<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Service;

use Illuminate\Support\Str;
use Illuminate\Http\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->paginate(5);
        return view ('admin/category/index', compact('category') );
    }

public function allCategories()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(12);
        return view ('allCategories', compact('categories') );
    }

    public function categoryDetail($id)
    {


         $category = Category::find($id);
        $category = Service::where('id', $id)->get();
        return view ('categoryDetails', compact('category') ); 

        
        $categories = Category::orderBy('id', 'desc')->paginate(12);
        return view ('allCategories', compact('categories') );
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
            'name' => ['required', 'unique:categories'],
        ]); 

        $slug = Str::of($request->name)->slug('-');

        $category = new Category();
                // Image set up
        if ( $request->hasFile('file') ) {
        $image_name = time().'.'.$request->file->extension();
        $request->file->move(public_path('category_image'),$image_name);
        $category->image = $image_name;
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();

        $request->session()->flash('status', 'Task was successful!');

        return $this->index();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = Category::find($id);
        $category = Service::where('id', $id)->get();
        return view ('categoryDetails', compact('category') );        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::find($slug);
        return view ('admin/dashboard/category/edit', compact('category') );        
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
        
       $this->validate($request,[
            'name' => 'required',
        ]); 

        $category->name = $request->name;

        $category->save();

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
        
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('success', 'Task was successful!');
        return $this->index();

    }
}
