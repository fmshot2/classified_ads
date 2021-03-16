<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Advertisement;
use App\AdvertLocation;
use App\Category;
use App\General_Info;
use App\Mail\UsersFeedback;
use App\PageContent;
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

        if ($slider->create($data)) {
            $success_notification = array(
                'message' => 'Slider created succesfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Something went wrong! Try again.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($success_notification);
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

        if ($slider->update($data)) {
            $success_notification = array(
                'message' => 'Slider updated succesfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }
        $success_notification = array(
            'message' => 'Something went wrong! Try again.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($success_notification);
    }

    public function advertCreate(Request $request)
    {

        $request->validate([
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

        $success_notification = array(
            'message' => 'Advert Created!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($success_notification);
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

        if ($advert->update($data)) {
            $success_notification = array(
                'message' => 'Advert updated succesfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Something went wrong! Try again.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($success_notification);
    }

    public function delete_advert_slider($id)
    {
        $advert = Advertisement::find($id);

        if ($advert->delete()) {
            $success_notification = array(
                'message' => 'Advert Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }
        $success_notification = array(
            'message' => 'Something went wrong! Try again.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($success_notification);
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

    public function privacypolicy()
    {
        $page_contents = PageContent::find(1);
        $privacy = $page_contents->privacy_policy;

        return view('frontend_section.privacy', compact('privacy'));
    }

    public function myreferrals()
    {
        return view('seller.myreferrals');
    }

    public function get_benefits_of_efcontact()
    {
        return view('benefits');
    }

    public function pagescontents()
    {
        return view('admin.page_management.pages_contents');
    }

    public function saveAboutUs(Request $request)
    {
        $general_info = General_Info::find(1);

        $general_info->about_site = $request->about_site;

        if ($general_info->update()) {
            return redirect()->back()->with([
                'message' => 'About Page Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'About page could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function savePrivacyPolicy(Request $request)
    {
        $page_contents = PageContent::find(1);

        $page_contents->privacy_policy = $request->privacy_policy;

        if ($page_contents->update()) {
            return redirect()->back()->with([
                'message' => 'Privacy Policy Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Privacy Policy could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveBenefitsofEfcontact(Request $request)
    {
        $page_contents = PageContent::find(1);

        $page_contents->benefit_of_efcontact = $request->benefit_of_efcontact;

        if ($page_contents->update()) {
            return redirect()->back()->with([
                'message' => 'Benefits of EFContact Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Benefits of EFContact could not be updated!',
            'alert-type' => 'error'
        ]);
    }

    public function saveTermOfUse(Request $request)
    {
        $page_contents = PageContent::find(1);

        $page_contents->term_of_use = $request->term_of_use;

        if ($page_contents->update()) {
            return redirect()->back()->with([
                'message' => 'Term of Use Updated!',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Term of Usecould not be updated!',
            'alert-type' => 'error'
        ]);
    }


    public function clientfeedbacks()
    {
        $all_services = Service::where('user_id', Auth::id() )->get();

        $this->thecomments = [];

        foreach ($all_services as $key => $all_service) {
            foreach ($all_service->comments as $key => $thecomments) {
                $this->thecomments[] = $thecomments;
            }
        }
        $allcomments = $this->thecomments;

        return view ('seller.feedbacks.all', compact('all_services', 'allcomments') );
    }


    public function sellerLikesCount()
    {
        $all_services = Service::where('user_id', Auth::id() )->get();

        $this->thecomments = [];

        foreach ($all_services as $key => $all_service) {
            foreach ($all_service->comments as $key => $thecomments) {
                $this->thecomments[] = $thecomments;
            }
        }

        $allcomments = $this->thecomments;
        dd($allcomments);

        return view ('seller.feedbacks.all', compact('all_services', 'allcomments') );
    }

}
