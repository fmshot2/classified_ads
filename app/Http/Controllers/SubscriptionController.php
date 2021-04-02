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


class SubscriptionController extends Controller
{

	public function createSub()
	{
		if ($current_subscription = ProviderSubscription::where('user_id', Auth::id())->first()) {
		$current_subscription_end_date = $current_subscription->subscription_end_date;
		}else{
		$current_subscription_end_date = null;
		}
		// $current_subscription_end_date2 = Carbon::createFromFormat('Y-m-d H:i:s', $current_subscription_end_date)->format('d-m-Y');
		// $current_subscription_end_date3 = $current_subscription_end_date2->diffForHumans();
		
		
		return view ('seller.subscription.create_sub', compact('current_subscription_end_date') );
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
				'sub_cost' => 200
			];
		}
		elseif ($id == 2) {
			$sub = [
				'sub_type' => 'bi-annual',
				'sub_cost' => 1200
			];
		}
		elseif ($id == 3) {
			$sub = [
				'sub_type' => 'yearly',
				'sub_cost' => 2200
			];
		}

		return $sub;
	}

	public function createSubpay(Request $request)
	{
		$added_days = 0;
		$mytime = Carbon::now();

	 // Produces something like "2019-03-11 12:25:00"
		$current_date_time = Carbon::now()->toDateTimeString();
		// $current_date_time = Carbon::now()->addWeeks(2)->toDateTimeString();
// 
		$added_date_time = Carbon::now()->addDays(5)->toDateTimeString();


	// return response()->json(['success3'=>$current_date_time]);


		$data = $request->all();
		// return response()->json(['success3'=>$current_date_time, 'success4'=>$added_date_time], 200);
		// return response()->json(['success'=>$data, 'success3'=>$current_date_time], 200);
    //    return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$data]);
       // $badge_service_id = $data['service_id'];



		$this->validate($request,[
			'amount' => 'required',
			'email' => 'required',
		]);
		$sub_check = ProviderSubscription::where(['user_id'=>Auth::id()])->first();
					// 	$user_check->badgetype = $data['badge_type'];
		// 	$user_check->save();
		if ($data['amount'] == '200') {
			$added_days = 31;
		}
		if ($data['amount'] == '1200') {
			$added_days = 186;
		}
		if ($data['amount'] == '2400') {
			$added_days = 372;
		}

		$sub_check = new ProviderSubscription();
		$sub_check->user_id = Auth::id();
		$sub_check->sub_type = $data['sub_type'];
		$sub_check->user_type = 'provider';
		$sub_check->last_amount_paid = $data['amount'];
		$sub_check->subscription_end_date = Carbon::now()->addDays($added_days);
		$sub_check->last_subscription_starts = $current_date_time;
		$sub_check->save();

		return response()->json(['success'=>$sub_check, 'success3'=>$current_date_time], 200);

	}
	


	

}
