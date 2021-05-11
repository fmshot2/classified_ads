<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Service;
use App\User;
use App\Like;
use App\Message;
use App\Badge;
use Illuminate\Support\Str;
use DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

use Illuminate\Http\File;
use App\Category;
use App\SubCategory;
use App\Local_government;
use App\Slider;
use App\State;
use App\Image;
use App\ProviderSubscription;
use App\Traits\ReusableCode;
use Carbon\Carbon;
use App\Payment;


class SubscriptionController extends Controller
{

	public function createSub()
	{		

		if (!Auth::user()->subscriptions->first()) {
			$current_subscription_end_date = null;
			$subscription_has_ended = null;

		}else {
			$user_sub_date = Auth::user()->subscriptions->first()->subscription_end_date;

			if ($user_sub_date) {
				if (Carbon::now() > Carbon::parse($user_sub_date)) {
					$current_subscription_end_date = null;
					$subscription_has_ended = "Your Subscription has ended. Please renew your subcription to proceed";    
				}else{
					$current_subscription_end_date =   $user_sub_date = Auth::user()->subscriptions->first()->subscription_end_date;
					$subscription_has_ended = null;


				}
			}else {
				$subscription_has_ended = null;
			}
		}	
		
		return view ('seller.subscription.create_sub', compact('current_subscription_end_date', 'subscription_has_ended') );
	}

	public function allSub()
	{

		$all_services = Service::where('user_id', Auth::id() )->get();
		return view ('seller.subscription.all_subsbscription', compact('all_services') );
	}

	public function requestsubscription(Request $request, $id)
	{
		$user_id = $request->user()->id;

		if ($id == 1) {
			$sub = [
				'sub_type' => 'monthly',
				'sub_cost' => 20000
			];
		}
		elseif ($id == 2) {
			$sub = [
				'sub_type' => '3-months',
				'sub_cost' => 60000
			];
		}
		elseif ($id == 3) {
			$sub = [
				'sub_type' => 'bi-annual',
				'sub_cost' => 120000
			];
		}
		
		elseif ($id == 4) {
			$sub = [
				'sub_type' => 'yearly',
				'sub_cost' => 240000
			];
		}

		return $sub;
	}

	public function createSubpay(Request $request)
	{
		// return response()->json(['success'=>'Ajax request submitted successfully']);
		$added_days = 0;
		$mytime = Carbon::now();

	 // Produces something like "2019-03-11 12:25:00"
		$current_date_time = Carbon::now()->toDateTimeString();
// 
		$added_date_time = Carbon::now()->addDays(5)->toDateTimeString();




		$data = $request->all();
		// return response()->json(['success3'=>$current_date_time, 'success4'=>$added_date_time], 200);
		// return response()->json(['success'=>$data, 'success3'=>$current_date_time], 200);
    //    return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$data]);
       // $badge_service_id = $data['service_id'];



		$this->validate($request,[
			'amount' => 'required',
			'email' => 'required',
		]);
					// 	$user_check->badgetype = $data['badge_type'];
		// 	$user_check->save();
				// return response()->json(['success3'=>$data['amount']]);
       // return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$data]);

		if ($data['amount'] == '200') {
			$added_days = 31;
			$sub_type = 'monthly';
		}
		if ($data['amount'] == '600') {
			$added_days = 93;
			$sub_type = '3-months';
		}
		if ($data['amount'] == '1200') {
			$added_days = 186;
			$sub_type = 'bi-annual';			
		}
		if ($data['amount'] == '2400') {
			$added_days = 372;
			$sub_type = 'annual';			
		}

		// $sub_check = ProviderSubscription::where(['user_id'=>Auth::id()])->first();
		$sub_check = Auth::user()->subscriptions->first();

		$initial_end_date = $sub_check->subscription_end_date;

		// $sub_check->user_id = Auth::id();
		$sub_check->sub_type = $sub_type;
		// $sub_check->user_type = 'provider';
		$sub_check->last_amount_paid = $data['amount'];
		$sub_check->subscription_end_date = Carbon::parse($initial_end_date)->addDays($added_days)->format('Y-m-d H:i:s');
		// return response()->json(['success3'=>$sub_check->subscription_end_date]);
		// $sub_check->last_subscription_starts = $current_date_time;
		$sub_check->trans_ref = $data['ref_no'];
		$sub_check->email = Auth::user()->email;
		$sub_check->save();

		$userServices = Service::where('user_id', Auth::id())->get();
		if ($userServices) {
			foreach ($userServices as $userService) {
				$userService->subscription_end_date = $sub_check->subscription_end_date;
			}
			$userService->save();
		}
// subscription_end_date
		// $mysubscriptions = Auth::user()->subscriptions;
		// Auth::user()->subscriptions()->create(['sub_type' => $sub_type, 
		// 	'last_amount_paid' => $data['amount'], 
		// 	'subscription_end_date' => Carbon::parse($initial_end_date)->addDays($added_days)->format('Y-m-d H:i:s'),
		// 	'last_subscription_starts' => $current_date_time,
		// 	'trans_ref' => $data['ref_no'],
		// 	'email' => Auth::user()->email ]);


		$sub_check->subscription_end_date = Carbon::parse($sub_check->subscription_end_date)->toDayDateTimeString();





		$reg_payments = new Payment();
            // $reg_payments->user_id = Auth::id();
            // $reg_payments->payment_type = 'subscription';
            // $reg_payments->amount = $data['amount'];
            // $reg_payments->tranx_ref =  $data['ref_no'];

            // $reg_payments->save();

		

		Auth::user()->mypayments()->create(['payment_type' => 'subscription', 'amount' => $data['amount'], 'tranx_ref' => $data['ref_no'] ]);
		

		return response()->json(['success'=>'Your Subscription payment was successfull', 'new_date'=>$sub_check->subscription_end_date], 200);

	}
	


	

}
