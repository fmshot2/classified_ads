<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourism;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'states'   => $request->state,
            'region'   => $request->region,
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
            'states'   => 'required|string',
            'region'   => 'required|string',
            'description'    => 'required|string',

        ]);

        // $data['slug'] = Str::slug($request->name, '-');

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $city = new Tourism;
        $city->name = $request->name;
        $city->states = $request->state;
        $city->region = $request->region;
        $city->description = $request->description;
        $city->thumb = $image_name;
        $city->slug = Str::slug($request->name, '-');

        $city->save();
        if($city->save())
        {
            $success_notification = array(
                'message' => 'City successfully added!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($success_notification);
	}

    public function city($slug)
    {
        $city = Tourism::where('slug', $slug)->first();
        return view('admin.tourism.single_city', [
            'city' => $city
        ]);
    }

    public function update_city(Request $request, $slug)
    {
        $city = Tourism::where('slug', $slug)->firstOrFail();

        $data = array(
            'name'   => $request->name,
            'states'   => $request->state,
            'region'   => $request->region,
            'description'    => $request->description,
            'thumb' => $request->thumb,
        );

        if ( $request->hasFile('thumb')) {
            $image_name = time().'.'.$request->thumb->extension();
            $request->thumb->move(public_path('cities_images'),$image_name);

            $db_location = 'cities_images/' . $image_name;
            $request->thumb = $image_name;
            $thumbnail = $request->thumb;
        }
        else{
            $thumbnail = $city->thumb;
        }


        $validator = \Validator::make($data, [
            'name'   => 'nullable|string',
            'states'   => 'nullable|string',
            'region'   => 'nullable|string',
            'description'    => 'nullable|string',
            'thumb' => 'nullable'

        ]);

        // $data['slug'] = Str::slug($request->name, '-');

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $city->name = $request->name;
        $city->region = $request->region;
        $city->states = $request->state;
        $city->thumb = $thumbnail;
        $city->description = $request->description;
        $city->slug = Str::slug($request->name, '-');

        $city->update();

        $success_notification = array(
            'message' => 'City successfully updated!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($success_notification);

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

    public function deleteCity($slug)
    {

        $city = Tourism::where('slug', $slug)->first();

        if($city)
        {
            @unlink($city);
            $city->delete();

            $success_notification = array(
                'message' => 'City has been successfully deleted!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }
    }
}
