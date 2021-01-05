<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;


class ComplaintController extends Controller
{

	public function storeComplaint(Request $request)
	{

		$data = $request->all();


		$this->validate($request,[
			'buyer_name' => 'required',
			'buyer_email' => 'required',
			'description' => 'required',

		]); 



        /*$message->buyer_id = $request->buyer_id;
        $message->service_id = $request->service_id;
        $message->description = $request->description;*/
        $success = 'Your message was sent successfully. Thank you!';
        $slug = Str::random(10);
        $complaint = new Complaint();  



                //$message->service_id = $data['id']; 
        $complaint->buyer_id = $data['buyer_id'];
        $complaint->buyer_name = $data['buyer_name'];     
        $complaint->buyer_email = $data['buyer_email'];
        $complaint->slug = $slug; 
        $complaint->service_id = $data['service_id'];
        $complaint->service_user_id = $data['service_user_id'];
        $complaint->description = $data['description'];

        $complaint->save();

        //$serviceDetailId = $message->service_id;
        //$service = Service::find($serviceDetailId);
        //$service_slug = $service->slug;

        // $slug = $random = Str::random(40);
        //$message->slug = $slug;
        if ($complaint->save()) {
        	$buyer_email = $complaint->buyer_email;

        	$name = 'Your message has been delivered successfully!';
        	Mail::to($buyer_email)->send(new SendMailable($name));
        	return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
        }
        return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>"not saved"]);
    }


}
