<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload()
    {
        return view('image_upload');
    }

    public function store(Request $request, $id)
    {  
               $service = new Service();

        $latest_service = Service::where('user_id', Auth::id())->latest()->first();
        dd($latest_service);
        $latest_service_id = $latest_service->id;
        // $user_id = Auth::id();
        // $image = $request->file('file');
        // $imageName = $image->getClientOriginalName();

 n

 $names = array();
    foreach($request->file('file') as $image)
    {
        $thumbnailImage = Image::make($image);
        $thumbnailImage->resize(300,300);
        $thumbnailImage_name = $slug.'.'.time().'.'.$image->getClientOriginalExtension();
                $imageName = $image->getClientOriginalName();

        $destinationPath = 'images/';
               /* $image_name = $image->getClientOriginalName();
               $image->move(public_path('images'),$image_name);*/
            //$thumbnailImage_name = $thumbnailImage->getClientOriginalName();
               $thumbnailImage->save($destinationPath . $thumbnailImage_name);
               array_push($names, $thumbnailImage_name);
           }
           $imageUpload->filename = json_encode($names);




        // $image->move(public_path('images'), $imageName);

        // $imageUpload = new ImageUpload();
        // $imageUpload->filename = $imageName;
        // $imageUpload->service_id = $latest_service_id;
        //        // $service->user_id = Auth::id();

        // $imageUpload->user_id = Auth::id();

        $imageUpload->save();
        return response()->json(['success' => $latest_service_id]);
    }

    public function delete(Request $request)
    {
        $filename = $request->get('filename');
        ImageUpload::where('filename', $filename)->delete();
        $path = public_path() . '/images/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}