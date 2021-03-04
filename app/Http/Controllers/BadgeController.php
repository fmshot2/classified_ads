<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Badge;
use App\Advert;
use App\Advertrequest;
use App\User;




use Illuminate\Support\Facades\Auth;


class BadgeController extends Controller
{



   public function gen_transaction_id()
    {
        return mt_rand(1000000000, 9999999999);
    }


	public function gtPAy(Request $request) {
		$gtpay_mert_id        = 14264; 
    	$gtpay_tranx_id      = $this->gen_transaction_id();
    	$gtpay_tranx_amt      = $request->amount * 100;
    	$gtpay_tranx_curr     = 566;
    	$gtpay_cust_id        = $request->user()->id;
    	$gtpay_tranx_noti_url = "https://yellowpage.test/api/gt_payment_details/{$request->user()->id}/{$request->badge_type}";
    	$gtpay_cust_name      = $request->user()->name;
    	$gtpay_tranx_memo     = 'Mobow';
    	$gtpay_echo_data      = "{$request->user()->id},{$request->badge_type}";
    	$gtpay_no_show_gtbank = 'yes';
    	$gtpay_gway_name      = 'etranzact';
    	$hashkey = '3EBF9CF6D082C89F88490B01D072B0F4E1EE52E86EC731D9B49538F33B551D486AB70673FE1B876B94EF76EC5E0AA1D3D14BA933424037FB1219662AFAB8FF51';

    	 $gtpay_hash = $gtpay_mert_id.$gtpay_tranx_id.$gtpay_tranx_amt.$gtpay_tranx_curr.$gtpay_cust_id.$gtpay_tranx_noti_url.$hashkey;

        $hashed = hash('sha512', $gtpay_hash);

        $gtPay_Data = [
        	'gtpay_mert_id' => $gtpay_mert_id,
        	'gtpay_tranx_id' => $gtpay_tranx_id,
        	'gtpay_tranx_amt' => $gtpay_tranx_amt,
        	'gtpay_tranx_curr' => $gtpay_tranx_curr,
        	'gtpay_cust_id' =>  $gtpay_cust_id,
        	'gtpay_tranx_noti_url' => $gtpay_tranx_noti_url,
        	'gtpay_cust_name' => $gtpay_cust_name,
        	'gtpay_tranx_memo' => $gtpay_tranx_memo,
        	'gtpay_echo_data'      => $gtpay_echo_data,
        	'gtpay_no_show_gtbank' => $gtpay_no_show_gtbank,
        	'gtpay_gway_name'      => $gtpay_gway_name,
        	'hashkey'              => $hashkey,
        	'hashed'              => $hashed


        ];
// dd($gtPay_Data);
		return view('gttPayView', $gtPay_Data );
	}


	public function gt_response2(Request $request, $user_id, $badge_type){
			dd($request, $user_id, $badge_type);

			$new_Badge = new Badge();
	}




	public function gt_response(Request $request, $user_id, $badge_type)
	{              
		$user = User::where('id', $user_id)->first();
		// Auth::user()->name;
			$badge = new Badge();
			$badge->user_id = $user_id;   
			$badge->badge_type = $badge_type;
			// $badge->amount = $request->gtpay_tranx_amt;/
			$badge->ref_no = $request->gtpay_tranx_id;
			$badge->seller_name = $user->name;
			$badge->save();
			// dd($badge);
		return redirect('provider/dashboard')->with('success', 'Your payment has been made successfully!');
	}

	public function badges() {
		$services_dropdown_check = 1; 
		$services = Service::where('user_id', Auth::id() )->get();
		return view('seller.service.service_badges', compact('services'));
	}

	public function adverts() {
		$services_dropdown_check = 1; 
		$adverts = Advert::all();
		return view('seller.service.service_adverts', compact('adverts'));
	}

	public function saveService4Badge(Request $request)
	{
      	  //return 'ddd';
      	//return $request->input('service_id');
      	 $data = $request->all();
       //return 'nnn';

        //return $data['service_id'];
          //$badge_service_id = $data['service_id']; 


		$service_id = $data['service_id'];          
		//$service_id = $request->input('service_id');
      	  $service_select = "This Service selected for upgrade";

  			//return $the_Service = Badge::where('service_id', $service_id)->get();

		$badge_check = Badge::where(['service_id'=>$service_id])->first();
		
		if ($badge_check) {
			$badge_check->service_id = $service_id;  

			$badge_check->save();
			return response()->json(['success'=>'updated done', 'id'=>$service_id]);
			 /*return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);*/

		}else{
			$badge = new Badge();
			$badge->service_id = $service_id;       
			$badge->save();
			return response()->json(['success'=>'new id done', 'id'=>$service_id]);
		}
	}



