<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdvertPayment;

class AdvertPaymentController extends Controller
{
   public function save_ad(Request $request)
   {
   		$data = array(
   			'name' => $request->name,
   			'amount' => $request->amount,
   			'email' => $request->email,
   			'business' => $request->business,
   			'package' => $request->package,
   			'trans_slip_id' => $request->trans_slip_id,
   			'start_date' => $request->start_date,
   			'end_date' => $request->end_date,
   			'status' => 1,
   		);

   		$validator = \Validator::make($data, [
   			'name' => 'required|string|max:191',
    		'amount' => 'required|string',
    		'email' => 'required|string',
    		'business' => 'required|string|max:191',
    		'package' => 'required|string|max:191',
    		'trans_slip_id' => 'required|string',
   		]);

   		if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $ad = new AdvertPayment;

        $ad->create($data);

        $success_notification = array(
            'message' => 'Accountant successfully added!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($success_notification);
   } 

   public function update_ad(Request $request, $id)
   {
   		$data = array(
   			'name' => $request->name,
   			'amount' => $request->amount,
   			'email' => $request->email,
   			'business' => $request->business,
   			'package' => $request->package,
   			'trans_slip_id' => $request->trans_slip_id,
   			'start_date' => $request->start_date,
   			'end_date' => $request->end_date,
   			'status' => 1,
   		);

   		$validator = \Validator::make($data, [
   			'name' => 'required|string|max:191',
    		'amount' => 'required|string',
    		'email' => 'required|string',
    		'business' => 'required|string|max:191',
    		'package' => 'required|string|max:191',
    		'trans_slip_id' => 'required|string',
   		]);

   		if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $ad = AdvertPayment::find($id);

        $update_ad = $ad->update($data);

        if($update_ad)
        {
        	$success_notification = array(
	            'message' => 'Accountant successfully updated!',
	            'alert-type' => 'success'
	        );	
        }
        return redirect()->back()->with($success_notification);
   }
}
