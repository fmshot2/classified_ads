<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Advertisement;
use App\AdvertLocation;
use App\Agent;
use App\Badge;
use App\Category;
use App\EmailSubscription;
use App\SubCategory;
use App\General_Info;
use App\Image as ModelImage;
use App\Like;
use App\Mail\CredentialsReset;
use App\Mail\EarnMoney;
use App\Mail\Newsletter;
use App\Mail\ClientCallbackRequest;
use App\Mail\CustomerServiceMail;
use App\Mail\PaymentProcessAbandoned;
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
use App\Payment;
use App\Siteemaillist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;





class OperationalController extends Controller
{

    public function credentialsReset()
    {
        $name = "Abdul";
        $email = 'adeoluibidapo@gmail.com';
        $password = '123456';


        try {
            Mail::to('adeoluibidapo@gmail.com')->send(new CredentialsReset($name, $email, $password));
        } catch (\Exception $e) {
            $failedtosendmail = 'Failed to Mail!';
        }

        return redirect()->back();
    }


    public function agentDashboard(Request $request)
    {

        $agent_code_check = Refererlink::where(['user_id' => Auth::id()])->firstOrFail();

        $service_count = Refererlink::where('user_id', Auth::id())->count();
        return view('agent.dashboard', compact('service_count', 'agent_code_check'));
    }

    public function sliderCreate(Request $request)
    {
        $this->validate($request, [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;
            $image->move(public_path('uploads/sliders'), $file_name);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;
            $image->move(public_path('uploads/sliders'), $file_name);

            $data = [
                'title' => $request->title,
                'details' => $request->details,
                'links' => $request->link,
                'buttonlocation' => $request->buttonlocation,
                'buttontext' => $request->buttontext,
                'image' => $file_name
            ];
        } else {
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $adlocationid = $request->advert_location;
        $location_name = AdvertLocation::find($adlocationid);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;
            $image->move(public_path('uploads/sponsored'), $file_name);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $adlocationid = $request->advert_location;
        $location_name = AdvertLocation::find($adlocationid);

        if ($request->hasFile('ad_image')) {
            $image = $request->file('ad_image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;
            $image->move(public_path('uploads/sponsored'), $file_name);

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
        } else {
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
            'userfeedback' => 'string'
        ]);

        $feedback = new UserFeedback;
        $data = ['feedback' => $request->userfeedback];
        $feedback->create($data);

        try {
            Mail::to('info@efcontact.com')->send(new UsersFeedback($request->userfeedback));
        } catch (\Exception $e) {
            $failedtosendmail = 'Failed to Mail!.';
        }

        return $request;
    }


    public function advertisement()
    {
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
        $success_notification = array(
            'message' => 'Please renew your subscription to view this page!',
            'alert-type' => 'error'
        );
        $user_sub_date = Auth::user()->subscriptions->first()->subscription_end_date;

        if (Carbon::now() > Carbon::parse($user_sub_date)) {
            // return redirect()->route('seller.sub.create')->with($success_notification);
            return redirect()->route('seller.sub.create');
        }

        $all_services = Service::where('user_id', Auth::id())->get();

        $this->thecomments = [];

        foreach ($all_services as $key => $all_service) {
            foreach ($all_service->comments as $key => $thecomments) {
                $this->thecomments[] = $thecomments;
            }
        }
        $allcomments = array_reverse($this->thecomments);

        return view('seller.feedbacks.all', compact('all_services', 'allcomments'));
    }

    public function myFavourites(Request $request)
    {
        $success_notification = array(
            'message' => 'Please renew your subscription to view this page!',
            'alert-type' => 'error'
        );
        $user_sub_date = Auth::user()->subscriptions->first()->subscription_end_date;

        if (Carbon::now() > Carbon::parse($user_sub_date)) {
            // return redirect()->route('seller.sub.create')->with($success_notification);
            return redirect()->route('seller.sub.create');
        }

        $user = $request->user();
        $likecheck = Like::where(['user_id' => $user->id])->get();
        $this->thefavourites = [];

        foreach ($likecheck as $key => $all_service) {
            $this->thefavourites[] = Service::where('id', $all_service->service_id)->firstOrFail();
        }

        $allfavourites = array_reverse($this->thefavourites);

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
        if ($request->ajax()) {

            $services = Service::query()
            ->where('name', 'LIKE', "%{$request->service}%")
            ->where('status', 1)
            ->orWhere('description', 'LIKE', "%{$request->service}%");

            $seekingworks = SeekingWork::query()
            ->where('job_title', 'LIKE', "%{$request->service}%")
            ->where('status', 1)
            ->orWhere('fullname', 'LIKE', "%{$request->service}%");


            $data = $services->get()->concat($seekingworks->get());


            $output = '';
            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    if ($row->name) {
                        $output .= '<li class="list-group-item"><a style="display:block" href="' . route('serviceDetail',  $row->slug) . '">' . $row->name . ' in <span class="ajaxSearchCategoryList">' . $row->category->name . '</span></li>';
                    } else {
                        $output .= '<li class="list-group-item"><a style="display:block" href="' . route('job.applicant.detail',  $row->slug) . '">' . $row->job_title . ' in <span class="ajaxSearchCategoryList">' . $row->category->name . ' & CVs</span></li>';
                    }
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            return $output;
        }
    }

    public function dapSearch(Request $request)
    {
        $keyword = $request->keyword ? $request->keyword : 'Nothing!';
        $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $categories = Category::orderBy('name', 'asc')->get();

        if ($request->category == null && $request->city == null && $request->keyword == null && $request->state == null) {
            return back()->with([
                'message' => 'No result found for your search!',
                'alert-type' => 'error'
            ]);
        }


        if ($request->subcategory != null) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $subcategory = SubCategory::where('slug', $request->subcategory)->firstOrFail();
            $categoryId = $category->id;
            $categoryname = $category->name;
            $subcategoryId = $subcategory->id;
            $subcategoryname = $subcategory->name;


            if ($request->keyword != null && $request->city != null) {
                $services = Service::query()
                ->where('name', 'LIKE', "$request->keyword")
                ->where('city', '=', "$request->city")
                ->where('state', '=', "$request->state")
                ->where('status', 1)
                ->with('sub_categories')
                ->whereHas('sub_categories', function ($query) use ($subcategoryId) {
                    $query->where('sub_categorable_id', $subcategoryId);
                })
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })
                ->get();

                $seekingworks = SeekingWork::query()
                ->where('job_title', 'LIKE', "$request->keyword")
                ->where('status', 1)
                ->where('user_lga', '=', "$request->city")
                ->where('user_state', '=', "$request->state")
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })
                ->orWhere('fullname', 'LIKE', "%{$request->keyword}%")
                ->get();