		public function saveService4Advert(Request $request)
	{
	//return $request->input('service_id');
      	 $data = $request->all();
       //return 'nnn';


		$service_id = $data['service_id'];          
      	  $service_select = "This Service selected for upgrade";



		$badge_check = Advertrequest::where('user_id', Auth::id() )->first();
			
		if ($badge_check) {
			$badge_check->advert_type = $service_id;  

			$badge_check->save();
			return response()->json(['success'=>'updated done', 'id'=>$service_id]);
			

		}else{
			$badge = new Advertrequest();
			$badge->advert_type = $service_id; 
						$badge->user_id = Auth::id();             
			$badge->save();

			return response()->json(['success'=>'new id done', 'id'=>$badge]);

		}
	}



 public function createpay4Advert(Request $request)
      {
       $data = $request->all();
       //return 'nnn';

        //return $data['service_id'];
       $badge_service_id = $data['service_id'];    


       $this->validate($request,[
        'amount' => 'required',
        'email' => 'required',      
      ]);
      /* $service_check = Service::where(['id'=>$badge_service_id])->first();
       //return $service_check->badge_type;
       $service_check->badge_type = $data['badge_type'];
       $service_check->save();
       $badge_check = Badge::where(['service_id'=>$badge_service_id])->first();

       if ($badge_check) {
        $badge_check->badge_type = $data['badge_type'];

        $badge_check->amount = $data['amount'];
        $badge_check->ref_no = $data['ref_no'];  
  //$badge_check->service_id = $data['service_id'];    

        $badge_check->save();
        return "Badge Updated successfully!";
      }else{*/
       $badge = new Advertrequest();
       $badge->email = $data['email'];
       $badge->category = $data['category'];
       $badge->seller_id = $data['seller_id'];
       $badge->amount = $data['amount'];
       $badge->seller_name = $data['seller_name'];
       $badge->phone = $data['phone'];
       $badge->ref_no = $data['ref_no'];
        //$badge->service_id = $data['service_id'];

       $badge->save();
       return "Badge created successfully";   
     //}


     $badge->save();
     return "yyyy";

        //return 

     if ($badge->save()) {
      return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$success]);
        //return redirect()->to('serviceDetail/'.$service_slug)->with('message', 'Your message has been sent!');
    }else{
      return response()->json(['success2', 'Your message was not sent!']);
    }

    $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
    if ($likecheck) {
     Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
     $likecount = Like::where(['service_id'=>$id])->count();
     return redirect()->to('serviceDetail/'.$service_slug);
        //return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
        //return redirect('/home');   
   }else{
     $like = new Like();
     $like->user_id = Auth::id();
     $like->service_id = $id;
     $like->save();
     $likecount = Like::where(['service_id'=>$id])->count();
     return redirect()->to('serviceDetail/'.$service_slug);
        //return 'Heyyyyy22222'. $likecount;    
   }

 }











	public function getBadgeList($id)
	{

		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
		]);
		$badge_service_id = $id;
		return 'eee';
		$service_badge = Badge::where(['service_id', $badge_service_id])->first();
		$service_check = $service_badge->service_id;
		return back()->with('service_check', $service_check);
		return response()->json(['success'=>$service_check, 'services_dropdown_check'=>$services_dropdown_check ]);
		$services_dropdown_check = null; 
		return response()->json(['success'=>$service_check, 'services_dropdown_check'=>$services_dropdown_check ]);

		$sub_categories = DB::table("sub_categories")
		->where("category_id",$id)
		->pluck("name","id");
		return response()->json($sub_categories);
	}






	public function storeService(Request $request)
	{

		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
		]);


		$category = $request->category;
		$service = new Service();

		$service->phone = $phone;



		$service->user_id = Auth::id();      

		$service->save();
		$likecount = Like::where(['service_id'=>$request->id])->count();
		return redirect('seller/dashboard');
		return redirect('/seller/dashboard');

	}



}
