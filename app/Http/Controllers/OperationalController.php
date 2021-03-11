<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Advertisement;
use App\AdvertLocation;
use App\Category;
use App\Mail\UsersFeedback;
use App\Service;
use App\Slider;
use App\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;
use App\Refererlink;
use Illuminate\Support\Facades\Auth;


class OperationalController extends Controller
{
    public function agentDashboard(Request $request)
    {

        $agent_code_check = Refererlink::where(['user_id'=>Auth::id()])->first();

        $service_count = Refererlink::where('user_id', Auth::id() )->count();
            return view ('agent.dashboard', compact('service_count', 'agent_code_check'));




    }

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
            'buttonlocation' => $request->buttonlocation,
            'buttontext' => $request->buttontext,
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
                'buttonlocation' => $request->buttonlocation,
                'buttontext' => $request->buttontext,
                'image' => $file_name
            ];
        }
        else{
            $data = [
                'title' => $request->title,
                'details' => $request->details,
                'links' => $request->link,
                'buttonlocation' => $request->buttonlocation,
                'buttontext' => $request->buttontext
            ];
        }



        $slider = Slider::find($id);

        $slider->update($data);

        return redirect()->back();
    }

    public function advertCreate(Request $request)
    {
        $this->validate($request, [
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $adlocationid = $request->advert_location;
        $location_name = AdvertLocation::find($adlocationid);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/sponsored'),$file_name);
        }

        $data = [
            'brand_name'      => $request->brand_name,
            'website_link'    => $request->website_link,
            'banner_img'      => $file_name,
            'client_name'     => $request->client_name,
            'client_email'    => $request->client_email,
            'client_phone'    => $request->client_phone,
            'client_address'  => $request->client_address,
            'start_date'      => $request->start_date,
            'end_date'        => $request->end_date,
            'advert_location' => $request->advert_location,
            'location_name'   => $location_name->title
        ];


        $advert = new Advertisement();

        $advert->create($data);

        return redirect()->back();
    }




    public function get_advert_slider($id)
    {
        $advert = Advertisement::find($id);
        return $advert;
    }

    public function update_advert_sliders(Request $request, $id)
    {

        $this->validate($request, [
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $adlocationid = $request->advert_location;
        $location_name = AdvertLocation::find($adlocationid);

        if ($request->hasFile('ad_image')) {
            $image = $request->file('ad_image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/sponsored'),$file_name);

            $data = [
                'brand_name'      => $request->brand_name,
                'website_link'    => $request->website_link,
                'banner_img'      => $file_name,
                'client_name'     => $request->client_name,
                'client_email'    => $request->client_email,
                'client_phone'    => $request->client_phone,
                'client_address'  => $request->client_address,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'advert_location' => $request->advert_location,
                'location_name'   => $location_name->title
            ];
        }
        else{
            $data = [
                'brand_name'      => $request->brand_name,
                'website_link'    => $request->website_link,
                'client_name'     => $request->client_name,
                'client_email'    => $request->client_email,
                'client_phone'    => $request->client_phone,
                'client_address'  => $request->client_address,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'advert_location' => $request->advert_location,
                'location_name'   => $location_name->title
            ];
        }


        $advert = Advertisement::find($id);
        $advert->update($data);

        return redirect()->back();
    }

    public function delete_advert_slider($id)
    {
        $advert = Advertisement::find($id);
        $advert->delete();
        return back()->with('success', 'Task was successful!');
    }



    public function getfeatservices()
    {
        $featuredServices = Service::where('is_featured', 1)->with('user')->orderBy('badge_type', 'asc')->paginate(5);
        return $featuredServices;
    }


    public function catPageSortBy($letter)
    {
        $collection = Category::get();
        $grouped = $collection->groupBy(function ($item, $key) {
            $aphal = $item->name[0];
            if (ctype_alpha($aphal)) {
                return $aphal;
            }

        });

        if ($letter == 'all') {
            return $collection;
        }
        return $grouped[$letter];
    }

    public function requestbadge(Request $request, $id)
    {
        $user_id = $request->user()->id;

        if ($id == 1) {
            $badge = [
                'badge_type' => 'Super',
                'badge_cost' => 4
            ];
        }
        elseif ($id == 2) {
            $badge = [
                'badge_type' => 'Moderate',
                'badge_cost' => 5
            ];
        }
        elseif ($id == 3) {
            $badge = [
                'badge_type' => 'Super',
                'badge_cost' => 6
            ];
        }

        return $badge;
    }

    public function feedbackform(Request $request)
    {
        $this->validate($request, [
            'userfeedback'=> 'string'
        ]);

        $feedback = new UserFeedback;
        $data = ['feedback' => $request->userfeedback];
        $feedback->create($data);

        try{
            Mail::to('info@efcontact.com')->send(new UsersFeedback($request->userfeedback));
        }
        catch(\Exception $e){
            $failedtosendmail = 'Failed to Mail!.';
        }

        return $request;
    }





    public function advertisement() {
        $advert_locations = AdvertLocation::all();
        return view('advertisement', compact('advert_locations'));
    }

    public function aboutus()
    {
        return view('about');
    }

    public function myreferrals()
    {
        return view('seller.myreferrals');
    }

}