                if (!$services->isEmpty() || !$seekingworks->isEmpty()) {
                    return view('dapSearchResult', [
                        "message" => 'Your search result for <strong>' . $keyword . '</strong> in <strong>' . $categoryname . '</strong>',
                        "services" => $services,
                        "seekingworks" => $seekingworks,
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                } else {
                    return view('dapSearchResult', [
                        "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
            } elseif ($request->keyword != null && $request->state != null) {
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('state', '=', "$request->state")
                ->where('status', 1)
                ->with('sub_categories')
                ->whereHas('sub_categories', function ($query) use ($subcategoryId) {
                    $query->where('sub_categorable_id', $subcategoryId);
                })
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>' . $keyword . '</strong> in <strong>' . $subcategoryname . '</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            } elseif ($request->keyword == null) {
                $services = Service::query()
                ->where('state', '=', "$request->state")
                ->where('status', 1)
                ->with('sub_categories')
                ->whereHas('sub_categories', function ($query) use ($subcategoryId) {
                    $query->where('sub_categorable_id', $subcategoryId);
                })
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>' . $keyword . '</strong> in <strong>' . $subcategoryname . '</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
        }


        if ($request->category != null) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $categoryId = $category->id;
            $categoryname = $category->name;

            if ($request->city != null && $request->keyword != null) {
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('city', '=', "$request->city")
                ->where('state', '=', "$request->state")
                ->where('status', 1)
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                });

                $seekingworks = SeekingWork::query()
                ->where('job_title', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })
                ->orWhere('fullname', 'LIKE', "%{$request->keyword}%");

                if (!$services->isEmpty() || !$seekingworks->isEmpty()) {
                    return view('dapSearchResult', [
                        "message" => 'Your search result for <strong>' . $keyword . '</strong> in <strong>' . $categoryname . '</strong>',
                        "services" => $services,
                        "seekingworks" => $seekingworks,
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                } else {
                    return view('dapSearchResult', [
                        "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
                return view('dapSearchResult', [
                    "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            } elseif ($request->keyword != null && $request->state != null) {
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('state', '=', "$request->state")
                ->where('status', 1)
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>' . $keyword . '</strong> in <strong>' . $categoryname . '</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            } elseif ($request->state != null) {
                $services = Service::query()
                ->where('state', '=', "$request->state")
                ->where('status', 1)
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })->get();

                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>' . $keyword . '</strong> in <strong>' . $categoryname . '</strong>',
                    "services" => $services,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            } else {
                $services = Service::query()
                ->where('status', 1)
                ->with('category')
                ->whereHas('category', function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })->get();

                if (!$services->isEmpty()) {
                    return view('dapSearchResult', [
                        "message" => 'Your search result in <strong>' . $categoryname . '</strong>',
                        "services" => $services,
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                } else {
                    return view('dapSearchResult', [
                        "message" => 'No result found for your search in <strong>' . $categoryname . '</strong>',
                        "categories" => $categories,
                    ]);
                }
            }
        }



        if ($request->city != null) {
            if ($request->keyword != null) {
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('city', '=', "%{$request->city}%")
                ->where('state', '=', "%{$request->state}%")
                ->where('status', 1)
                ->get();

                $seekingworks = SeekingWork::query()
                ->where('job_title', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->where('user_lga', '=', "%{$request->city}%")
                ->where('user_state', '=', "%{$request->state}%")
                ->orWhere('fullname', 'LIKE', "%{$request->keyword}%")
                ->get();

                if (!$services->isEmpty() || !$seekingworks->isEmpty()) {
                    return view('dapSearchResult', [
                        "message" => 'Your search result for <strong>' . $keyword . '</strong>',
                        "services" => $services,
                        "seekingworks" => $seekingworks,
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                } else {
                    return view('dapSearchResult', [
                        "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
            }
        }


        if ($request->state != null) {
            if ($request->keyword != null) {
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('state', $request->state)
                ->where('status', 1)
                ->get();

                $seekingworks = SeekingWork::query()
                ->where('job_title', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->where('user_state', '=', $request->state)
                ->orWhere('fullname', 'LIKE', "%{$request->keyword}%")
                ->get();

                if (!$services->isEmpty()) {
                    return view('dapSearchResult', [
                        "message" => 'Your search result for <strong>' . $keyword . '</strong>',
                        "services" => $services,
                        "seekingworks" => $seekingworks,
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                } else {
                    return view('dapSearchResult', [
                        "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
            } else {
                $services = Service::query()
                ->where('state', $request->state)
                ->where('status', 1)
                ->get();

                $seekingworks = SeekingWork::query()
                ->where('user_state', '=', $request->state)
                ->where('status', 1)
                ->get();

                if (!$services->isEmpty() && !$services->isEmpty()) {
                    return view('dapSearchResult', [
                        "featuredServices" => $featuredServices,
                        "services" => $services,
                        "seekingworks" => $seekingworks,
                        "categories" => $categories,
                    ]);
                } else {
                    return view('dapSearchResult', [
                        "noserviceinstate" => 'Unfortunately, we did not find anything that matches these criteria.',
                        "featuredServices" => $featuredServices,
                        "categories" => $categories,
                    ]);
                }
            }
        }


        if ($request->keyword != null) {
            $services = Service::query()
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->where('status', 1)
            ->orWhere('city', '=', "$request->city")
            ->orWhere('state', '=', "$request->state")
            ->get();

            $seekingworks = SeekingWork::query()
            ->where('job_title', 'LIKE', "%{$request->keyword}%")
            ->where('status', 1)
            ->orWhere('user_lga', '=', "$request->city")
            ->orWhere('user_state', '=', "$request->state")
            ->orWhere('fullname', 'LIKE', "%{$request->keyword}%")
            ->get();

            if (!$services->isEmpty() || !$seekingworks->isEmpty()) {
                return view('dapSearchResult', [
                    "message" => 'Your search result for <strong>' . $keyword . '</strong>',
                    "services" => $services,
                    "seekingworks" => $seekingworks,
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            } else {
                return view('dapSearchResult', [
                    "message" => 'No result found for your search <strong>' . $keyword . '</strong>',
                    "featuredServices" => $featuredServices,
                    "categories" => $categories,
                ]);
            }
        }


        return view('dapSearchResult', [
            "message" => 'No result found for your search <strong>' . $keyword . '</strong>',
            "featuredServices" => $featuredServices,
            "categories" => $categories,
        ]);
    }

    public function paidForBadge(Request $request)
    {
        $user = $request->user();

        $user->badgetype = $request->get('badge_type');

        $badge = new Badge();
        $badge->user_id = $user->id;

        if ($request->get('badge_type') == 1) {
            $badge->badge_type = 'Super User';
        } elseif ($request->get('badge_type') == 2) {
            $badge->badge_type = 'Moderate User';
        } elseif ($request->get('badge_type') == 3) {
            $badge->badge_type = 'Basic User';
        }

        $badge->amount = $request->get('amount');
        $badge->ref_no = $request->get('trans_reference');
        $badge->seller_name = $user->name;
        $badge->save();


        if ($request->get('badge_type') == 1) {
            $badge_name = 'Super User';
        } elseif ($request->get('badge_type') == 2) {
            $badge_name = 'Moderate User';
        } elseif ($request->get('badge_type') == 3) {
            $badge_name = 'Basic User';
        }

        if ($user->save()) {
            $reg_payments = new Payment();
            $reg_payments->user_id = Auth::id();
            $reg_payments->payment_type = 'badge_payment';
            $reg_payments->amount = $request->get('amount');
            $reg_payments->tranx_ref = $request->get('trans_reference');
            $reg_payments->save();

            return collect($badge_name);
        } else {
            return 'Something went wrong!';
        }
    }



    public function readStatusMessage($slug, Request $request)
    {
        $user = Auth::user();
        $message = Message::where('slug', $slug)->first();

        if ($user->id != $message->user_id) {
            $message->status = 1;
            if ($message->save()) {
                return response()->json([
                    'message' => 'Message marked as read!',
                    'alert-type' => 'success'
                ]);
            }
            return response()->json([
                'message' => 'Message couldn\'t marked as read!',
                'alert-type' => 'error'
            ]);
        } else {
            return 'sender';
        }
    }

    public function AbandonedPaymentView()
    {
        return view('admin.data_entry.abandoned_payment');
    }


    public function AbandonedPayment(Request $request)
    {
        $emails = $request->emails;
        $users_email = explode(',', $emails);

        foreach ($users_email as $name => $email) {
            $email = trim($email);
            try {
                Mail::to($email)->send(new PaymentProcessAbandoned($request->subject, $request->message));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!.';
            }
        }

        return redirect()->back()->with([
            'message' => 'Mail Sent Successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function clientCallbackRequest(Request $request)
    {
        $username = $request->user_name;
        $userphone = $request->user_phone;
        $provider_email = $request->provider_email;
        $service = Service::find($request->the_service_id);

        try {
            Mail::to($provider_email)->send(new ClientCallbackRequest($username, $service->user->name, $userphone, $service->name, $service->slug));
        } catch (\Exception $e) {
            $failedtosendmail = 'Failed to Mail!.';
        }

        return 'Request Sent Successfully!';
    }


    public function cheatViewsCode()
    {
        $services = Service::inRandomOrder()->get();

        foreach ($services as $key => $service) {
            $value = rand(80, 200);
            for ($i=1; $i < $value; $i++) {
                views($service)->record();
            }

        }
        return 'Done!';
    }

    public function cheatViewsCodeLower()
    {
        $services = Service::all();

        foreach ($services as $key => $service) {
            if (views($service)->count() < 50) {
                $value = rand(80, 200);
                for ($i=1; $i < $value; $i++) {
                    views($service)->record();
                }
            }
        }
    }

    public function customerServiceMail(Request $request){
        if(auth::user()->role != 'customerservice') {
            return redirect()->route('home');
        }
        return view('customerservice.send_email');
    }

    public function customerServiceMailSend(Request $request){
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
            'emails'  => 'required'
        ]);

        $emails = $request->emails;
        $emails = preg_replace('/\.$/', '', $emails);
        $email_array = explode(',', $emails);

        foreach ($email_array as $email) {
            $email = trim($email);
            $user = User::where('email', $email)->first();

            if($user){
                $username = explode(' ', trim($user->name))[0];

                try {
                    Mail::to($email)->send(new CustomerServiceMail($username, $request->message, $request->subject));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }
        return redirect()->back()->with([
            'message' => 'Email sent successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function hashNewPassword()
    {
        return Hash::make('cusServEF1@$');
    }
    
}
