<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Advertisement;
use App\AdvertLocation;
use App\Category;
use App\General_Info;
use App\Image as ModelImage;
use App\Like;
use App\Mail\UsersFeedback;
use App\Message;
use App\PageContent;
use App\Service;
use App\Slider;
use App\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;
use App\Refererlink;
use App\SeekingWork;
use App\State;
use App\Tourism;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;


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

        if ($request->hasFile('image')) {
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

    public function referralprogram(Request $request)
    {

        $request->session()->forget('url.intended');
        session(['url.intended' => url()->previous()]);

        $param = $request->input('invite');

        //$param = $request->query('param');
        if ($param) {
            $referParam = $param;
        } else {
            $referParam = null;
        }
        // $states = State::all();

        return view('referralprogram', compact('referParam'));
    }

    public function get_benefits_of_efcontact()
    {
        return view('benefits');
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

    public function myFavourites(Request $request)
    {
        $user = $request->user();
        $likecheck = Like::where(['user_id'=>$user->id])->get();
        $this->thefavourites = [];

        foreach ($likecheck as $key => $all_service) {
            $this->thefavourites[] = Service::where('id', $all_service->service_id )->first();
        }

        $allfavourites = $this->thefavourites;

        return view('seller.myfavourites', [
            'allfavourites' => $allfavourites
        ]);
    }

    public function getTouristSites($state)
    {
        $tourist = Tourism::where('states', $state)->get();

        return $tourist;
    }

    public function downloadAdBrochure()
    {
        $filePath = public_path("efcontact-ad-brochure.pdf");
    	$headers = ['Content-Type: application/pdf'];
    	$fileName = 'efcontact-ad-brochure.pdf';

    	return response()->download($filePath, $fileName, $headers);
    }

    public function ajaxSearchResult(Request $request)
    {
        if($request->ajax()) {

            $services = Service::query()
                ->where('name', 'LIKE', "%{$request->service}%")
                ->orWhere('description', 'LIKE', "%{$request->service}%");

            $seekingworks = SeekingWork::query()
                ->where('job_title', 'LIKE', "%{$request->service}%")
                ->orWhere('fullname', 'LIKE', "%{$request->service}%");


            $data = $services->get ()->concat ($seekingworks->get ());


            $output = '';
            if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row){
                    if ($row->name) {
                        $output .= '<li class="list-group-item"><a style="display:block" href="'. route('serviceDetail',  $row->slug) .'">'. $row->name .' in <span class="ajaxSearchCategoryList">'.$row->category->name.'</span></li>';
                    }
                    else{
                        $output .= '<li class="list-group-item"><a style="display:block" href="'. route('job.applicant.detail',  $row->slug) .'">'. $row->job_title .' in <span class="ajaxSearchCategoryList">'.$row->category->name.' & CVs</span></li>';
                    }
                }
                $output .= '</ul>';
            }
            else {
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
            return $output;
        }
    }

    public function dapSearch(Request $request)
    {
        $keyword = $request->keyword ? $request->keyword : 'Nothing!';
        $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $categories = Category::orderBy('name', 'asc')->get();


        if ($request->category == null && $request->city == null && $request->keyword == null) {
            return back()->with([
                'message' => 'No result found for your search!',
                'alert-type' => 'error'
            ]);
        }


        if ($request->category != null) {
            $category = Category::where('slug', $request->category)->first();
            $categoryId = $category->id;
            $categoryname = $category->name;

            if ($request->category != null && $request->city != null && $request->keyword != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return view('dapSearchResult', [
                        "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$categoryname.'</strong>',
                        "services" => $services,
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
                else{
                    return view('dapSearchResult', [
                        "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
            }
            elseif ($request->category != null && $request->city != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$categoryname.'</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
            elseif ($request->keyword == null && $request->category != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })
                            ->orderBy('badge_type', 'asc')
                            ->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$categoryname.'</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
            elseif ($request->city != null && $request->keyword != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->orWhereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$categoryname.'</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
            elseif ($request->category != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->orWhere('city', '=', "%{$request->city}%")
                            ->orWhere('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$categoryname.'</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
            else {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->orWhere('city', '=', "%{$request->city}%")
                            ->orWhere('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->prwhereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$categoryname.'</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }

        }



        if ($request->city != null) {
            if ($request->keyword != null) {
                $services = Service::query()
                    ->where('city', '=', "%{$request->city}%")
                    ->where('name', 'LIKE', "%{$request->keyword}%")
                    ->where('state', '=', "%{$request->state}%")
                    ->orderBy('badge_type', 'asc')
                    ->get();
            }
            else {
                $services = Service::query()
                    ->where('city', 'like', "%{$request->city}%")
                    ->orwhere('state', 'like', "%{$request->state}%")
                    ->orderBy('badge_type', 'asc')
                    ->get();
            }

            $related_services = Service::query()
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->orwhere('state', '=', "%{$request->state}%")
            ->orwhere('city', '=', "%{$request->city}%")
            ->get();

            if (!$services->isEmpty()) {
                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$request->city.'</strong>',
                    "services" => $services,
                    "related_services" => $related_services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
            else{
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                ->orderBy('badge_type', 'asc')
                ->get();

                return view('dapSearchResult', [
                    "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
        }elseif ($request->state != null) {
            $services = Service::query()
            ->where('state', 'LIKE', "%{$request->state}%")
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->orWhere('description', 'LIKE', "%{$request->keyword}%")
            ->orderBy('badge_type', 'asc')
            ->get();

            if (!$services->isEmpty()) {
                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong> in <strong>'.$request->state.'</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
            else{
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                ->orderBy('badge_type', 'asc')
                ->get();

                return view('dapSearchResult', [
                    "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
        }
        elseif ($request->keyword != null){
            $services = Service::query()
                        ->where('name', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                        ->orderBy('badge_type', 'asc')
                        ->get();

            if (!$services->isEmpty()) {
                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>'.$keyword. '</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    // "related_services" => $related_services,
                    "categories" => $categories,
                ]);
            }
            else{
                return view('dapSearchResult', [
                    "noserviceinstate" => 'Unfortunately, we did not find anything that matches your search keyword.',
                    "categories" => $categories,
                    "featuredServices" => $featuredServices,
                ]);
            }
        }

    }



    public function seekingWorkCreate(Request $request)
    {

        $this->validate($request, [
            'name'              => 'string|required',
            'phone'                 => 'string|numeric',
            'job_type'              => 'string|required',
            'job_title'             => 'string|required',
            'job_experience'        => 'string|required',
            'still_studying'        => 'string',
            'gender'                => 'string|required',
            'age'                   => 'string|numeric',
            'marital_status'        => 'string',
            'employment_status'     => 'string|required',
            'highest_qualification' => 'string|required',
            'expected_salary'       => 'string|required',
            'user_state'            => 'string|required',
            'user_lga'              => 'string|required',
            'address'               => 'string',
            'work_experience'       => 'string',
            'education'             => 'string|required',
            'certifications'        => 'string',
            'skills'                => 'string|required',
            'user_image'            => 'image|required'
        ]);


        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;

            //Fullsize
            $image->move(public_path('uploads/seekingworks/'),$file_name);

            $image_resize = Image::make(public_path('uploads/seekingworks/').$file_name);
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('uploads/seekingworks/' .$file_name));
        }

            $sWork = new SeekingWork();

            $sWork->user_id               = Auth::user()->id;
            $sWork->fullname              = $request->name;
            $sWork->phone                 = $request->phone;
            $sWork->job_type              = $request->job_type;
            $sWork->job_title             = $request->job_title;
            $sWork->slug                  = Str::of($request->job_title)->slug('-').'-'.time();
            $sWork->job_experience        = $request->job_experience;
            $sWork->still_studying        = $request->still_studying;
            $sWork->gender                = $request->gender;
            $sWork->age                   = $request->age;
            $sWork->marital_status        = $request->marital_status;
            $sWork->employment_status     = $request->employment_status;
            $sWork->highest_qualification = $request->highest_qualification;
            $sWork->expected_salary       = $request->expected_salary;
            $sWork->user_state            = $request->user_state;
            $sWork->user_lga              = $request->user_lga;
            $sWork->address               = $request->address;
            $sWork->work_experience       = $request->work_experience;
            $sWork->education             = $request->education;
            $sWork->certifications        = $request->certifications;
            $sWork->skills                = $request->skills;
            $sWork->category_id           = $request->category_id;
            $sWork->is_featured           = $request->is_featured;
            $sWork->picture               = $file_name;

        if ($sWork->save()) {
            $sWork->images()->create(['image_path' => $file_name]);
            $sWork->thumbnail = $sWork->images()->first()->image_path;
            $sWork->save();

            return redirect()->route('seller.dashboard')->with([
                'message' => 'CV succesfully created!',
                'alert-type' => 'success'
            ]);
        }
        else{
            return redirect()->route('seller.dashboard')->with([
                'message' => 'CV couldn\'t updated!',
                'alert-type' => 'error'
            ]);
        }
    }

    public function seekingWorkDetails($slug)
    {

        $seekingWorkDetail = SeekingWork::where('slug', $slug)->firstorFail();

        $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $approvedServices = Service::where('status', 1)->with('user')->get();
        $categories = Category::paginate(8);
        $seekingWorkDetail_id = $seekingWorkDetail->id;
        $seekingWorkDetail_likes = Like::where('service_id', $seekingWorkDetail_id)->count();
        $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$seekingWorkDetail_id])->first();
        $service_category_id = $seekingWorkDetail->category_id;
        $seekingWorkDetail_state = $seekingWorkDetail->state;
        $images_4_service = $seekingWorkDetail->images;
        // $images_4_service = Image::where('imageable_id', $seekingWorkDetail_id)->get();
        $similarProducts = Service::where([['category_id', $service_category_id], ['state', $seekingWorkDetail_state] ])->inRandomOrder()->limit(8)->get();

        $user_id = $seekingWorkDetail->user_id;
        $userMessages = Message::where('service_id', $seekingWorkDetail_id)->orderBy('created_at','desc')->take(7)->get();

        $the_user = User::find($user_id);
        $the_user_name = $the_user->name;
        $the_provider_f_name = explode(' ', trim($the_user_name))[0];

        $expiresAt = now()->addHours(24);
        views($seekingWorkDetail)->cooldown($expiresAt)->record();

        return view('seekingWorkDetail', compact(['seekingWorkDetail', 'images_4_service', 'seekingWorkDetail_id', 'approvedServices',  'similarProducts', 'seekingWorkDetail_likes', 'featuredServices', 'userMessages', 'the_provider_f_name', 'likecheck']));
    }


}
