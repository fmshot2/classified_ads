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
use App\CustomerService;


class customerServiceController extends Controller
{
	public function allSubscription()
	{
	// 	$all_subscriptions = User::find(32);
	//   dd($all_subscriptions->subscriptions);

	  $all_subscriptions = User::all();
	  // foreach($all_subscriptions as $all_subscription){
	  //   $all_subscriptions = $all_subscription->subscriptionable->services;
  
	  // }
	//   dd($all_subscriptions);
	  return view('customerservice.dashboard', compact('all_subscriptions'));
	}
	
	public function save_Report(Request $request)
    {
        // $request->validate([
        //     'email'    => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
        //     'password' => ['required', 'string', 'min:6']

        // ]);

		$reportCheck = CustomerService::where(['user_id' => $request->user_id])->first();
        if ($reportCheck) {
			$reportCheck->call_status = $request->call_status;
			$reportCheck->call_duration = $request->call_duration;
			$reportCheck->alternative = $request->alternative;
			$reportCheck->client_comment = $request->client_comment;
			$reportCheck->customer_service_comment = $request->customer_service_comment;
			$reportCheck->customer_service_personel_name = $request->customer_service_personel_name;
			$reportCheck->user_id = $reportCheck->user->id;
			if ($reportCheck->update()) {
				$success_notification = array(
				'message' => 'Report Updated successfully!',
				'alert-type' => 'success'
				);
				return redirect()->back()->with($success_notification);
			}
        } else {
        $new_report = New CustomerService;
		$new_report->call_status = $request->call_status;
		$new_report->call_duration = $request->call_duration;
		$new_report->alternative = $request->alternative;
		$new_report->client_comment = $request->client_comment;
		$new_report->customer_service_comment = $request->customer_service_comment;
		$new_report->customer_service_personel_name = $request->customer_service_personel_name;
		$new_report->user_id = $request->user_id;
        }
		if ($new_report->save()) {
			$success_notification = array(
				'message' => 'Report Added successfully!',
				'alert-type' => 'success'
			  );
			  return redirect()->back()->with($success_notification);
			} else {
				$success_notification = array(
					'message' => 'The Agent Code used is incorrect!',
					'alert-type' => 'fail'
				  );
				  return redirect()->back()->with($success_notification);
				}
		}



		public function save_user_Report(Request $request)
    {
        // $request->validate([
        //     'email'    => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
        //     'password' => ['required', 'string', 'min:6']

        // ]);

		$reportCheck = CustomerService::where(['service_id' => $request->service_id])->first();
        if ($reportCheck) {
			$reportCheck->call_status = $request->call_status;
			$reportCheck->call_duration = $request->call_duration;
			$reportCheck->alternative = $request->alternative;
			$reportCheck->client_comment = $request->client_comment;
			$reportCheck->customer_service_comment = $request->customer_service_comment;
			$reportCheck->customer_service_personel_name = $request->customer_service_personel_name;
			$reportCheck->service_id = $reportCheck->service_id;
			if ($reportCheck->update()) {
				$success_notification = array(
				'message' => 'Report Updated successfully!',
				'alert-type' => 'success'
				);
				return redirect()->back()->with($success_notification);
			}
        } else {
        $new_report = New CustomerService;
		$new_report->call_status = $request->call_status;
		$new_report->call_duration = $request->call_duration;
		$new_report->alternative = $request->alternative;
		$new_report->client_comment = $request->client_comment;
		$new_report->customer_service_comment = $request->customer_service_comment;
		$new_report->customer_service_personel_name = $request->customer_service_personel_name;
		$new_report->service_id = $request->service_id;
        }
		if ($new_report->save()) {
			$success_notification = array(
				'message' => 'Report Added successfully!',
				'alert-type' => 'success'
			  );
			  return redirect()->back()->with($success_notification);
			} else {
				$success_notification = array(
					'message' => 'The Agent Code used is incorrect!',
					'alert-type' => 'fail'
				  );
				  return redirect()->back()->with($success_notification);
				}
		}


	

		public function allServices_4_Cus_service()
		{
		  $mySortedServices = Service::all();
		  // foreach($all_subscriptions as $all_subscription){
		  //   $all_subscriptions = $all_subscription->subscriptionable->services;
	  
		  // }
		  // dd($all_subscriptions);
		  return view('customerservice.allServices', compact('mySortedServices'));
		}

    public function customerServiceDashboard()
	{
		return redirect('admin.subscription.all');

	}

	public function ending_seller()
	{        

	  $all_subscriptions = User::where('role', 'seller')->with('subscriptions')
	  ->whereHas('subscriptions', function($query) {
		$to = Carbon::now()->addDays(14);
		$from  = Carbon::now();
		$query->whereBetween('subscription_end_date', [$from, $to]);
	  })
	  ->get(); 
	  return view('customerservice.sub_about_to_end', compact('all_subscriptions'));
	}

	public function ended_seller()
        {
			// $all_subscriptions = User::find(32);
			// dd($all_subscriptions->customerservice->customer_service_personel_name);
          $all_subscriptions = User::where('role', 'seller')->with('subscriptions')
          ->whereHas('subscriptions', function($query) {
            $query->where('subscription_end_date', '<', now());
          })
          ->get();
          return view('customerservice.sub_ended', compact('all_subscriptions'));
        }
		


	// 	public function  sort_Sub_ending(Request $request)
    //     {
    //       $validatedData = $request->validate([
    //         'start_date' => ['required'],
    //         'end_date' => ['required'],
    //     ]);
    //     $to = Carbon::parse($request->end_date)->format('d/m/Y');
    //     $from  = Carbon::parse($request->start_date)->format('d/m/Y');
    //     $to = $request->end_date;
    //     $from  = $request->start_date;
    //     // dd($to, $from);
    //     $efmarketers = User::whereBetween(DB::raw('date(created_at)'), [$from, $to])->get();
	// 	return view('customerservice.sub_about_to_end', compact('all_subscriptions'));
	// }


		public function send_email()
		{
		  $agents_phone = Agent::all();
		  $plucked = $agents_phone->pluck('email')->toArray();
	  
		  $sellers = DB::table('users')->where('role', '=', 'seller')->get();
		  $plucked_email = $sellers->pluck('email')->toArray();
	  
		  $buyers = DB::table('users')->where('role', '=', 'buyer')->get();
		  $plucked_emailplucked_email = $sellers->pluck('email')->toArray();
	  
		  $email_addresses = implode(',', array_merge($plucked, $plucked_email, $plucked_email));
	  
		  return view('customerservice.send_email', [
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
	  
		  return view('customerservice.send_sms', [
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
}
