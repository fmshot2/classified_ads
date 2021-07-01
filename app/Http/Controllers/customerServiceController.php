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
	public function save_Report(Request $request)
    {
        // $request->validate([
        //     'email'    => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
        //     'password' => ['required', 'string', 'min:6']

        // ]);

		$new_report = New customerService;
		$new_report->call_status = $request->call_status;
		$new_report->call_duration = $request->call_duration;
		$new_report->alternative = $request->alternative;
		$new_report->client_comment = $request->client_comment;
		$new_report->customer_service_comment = $request->customer_service_comment;
		$new_report->user_id = $request->user_id;

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

	

    public function customerServiceDashboard()
	{
		return redirect('admin.subscription.all');

	}

	public function allSubscription()
	{
	  $all_subscriptions = User::all();
	  // foreach($all_subscriptions as $all_subscription){
	  //   $all_subscriptions = $all_subscription->subscriptionable->services;
  
	  // }
	//   dd($all_subscriptions);
	  return view('customerservice.dashboard', compact('all_subscriptions'));
	}


	public function ending_seller()
	{        

	  $sellers = User::where('role', 'seller')->with('subscriptions')
	  ->whereHas('subscriptions', function($query) {
		$to = Carbon::now()->addDays(14);
		$from  = Carbon::now();
		$query->whereBetween('subscription_end_date', [$from, $to]);
	  })
	  ->orderBy('created_at')
	  ->get(); 
	  return view('customerservice.sub_about_to_end', compact('sellers'));
	}

	public function ended_seller()
        {

          $sellers = User::where('role', 'seller')->with('subscriptions')
          ->whereHas('subscriptions', function($query) {
            $query->where('subscription_end_date', '<', now());
          })
          ->orderBy('created_at')
          ->get();
          return view('customerservice.sub_ended', compact('sellers'));
        }


}
