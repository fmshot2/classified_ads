<?php

namespace App\Http\Controllers\Api;

use App\Advertisement;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\AdvertisementResourceCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceResourceCollection;
use App\Service;
use App\Slider;
use App\State;
use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ServiceCreated;
use App\SeekingWork;
use App\SubCategory;
use App\Image as ModelImage;
use App\Like;
use App\Message;
use App\Notification;
use App\Refererlink;

class ServiceController extends Controller
{
    protected $user;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'categories', 'showcategory', 'banner_slider', 'search', 'sub_categories']]);
        $this->user = $this->guard()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ServiceResource::collection(Service::paginate(5));
        return (new ServiceResourceCollection(Service::all()))
            ->response()
            ->setStatusCode(200);
    }

    public function dashboard()
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $service_count = Service::where('user_id', $user->id)->count();
        $message_count = Message::where('service_user_id', Auth::id())->count();
        $all_service = Service::where('user_id', $user->id)->take(5)->get();
        $unread_notification = Notification::where('status', 0)->orderBy('id', 'desc')->take(5)->get();
        $all_notification_count = Notification::count();

        $all_service_active = Service::where('user_id', $user->id);
        $active_service =  $all_service_active->Where('status', 1);
        $check_active_service_table = collect($active_service)->isEmpty();
        $active_service_count = $check_active_service_table == true ? 0 : $active_service->count();
        $active_service = $check_active_service_table == true ? 0 : $active_service->take(5)->get();

        $service = Service::where('user_id', $user->id);
        $pending_service =  $service->Where('status', 0);
        $check_pending_service_table = collect($pending_service)->isEmpty();
        $pending_service_count = $check_pending_service_table == true ? 0 : $pending_service->count();
        $pending_service = $check_pending_service_table == true ? 0 : $pending_service->take(5)->get();

        $all_message = Message::where('service_user_id', $user->id);
        $unread_message =  $all_message->Where('status', 0);
        $check_unread_message_table = collect($unread_message)->isEmpty();
        $unread_message_count = $check_unread_message_table == true ? 0 : $unread_message->count();
        $unread_message = $check_unread_message_table == true ? 0 : $unread_message->orderBy('id', 'desc')->take(5)->get();

        $message = Message::where('service_user_id', $user->id);
        $read_message =  $message->Where('status', 1);
        $check_read_message_table = collect($read_message)->isEmpty();
        $read_message_count = $check_read_message_table == true ? 0 : $read_message->count();
        $read_message = $check_read_message_table == true ? 0 : $read_message->orderBy('id', 'desc')->take(5)->get();


        $all_service2 = Service::where('user_id', $user->id)->get();
        $count_badge =  $all_service2->Where('badge_type', null)->count();

        $servicesLikeCounter = 0;
        foreach ($all_service2 as $key => $all_service) {
            $servicesLikeCounter += $all_service->likes->count();
        }


        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::orderBy('name', 'asc')->get();
        $states = State::all();

        $slug3 = Str::random(8);

        $status = "hghgcc";

        $accruedAmount = Auth::user()->refererAmount;

        $linkcheck2 = Refererlink::where(['user_id'=>Auth::id()])->first();
        if ($linkcheck2) {
            $linkcheck = $linkcheck2;
            return response()->json([
                $service_count,
                $pending_service_count,
                $active_service_count,
                $message_count,
                $unread_message,
                $unread_message_count,
                $read_message,
                $read_message_count,
                $all_service,
                $active_service,
                $all_notification_count,
                $unread_notification,
                $pending_service,
                $servicesLikeCounter,
                $all_service2,
                $count_badge,
                $status,
                $linkcheck,
                $accruedAmount
            ]);

        }else{
            $linkcheck = null;
            return response()->json([
                $service_count,
                $pending_service_count,
                $active_service_count,
                $message_count,
                $unread_message,
                $unread_message_count,
                $read_message,
                $read_message_count,
                $all_service,
                $active_service,
                $unread_notification,
                $pending_service,
                $servicesLikeCounter
            ]);
        }

    }

    public function createService(Request $request)
    {
        $data = $request->all();
        $this->validate($request,[
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', //|max:2048
        ]);
        $image = $request->file('image');
        $random = Str::random(3);
        $slug = Str::of($request->name)->slug('-').''.$random;
        $service = new Service();
        $slug = Str::random(5);

                // Image set up
        if ( $request->hasFile('files') ) {
                $names = array();
            foreach($request->file('files') as $image)
            {
                $thumbnailImage = Image::make($image);
                $thumbnailImage->resize(300,300);
                $thumbnailImage_name = $slug.'.'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = 'images/';
                $thumbnailImage->save($destinationPath . $thumbnailImage_name);
                array_push($names, $thumbnailImage_name);
            }
                $service->image = json_encode($names);
        }

        $state_details = State::where('name', $data['state'])->first();

        $service->user_id = Auth::id();
        $service->category_id = $data['category_id'];
        $service->name = $data['name'];
        $service->description = $data['description'];
        $service->phone = $data['phone'];
        $service->min_price = $data['min_price'];
        $service->state = $data['state'];
        $service->latitude = $state_details->latitude;
        $service->longitude = $state_details->longitude;
        $service->city = $data['city'];
        $service->address = $data['address'];
        $service->max_price = $data['category_id'];
        $service->slug = $slug;
        // $service->video_link = $request->video_link;$data['category_id'];
        $service->save();
        $latest_service = Service::where('user_id', Auth::id())->latest()->first();
        $latest_service_id = $latest_service->id;

        $service->sub_categories()->attach($request->sub_category);

        $service_owner = Auth::user();
        $service_owner->name = Auth::user()->name;
        $service_owner->email = Auth::user()->email;


        if ($service->save()) {
            $name =  $service->name;
            $category =  $service->category->name;
            $phone =  $service->phone;
            $state =  $service->state;
            $slug =  $service->slug;

            try{
                Mail::to($service_owner->email)->send(new ServiceCreated($name, $category, $phone, $state, $slug));
            }
            catch(\Exception $e){
                $failedtosendmail = 'Failed to Mail!.';
            }
        }

        $present_user = Auth::user();
        $user_hasUploadedService = $present_user->hasUploadedService;
        if ($user_hasUploadedService == 1) {
            return response()->json([
                'message' => 'Service created successfully!'
            ]);

        }
        $present_user->hasUploadedService = 1;
        $user_referer_id = $present_user->idOfReferer;
        $present_user->save();

        $referer = User::where('id', $user_referer_id)->first();
        if ($referer) {
            $referer->refererAmount = $referer->refererAmount + 50;
            $referer->save();

            return response()->json([
                'message' => 'Referrer Bonus Added successfully!'
            ]);
        }

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myServices()
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
        // return ServiceResource::collection(Service::paginate(5));
        return (new ServiceResourceCollection($user->services))
            ->response()
            ->setStatusCode(200);
    }

    public function myFavourites(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $likecheck = Like::where(['user_id'=>$user->id])->get();
        $this->thefavourites = [];

        foreach ($likecheck as $key => $all_service) {
            $this->thefavourites[] = Service::where('id', $all_service->service_id )->firstOrFail();
        }

        $allfavourites = $this->thefavourites;

        if ($allfavourites) {
            return response()->json([
                $allfavourites,
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'No Favourite!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'error' => 'Service not found!',
            ]);
        }
        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'city'        => 'required',
            'state'       => 'required',
        ]);

        $nService = new Service();
        $nService->name = $request->name;
        $nService->description = $request->description;
        $nService->city = $request->city;
        $nService->state = $request->state;

        if ($nService->save()) {
            return response()->json([
                $nService,
                'message' => 'Service saved successfully!'
            ], 200);
        }
        else{
            return response()->json([
                'error' => 'Something went wrong!'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->city = $request->city;
        $service->state = $request->state;

        if ($service->save()) {
            return response()->json([
                $service,
                'message' => 'Service updated successfully!'
            ], 200);
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
            $image_resize->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('uploads/seekingworks/' .$file_name), 60);
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

            return response()->json([
                $sWork,
                'message' => 'CV Created successfully!'
            ], 200);
        }
        else{
            return response()->json([
                $sWork,
                'error' => 'Something went wrong!'
            ]);
        }
    }

    public function showCV($slug)
    {
        $service = SeekingWork::where('slug', $slug)->firstOrFail();

        if (!$service->isEmpty()) {
            return response()->json([
                $service
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'Something is not right!'
            ], 404);
        }
    }

    public function imagesSeekingWorkStore(Request $request, $service_id)
    {
        $image       = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;

        //Fullsize
        $image->move(public_path('uploads/seekingworks/'),$file_name);

        $image_resize = Image::make(public_path('uploads/seekingworks/').$file_name);
        $image_resize->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('uploads/seekingworks/' .$file_name));

        // Saving it with this service
        $service = SeekingWork::find($service_id);
        $service->images()->create(['image_path' => $file_name]);
        $service->thumbnail = $service->images()->first()->image_path;
        $service->save();


        return response()->json([
            $service,
            'message' => 'Image(s) stored successfully!'
        ], 200);

    }

    public function imagesDelete($seekingworkid, $id)
    {
        $image = ModelImage::where('imageable_id', $seekingworkid)->where('id', $id)->first();
        $filename = $image->image_path;
        $image->delete();

        $path = public_path('uploads/seekingworks/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }

        return response()->json([
            'message' => 'Image(s) deleted successfully!'
        ]);
    }

    public function seekingWorkDetails($slug)
    {

        $seekingWorkDetail = SeekingWork::where('slug', $slug)->where('status', 1)->firstorFail();

        $featuredServices = Service::where('is_featured', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $approvedServices = Service::where('status', 1)->with('user')->get();
        $seekingWorkDetail_id = $seekingWorkDetail->id;
        $seekingWorkDetail_likes = Like::where('service_id', $seekingWorkDetail_id)->count();
        $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$seekingWorkDetail_id])->first();
        $service_category_id = $seekingWorkDetail->category_id;
        $seekingWorkDetail_state = $seekingWorkDetail->state;
        $images_4_service = $seekingWorkDetail->images;
        $similarProducts = Service::where([['category_id', $service_category_id], ['state', $seekingWorkDetail_state] ])->inRandomOrder()->limit(8)->get();

        $user_id = $seekingWorkDetail->user_id;
        $userMessages = Message::where('service_id', $seekingWorkDetail_id)->orderBy('created_at','desc')->take(7)->get();

        $the_user = User::find($user_id);
        $the_user_name = $the_user->name;
        $the_provider_f_name = explode(' ', trim($the_user_name))[0];

        $expiresAt = now()->addHours(24);
        views($seekingWorkDetail)->cooldown($expiresAt)->record();

        return response()->json([
            $seekingWorkDetail,
            $images_4_service,
            $seekingWorkDetail_id,
            $approvedServices,
            $similarProducts,
            $seekingWorkDetail_likes,
            $featuredServices,
            $userMessages,
            $the_provider_f_name,
            $userMessages,
            $userMessages
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteService($id)
    {
        $service = Service::find($id);

        if ($service->delete()) {
            return response()->json([
                $service,
                'message' => 'This Service was Deleted Successfully!',
            ], 200);
        }

        return response()->json(['message' => 'Something went wrong!'], 400);
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword ? $request->keyword : 'Nothing!';
        $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->inRandomOrder()->limit(4)->get();
        $categories = Category::orderBy('name', 'asc')->get();


        if ($request->category == null && $request->city == null && $request->keyword == null) {
            return response()->json([
                'message' => 'Unfortunately, we did not find anything that matches these criteria.',
            ], 404);
        }


        if ($request->category != null) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $categoryId = $category->id;
            $categoryname = $category->name;

            if ($request->category != null && $request->city != null && $request->keyword != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->where('status', 1)
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
            elseif ($request->category != null && $request->city != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->where('status', 1)
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
            elseif ($request->keyword == null && $request->category != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('status', 1)
                            ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })
                            ->orderBy('badge_type', 'asc')
                            ->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
            elseif ($request->city != null && $request->keyword != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->where('status', 1)
                            ->with('category')
                            ->orWhereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
            elseif ($request->category != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('status', 1)
                            ->orWhere('city', '=', "%{$request->city}%")
                            ->orWhere('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
            else {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('status', 1)
                            ->orWhere('city', '=', "%{$request->city}%")
                            ->orWhere('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->prwhereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }

        }



        if ($request->city != null) {
            if ($request->keyword != null) {
                $services = Service::query()
                    ->where('city', '=', "%{$request->city}%")
                    ->where('name', 'LIKE', "%{$request->keyword}%")
                    ->where('state', '=', "%{$request->state}%")
                    ->where('status', 1)
                    ->orderBy('badge_type', 'asc')
                    ->get();
            }
            else {
                $services = Service::query()
                    ->where('city', 'like', "%{$request->city}%")
                    ->where('status', 1)
                    ->orwhere('state', 'like', "%{$request->state}%")
                    ->orderBy('badge_type', 'asc')
                    ->get();
            }

            $related_services = Service::query()
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->where('status', 1)
            ->orwhere('state', '=', "%{$request->state}%")
            ->orwhere('city', '=', "%{$request->city}%")
            ->get();

            if (!$services->isEmpty()) {
                return response()->json([
                    $services,
                    $related_services
                ], 200);
            }
            else{
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                ->orderBy('badge_type', 'asc')
                ->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
        }elseif ($request->state != null) {
            $services = Service::query()
            ->where('state', 'LIKE', "%{$request->state}%")
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->where('status', 1)
            ->orWhere('description', 'LIKE', "%{$request->keyword}%")
            ->orderBy('badge_type', 'asc')
            ->get();

            if (!$services->isEmpty()) {
                return response()->json([
                    $services,
                ], 200);
            }
            else{
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                ->orderBy('badge_type', 'asc')
                ->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        $services,
                    ], 200);
                }
            }
        }
        elseif ($request->keyword != null){
            $services = Service::query()
                        ->where('name', 'LIKE', "%{$request->keyword}%")
                        ->where('status', 1)
                        ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                        ->orderBy('badge_type', 'asc')
                        ->get();
            if (!$services->isEmpty()) {
                return response()->json([
                    $services,
                ], 200);
            }
            else{
                return response()->json([
                    'message' => 'Unfortunately, we did not find anything that matches these criteria.',
                ], 404);
            }
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return CategoryResource::collection(Category::all(), 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sub_categories()
    {
        return response()->json(SubCategory::all());
    }

    /**
     * Get a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showcategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'error' => 'Service not found!',
            ]);
        }
        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(200);
    }


    protected function guard()
    {
        return Auth::guard();
    }


}
