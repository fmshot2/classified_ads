<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Badge;

use Illuminate\Support\Facades\Auth;


class BadgeController extends Controller
{
	public function badges() {
		$services_dropdown_check = 1; 
		$services = Service::where('user_id', Auth::id() )->get();
		return view('seller.service.service_badges', compact('services'));
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
