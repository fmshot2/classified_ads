<?php

namespace App\Http\Controllers\Api;

use App\Advertisement;
use App\Badge;
use App\Category;
use App\Comment;
use App\Contact;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\AdvertisementResourceCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ClientsFeedback;
use App\Http\Resources\ClientsFeedbackCollection;
use App\Http\Resources\SeekingWorkResource;
use App\Http\Resources\SeekingWorkResourceCollection;
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
use App\Local_government;
use App\Mail\ContactUs;
use App\Mail\ContactUsAdmin;
use App\Message;
use App\Notification;
use App\Payment;
use App\PaymentRequest;
use App\ProviderSubscription;
use App\Refererlink;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('auth:api', ['except' => ['index', 'show', 'seekingWorkLists', 'categories', 'showcategory', 'banner_slider', 'search', 'sub_categories', 'findNearestServices', 'servicesByCategory', 'allFeaturedServices', 'serviceCloseToYou', 'contactUsForm', 'faqs', 'ajaxSearchResult']]);
        $this->user = $this->guard()->user();
    }


    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ServiceResource::collection(Service::paginate(5));
        return (new ServiceResourceCollection(Service::where('status', 1)->where('subscription_end_date', '>', now())->paginate(9)))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seekingWorkLists()
    {
        // return ServiceResource::collection(Service::paginate(5));
        return (new SeekingWorkResourceCollection(SeekingWork::where('status', 1)->paginate(9)))
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
        $message_count = Message::where('receiver_id', Auth::user()->id)->orWhere('user_id', Auth::user()->id)->count();
        $all_service = Service::where('user_id', $user->id)->take(5)->get();
        $unread_notification = $user->unreadNotifications;
        $all_notification_count = $user->notifications->count();

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

        $all_message = Message::where('receiver_id', Auth::user()->id)->orWhere('user_id', Auth::user()->id)->get();
        $unread_message_count = Message::where('receiver_id', Auth::user()->id)->where('status', 0)->count();
        $unread_message = Message::where('receiver_id', Auth::user()->id)->where('status', 0)->get();


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

        $accruedAmount = $user->refererAmount;

        $linkcheck2 = Refererlink::where(['user_id'=>$user->id])->first();
        if ($linkcheck2) {
            $linkcheck = $linkcheck2;
            return response()->json([
                'all_services' => $service_count,
                'pending_services' => $pending_service_count,
                'active_services' => $active_service_count,
                'all_messages' => $all_message,
                'messages_count' => $message_count,
                'unread_messages' => $unread_message,
                'unread_essages_count' => $unread_message_count,
                'all_notifications' => $all_notification_count,
                'unread_notifications' => $unread_notification,
                'your_service_likes_count' => $servicesLikeCounter,
                'your_referral_bonus' => $accruedAmount
            ], 200);

        }else{
            $linkcheck = null;
            return response()->json([
                'all_services' => $service_count,
                'pending_services' => $pending_service_count,
                'active_services' => $active_service_count,
                'all_messages' => $all_message,
                'messages_count' => $message_count,
                'unread_messages' => $unread_message,
                'unread_essages_count' => $unread_message_count,
                'all_notifications' => $all_notification_count,
                'unread_notifications' => $unread_notification,
                'your_service_likes_count' => $servicesLikeCounter
            ], 200);
        }

    }


    public function messageReadStatus(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $message = Message::where('slug', $request->slug)->first();

        if ($user->id != $message->user_id) {
            $message->status = 1;
            if ($message->save()) {
                return response()->json([
                    'message' => 'Message marked as read!',
                    'status' => 1
                ], 200);
            }
            return response()->json([
                'message' => 'Message couldn\'t marked as read!',
                'status' => 0
            ]);
        }
        else{
            return response()->json([
                'message' => 'You are the message sender!',
                'status' => 0
            ]);
        }
    }


    public function createService(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $data = $request->all();
        $this->validate($request,[
            'description' => 'required',
            'category_id' => 'required',
            'min_price' => 'required|numeric',
            'address' => 'nullable',
            'description' => 'required',
            'city' => 'required',
            'name' => 'required',
            'state' => 'required',
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
        $latest_service = Service::where('user_id', $user->id)->latest()->first();
        $latest_service_id = $latest_service->id;

        $service->sub_categories()->attach($request->sub_category);

        $service_owner = $user;
        $service_owner->name = $user->name;
        $service_owner->email = $user->email;


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
            ], 200);

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
            ], 200);
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
        return (new ServiceResourceCollection(Service::where('user_id', $user->id)->paginate(9)))
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

        $allfavourites = array_reverse($this->thefavourites);

        return response()->json([
            $allfavourites,
        ], 200);
    }
    public function clientfeedbacks()
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $all_services = Service::where('user_id', $user->id)->get();

        $this->thecomments = [];

        foreach ($all_services as $key => $all_service) {
            foreach ($all_service->comments as $key => $thecomments) {
                $this->thecomments[] = $thecomments;
            }
        }
        $allcomments = collect(array_reverse($this->thecomments));


        return response()->json([
            'client_feedbacks' => new ClientsFeedbackCollection($allcomments)
        ], 200);
    }

    public function myMessages()
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $all_message = Message::where('receiver_id', Auth::user()->id)->orWhere('user_id', Auth::user()->id)->get();

        return response()->json([
            'my_messages' => $all_message,
        ], 200);


    }

    public function deleteMessage($id)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $message = Message::findOrFail($id);

        if ($message->delete()) {
            return response()->json([
                'Message Deleted!'
            ], 200);
        }
    }

    public function viewMessage(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $message = Message::where('slug', $request->slug)->firstOrFail();
        $message->status = 1;
        $message->save();

        return response()->json([
            'message' => $message
        ], 200);
    }

    public function unReadMessages(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $all_messages = Message::where('service_user_id', $user->id)->Where('status', 0)->orderBy('id', 'desc')->paginate(9);

        return response()->json([
            'unread_messages' => $all_messages
        ], 200);
    }

    public function readMessages(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $all_messages = Message::where('service_user_id', $user->id)->Where('status', 1)->orderBy('id', 'desc')->paginate(9);

        return response()->json([
            'read_messages' => $all_messages
        ], 200);
    }

    public function replyMessage(Request $request)
    {
        $message = Message::where('slug', $request->slug)->firstOrFail();

        return response()->json([
            'message' => $message
        ], 200);
    }

    public function messageReply(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $validatedData = $request->validate([
            'description' => 'required|max:255',
        ]);

        $slug = Str::random(6);

        $message = New Message();
        $message->subject = $request->subject;
        $message->description = $request->description;
        $message->service_id = $request->service_id;
        $message->service_user_id = $request->service_user_id;
        $message->buyer_name = $user->name;
        $message->buyer_email = $user->email;
        $message->buyer_id = $request->buyer_id;
        $message->reply = 'yes';
        $message->phone = $request->phone;
        $message->slug = $slug;

        if ($message->save()) {
            return response()->json([
                'message' => $message
            ], 200);
        }

    }

    public function allNotifications()
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $all_notifications = $user->notifications;

        return response()->json([
            'all_notifications' => $all_notifications
        ], 200);
    }

    public function viewNotification(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $notification = DatabaseNotification::where('id', $request->notification_id)->firstOrFail();
        $notification->read_at = Carbon::now()->toDateString();
        $notification->save();

        return response()->json([
            'notification' => $notification
        ], 200);
    }

    public function notificationMarkAsAllRead()
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
        $user->unreadNotifications->markAsRead();

        return response()->json([
            'All Notifications Marked as Read!'
        ], 200);
    }

    public function notificationMarkAsRead(Request $request)
    {
        $notification = DatabaseNotification::where('id', $request->notification_id)->firstOrFail();
        $notification->read_at = Carbon::now()->toDateString();

        if ($notification->save()) {
            return response()->json([
                'Notification Marked As Read!'
            ]);
        }
    }

    public function notificationDelete(Request $request)
    {
        $notification = DatabaseNotification::where('id', $request->notification_id)->firstOrFail();

        if ($notification->delete()) {
            return response()->json([
                'Notification Deleted!'
            ]);
        }

        return response()->json([
            'error' => 'Notification Couldn\'t Deleted!'
        ]);
    }

    public function requestForBadge(Request $request, $id)
    {
        if ($id == 1) {
            $badge = [
                'badge_type' => 'Super',
                'badge_cost' => 1500000
            ];
        }
        elseif ($id == 2) {
            $badge = [
                'badge_type' => 'Moderate',
                'badge_cost' => 1000000
            ];
        }
        elseif ($id == 3) {
            $badge = [
                'badge_type' => 'Basic',
                'badge_cost' => 500000
            ];
        }

        return $badge;
    }

    public function paidForBadge(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $user->badgetype = $request->get('badge_type');

        $badge = new Badge();
        $badge->user_id = $user->id;

        if ($request->get('badge_type') == 1) {
            $badge->badge_type = 'Super User';
        }
        elseif ($request->get('badge_type') == 2) {
            $badge->badge_type = 'Moderate User';
        }
        elseif ($request->get('badge_type') == 3) {
            $badge->badge_type = 'Basic User';
        }

        $badge->amount = $request->get('amount');
        $badge->ref_no = $request->get('trans_reference');
        $badge->seller_name = $user->name;
        $badge->save();


        if ($request->get('badge_type') == 1) {
            $badge_name = 'Super User';
        }
        elseif ($request->get('badge_type') == 2) {
            $badge_name = 'Moderate User';
        }
        elseif ($request->get('badge_type') == 3) {
            $badge_name = 'Basic User';
        }

        if ($user->save()) {
            $reg_payments = new Payment();
            $reg_payments->user_id = Auth::id();
            $reg_payments->payment_type = 'badge_payment';
            $reg_payments->amount = $request->get('amount');
            $reg_payments->tranx_ref = $request->get('trans_reference');
            $reg_payments->save();

            return response()->json([
                'badge_type' => $badge_name
            ], 200);
        }
        else {
            return 'Something went wrong!';
        }
    }

    public function paymentHistory()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $payment_history = PaymentRequest::where('user_id', $user_id)->get();

        $total_balance = DB::table('payment_requests')->where('user_id', $user_id)->sum('amount_requested') + $user->refererAmount;
        $total_requested = DB::table('payment_requests')->where(['user_id' => $user_id, 'is_paid' => 1])->sum('amount_requested');
        $total_pending = DB::table('payment_requests')->where(['user_id' => $user_id, 'is_paid' => 0])->sum('amount_requested');
        $balance = $user->refererAmount;

        return response()->json([
            'payment_history' => $payment_history,
            'total_earnings' => $total_balance,
            'total_withdrawn' => $total_requested,
            'remaining_balance' => $balance,
            'total_pending' => $total_pending
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        $similarProducts = Service::where([['category_id', $service->category_id], ['state', $service->state]])
            ->where('subscription_end_date', '>', now())
            ->where('id', '!=', $service->id)
            ->inRandomOrder()->limit(8)->get();

        return response()->json([
            'service' => new ServiceResource($service),
            'similar_services' => $similarProducts
        ], 200);
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
        $service = Service::findOrFail($id);
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
            'skills'                => 'string|required'
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
        else {
            $file_name = 'noserviceimage.png';
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
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function deleteSeekingWork($id)
     {
         $sw_service = SeekingWork::findOrFail($id);

         if ($sw_service->delete()) {
             return response()->json([
                 $sw_service,
                 'message' => 'This CV was Deleted Successfully!',
             ], 200);
         }
     }


    public function showCV($slug)
    {
        $service = SeekingWork::where('slug', $slug)->firstOrFail();

        return response()->json([
            $service
        ], 200);
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
        $image = ModelImage::where('imageable_id', $seekingworkid)->where('id', $id)->firstOrFail();
        $filename = $image->image_path;
        $image->delete();

        $path = public_path('uploads/seekingworks/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }

        return response()->json([
            'message' => 'Image(s) deleted successfully!'
        ], 200);
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
        $service = Service::findOrFail($id);

        if ($service->delete()) {
            return response()->json([
                $service,
                'message' => 'This Service was Deleted Successfully!',
            ], 200);
        }
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword ? $request->keyword : 'Nothing!';
        $featuredServices = Service::where('is_featured', 1)->where('status', 1)->with('user')->where('subscription_end_date', '>', now())->inRandomOrder()->limit(4)->get();
        $categories = Category::orderBy('name', 'asc')->get();


        if ($request->category == null && $request->city == null && $request->keyword == null) {
            return response()->json([
                'message' => 'Unfortunately, we did not find anything that matches these criteria.',
            ]);
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
                            ->where('subscription_end_date', '>', now())
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
            elseif ($request->category != null && $request->city != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->where('status', 1)
                            ->where('subscription_end_date', '>', now())
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
            elseif ($request->keyword == null && $request->category != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('status', 1)
                            ->where('subscription_end_date', '>', now())
                            ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })
                            ->orderBy('badge_type', 'asc')
                            ->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
            elseif ($request->city != null && $request->keyword != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('city', '=', "%{$request->city}%")
                            ->where('state', '=', "%{$request->state}%")
                            ->where('status', 1)
                            ->where('subscription_end_date', '>', now())
                            ->with('category')
                            ->orWhereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
            elseif ($request->category != null) {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('status', 1)
                            ->where('subscription_end_date', '>', now())
                            ->orWhere('city', '=', "%{$request->city}%")
                            ->orWhere('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->whereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
            else {
                $services = Service::query()
                            ->where('name', 'LIKE', "%{$request->keyword}%")
                            ->where('status', 1)
                            ->where('subscription_end_date', '>', now())
                            ->orWhere('city', '=', "%{$request->city}%")
                            ->orWhere('state', '=', "%{$request->state}%")
                            ->with('category')
                            ->prwhereHas('category', function($query) use ($categoryId)  {
                                $query->where('id', $categoryId);
                            })->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
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
                    ->where('subscription_end_date', '>', now())
                    ->orderBy('badge_type', 'asc')
                    ->get();
            }
            else {
                $services = Service::query()
                    ->where('city', 'like', "%{$request->city}%")
                    ->where('status', 1)
                    ->where('subscription_end_date', '>', now())
                    ->orwhere('state', 'like', "%{$request->state}%")
                    ->orderBy('badge_type', 'asc')
                    ->get();
            }

            $related_services = Service::query()
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->where('status', 1)
            ->where('subscription_end_date', '>', now())
            ->orwhere('state', '=', "%{$request->state}%")
            ->orwhere('city', '=', "%{$request->city}%")
            ->get();

            if (!$services->isEmpty()) {
                return response()->json([
                    'services' => new ServiceResourceCollection($services),
                    'related_services' => new ServiceResourceCollection($related_services),
                ], 200);
            }
            else{
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->where('subscription_end_date', '>', now())
                ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                ->orderBy('badge_type', 'asc')
                ->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
        }elseif ($request->state != null) {
            $services = Service::query()
            ->where('state', 'LIKE', "%{$request->state}%")
            ->where('name', 'LIKE', "%{$request->keyword}%")
            ->where('status', 1)
            ->where('subscription_end_date', '>', now())
            ->orWhere('description', 'LIKE', "%{$request->keyword}%")
            ->orderBy('badge_type', 'asc')
            ->get();

            if (!$services->isEmpty()) {
                return response()->json([
                    'services' => new ServiceResourceCollection($services),
                ], 200);
            }
            else{
                $services = Service::query()
                ->where('name', 'LIKE', "%{$request->keyword}%")
                ->where('status', 1)
                ->where('subscription_end_date', '>', now())
                ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                ->orderBy('badge_type', 'asc')
                ->get();

                if (!$services->isEmpty()) {
                    return response()->json([
                        'services' => new ServiceResourceCollection($services),
                    ], 200);
                }
            }
        }
        elseif ($request->keyword != null){
            $services = Service::query()
                        ->where('name', 'LIKE', "%{$request->keyword}%")
                        ->where('status', 1)
                        ->where('subscription_end_date', '>', now())
                        ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                        ->orderBy('badge_type', 'asc')
                        ->get();
            if (!$services->isEmpty()) {
                return response()->json([
                    'services' => new ServiceResourceCollection($services),
                ], 200);
            }
            else{
                return response()->json([
                    'message' => 'Unfortunately, we did not find anything that matches these criteria.',
                ]);
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
        return response()->json(SubCategory::paginate(9), 200);
    }

    /**
     * Get a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showcategory($id)
    {
        $category = Category::findOrFail($id);

        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(200);
    }

    public function servicesByCategory(Request $request)
    {
        $slug = $request->slug;
        $the_category = Category::where('slug', $slug)->firstOrFail();
        $category_id = $the_category->id;

        if ($category_id == 1) {
            $category_services = SeekingWork::where('category_id', $category_id)->where('status', 1)->where('subscription_end_date', '>', now())->orderBy('badge_type', 'asc')->paginate(9);

            return response()->json([
                'category' => $the_category->name,
                'job_applicants' => (new SeekingWorkResourceCollection($category_services))
                ], 200);
        }
        else{
            $category_services = Service::where('category_id', $category_id)->where('status', 1)->where('subscription_end_date', '>', now())->orderBy('badge_type', 'asc')->paginate(9);

            return response()->json([
                'category' => $the_category->name,
                'services' => (new ServiceResourceCollection($category_services))
                ], 200);
        }

    }

    public function serviceCloseToYou(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = 100000;
        $services = Service::selectRaw("id, name, address, state, thumbnail, user_id, badge_type, slug,
        ( 6371000 * acos( cos( radians(?) ) *
        cos( radians( latitude ) )
                        * cos( radians( longitude ) - radians(?)
        ) + sin( radians(?) ) *
        sin( radians( latitude ) ) )
        ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)->with('user')->with('images')
            ->orderBy("distance",'asc')
            ->offset(0)
            ->where('status', 1)
            ->where('subscription_end_date', '>', now())
            ->inRandomOrder()->limit(15)->get();

        return response()->json([
            'services' => (new ServiceResourceCollection($services)),
            'latitude' => $latitude,
            'longitude' => $longitude
        ], 200);

    }


    public function featuredServices($id)
    {
        $service = Service::find($id);
         if (!$service) {
            return response()->json([
                'data' => [],
                'res_message' => 'fail',
                'res_code' => 404,
            ], 404);
        }

        $service->is_featured = 1;
        // $service->save();
        if ($service->save()) {
           return response()->json([
                'data' => $service,
                'res_message' => 'success',
                'res_code' => 200,
            ], 200);
        }
    }



    public function userSubscription(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()], 422);
        }

        $added_days = 0;
        $mytime = Carbon::now();

        // Produces something like "2019-03-11 12:25:00"
        $current_date_time = Carbon::now()->toDateTimeString();
        //
        $added_date_time = Carbon::now()->addDays(5)->toDateTimeString();
        $data = $request->all();
        // $this->validate($request, [
        //     'amount' => 'required',
        // ]);
        $sub_check = ProviderSubscription::where(['user_id' => Auth::id()])->first();
        if ($sub_check) {
            if ($request->amount == '200') {
                $added_days = 31;
                $sub_type = 'monthly';
            }elseif ($request->amount == '600') {
                $added_days = 93;
                $sub_type = '3-months';
            }elseif ($request->amount == '1200') {
                $added_days = 186;
                $sub_type = 'bi-annual';
            }elseif($request->amount == '2400') {
                $added_days = 372;
                $sub_type = 'annual';
            }else{
                return response()->json(['res_message' => 'invalid amount provided', 'res_code' => 404], 200);
            }

            $initial_end_date = $sub_check->subscription_end_date;
            $sub_check->user_id = Auth::id();
            $sub_check->sub_type = $sub_type;
            $sub_check->user_type = 'provider';
            $sub_check->last_amount_paid = $request->amount;
            $sub_check->subscription_end_date = Carbon::parse($initial_end_date)->addDays($added_days)->format('Y-m-d H:i:s');
            $sub_check->last_subscription_starts = $current_date_time;
            $sub_check->save();

            return response()->json(['res_message' => 'Success', 'res_code' => 200], 200);
        }else{
            return response()->json(['res_message' => 'user not found', 'res_code' => 404], 200);
        }
    }


    public function storeComment(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
        $comment = new Comment();
        $comment->comment = $request->get('comment');
        $comment->user()->associate($user);
        $service = Service::find($request->service_id);
        $service->comments()->save($comment);

        return response()->json([
            'comment' => $comment,
        ], 200);
    }

    public function storeCommentReply(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($user);
        $reply->parent_id = $request->get('comment_id');
        $service = Service::find($request->get('service_id'));
        $service->comments()->save($reply);

        return response()->json([
            'reply' => $reply,
        ], 200);
    }

    public function allFeaturedServices()
    {
        $featured_services = Service::where('is_featured', 1)->paginate(9);

        return response()->json([
            'featured_services' => new ServiceResourceCollection($featured_services),
        ], 200);
    }



    public function updateService(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $this->validate($request, [
            'description' => 'nullable',
            'address'     => 'nullable',
            'description' => 'nullable',
            'city'        => 'nullable',
            'name'        => 'nullable',
            'state'       => 'nullable',
            'min_price'   => 'nullable|numeric',
            'video_link'  => 'nullable',
            'file'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');

        if ($service->save()) {
            if ($request->hasFile('thumbnail')) {
                $image       = $request->file('thumbnail');
                $fileInfo = $image->getClientOriginalName();
                $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name = $filename . '-' . time() . '.' . $extension;

                //Fullsize
                $image->move(public_path('uploads/services/'), $file_name);

                $image_resize = Image::make(public_path('uploads/services/') . $file_name);
                $image_resize->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('uploads/services/' . $file_name));

                $service->images()->create(['image_path' => $file_name]);
                $service->thumbnail = $service->images()->first()->image_path;
                $service->save();
            }
        }

        $service->user_id = Auth::id();
        $service->category_id = $request->category_id;
        $service->name = $request->name;
        $service->phone = $request->phone;
        $service->city = $request->city;
        $service->experience = $request->experience;
        $service->address = $request->address;
        $service->min_price = $request->min_price;
        $service->max_price = $request->max_price;
        $service->video_link = $request->video_link;
        $service->description = $request->description;
        $service->state = $request->state;

        if ($service->save()) {
            return response()->json([
                'service' => new ServiceResource($service),
            ], 200);
        } else {
            return response()->json([
                'message' => 'Something went wrong. Try again!',
            ], 400);
        }
    }

    public function contactUsForm(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);


        $contact = new Contact([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message')
        ]);

        if ($contact->save()) {
            $name = $request->get('name');
            $email = $request->get('email');
            $subject = $request->get('subject');
            $message = $request->get('message');
            $phone = $request->get('phone');

            Mail::to($email)->send(new ContactUs($email, $subject, $message));
            Mail::to('support@efcontact.com')->send(new ContactUsAdmin($name, $email, $subject, $message, $phone));
            Mail::to('info@efcontact.com')->send(new ContactUsAdmin($name, $email, $subject, $message, $phone));
        }
        return response()->json([
            'message' => 'Your message has been sent!',
        ], 200);
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return response()->json([
            'faqs' => $faqs,
        ], 200);
    }

    public function ajaxSearchResult(Request $request)
    {
        $services = Service::query()
        ->where('name', 'LIKE', "%{$request->keyword}%")
        ->where('status', 1)->where('subscription_end_date', '>', now())
        ->orWhere('description', 'LIKE', "%{$request->keyword}%");

        $seekingworks = SeekingWork::query()
        ->where('job_title', 'LIKE', "%{$request->keyword}%")
        ->where('status', 1)->where('subscription_end_date', '>', now())
        ->orWhere('fullname', 'LIKE', "%{$request->keyword}%");


        $data = $services->get()->concat($seekingworks->get());


        return response()->json([
            'services' => new ServiceResourceCollection($data),
        ], 200);
    }

}
