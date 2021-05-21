<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Advertisement;
use App\AdvertLocation;
use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;
use App\Notification;
use App\General_Info;
use App\Badge;
use App\Termsofuse;
use App\Privacypolicy;
use App\Faq;
use App\Complaint;
use App\Slider;
use App\Advertrequest;
use App\Agent;
use App\Referal;
use App\Event;
use App\Subscription;
use App\UserFeedback;
use App\ProviderSubscription;
use App\Mail\SendEmail;
use App\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Helpers\SmsHelper;
use App\Mail\SeasonGreetings;
use App\Mail\ServiceApproved;
use App\SeekingWork;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Geocoder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Mail\SendMailable;
use App\Mail\UserRegistered;
use App\Refererlink;





class AdminController extends Controller
{

    public function usersfeedback()
    {
        $feedbacks = UserFeedback::orderBy('created_at', 'desc')->get();

        return view('admin.feedbacks', [
            'feedbacks' => $feedbacks
        ]);
    }
    public function userfeedback($id)
    {
        $feedback = UserFeedback::findOrFail($id);
        return $feedback;
    }
    public function feedbackDelete($id)
    {
        $feedback = UserFeedback::findOrFail($id);
        $feedback->delete();
        session()->flash('status', 'Task was successful!');
        return redirect()->back();
    }
    public function treatfeedback($id)
    {
        $feedback = UserFeedback::findOrFail($id);
        $feedback->treated = 1;
        $feedback->update();
        session()->flash('status', 'Task was successful!');
        return redirect()->back();
    }

    public function userComplaints()
    {
        $complaints = Complaint::all();

        return view('admin.complaints.complaints', [
            'complaints' => $complaints
        ]);
    }

    public function featuredServices()
    {
        $services = Service::where('is_featured', '=', 1)->get();
        return view('admin.service.featured', [
            'services' => $services
        ]);
    }

    public function geo()
    {

        $myGeo =  Geocoder::getCoordinatesForAddress('Infinite Loop 1, Cupertino');
        return $myGeo;
    }

    public function allAdmins()
    {
        $admins = User::where('role', '=', 'admin')->get();

        return view('admin.user.admins', [
            'admins' => $admins
        ]);
    }

    public function allCmos()
    {
        $cmos = User::where('role', '=', 'cmo')->get();

        return view('admin.user.cmos', [
            'cmos' => $cmos
        ]);
    }

    public function add_admin()
    {
        return view('admin.user.add_admin');
    }

    public function add_cmo()
    {
        return view('admin.user.add_cmo');
    }

