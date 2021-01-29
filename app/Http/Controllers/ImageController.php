<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use App\Service;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ImageController extends Controller
{
     public function upload()
    {
        return view('image_upload');
    }

    public function store(Request $request)
    {

          $latest_service = Service::where('user_id', Auth::id())->latest()->first();
        // dd($latest_service);
        $latest_service_id = $latest_service->id;


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
         $imageUpload->service_id = $latest_service_id;
        $imageUpload->user_id = Auth::id();
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
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
