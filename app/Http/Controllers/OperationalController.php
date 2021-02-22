<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Service;
use App\Slider;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class OperationalController extends Controller
{
    public function sliderCreate(Request $request)
    {
        $this->validate($request, [
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ( $request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/sliders'),$file_name);
        }

        $data = [
            'title' => $request->title,
            'details' => $request->details,
            'links' => $request->link,
            'image' => $file_name
        ];


        $slider = new Slider();

        $slider->create($data);

        return redirect()->back();
    }

    public function sliderUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ( $request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/sliders'),$file_name);

            $data = [
                'title' => $request->title,
                'details' => $request->details,
                'links' => $request->link,
                'image' => $file_name
            ];
        }
        else{
            $data = [
                'title' => $request->title,
                'details' => $request->details,
                'links' => $request->link,
            ];
        }



        $slider = Slider::find($id);

        $slider->update($data);

        return redirect()->back();
    }




    public function get_advert_slider($id)
    {
        $advert = Advert::find($id);
        return $advert;
    }

    public function create_advert_sliders(Request $request)
    {

        $this->validate($request, [
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ( $request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/adverts'),$file_name);
        }

        $data = [
            'seller_name' => $request->seller_name,
            'seller_id' => $request->seller_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'ref_no' => $request->ref_no,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'category' => $request->category,
            'links' => $request->links,
            'image' => $file_name
        ];


        $advert = new Advert();

        $advert->create($data);

        return redirect()->back();
    }

    public function update_advert_sliders(Request $request, $id)
    {

        $this->validate($request, [
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ( $request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/sponsored'),$file_name);

            $data = [
                'seller_name' => $request->seller_name,
                'seller_id'  => $request->seller_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'ref_no' => $request->ref_no,
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
                'category' => $request->category,
                'links' => $request->links,
                'image' => $file_name
            ];
        }
        else{
            $data = [
                'seller_name' => $request->seller_name,
                'seller_id'  => $request->seller_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'ref_no' => $request->ref_no,
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
                'category' => $request->category,
                'links' => $request->links
            ];
        }




        $advert = Advert::find($id);
        $advert->update($data);

        return redirect()->back();
    }

    public function delete_advert_slider($id)
    {
        $advert = Advert::find($id);
        $advert->delete();
        return back()->with('success', 'Task was successful!');
    }



    public function getfeatservices()
    {
        $featuredServices = Service::where('is_featured', 1)->with('user')->orderBy('badge_type', 'asc')->paginate(5);
        return $featuredServices;
    }

}
