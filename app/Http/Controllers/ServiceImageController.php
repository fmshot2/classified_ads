<?php

namespace App\Http\Controllers;

use App\Image as ServiceImage;
use App\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceImageController extends Controller
{


    public function showService($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('seller.service.show', [
            'service' => $service
        ]);
    }

    public function imagesStore(Request $request, $service_id)
    {
        $image       = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;

        //Fullsize
        $image->move(public_path('uploads/services/'),$file_name);

        $image_resize = Image::make(public_path('uploads/services/').$file_name);
        $image_resize->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('uploads/services/' .$file_name));

        // Saving it with this service
        $service = Service::find($service_id);
        $service->images()->create(['image_path' => $file_name]);
        $service->thumbnail = $service->images()->first()->image_path;
        $service->save();

        $success_notification = array(
            'message' => 'Image(s) uploaded successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($success_notification);

    }

    public function imagesDelete($id, $service_id)
    {
        $image = ServiceImage::find($id);
        $filename = $image->image_path;

        $service = Service::find($service_id);

        if ($service->images->count() != 1) {
            $image->delete();

            $path = public_path('uploads/services/').$filename;

            if (file_exists($path)) {
                unlink($path);
            }
            return redirect()->back()->with([
                'message' => 'Image deleted successfully!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'You cannot delete the last image!',
            'alert-type' => 'error'
        ]);
    }
}
