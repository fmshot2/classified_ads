<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentRequest;

use Illuminate\Support\Facades\DB;

class PaymentRequestController extends Controller
{
    public function getBuyerPage()
    {
    	$user = auth()->user();

    	return view('buyer.payment.request', [
    		'user' => $user
    	]);
    }

    public function submitRequest(Request $request)
    {
    	$data = array(
    		'amount_requested' => $request->amount_requested
    	);

    	$validator = \Validator::make($data, [
            'amount_requested'   => 'required',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }



    	$user = auth()->user();
    	$user_total_balance = $user->refererAmount;

    	$total_balance = (int)$user_total_balance;
    	// dd($total_balance);

    	$amount = $request->amount_requested;
    	$converted_amount = (int)$amount;


    	if($total_balance > 0)
    	{
    		if($converted_amount >= 1000)
    		{
    			if($converted_amount <= $total_balance)
    			{
    				$payment = new PaymentRequest;

			    	$payment->user_id = $user->id;
			    	$payment->is_paid = 0;
			    	$payment->amount_requested = $request->amount_requested;
			    	$payment->save();
			    	
			    	$new_balance = $total_balance - $converted_amount;

			    	DB::table('users')->where('id', '=', $user->id)->update(['refererAmount' => $new_balance]);
			        
			        return redirect()->back()->with('status', 'Your request has been submitted!');


    			} else {
    				return redirect()->back()->with('fail', 'You cannot withdraw more than your total balance!');
    			}
    		} else {
    			return redirect()->back()->with('fail', 'Your withdrawal amount is less than ₦1000!');
    		}
    	} else{

    		return redirect()->back()->with('fail', 'You have insufficient balance!');
    	}

    }
}
