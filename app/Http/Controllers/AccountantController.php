<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Badge;
use App\AdvertPayment;
use App\PaymentRequest;
use App\ProviderSubscription;
use App\Agent;
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
        $total_agent_req = DB::table('payment_requests')->where(['user_type'=> 'agent'])->sum('amount_requested');
        $total_pending_req = DB::table('payment_requests')->where(['user_type'=> 'agent', 'is_paid' => 0])->sum('amount_requested');
        $total_paid_req = DB::table('payment_requests')->where(['user_type'=> 'agent', 'is_paid' => 1])->sum('amount_requested');
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
            'total_ref_pending' => $total_ref_pending,
            'total_agent_req' => $total_agent_req,
            'total_paid_req' => $total_paid_req,
            'total_pending_req' => $total_pending_req
        ]);

	}

    public function sellerActivity()
    {
        $payments = User::where('role', '=', 'seller')->get();
        return view('accountant.activity.seller', [
            'payments' =>$payments
        ]);
    }

    public function agentActivity()
    {
        $payments = Agent::all();
        return view('accountant.activity.agent', [
            'payments' =>$payments
        ]);
    }


    public function add_accountant()
    {
    	return view('admin.user.add_accountant');
    }

    public function viewDuePayments()
    {
        $dues = DB::table('users')->where('refererAmount', '>=', 1000)->get();
        return view('accountant.payments.due_payments', [
            'dues' => $dues
        ]);
    }

    public function agentDuePayments()
    {
        $dues = DB::table('agents')->where('refererAmount', '>=', 1000)->get();
        return view('accountant.payments.agent_due_payments', [
            'dues' => $dues
        ]);
    }

    public function settledPayments()
    {
        $settled = DB::table('users')->where('refererAmount', '>=', 1000)->get();
        return view('accountant.payments.settled_payments', [
            'settled' => $settled
        ]);
    }

    public function agentSettledPayments()
    {
        $settled = DB::table('agents')->where('refererAmount', '>=', 1000)->where('is_paid', '=', 1)->get();
        return view('accountant.payments.agent_settled_payments', [
            'settled' => $settled
        ]);
    }

    public function allPayments()
    {
    	$all_payments = PaymentRequest::where('user_type',  'agent')->get();
    	return view('accountant.payments.all_payments', [
    		'all_payments' => $all_payments
    	]);
    }

    public function pendingPayments()
    {
        $pending_payments = PaymentRequest::where(['user_type' => 'agent', 'is_paid' => 0])->get();
    	return view('accountant.payments.unpaid_payments', [
    		'pending_payments' => $pending_payments
    	]);
    }

     public function paidPayments()
    {
        $successful_payments =PaymentRequest::where(['user_type' => 'agent', 'is_paid' => 1])->get();
        return view('accountant.payments.paid_payments', [
            'successful_payments' => $successful_payments
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

        $all_badges = Payment::where('payment_type', 'badge_payment')->get();
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

    public function makePayment1(Request $request, $id)
    {
        $success = true;
        $message = "Payment is pending";
        $status_message = "pending";

        $payment = User::where('id' , $id)->first();
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

    public function makePayment2(Request $request, $id)
    {
        $success = true;
        $message = "Payment is pending";
        $status_message = "pending";

        $payment = Agent::where('id' , $id)->first();
        
        if ($payment->is_paid == 0) {
              $message = "Payment successful";
              $status_message = "Paid";


            $total = $payment->refererAmount;
            $payment->is_paid = 1;
            $payment->refererAmount = 0;
            $payment->total_paid += $total;
            $payment->update();

            return response()->json([
                'success' => $success,
                'message' => $message,
                'status_message' => $status_message,

            ]);
        }
    }

    public function generatePayment()
    {
       
        $agents = Agent::where('refererAmount', '>=', 1000)->get();
        foreach ($agents as $agent) {

            $payment_request = new PaymentRequest;
            $payment_request->user_id = $agent->id;
            $payment_request->user_type = 'agent';
            $payment_request->account_name = $agent->accountname;
            $payment_request->account_number = $agent->accountno;
            $payment_request->bank_name = $agent->bankname;
            $payment_request->amount_requested = $agent->refererAmount;
            $payment_request->is_paid = 0;

            $payment_request->save();

            $total = $agent->refererAmount;

            $agent->refererAmount = 0;
            $agent->total_paid += $total;

            $agent->save();
        }

        $success = true;
        $message = "Request successful";
        $status_message = "Requested";

        return response()->json([
            'success' => $success,
            'message' => $message,
            'status_message' => $status_message,

        ]);
    }

    public function generateSellerPayment()
    {
        $sellers = User::where('refererAmount', '>=', 1000)->get();
        foreach ($sellers as $seller) {

            $payment_request = new PaymentRequest;
            $payment_request->user_id = $seller->id;
            $payment_request->user_type = 'seller';
            $payment_request->account_number = $seller->account_number;
            $payment_request->account_name = $seller->account_name;
            $payment_request->bank_name = $seller->bank_name;
            $payment_request->amount_requested = $seller->refererAmount;
            $payment_request->is_paid = 0;

            $payment_request->save();

            $total = $seller->refererAmount;

            $seller->refererAmount = 0;
            $seller->total_paid += $total;

            $seller->save();
        }

        $success = true;
        $message = "Request successful";
        $status_message = "Requested";

        return response()->json([
            'success' => $success,
            'message' => $message,
            'status_message' => $status_message,

        ]);
    }

    public function viewPayment($id)
    {
        $history = PaymentRequest::where('user_id', $id)->get();

        $user = PaymentRequest::where('user_id', $id)->first();

        return view('accountant.payment_details', [
            'history' => $history,
            'user' => $user
        ]); 
    }

    public function subscriptions()
    {
        $subscriptions = Payment::where('payment_type', '=', 'subscription')->get();
        return view('accountant.payments.subscriptions', [
            'subscriptions' => $subscriptions
        ]);
    }

    public function allEfPayments()
    {
        $payments = Payment::all();
        return view('accountant.payments.all_ef_payments', [
            'payments' => $payments
        ]);
    }

    public function featured()
    {
        $featured = Payment::where('payment_type','=', 'featured')->get();
        return view('accountant.payments.featured', [
            'featured' => $featured
        ]);
        
    }

    public function registrationPayments()
    {
        $registrations = Payment::where('payment_type', '=', 'registration')->get();
        return view('accountant.payments.registrations', [
            'registrations' => $registrations
        ]);
    }
}


