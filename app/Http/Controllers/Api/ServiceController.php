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
use App\SubCategory;

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
        return new ServiceResourceCollection(Service::all());
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

        return new ServiceResource($service);
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
        return new ServiceResourceCollection($user->services);
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
        return new ServiceResource($service);
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
            ]);
        }
        else{
            return response()->json([
                'error' => 'Something went wrong!'
            ]);
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

    public function search($query)
    {
        $services = Service::where('name', 'like', '%'.$query.'%')->get();
        return new ServiceResourceCollection($services);
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
            ]);
        }

        return response()->json(['message' => 'Something went wrong!'], 400);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return CategoryResource::collection(Category::all());
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
        return new CategoryResource($category);
    }



    protected function guard()
    {
        return Auth::guard();
    }
}
