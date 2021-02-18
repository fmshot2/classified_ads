<?php

namespace App\Http\Controllers;

use App\Image;
use App\Service;
use Illuminate\Http\Request;

class ServiceImageController extends Controller
{


    public function showService($id)
    {
        $service = Service::find($id);

        return view('seller.service.show', [
            'service' => $service
        ]);
    }

    public function imagesStore(Request $request, $service_id)
    {
        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;
        $image->move(public_path('uploads/services'),$file_name);

        $service = Service::find($service_id);
        $service->images()->create(['image_path' => $file_name]);
        $service->thumbnail = $service->images()->first()->image_path;
        $service->save();

        return redirect()->back();
    }

    public function imagesDelete($id)
    {
        $image = Image::find($id);
        $filename = $image->image_path;
        $image->delete();

        $path = public_path('uploads/services/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return redirect()->back();
    }
}
