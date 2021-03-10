<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourism;
use Illuminate\Support\Str;

class TourismController extends Controller
{

	public function cities()
	{
		$cities = Tourism::all();

	    return view('admin.tourism.cities', [
	    	'cities' => $cities
	    ]);
	}

	public function save_city(Request $request)
	{

		$data = array(
            'name'   => $request->name,
            'region'   => $request->region,
            'body' => $request->body,
            'description'    => $request->description,
            'thumb' => $request->thumb,
        );

		if ( $request->hasFile('thumb') ) {
	      $image_name = time().'.'.$request->thumb->extension();
	      $request->thumb->move(public_path('cities_images'),$image_name);
	      $request->thumb = $image_name;
	    }


        $validator = \Validator::make($data, [
            'name'   => 'required|string',
            'region'   => 'required|string',
            'body' => 'required|string',
            'description'    => 'required|string',

        ]);

        // $data['slug'] = Str::slug($request->name, '-');

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $city = new Tourism;
        $city->name = $request->name;
        $city->region = $request->region;
        $city->body = $request->body;
        $city->description = $request->description;
        $city->thumb = $image_name;
        $city->slug = Str::slug($request->name, '-');

        $city->save();

        // if($city)
        // {
        //     $city->create($data);
        // }
        // else
        // {
        //     \Session::flash('error', 'Cannot add city!');
        // }
        $success_notification = array(
            'message' => 'City successfully added!',
            'alert-type' => 'success'
        );
        // \Session::flash('success', 'City successfully added!');
        return redirect()->back()->with($success_notification);
	}
    
    public function city($slug)
    {
        $city = Tourism::where('slug', $slug)->first();
        return view('admin.tourism.single_city', [
            'city' => $city
        ]);
    }

    public function add_city_images(Request $request, $slug)
    {
        // $city = Tourism::where('slug', $slug);

        $images = array();
        // dd($request->all());

        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $location = $file->move('cities_images', $name);
                $images[]=$name;
                
            }
        }

        Tourism::where('slug', $slug)->update(['images' => json_encode($images)]);
        $success_notification = array(
            'message' => 'Images successfully added to city!',
            'alert-type' => 'success'
        );
        // \Session::flash('success', 'City successfully added!');
        return redirect()->back()->with($success_notification);
        // $city->images = json_decode($images);
    }
}