    public function submit_cmo(Request $request)
    {
        $data = array(
            'name'   => $request->name,
            'email'   => $request->email,
            'password' => $request->password,
        );

        $validator = \Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($data['password']);
        $user->role = 'cmo';
        $user->status = 1;

        $user->save();

        if ($user->save()) {
            $success_notification = array(
                'message' => 'CMO successfully added!',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($success_notification);
    }

    public function allData()
    {
        $admins = User::where('role', '=', 'data')->get();

        return view('admin.user.data', [
            'admins' => $admins
        ]);
    }

    public function add_data()
    {
        return view('admin.user.add_data_officer');
    }

    public function submit_data(Request $request)
    {
        $data = array(
            'name'   => $request->name,
            'email'   => $request->email,
            'password' => $request->password,
        );

        $validator = \Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($data['password']);
        $user->role = 'data';
        $user->status = 1;

        $user->save();

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Data Entry Officer successfully added!',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($success_notification);
    }

    public function submit_admin(Request $request)
    {
        $data = array(
            'name'   => $request->name,
            'email'   => $request->email,
            'password' => $request->password,
        );

        $validator = \Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($data['password']);
        $user->role = 'admin';
        $user->status = 1;

        $user->save();

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Admin successfully added!',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($success_notification);
    }

    public function send_email()
    {
        $agents_phone = Agent::all();
        $plucked = $agents_phone->pluck('email')->toArray();

        $sellers = DB::table('users')->where('role', '=', 'seller')->get();
        $plucked_email = $sellers->pluck('email')->toArray();

        $buyers = DB::table('users')->where('role', '=', 'buyer')->get();
        $plucked_emailplucked_email = $sellers->pluck('email')->toArray();

        $email_addresses = implode(',', array_merge($plucked, $plucked_email, $plucked_email));

        return view('admin.data_entry.send_email', [
            'email_addresses' => $email_addresses
        ]);
    }

    public function sendSms()
    {
        $agents_phone = Agent::all();
        $plucked = $agents_phone->pluck('phone')->toArray();

        $sellers = DB::table('users')->where('role', '=', 'seller')->get();
        $plucked_phone = $sellers->pluck('phone')->toArray();

        $buyers = DB::table('users')->where('role', '=', 'buyer')->get();
        $plucked_buyer_phone = $sellers->pluck('phone')->toArray();

        $phone_numbers = implode(',', array_merge($plucked, $plucked_phone, $plucked_buyer_phone));

        return view('admin.data_entry.send_sms', [
            'phone_numbers' => $phone_numbers,
        ]);
    }

    public function submit_sms(Request $request)
    {

        $this->validate($request, [
            'phone' => 'required',
            'subject' => 'nullable',
            'message' => 'required'
        ]);

        // dd($request->all());
        $phone = $request->phone;
        // dd($phone);
        $message = $request->message;
        $sender = 'EFContact';

        try {
            SmsHelper::send_sms($message, $phone, $sender);

            $sent_notification = array(
                'message' => 'SMS sent successfully!',
                'alert-type' => 'success'
            );
        } catch (\Exception $e) {
        }

        return redirect()->back()->with($sent_notification);
    }

    public function submitEmail(Request $request)
    {

        $agents_phone = Agent::all();
        $plucked = $agents_phone->pluck('email', 'name')->toArray();

        $sellers = DB::table('users')->where('role', '=', 'seller')->get();
        $plucked_email = $sellers->pluck('email', 'name')->toArray();

        $buyers = DB::table('users')->where('role', '=', 'buyer')->get();
        $plucked_emailplucked_email = $sellers->pluck('email', 'name')->toArray();

        // $email_addresses = ['veeqanto@gmail.com', 'anto@eftechnology.net'];
        $email_addresses = array_merge($plucked, $plucked_email, $plucked_email);
        // dd($email_addresses);

        $data = array(
            'subject' => $request->subject,
            'message' => $request->message
        );

        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        // $message = new SendMail;
        // $message->create($data);
        foreach ($email_addresses as $name => $email) {
            // Mail::to($email)->send(new SendEmail($request->message, $request->subject));
            //   Mail::to($email)->queue(new SendEmail($request->message, $request->subject, $name));

            Mail::to($email)->queue(new SeasonGreetings($request->message, $request->subject, $name));
        }


        $sent_notification = array(
            'message' => 'Email sent successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($sent_notification);
    }
    public function lat()
    {

        $data = file_get_contents("https://www.geoip-db.com/json");
        $json = json_decode($data, true);
        $latitude = $json['latitude'];
        $longitude = $json['longitude'];
        return response()->json(['success' => 'updated done', 'latitude' => $latitude, 'longitude' => $longitude]);


        if ($data = @file_get_contents("https://www.geoip-db.com/json")) {
            $json = json_decode($data, true);
            $latitude = $json['latitude'];
            $longitude = $json['longitude'];
        } else {
            $latitude = 0;
            $longitude = 0;
            // }    return view ('admin.service.index', compact('all_service') );
            return response()->json(['success' => 'updated done', 'latitude' => $latitude, 'longitude' => $longitude]);
        }
    }



    // public function storeComplaint(Request $request)
    //   {

    //     $data = $request->all();
    //     // $this->validate($request,[
    //     //   'buyer_name' => 'required',
    //     //   'buyer_email' => 'required',
    //     //   'description' => 'required',

    //     // ]);

    //         $success = 'Your message was sent successfully. Thank you!';
    //         // $slug = Str::random(10);
    //         $complaint = new Complaint();
    //         $user->lat = $data['lat'];
    //         $user->long = $data['long'];
    //         $complaint->save();

    //         //$serviceDetailId = $message->service_id;
    //         //$service = Service::find($serviceDetailId);
    //         //$service_slug = $service->slug;
    //         // $slug = $random = Str::random(40);
    //         //$message->slug = $slug;
    //         if ($complaint->save()) {
    //           $buyer_email = $complaint->buyer_email;
    //           $name = 'Your message has been delivered successfully!';
    //           Mail::to($buyer_email)->send(new SendMailable($name));
    //           return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
    //         }
    //         return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>"not saved"]);
    //     }



    public function findNearestRestaurants(Request $request)
    {
        // return $request->radius;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = 100;
        // $keyword = $request->radius,
        // $categories = $request->categories,
        // $sub_category = $request->sub_category,
        // $myRange = $request->myRange,
        // $state =  $request->state,
        // $city = $request->city
        // $latitude = Auth::user()->latitude;
        // $longitude = Auth::user()->longitude;
        // Auth::user()->save();
        // return $latitude . $longitude;
        // $latitude =
        $services = Service::selectRaw("id, name, address,
   ( 6371000 * acos( cos( radians(?) ) *
   cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
   ) + sin( radians(?) ) *
   sin( radians( latitude ) ) )
 ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->offset(0)
            ->limit(20)
            ->get();

        return $services;
    }

    public function allService()
    {
        $all_service = Service::orderBy('created_at', 'desc')->get();
        return view('admin.service.index', compact('all_service'));
    }
    public function allSeekingwork()
    {
        $all_service = SeekingWork::orderBy('created_at', 'desc')->get();
        return view('admin.service.sw_table', compact('all_service'));
    }

    public function activeService()
    {
        $active_service = Service::where('status', 1)->paginate(20);
        return view('admin.service.active', compact('active_service'));
    }

    public function pendingService()
    {
        $pending_service = Service::where('status', 0)->paginate(10);
        return view('admin.service.pending', compact('pending_service'));
    }

    //   public function allSubscription()
    // {
    //   $all_subscriptions = ProviderSubscription::all();
    //   return view ('admin.subscription.index', compact('all_subscriptions') );
    // }

    public function allSubscription()
    {
        $all_subscriptions = Subscription::all();
        return view('admin.subscription.index', compact('all_subscriptions'));
    }

    public function pending_advert_requests()
    {
        $pending_advert_requests = Advertrequest::where('status', 0)->paginate(10);
        return view('admin.page_management.pending_advert_requests', compact('pending_advert_requests'));
    }

    public function treated_advert_requests()
    {
        $treated_advert_requests = Advertrequest::where('status', 1)->paginate(10);
        return view('admin.page_management.treated_advert_requests', compact('treated_advert_requests'));
    }

    public function all_adverts()
    {
        $advertisements = Advertrequest::all();
        return view('admin.advert_management.sliders', compact('advertisements'));
    }

    public function active_adverts()
    {
        $active_adverts = Advertrequest::where('status', 2)->paginate(10);
        return view('admin.advert_management.active_adverts', compact('active_adverts'));
    }

    public function events()
    {
        //return view('events');
        $all_events = Event::all();

        return view('admin.page_management.events', compact('all_events'));
    }


    public function all_events()
    {
        //return view('events');
        $all_events = Event::all();

        return view('all_events', compact('all_events'));
    }


    public function save_event(Request $request)
    {
        $id = $request->id;
        $title = $request->title;
        $image = $request->image;
        $date = $request->event_date;
        $time = $request->event_time;
        //$venue = $request->venue;
        $location = $request->location;
        $description = $request->description;


        $new_event = new Event();
        $new_event->title = $title;
        $new_event->image = $image;
        $new_event->date = $date;
        $new_event->time = $time;
        $new_event->location = $location;
        $new_event->description = $description;


        if ($request->hasFile('file')) {
            $image_name = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $image_name);
            $new_event->image = $image_name;
        }

        $new_event->save();
        dd('ddd');

        return back()->with('success', 'Task was successful!');
        //  return back()->with('success', 'Task was successful!');
    }


    /*public function storeSystemConfig(Request $request, $id)
  {

    $general_info = $id == 1 ? General_Info::find($id) : New General_Info;
    $general_info->site_name = $request->site_name;
    $general_info->hot_line = $request->hotline;
    $general_info->hot_line_2 = $request->hotline2;
    $general_info->hot_line_3 = $request->hotline3;
    $general_info->support_email = $request->support_email;
    $general_info->address = $request->address;
    $general_info->facebook = $request->facebook;
    $general_info->twitter = $request->twitter;
    $general_info->linkedin = $request->linkedin;
    $general_info->instagram = $request->instagram;
    $general_info->register_section_1 = $request->register_section_1;
    $general_info->register_section_2 = $request->register_section_2;
    $general_info->register_section_3 = $request->register_section_3;
    $general_info->register_section_1_title = $request->register_section_1_title;
    $general_info->register_section_2_title = $request->register_section_2_title;
    $general_info->register_section_3_title = $request->register_section_3_title;


    if ( $request->hasFile('file') ) {
      $image_name = time().'.'.$request->file->extension();
      $request->file->move(public_path('images'),$image_name);
      $general_info->logo = $image_name;
    }


    $general_info->save();
    $request->session()->flash('status', 'Task was successful!');

    return $this->systemConfig();

  }
*/




    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        //Storage::disk('public')->delete($service->image);
        $service->delete();
        session()->flash('status', 'Task was successful!');
        return back();
    }
    public function seekingWorkDestroy($id)
    {
        $seekingwork = SeekingWork::findOrFail($id);
        //Storage::disk('public')->delete($service->image);
        $seekingwork->delete();
        session()->flash('status', 'Applicant deleted successfully!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServiceStatus(Request $request, $id)
    {
        $service = Service::find($id);
        $status = $service->status == 0 ? 1 : 0;
        $service->status = $status;

        if ($service->save()) {
            if ($service->status == 1) {
                $status = 'Approved';
                $reason = '';
                try {
                    Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            } else {
                $status = 'Disapproved';
                $reason = $request->get('reason');
                try {
                    Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
            $request->session()->flash('status', 'Service was ' . $status);
            return $status;
        }
        $request->session()->flash('error', 'Something went wrong');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSeekingworkStatus(Request $request, $id)
    {
        $service = SeekingWork::find($id);
        $status = $service->status == 0 ? 1 : 0;
        $service->status = $status;

        if ($service->save()) {
            if ($service->status == 1) {
                $status = 'Approved';
                $reason = '';
                try {
                    Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            } else {
                $status = 'Disapproved';
                $reason = $request->get('reason');
                try {
                    Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
            $request->session()->flash('status', 'CV was ' . $status);
            return $status;
        }
        $request->session()->flash('error', 'Something went wrong');
        return back();
    }

    public function serviceSearch(Request $request)
    {
        $query = $request->input('query');
        $services = Service::where('name', 'LIKE', "%$query%")->paginate(8);
        return view('admin/search/service_search', compact('services', 'query'));
    }

    public function userSearch(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'LIKE', "%$query%")->paginate(8);
        return view('admin/search/index', compact('users', 'query'));
    }

    public function viewProfile()
    {
        return view('admin.profile.update_profile');
    }

    public function updatePassword(Request $request, $id)
    {
        dd($request->all());
    }

    public function systemConfig()
    {
        $general_info = General_Info::first();
        $check_general_info = collect($general_info)->isEmpty();
        return view('admin.system_config', compact('general_info', 'check_general_info'));
    }

    public function storeSystemConfig(Request $request, $id)
    {

        $general_info = $id == 1 ? General_Info::find($id) : new General_Info;
        $general_info->site_name = $request->site_name;
        $general_info->about_site = $request->about_site;
        $general_info->hot_line = $request->hotline;
        $general_info->hot_line_2 = $request->hotline2;
        $general_info->hot_line_3 = $request->hotline3;
        $general_info->support_email = $request->support_email;
        $general_info->contact_email = $request->contact_email;
        $general_info->address = $request->address;
        $general_info->facebook = $request->facebook;
        $general_info->twitter = $request->twitter;
        $general_info->linkedin = $request->linkedin;
        $general_info->instagram = $request->instagram;
        $general_info->register_section_1 = $request->register_section_1;
        $general_info->register_section_2 = $request->register_section_2;
        $general_info->register_section_3 = $request->register_section_3;
        $general_info->register_section_1_title = $request->register_section_1_title;
        $general_info->register_section_2_title = $request->register_section_2_title;
        $general_info->register_section_3_title = $request->register_section_3_title;
        $general_info->email_disclaimer = $request->email_disclaimer;


        if ($request->hasFile('file')) {
            $image_name = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $image_name);
            $general_info->logo = $image_name;
        }



        if ($general_info->save()) {
            $success_notification = array(
                'message' => 'Config saved successfully!',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($success_notification);
    }

    public function viewService($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $category = Category::where('id', $service->category_id)->first();
        return view('admin.service.view_service', compact('service', 'category'));
    }

    public function allNotification()
    {
        $all_notification = Notification::paginate(8);
        return view('admin.notification.all_notification', compact('all_notification'));
    }

    public function sendNotification(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],

        ]);

        $slug = Str::random(7);
        $notification = new Notification;
        $notification->title = $request->title;
        $notification->description = $request->description;
        $notification->slug = $slug;
        $notification->save();
        return back()->with('status', 'Task was successful!');
    }



    public function viewNotification($slug)
    {
        $notification = Message::where('slug', $slug)->first();
        $notification->status = 1;
        $notification->save();
        return view('seller.notification.view_notification', compact('notification'));
    }

    public function FAQs()
    {
        return view('admin.page_management.faq');
    }

    public function allBadges()
    {
        $all_badges = Badge::all();
        return view('admin.badge.index', compact('all_badges'));
    }
    public function privacyPolicy()
    {
        return view('admin.page_management.privacy_policy');
    }

    public function save_privacyPolicy(Request $request)
    {

        $privacy = new Privacypolicy;
        $privacy->details = $request->details;
        $privacy->save();
        $current_privacy_policy = Privacypolicy::first();
        if ($current_privacy_policy) {
            $current_privacy_policy_details = $current_privacy_policy->details;
        }

        //$request->session()->flash('status', 'Task was successful!');

        return back()->with('success', 'Task was successful!')->with('policy', 'current_privacy_policy_details');
    }

    public function privacy()
    {
        $privacy = Privacypolicy::orderBy('id', 'desc')
            ->first();
        // dd($privacy);

        return view('frontend_section.privacy', compact('privacy'));
    }

    public function termsOfUse()
    {
        $all_badges = Badge::paginate(10);
        return view('admin.page_management.terms_of_use', compact('all_badges'));
    }

    public function save_termsOfUse(Request $request)
    {

        $terms = new Termsofuse;
        $terms->details = $request->details;
        $terms->save();

        //$request->session()->flash('status', 'Task was successful!');

        return back()->with('success', 'Task was successful!');
    }

    public function save_faq(Request $request)
    {
        $id = $request->id;
        $faqDetails = $request->details;
        $faqTitle = $request->title;
        //$faq = Faq::where('id', $id);
        $faq = Faq::find($id);

        if ($faq) {
            $faq->details = $faqDetails;
            $faq->title = $faqTitle;
            $faq->save();
            return back()->with('success', 'Task was successful!');
        }

        $new_faq = new Faq();
        $new_faq->details = $faqDetails;
        $new_faq->title = $faqTitle;
        $new_faq->save();
        return back()->with('success', 'Task was successful!');



        //  return back()->with('success', 'Task was successful!');



    }


    /*
    $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
          if ($likecheck) {
           Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
           $likecount = Like::where(['service_id'=>$id])->count();
           return redirect()->to('serviceDetail/'.$service_slug);

         }else{
           $like = new Like();
           $like->user_id = Auth::id();
           $like->service_id = $id;
           $like->save();
           $likecount = Like::where(['service_id'=>$id])->count();
           return redirect()->to('serviceDetail/'.$service_slug);
         }
         */


    public function show_faq()
    {
        $faqs = Faq::paginate(10);
        return view('admin.page_management.faq', compact('faqs'));
    }

    public function delete_faqs($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return back()->with('success', 'Task was successful!');

        //return view ('admin.page_management.faq', compact('faqs') );
    }

    public function sliders()
    {
        $sliders = Slider::all();
        $advertisements = Advertisement::all();
        $advertlocations = AdvertLocation::all();
        return view('admin.page_management.sliders', compact(['sliders', 'advertisements', 'advertlocations']));
    }

    public function slider($id)
    {
        $slider = Slider::find($id);
        return $slider;
    }

    public function allAccountants()
    {
        $accountants = User::where('role', '=', 'accountant')->get();

        return view('admin.user.accountant', [
            'accountants' => $accountants
        ]);
    }



    public function save_slider(Request $request)
    {
        $id = $request->id;
        $sliderDetails = $request->details;
        $sliderTitle = $request->title;
        $sliderLink = $request->links;
        //$faq = Faq::where('id', $id);
        $slider = Slider::find($id);

        if ($slider) {
            $slider->details = $sliderDetails;
            $slider->title = $sliderTitle;
            $slider->links = $sliderLink;
            $slider->save();
            return back()->with('success', 'Task was successful!');
        }

        $new_slider = new Slider();
        $new_slider->details = $sliderDetails;
        $new_slider->title = $sliderTitle;
        $new_slider->save();
        return back()->with('success', 'Task was successful!');
    }


    public function delete_sliders($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return back()->with('success', 'Task was successful!');

        //return view ('admin.page_management.faq', compact('faqs') );
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => ['required'],
        ]);


        $subscription = new Subscription();

        $subscription->email = $request->get('email');
        $subscription->save();

        return back()->with([
            'message'    => 'You are successfully subscribed to our mailing list!',
            'alert-type' => 'success'
        ]);
    }


    public function activate_user($id)
    {
        //return $id;
        $success = true;
        $message = "Activate";
        $status_message = "Disabled";

        $user = User::where('id', $id)->first();
        if ($user->status == 1) {
            //return $user->status;
            $user->status = 0;
            $user->save();
            // return $user;

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,
            ]);
            //        return $user->status;
        }
        if ($user->status == 0) {
            //return $user->status;
            $message = "Deactivate User";
            $status_message = "Enabled";

            $user->status = 1;
            $user->save();
            // return $user;

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,

            ]);
        }
        //  $activatorcheck = User::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
        //  if ($likecheck) {
        //   Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
        //   $likecount = Like::where(['service_id'=>$id])->count();
        //       // return redirect()->to('serviceDetail/'.$service_slug);
        //   return back()->with('liked', 'Unliked');
        // }
    }


    public function activate_agent($id)
    {

        $success = true;
        $message = "Activate";
        $status_message = "Disabled";

        $user = Agent::where('id', $id)->first();
        if ($user->status == 1) {
            $user->status = 0;
            $user->update();

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,
            ]);
        }
        if ($user->status == 0) {
            $message = "Deactivate User";
            $status_message = "Enabled";

            $user->status = 1;
            $user->save();

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,
            ]);
        }
    }

    public function all_ef_marketers()
    {
        $efmarketers = User::where('is_ef_marketer', '1')->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.ef_marketers', compact('efmarketers'));
    }


    public function ef_marketers_downline($slug)
    {
        $efmarketer =  User::where('slug', $slug)->first();
        $efmarketers_downlines = User::where('idOfReferer', $efmarketer->id)->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.ef_marketers_downline', compact('efmarketers_downlines'));
    }

    public function provider_downline($slug)
    {
        $user =  User::where('slug', $slug)->first();
        $user_downlines = User::where('idOfReferer', $user->id)->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.users_downline', compact('user_downlines'));
    }

    public function agent_downline($id)
    {
        $user =  Agent::where('id', $id)->first();
        $agent_downlines = User::where('idOfAgent', $user->id)->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.agents_downline', compact('agent_downlines'));
    }

    public function agents_downline_24hrs($id)
    {
        $user =  Agent::where('id', $id)->first();
        // $agent_downlines = User::where('idOfAgent', $user->id)->where('created_at', '>', Carbon::now()->subMinutes(1440))->get();
        $agent_downlines = User::where('idOfAgent', $user->id)->whereDate('created_at', Carbon::yesterday())->get();

        // dd($agent_downlines);
        // $posts = Post::whereDate('created_at', Carbon::today())->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.agents_downline_24hrs', compact('agent_downlines'));
    }

    public function allagents_sales_yesterday()
    {
        $agents = Agent::all();
        // $agents = User::with('agents')->whereDate('created_at', Carbon::yesterday())->get();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->with('agents')->get();
        // dd($agents);

        // $agents = Agent::whereDate('created_at', Carbon::yesterday())->get();
        // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
        $users = Referal::where('referalable_type', 'App\Agent')->get();
        // dd($users);
        // foreach ($users as $user) {
        //   $agents = User::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }

        foreach ($agents as $key => $serv) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->total_refers_count = $serv->total_refers->count();
        }
        // dd($agents);
        // Auth::user()->subscriptions->first()
        // $agents = Auth::user()->referals->all();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->get();
        // foreach ($users as $user) {
        //   $agents = $users::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }
        // $agents = $my_u->whereDate('created_at', Carbon::yesterday())->get();
        // dd($my_u);
        $approval_status = null;
        return view('admin.user.all_agents_yesterday', compact('agents', 'approval_status'));
    }

    public function agents_last_week()
    {
        $agents = Agent::all();
        // $agents = User::with('agents')->whereDate('created_at', Carbon::yesterday())->get();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->with('agents')->get();
        // dd($agents);

        // $agents = Agent::whereDate('created_at', Carbon::yesterday())->get();
        // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
        $users = Referal::where('referalable_type', 'App\Agent')->get();
        // dd($users);
        // foreach ($users as $user) {
        //   $agents = User::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }

        foreach ($agents as $key => $serv) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->total_week_count = $serv->total_week->count();
        }
        // dd($agents);
        // Auth::user()->subscriptions->first()
        // $agents = Auth::user()->referals->all();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->get();
        // foreach ($users as $user) {
        //   $agents = $users::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }
        // $agents = $my_u->whereDate('created_at', Carbon::yesterday())->get();
        // dd($my_u);
        $approval_status = null;
        return view('admin.user.all_agents_week', compact('agents', 'approval_status'));
    }


    public function agents_last_month()
    {
        $agents = Agent::all();
        // $agents = User::with('agents')->whereDate('created_at', Carbon::yesterday())->get();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->with('agents')->get();
        // dd($agents);

        // $agents = Agent::whereDate('created_at', Carbon::yesterday())->get();
        // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
        $users = Referal::where('referalable_type', 'App\Agent')->get();
        // dd($users);
        // foreach ($users as $user) {
        //   $agents = User::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }

        foreach ($agents as $key => $serv) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->total_month_count = $serv->total_month->count();
        }
        // dd($agents);
        // Auth::user()->subscriptions->first()
        // $agents = Auth::user()->referals->all();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->get();
        // foreach ($users as $user) {
        //   $agents = $users::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }
        // $agents = $my_u->whereDate('created_at', Carbon::yesterday())->get();
        // dd($my_u);
        $approval_status = null;
        return view('admin.user.all_agents_month', compact('agents', 'approval_status'));
    }



    public function allusers_sales_yesterday()
    {
        $agents = User::all();
        // $agents = User::with('agents')->whereDate('created_at', Carbon::yesterday())->get();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->with('agents')->get();
        // dd($agents);

        // $agents = Agent::whereDate('created_at', Carbon::yesterday())->get();
        // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
        $users = Referal::where('referalable_type', 'App\Agent')->get();
        // dd($users);
        // foreach ($users as $user) {
        //   $agents = User::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }

        foreach ($agents as $key => $serv) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->total_refers_count = $serv->total_refers->count();
        }
        // dd($agents);
        // Auth::user()->subscriptions->first()
        // $agents = Auth::user()->referals->all();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->get();
        // foreach ($users as $user) {
        //   $agents = $users::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }
        // $agents = $my_u->whereDate('created_at', Carbon::yesterday())->get();
        // dd($my_u);
        $approval_status = null;
        return view('admin.user.all_users_yesterday', compact('agents', 'approval_status'));
    }

    public function users_last_week()
    {
        $agents = User::all();
        // $agents = User::with('agents')->whereDate('created_at', Carbon::yesterday())->get();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->with('agents')->get();
        // dd($agents);

        // $agents = Agent::whereDate('created_at', Carbon::yesterday())->get();
        // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
        $users = Referal::where('referalable_type', 'App\Agent')->get();
        // dd($users);
        // foreach ($users as $user) {
        //   $agents = User::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }

        foreach ($agents as $key => $serv) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->total_week_count = $serv->total_week->count();
        }
        // dd($agents);
        // Auth::user()->subscriptions->first()
        // $agents = Auth::user()->referals->all();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->get();
        // foreach ($users as $user) {
        //   $agents = $users::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }
        // $agents = $my_u->whereDate('created_at', Carbon::yesterday())->get();
        // dd($my_u);
        $approval_status = null;
        return view('admin.user.all_users_week', compact('agents', 'approval_status'));
    }


    public function users_last_month()
    {
        $agents = User::all();
        // $agents = User::with('agents')->whereDate('created_at', Carbon::yesterday())->get();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->with('agents')->get();
        // dd($agents);

        // $agents = Agent::whereDate('created_at', Carbon::yesterday())->get();
        // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
        $users = Referal::where('referalable_type', 'App\Agent')->get();
        // dd($users);
        // foreach ($users as $user) {
        //   $agents = User::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }

        foreach ($agents as $key => $serv) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->total_month_count = $serv->total_month->count();
        }
        // dd($agents);
        // Auth::user()->subscriptions->first()
        // $agents = Auth::user()->referals->all();
        // $agents = User::whereNotNull('idOfAgent')->whereDate('created_at', Carbon::yesterday())->get();
        // foreach ($users as $user) {
        //   $agents = $users::where('idOfAgent', $user->referalable_id)->whereDate('created_at', Carbon::yesterday())->get();
        // }
        // $agents = $my_u->whereDate('created_at', Carbon::yesterday())->get();
        // dd($my_u);
        $approval_status = null;
        return view('admin.user.all_users_month', compact('agents', 'approval_status'));
    }


    public function users_sub_almost_ended2()
    {
        // $agents = User::where( 'created_at', '>', Carbon::now()->subDays(30));
        $agents = User::all();
        // dd($agents->subscriptions->first()->subscription_end_date);
        $names = array();
        $names2 = array();
        $second = Carbon::now()->subDays(18);
        // dd($second);

        $first =  Carbon::now();
        foreach ($agents as $key => $user) {
            // this is assigning a new field called total_likes to allservices
            //note, the total_likes is coming from a function in the model
            // $agents[$key]->total_refers = $serv->total_refers;
            $agents[$key]->rtrt = $user->subscriptions->first();
            foreach ($user->rtrt as $key => $user2) {
                if (Carbon::parse($user2->subscription_end_date)->between($first, $second)) {
                    $eee = 1;
                    array_push($names, $user);
                } else {
                    $eee = 2;
                }
            }
        }
        dd($eee);

        // dd($agents);
        // array_push($names, $agents);

        $second = Carbon::now()->addDays(14);
        $first =  Carbon::now();
        // dd($agents);
        if (Carbon::parse($agents->subscriptions->subscription_end_date)->between($first, $second)) {
            $eee = 1;
            array_push($names, $agents);
        } else {
            $eee = 2;
        }
        dd($eee);
        $bbb = [];
        foreach ($agents as $user) {
            if (($user->created_at - Carbon::now()->subDays(30)) >= 15) {
                array_push($bbb, $user);
            }
            $service = Service::where('user_id', $user->id)->first();

            $user->phone = $service->phone;

            $user->save();
        }
        $agents2 = User::all();
        $agents = User::where($agents2->subscriptions->first()->subscription_end_date, '<', Carbon::now()->subDays(6));
        return redirect('admin.dashboard');
    }


    public function ending_seller()
    {

        $sellers = User::with('subscriptions')->where('role', 'seller')
            ->whereHas('subscriptions', function ($query) {
                $to = Carbon::now()->addDays(14);
                $from  = Carbon::now();
                $query->whereBetween('subscription_end_date', [$from, $to]);
            })
            ->orderBy('created_at')
            ->get();
        return view('admin.user.ending_seller', compact('sellers'));
    }


    public function add_seller_sub()
    {

        // $sub = Subscription::count();
        //       dd($sub);

        $sellers = User::where(function ($query) {
            $query->doesnthave('subscriptions');
        })->get();
        foreach ($sellers as $seller) {
            $seller->subscriptions()->create([
                    'sub_type' => 'monthly',
                    'last_amount_paid' => 200,
                    'subscription_end_date' => Carbon::now()->addDays(30),
                    'subscriptionable_id' => $seller->id,
                    'email' => $seller->email
                ]);
        };
        dd($sellers);
        return view('admin.user.ending_seller', compact('sellers'));
    }


    public function add_seller_phone()
    {

        $sellers = Service::with('users')
            ->whereHas('users', function ($query) {
                $query->where('phone', null);
            })
            ->orderBy('created_at')
            ->get();
        return view('admin.user.ending_seller', compact('sellers'));
    }


    public function ended_seller2()
    {

        $names = array();
        $names22 = array();
        $second = Carbon::now()->addDays(15);
        $first =  Carbon::now();
        $subb = Subscription::all();
        foreach ($subb as $user) {
            /* ->where('subscription_end_date', '>', now())
                   \Carbon\Carbon::now()->lte($item->client->event_date_from*/
            if (Carbon::parse($user->subscription_end_date)->lt($first)) {
                array_push($names, $user);
            }
        }
        // dd($names);

        foreach ($names as $myuser) {
            $myuser2 = User::where('id', $myuser->subscriptionable_id)->get();
            array_push($names22, $myuser2);
        }

        $seller = $names22;
        // dd($seller);
        return view('admin.user.ended_seller', compact('seller'));
    }

    public function ended_seller()
    {

        $sellers = User::with('subscriptions')->where('role', 'seller')
            ->whereHas('subscriptions', function ($query) {
                $query->where('subscription_end_date', '<', now());
            })
            ->orderBy('created_at')
            ->get();
        return view('admin.user.ended_seller', compact('sellers'));
    }





    public function save_agent_id()
    {
        $users = User::whereNotNull('idOfAgent')->get();
        foreach ($users as $user) {
            $user->agent_id = $user->idOfAgent;
            $user->save();
        }
        return redirect('/admin/dashboard/all-agents-yesterday');
        // return redirect()->back();
    }

    public function all_agents_downline_yesterday()
    {
        $agents =  Agent::all();
        $user =  User::first();
        // $agent_downlines = User::where('idOfAgent', $user->id)->where('created_at', '>', Carbon::now()->subMinutes(1440))->get();
        $agent_downlines = User::where('idOfAgent', $user->id)->whereDate('created_at', Carbon::yesterday())->get();
        // dd($agent_downlines);
        // $posts = Post::whereDate('created_at', Carbon::today())->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.agent_yesterday', compact('agents'));
    }

    // $getItemsOneDay = Deposit::where('steam_user_id',0)->where('status', Deposit::STATUS_ACTIVE)
    // ->where('created_at', '>', Carbon::now()->subMinutes(1440))->get();


    public function all_marketer_earnings()
    {
        $efmarketers = User::where('is_ef_marketer', '1')->get();
        return view('admin.earnings.marketers', [
            'efmarketers' => $efmarketers
        ]);
    }


    //  public function all_agent_earnings()
    // {
    //   $agents = User::where('referalable_type', 'App\Agent')->whereDate('created_at', Carbon::yesterday())->get();
    //   // $agents = $agents->referals->whereDate('created_at', Carbon::yesterday())->get();
    //   // $users = Referal::where('referalable_type', 'App\Agent')->whereDate('created_at', Carbon::yesterday())->get();
    //   return view('admin.earnings.marketers', [
    //     'efmarketers' => $efmarketers
    //   ]);
    // }


    public function create_our_user(Request $request)
    {

        return view('admin.create_user');
    }


    public function save_user_from_admin(Request $request)
    {

        $link_from_url = $request->refer;
        $code_of_agent = $request->agent_code;
        $adminEmail =  Auth::user()->email;

        $slug3 = Str::random(8);

        $validatedData = $request->validate([
            'refer'           => ['nullable', 'string', 'max:255'],
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'           => ['required', 'numeric'],
            'amount'          => ['required', 'numeric'],
            'password'        => ['required', 'string', 'min:6'],
            // 'captcha'      => 'required|captcha',
            'role'            => ['required', Rule::in(['seller', 'buyer'])],
            'agent_code'      => ['nullable', 'exists:agents,agent_code'],
            'admin_password'  => ['nullable'],
        ]);

        $slug3 = Str::random(8);
        $random = Str::random(3);
        // $userSlug = Str::of($this->name)->slug('-').''.$random;
        $userSlug = Str::of($request->name)->slug('-') . '' . $random;

        // Get id of owner of $link_from_url if available
        if ($link_from_url) {
            $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
            if ($saveIdOfRefree) {
                $refererId = $saveIdOfRefree->id;
            } else {
                $success_notification = array(
                    'message' => 'The referer link used is incorrect!',
                    'alert-type' => 'fail'
                );
                return redirect()->route('admin.create_our_user')->with($success_notification);
            }
        } else {
            $refererId = null;
        }


        // Get id of owner of $agent code if available
        if ($code_of_agent) {
            $saveIdOfAgent = Agent::where('agent_code', $code_of_agent)->first();
            if ($saveIdOfAgent) {
                $agent_Id = $saveIdOfAgent->id;
            } else {
                $success_notification = array(
                    'message' => 'The Agent Code used is incorrect!',
                    'alert-type' => 'fail'
                );
                return redirect()->route('admin.create_our_user')->with($success_notification);
            }
        } else {
            $agent_Id = null;
        }

        //save user
        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        $user->slug     = $userSlug;
        //save id of referer if user was reffererd
        $user->idOfReferer = $refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $agent_Id;
        $user->refererLink = $slug3;
        //send mail

        if ($user->save()) {
            session()->forget('current_param');

            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $request->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }


        Auth::attempt(['email' => $email, 'password' => $request->password]);

        if (Auth::check()) {
            $present_user = Auth::user();
            // if referrer link is available, save it to referer table
            $link              = new Refererlink();
            $link->user_id     = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            if (Auth::user()->role == 'buyer') {
                // return  Redirect::to(session(url()->previous()));
                $success_notification = array(
                    'message' => 'Done!',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.create_our_user')->with($success_notification);
            }
            // save user's subscription module

            if ($request->amount == 200) {
                $added_days = 31;
                $sub_type = 'monthly';
            } elseif ($request->amount == 600) {
                $added_days = 93;
                $sub_type = '3 months';
            } elseif ($request->amount == 1200) {
                $added_days = 186;
                $sub_type = 'bi-annual';
            } elseif ($request->amount == 2400) {
                $added_days = 372;
                $sub_type = 'yearly';
            } else {
                $added_days = 0;
                $sub_type = null;
            }

            $current_date_time = Carbon::now()->toDateTimeString();

            // $sub_check = new ProviderSubscription();
            // $sub_check->user_id = Auth::id();
            // $sub_check->sub_type = $sub_type;
            // $sub_check->user_type = 'provider';
            // $sub_check->last_amount_paid = $this->plan;
            // $sub_check->subscription_end_date = Carbon::now()->addDays($added_days);
            // $sub_check->last_subscription_starts = $current_date_time;
            // $sub_check->save();


            Auth::user()->subscriptions()->create([
                'sub_type' => $sub_type,
                'last_amount_paid' => $request->amount,
                'subscription_end_date' => Carbon::now()->addDays($added_days),
                // 'last_subscription_starts' => $current_date_time,
                // 'trans_ref' => $tranxRef,
                'email' => Auth::user()->email
            ]);

            // $reg_payments = new Payment();
            // $reg_payments->user_id = Auth::id();
            // $reg_payments->payment_type = 'registration';
            // $reg_payments->amount = $this->plan;
            // $reg_payments->tranx_ref = $tranxRef;
            // $reg_payments->save();

            Auth::user()->mypayments()->create(['payment_type' => 'registration', 'amount' => $request->amount, 'tranx_ref' => null]);


            //level 1 start
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //if your refferer is an efmarketer staff, redirect user to dashboard
                    if ($referer->is_ef_marketer) {
                        Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                        if (Auth::check()) {
                            $success_notification = array(
                                'message' => 'Done!',
                                'alert-type' => 'success'
                            );
                            return redirect()->route('admin.create_our_user')->with($success_notification);;
                        } else {
                            return redirect()->route('home');
                        }
                    }


                    $referer->refererAmount = $referer->refererAmount + 200;
                    //save my id  as level 1 on the table of the one that reffered me
                    $referer->level1 = Auth::id();
                    $referer->save();

                    $referer->referals()->create(['user_id' => Auth::id()]);
                }
            }

            $agent_that_refered = $present_user->idOfAgent;
            if ($agent_that_refered) {
                $referer2 = Agent::where('id', $agent_that_refered)->first();
                if ($referer2) {
                    //if your agent is an efmarketer staff, redirect user to dashboard
                    if ($referer2->is_ef_marketer) {
                        Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                        if (Auth::check()) {
                            $success_notification = array(
                                'message' => 'Done!',
                                'alert-type' => 'success'
                            );
                            return redirect()->route('admin.create_our_user')->with($success_notification);
                        } else {
                            return redirect()->route('home');
                        }
                    }
                    $referer2->refererAmount = $referer2->refererAmount + 200;

                    //if my referee is an agent, save my id  as level 1 on the table of the Agent that reffered me
                    $referer2->level1 = Auth::id();
                    $referer2->save();

                    $referer2->referals()->create(['user_id' => Auth::id()]);
                }
            }

            //end level 1 payment

            //start level 2

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer2 = User::where('id', $person_that_refered2)->first();
                        if ($referer2) {
                            if ($referer2->level2) {
                                Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                                if (Auth::check()) {
                                    $success_notification = array(
                                        'message' => 'Done!',
                                        'alert-type' => 'success'
                                    );
                                    return redirect()->route('admin.create_our_user')->with($success_notification);
                                } else {
                                    return redirect()->route('home');
                                }
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = Auth::id();
                            $referer2->save();
                            // $present_user->level2 = $referer3->id;                    }
                        }
                    }
                }
            }

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $person_that_refered2 = $referer->idOfAgent;
                    if ($person_that_refered2) {
                        $referer2 = Agent::where('id', $person_that_refered2)->first();
                        if ($referer2) {
                            if ($referer2->level2) {
                                Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                                if (Auth::check()) {
                                    $success_notification = array(
                                        'message' => 'Done!',
                                        'alert-type' => 'success'
                                    );
                                    return redirect()->route('admin.create_our_user')->with($success_notification);
                                } else {
                                    return redirect()->route('home');
                                }
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = Auth::id();
                            $referer2->save();
                            // $present_user->level2 = $referer3->id;                    }
                        }

                        // $present_user->level2 = $referer3->id;
                    }
                }
            }
            //end level 2 payment


            //start level 3
            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 referer id
                            $person_that_refered3 = $referer3->idOfReferer;
                            if ($person_that_refered3) {
                                //level 3 referer
                                $referer4 = User::where('id', $person_that_refered3)->first();
                                if ($referer4) {
                                    if ($referer4->level3) {
                                        Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                                        if (Auth::check()) {
                                            $success_notification = array(
                                                'message' => 'Done!',
                                                'alert-type' => 'success'
                                            );
                                            return redirect()->route('admin.create_our_user')->with($success_notification);
                                        } else {
                                            return redirect()->route('home');
                                        }
                                    }

                                    // add amount to level 3 referer amount
                                    $referer4->refererAmount = $referer4->refererAmount + 100;
                                    $referer4->level3 = Auth::id();
                                    $referer4->save();
                                    // $present_user->level2 = $referer3->id;
                                }
                            }
                        }
                    }
                }
            }

            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 agent id
                            $person_that_refered3 = $referer3->idOfAgent;
                            if ($person_that_refered3) {
                                //level 3 agent
                                $referer4 = Agent::where('id', $person_that_refered3)->first();
                                if ($referer4) {
                                    if ($referer4->level3) {
                                        Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                                        if (Auth::check()) {
                                            $success_notification = array(
                                                'message' => 'Done!',
                                                'alert-type' => 'success'
                                            );
                                            return redirect()->route('admin.create_our_user')->with($success_notification);
                                        } else {
                                            return redirect()->route('home');
                                        }
                                    }

                                    // add amount to level 3 referer amount
                                    $referer4->refererAmount = $referer4->refererAmount + 100;
                                    $referer4->level3 = Auth::id();
                                    $referer4->save();
                                    // $present_user->level2 = $referer3->id;
                                }
                            }
                        }
                    }
                }
            }
            //end level 3 payment


            //start level 4 payment

            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 referer id
                            $person_that_refered3 = $referer3->idOfReferer;
                            if ($person_that_refered3) {
                                //level 3 referer
                                $referer4 = User::where('id', $person_that_refered3)->first();
                                if ($referer4) {

                                    $person_that_refered4 = $referer4->idOfReferer;

                                    if ($person_that_refered4) {
                                        $referer5 = User::where('id', $person_that_refered4)->first();
                                        if ($referer5) {

                                            if ($referer5->level4) {
                                                Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                                                if (Auth::check()) {
                                                    $success_notification = array(
                                                        'message' => 'Done!',
                                                        'alert-type' => 'success'
                                                    );
                                                    return redirect()->route('admin.create_our_user')->with($success_notification);
                                                } else {
                                                    return redirect()->route('home');
                                                }
                                            }

                                            // add amount to level 4 referer amount
                                            $referer5->refererAmount = $referer5->refererAmount + 50;
                                            $referer5->level4 = Auth::id();
                                            $referer5->save();
                                            // $present_user->level2 = $referer3->id;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 referer id
                            $person_that_refered3 = $referer3->idOfReferer;
                            if ($person_that_refered3) {
                                //level 3 referer
                                $referer4 = User::where('id', $person_that_refered3)->first();
                                if ($referer4) {

                                    $person_that_refered4 = $referer4->idOfAgent;

                                    if ($person_that_refered4) {
                                        $referer5 = Agent::where('id', $person_that_refered4)->first();

                                        if ($referer5) {
                                            if ($referer5->level4) {
                                                Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                                                if (Auth::check()) {
                                                    $success_notification = array(
                                                        'message' => 'Done!',
                                                        'alert-type' => 'success'
                                                    );
                                                    return redirect()->route('admin.create_our_user')->with($success_notification);
                                                } else {
                                                    return redirect()->route('home');
                                                }
                                            }

                                            // add amount to level 4 referer amount
                                            $referer5->refererAmount = $referer5->refererAmount + 50;
                                            $referer5->level4 = Auth::id();
                                            $referer5->save();
                                            // $present_user->level2 = $referer3->id;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            // end level 4 payment
            if (Auth::user()->role == 'seller') {
                Auth::attempt(['email' => $adminEmail, 'password' => $request->admin_password]);
                if (Auth::check()) {
                    $success_notification = array(
                        'message' => 'Done!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('admin.create_our_user')->with($success_notification);
                } else {
                    return redirect()->route('home');
                }
            }
        }
    }
}
