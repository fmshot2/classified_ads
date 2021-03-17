<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Badge;
use App\AdvertPayment;
use App\PaymentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon;

class AccountantController extends Controller
{

	public function accountantDashboard()
	{

        $ads_count = AdvertPayment::count();
        $badge_count = Badge::count();
        $payment_count = PaymentRequest::count();
        $payments = PaymentRequest::orderBy('created_at', 'asc')->paginate(5);
        $ads = AdvertPayment::orderBy('created_at', 'asc')->paginate(5);
        $total_ads = DB::table('advert_payments')->sum('amount');
        $total_badges = DB::table('badges')->sum('amount');
        $total_ref_requested = DB::table('payment_requests')->sum('amount_requested');
        $total_ref_paid = DB::table('payment_requests')->where('is_paid', '=', 1)->sum('amount_requested');
        $total_ref_pending = DB::table('payment_requests')->where('is_paid', '=', 0)->sum('amount_requested');
		return view('accountant.dashboard', [
            'ads_count' => $ads_count,
            'badge_count' => $badge_count,
            'payment_count' => $payment_count,
            'payments' => $payments,
            'ads' => $ads,
            'total_ads' => $total_ads,
            'total_badges' => $total_badges,
            'total_ref_requested' => $total_ref_requested,
            'total_ref_paid' => $total_ref_paid,
            'total_ref_pending' => $total_ref_pending
        ]);

	}


    public function add_accountant()
    {
    	return view('admin.user.add_accountant');
    }

    public function allPayments()
    {
    	$all_payments = Payment::all();
    	return view('accountant.payments.all_payments', [
    		'all_payments' => $all_payments
    	]);
    }

    public function successfulPayments()
    {
    	$all_payments = Payment::all();
    	return view('accountant.payments.paid_payments', [
    		'all_payments' => $all_payments
    	]);	
    }

    public function unsuccessfulPayments()
    {
    	$all_payments = Payment::all();
    	return view('accountant.payments.unpaid_payments', [
    		'all_payments' => $all_payments
    	]);
    }


    public function allReferrals()
    {
    	$all_payments = PaymentRequest::all();
    	return view('accountant.referrals.all_referrals', [
    		'all_payments' => $all_payments
    	]);
    }

    public function successfulReferrals()
    {
    	$all_payments = PaymentRequest::where('is_paid', '=', 1)->get();
    	return view('accountant.referrals.paid_referrals', [
    		'all_payments' => $all_payments
    	]);	
    }

    public function unsuccessfulReferrals()
    {
    	$all_payments = PaymentRequest::where('is_paid', '=', 0)->get();
    	return view('accountant.referrals.unpaid_referrals', [
    		'all_payments' => $all_payments
    	]);
    }

    public function badgeRequests()
    {
        $all_badges = Badge::all();
        return view('accountant.badges.badges', [
            'all_badges' => $all_badges
        ]);
    }

    public function adRequests()
    {
        $ads = AdvertPayment::all();

        return view('accountant.ads.ads', [
            'ads' => $ads
        ]);
    }


    public function submit_accountant(Request $request)
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
        $user->role = 'accountant';
        $user->status = 1;

        $user->save();

        if($user->save())
        {
        	$success_notification = array(
                'message' => 'Accountant successfully added!',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($success_notification);
    }

    public function accountantProfile(){
    	return view('accountant.profile.update_profile');
    }

    public function makePayment(Request $request, $id)
    {
        $success = true;
        $message = "Payment is pending";
        $status_message = "pending";

        $payment = PaymentRequest::where('id' , $id)->first();
        if ($payment->is_paid == 1) {
            $payment->is_paid = 0;
            $payment->update();

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,
            ]);
       
        }
        if ($payment->is_paid == 0) {
              $message = "Payment successful";
              $status_message = "Paid";

            $payment->is_paid = 1;
            $payment->update();

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,

            ]);
        }
    }
}
