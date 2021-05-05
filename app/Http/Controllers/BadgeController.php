<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Badge;
use App\Advert;
use App\Advertrequest;
use App\User;
use App\Payment;





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
    	$gtpay_tranx_noti_url = route('home')."/api/gt_payment_details/{$request->user()->id}/{$request->badge_type}";
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




	public function gtPAyForRegistration(Request $request) {
		$gtpay_mert_id        = 14435;
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
    	$hashkey = '6470B923CDDE833E02B4CA0329432E8BF29B62B29B6B722397924F40731D44D8324AFE100EE2A4B6BD1299606A7C46D6BF0FF95220C3065F02DC052E7BFE5283';

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
		return view('gttPayView4Registration', $gtPay_Data );
	}


	public function gt_response2(Request $request, $user_id, $badge_type){
			dd($request, $user_id, $badge_type);

			$new_Badge = new Badge();
	}

	// public function test_new_badge()
	// {
	// 	$user_id = 7;
	// 	$badge_type = 5;
	// 		$the_service = Service::where('user_id', $user_id)->get();
	// 		foreach ($the_service as $servi) {

	// 			$servi->badge_type = $badge_type;
	// 		  }

	// 		 dd($the_service);
	// 	return redirect('provider/dashboard')->with('success', 'Your payment has been made successfully!');
	// }


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
			$the_service = Service::where('user_id', $user_id)->get();
			foreach ($the_service as $servi) {

				$servi->badge_type = $badge_type;
				$servi->save();
			  }
			  // dd($badge);
		return redirect('provider/dashboard')->with('success', 'Your payment has been made successfully!');
	}

	public function badges() {
		$services_dropdown_check = 1;
		$services = Service::where('user_id', Auth::id() )->get();

        $badge_data = [
            'badge_one_cost' => 15000,
            'badge_two_cost' => 10000,
            'badge_three_cost' => 5000
        ];

		return view('seller.service.service_badges', compact('services', 'badge_data'));
	}

	public function adverts() {
		$services_dropdown_check = 1;
		$adverts = Advert::all();
		return view('seller.service.service_adverts', compact('adverts'));
	}

	public function saveService4Badge(Request $request)
	{
      	//return $request->input('service_id');
      	 $data = $request->all();

		$service_id = $data['service_id'];
      	  $service_select = "This Service selected for upgrade";


		$badge_check = Badge::where(['service_id'=>$service_id])->first();

		if ($badge_check) {
			$badge_check->service_id = $service_id;

			$badge_check->save();
			return response()->json(['success'=>'updated done', 'id'=>$service_id]);

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
   }else{
     $like = new Like();
     $like->user_id = Auth::id();
     $like->service_id = $id;
     $like->save();
     $likecount = Like::where(['service_id'=>$id])->count();
     return redirect()->to('serviceDetail/'.$service_slug);
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

    public function requestbadge(Request $request, $id)
    {
        $user_id = $request->user()->id;

        if ($id == 1) {
            $badge = [
                'badge_type' => 'Super',
                'badge_cost' => 1500000
            ];
        }
        elseif ($id == 2) {
            $badge = [
                'badge_type' => 'Moderate',
                'badge_cost' => 1000000
            ];
        }
        elseif ($id == 3) {
            $badge = [
                'badge_type' => 'Basic',
                'badge_cost' => 500000
            ];
        }

        return $badge;
    }


    public function createBadgepay(Request $request)
    {

        $data = $request->all();
        return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$data]);
        // $badge_service_id = $data['service_id'];



        $this->validate($request,[
            'amount' => 'required',
            'email' => 'required',
        ]);
        if ($user_check = User::where(['email'=>$data['email']])->first()){
            return response()->json(['success'=>'Ajax request submitted successfully', 'success2'=>$user_check]);
            $user_check->badgetype = $data['badge_type'];
            $user_check->save();

            $badge_check = Badge::where(['user_id'=>Auth::id()])->first();

            if ($badge_check) {
                $badge_check->badge_type = $data['badge_type'];

                $badge_check->amount = $data['amount'];
                $badge_check->ref_no = $data['ref_no'];

                $badge_check->save();

                    $present_user = Auth::user();
                        // if referrer link is available, save it to referer table
                        $person_that_refered = $present_user->idOfReferer;
                        if ($person_that_refered) {
                            $referer = User::where('id', $person_that_refered)->first();
                            if ($referer) {
                            if ($data['amount'] == 15000) {
                                $referer->refererAmount = $referer->refererAmount + 1000;
                                $referer->save();
                            }
                            if ($data['amount'] == 10000) {
                                $referer->refererAmount = $referer->refererAmount + 500;
                                $referer->save();
                            }
                            if ($data['amount'] == 5000) {
                                $referer->refererAmount = $referer->refererAmount + 300;
                                $referer->save();
                            }

                            }
                        }

                        $agent_that_refered = $present_user->idOfAgent;
                        if ($agent_that_refered) {
                            $referer2 = Agent::where('id', $agent_that_refered)->first();
                            if ($referer2) {
                                if ($referer2) {
                            if ($data['amount'] == 15000) {
                                $referer2->refererAmount = $referer->refererAmount + 1000;
                                $referer2->save();
                            }
                            if ($data['amount'] == 10000) {
                                $referer2->refererAmount = $referer->refererAmount + 500;
                                $referer2->save();
                            }
                            if ($data['amount'] == 5000) {
                                $referer2->refererAmount = $referer->refererAmount + 300;
                                $referer2->save();
                            }

                            }

                            }
                        }


                return response()->json(['success'=>'Badge Updated successfully!'], 200);

                // return "Badge Updated successfully!";
            }else{
                $badge = new Badge();
                $badge->email = $data['email'];
                $badge->badge_type = $data['badge_type'];
                $badge->amount = $data['amount'];
                $badge->seller_name = Auth::user()->name;
                $badge->phone = $data['phone'];
                $badge->ref_no = $data['ref_no'];

                $badge->save();
                return response()->json(['success'=>'Badge created successfullyy!'], 200);
            }
        }

        return response()->json(['failed'=>'User not available'], 200);
    }


    public function create_pay_featured(Request $request)
      {

       $data = $request->all();

       $this->validate($request,[
        'service_id' => 'required',
        'email' => 'required',
      ]);
       if ($service_check = Service::where(['id'=>$data['service_id']])->first()){
        $service_check->is_featured = 1;
        $service_check->paid_featured = 1;
        $service_check->save();


            // $reg_payments = new Payment();
            // $reg_payments->user_id = Auth::id();
            // $reg_payments->payment_type = 'featured';
            // $reg_payments->amount = $data['amount'];
            // $reg_payments->tranx_ref =  $data['ref_no'];

            // $reg_payments->save();

            Auth::user()->mypayments()->create(['payment_type' => 'featured', 'amount' => $data['amount'], 'tranx_ref' => $data['ref_no'] ]);

        return response()->json(['success'=>'Your Service is now featured!'], 200);
      }

      return response()->json(['failed'=>'Service not available'], 200);
 }



}
