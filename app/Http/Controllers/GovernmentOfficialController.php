<?php

namespace App\Http\Controllers;

use App\GovernmentOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class GovernmentOfficialController extends Controller
{
    public function index()
    {
        $officials = GovernmentOfficial::all();
        return view('house_assembly', compact('officials'));
    }

    public function officials()
    {
        $officials = GovernmentOfficial::all();
        return view('admin.government_officials.governmentofficials', compact('officials'));
    }

    public function create_official(Request $request)
	{

		$data = array(
            'name'         => $request->name,
            'position'     => $request->position,
            'state'        => $request->state,
            'region'       => $request->region,
            'description'  => $request->description,
            'image'        => $request->image,
        );

		if ( $request->hasFile('image') ) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;

            //Fullsize
            $image->move(public_path('uploads/governmentofficials/'),$file_name);

            $image_resize = Image::make(public_path('uploads/governmentofficials/').$file_name);
            $image_resize->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('uploads/governmentofficials/' .$file_name));
	    }


        $validator = \Validator::make($data, [
            'name'         => 'required|string',
            'position'     => 'required|string',
            'state'        => 'required|string',
            'region'       => 'required|string',
            'description'  => 'required|string',
            // 'image'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $official = new GovernmentOfficial();
        $official->name = $request->name;
        $official->position = $request->position;
        $official->state = $request->state;
        $official->region = $request->region;
        $official->description = $request->description;
        $official->image = $file_name;
        $official->slug = Str::slug($request->name, '-'.time());

        if($official->save())
        {
            return redirect()->back()->with([
                'message' => 'Official successfully added!',
                'alert-type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Something went horribly wrong!',
            'alert-type' => 'error'
        ]);
	}

    public function delete_official($id)
    {

        $official = GovernmentOfficial::find($id);

        if($official->delete())
        {
            return redirect()->back()->with([
                'message' => 'Official has been successfully deleted!',
                'alert-type' => 'error'
            ]);
        }
    }
}
