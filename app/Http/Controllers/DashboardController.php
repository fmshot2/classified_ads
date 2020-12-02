<?php

namespace App\Http\Controllers;
use App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    
    public function seller()
    {
    	return view ('seller.index');
    }
    
    public function buyer()
    {
    	return view ('buyer.index');
    }

    public function adminDashboard()

    {
        $user_id = Auth::id();
        $services = Service::where( 'user_id', $user_id)->get();
    	if($serviceNo = Service::where( 'user_id', $user_id)->get()->count()){
    		$serviceNu = $serviceNo;
    	} else {
    		$serviceNu = 0;
    	}
    		//$properties = property::where('isPublished',1)->get();
    	return view('seller.adminDashboard', compact('serviceNu', 'services'));   	
    	

    }


}
