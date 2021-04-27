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
use App\Slider;
use App\Advertrequest;
use App\Agent;
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


class AdminController extends Controller
{

    public function usersfeedback()
    {
        $feedbacks = UserFeedback::orderBy('created_at','desc')->get();

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

    public function geo(){

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

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($data['password']);
        $user->role = 'cmo';
        $user->status = 1;

        $user->save();

        if($user->save())
        {
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

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($data['password']);
        $user->role = 'data';
        $user->status = 1;

        $user->save();

        if($user->save())
        {
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

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($data['password']);
        $user->role = 'admin';
        $user->status = 1;

        $user->save();

        if($user->save())
        {
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
    }
    catch(\Exception $e){

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
    foreach($email_addresses as $name=>$email)
    {
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
      return response()->json(['success'=>'updated done', 'latitude'=>$latitude, 'longitude'=>$longitude]);


if ($data = @file_get_contents("https://www.geoip-db.com/json"))
{
        $json = json_decode($data, true);
        $latitude = $json['latitude'];
        $longitude = $json['longitude'];
} else {
        $latitude = 0;
        $longitude = 0;
// }    return view ('admin.service.index', compact('all_service') );
      return response()->json(['success'=>'updated done', 'latitude'=>$latitude, 'longitude'=>$longitude]);
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
        ->orderBy("distance",'asc')
        ->offset(0)
        ->limit(20)
        ->get();

    return $services;
}

  public function allService()
  {
    $all_service = Service::orderBy('created_at', 'desc')->get();
    return view ('admin.service.index', compact('all_service') );
  }
  public function allSeekingwork()
  {
    $all_service = SeekingWork::orderBy('created_at', 'desc')->get();
    return view ('admin.service.sw_table', compact('all_service') );
  }

  public function activeService()
  {
    $active_service = Service::where('status', 1)->paginate(20);
    return view ('admin.service.active', compact('active_service') );
  }

  public function pendingService()
  {
    $pending_service = Service::where('status', 0)->paginate(10);
    return view ('admin.service.pending', compact('pending_service') );
  }

  //   public function allSubscription()
  // {
  //   $all_subscriptions = ProviderSubscription::all();
  //   return view ('admin.subscription.index', compact('all_subscriptions') );
  // }

   public function allSubscription()
  {
    $all_subscriptions = Subscription::all();
    return view ('admin.subscription.index', compact('all_subscriptions') );
  }

  public function pending_advert_requests()
  {
    $pending_advert_requests = Advertrequest::where('status', 0)->paginate(10);
    return view ('admin.page_management.pending_advert_requests', compact('pending_advert_requests') );
  }

  public function treated_advert_requests()
  {
    $treated_advert_requests = Advertrequest::where('status', 1)->paginate(10);
    return view ('admin.page_management.treated_advert_requests', compact('treated_advert_requests') );
  }

  public function all_adverts()
  {
    $advertisements = Advertrequest::all();
return view ('admin.advert_management.sliders', compact('advertisements') );
  }

  public function active_adverts()
  {
    $active_adverts = Advertrequest::where('status', 2)->paginate(10);
    return view ('admin.advert_management.active_adverts', compact('active_adverts') );
  }

  public function events()
  {
    //return view('events');
    $all_events = Event::all();

    return view ('admin.page_management.events', compact('all_events'));
  }


  public function all_events()
  {
    //return view('events');
    $all_events = Event::all();

    return view ('all_events', compact('all_events'));
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


    if ( $request->hasFile('file') ) {
      $image_name = time().'.'.$request->file->extension();
      $request->file->move(public_path('images'),$image_name);
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

     if($service->save()){
        if ($service->status == 1) {
            $status = 'Approved';
            $reason = '';
           try{
               Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
           }
           catch(\Exception $e){
               $failedtosendmail = 'Failed to Mail!.';
           }
        }
        else {
           $status = 'Disapproved';
           $reason = $request->get('reason');
           try{
               Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
           }
           catch(\Exception $e){
               $failedtosendmail = 'Failed to Mail!.';
           }
        }
        $request->session()->flash('status', 'Service was '.$status);
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

        if($service->save()){
            if ($service->status == 1) {
                $status = 'Approved';
                $reason = '';
               try{
                   Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
               }
               catch(\Exception $e){
                   $failedtosendmail = 'Failed to Mail!.';
               }
            }
            else {
               $status = 'Disapproved';
               $reason = $request->get('reason');
               try{
                   Mail::to($service->user->email)->send(new ServiceApproved($service->name, $service->description, $service->thumbnail, $service->slug, $status, $reason));
               }
               catch(\Exception $e){
                   $failedtosendmail = 'Failed to Mail!.';
               }
            }
            $request->session()->flash('status', 'CV was '.$status);
            return $status;
        }
        $request->session()->flash('error', 'Something went wrong');
        return back();


   }

   public function serviceSearch(Request $request)
   {
    $query = $request->input('query');
    $services = Service::where('name','LIKE',"%$query%")->paginate(8);
    return view('admin/search/service_search', compact('services', 'query'));
  }

  public function userSearch(Request $request)
  {
    $query = $request->input('query');
    $users = User::where('name','LIKE',"%$query%")->paginate(8);
    return view('admin/search/index', compact('users', 'query'));
  }

  public function viewProfile()
  {
    return view ('admin.profile.update_profile');
  }

  public function systemConfig()
  {
    $general_info = General_Info::first();
    $check_general_info = collect($general_info)->isEmpty();
    return view ('admin.system_config', compact('general_info', 'check_general_info') );
  }

  public function storeSystemConfig(Request $request, $id)
  {

    $general_info = $id == 1 ? General_Info::find($id) : New General_Info;
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


    if ( $request->hasFile('file') ) {
      $image_name = time().'.'.$request->file->extension();
      $request->file->move(public_path('images'),$image_name);
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
    $category = Category::where('id', $service->category_id )->first();
    return view ('seller.service.view_service', compact('service', 'category') );
  }

  public function allNotification()
  {
    $all_notification = Notification::paginate(8);
    return view ('admin.notification.all_notification', compact('all_notification') );
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
  return view ('seller.notification.view_notification', compact('notification') );
}

public function FAQs()
{
  return view ('admin.page_management.faq');
}

public function allBadges()
{
  $all_badges = Badge::all();
  return view ('admin.badge.index', compact('all_badges') );
}
public function privacyPolicy()
{
  return view ('admin.page_management.privacy_policy');
}

public function save_privacyPolicy(Request $request)
{

  $privacy = new Privacypolicy;
  $privacy->details = $request->details;
  $privacy->save();
  $current_privacy_policy = Privacypolicy::first();
  if($current_privacy_policy){
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
  return view ('admin.page_management.terms_of_use', compact('all_badges') );
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
          return view ('admin.page_management.faq', compact('faqs') );
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
          return view ('admin.page_management.sliders', compact(['sliders', 'advertisements', 'advertlocations']) );
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
            $this->validate($request,[
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


     public function activate_user($id){
        //return $id;
       $success = true;
        $message = "Activate";
        $status_message = "Disabled";

      $user = User::where('id' , $id)->first();
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


    public function activate_agent($id){

        $success = true;
        $message = "Activate";
        $status_message = "Disabled";

        $user = Agent::where('id' , $id)->first();
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

      public function all_ef_marketers ()
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
        $agent_downlines = User::where('idOfAgent', $user->id)->where('created_at', '=', Carbon::yesterday())->get();
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.agents_downline_24hrs', compact('agent_downlines'));
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
}
