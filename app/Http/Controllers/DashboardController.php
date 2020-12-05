<?php

namespace App\Http\Controllers;
use App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;


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


public function admin()
{
  $all_service = Service::all()->count();
  $all_categories = Category::all()->count();
  $all_sellers = User::where('role', 'seller')->count();
  $all_buyers = User::where('role', 'buyer')->count();
  $active_service = Service::where('status', 1)->count();
  $pending_service = Service::where('status', 0)->count();
  return view ('admin.dashboard', compact('all_service', 'all_categories', 'all_sellers', 'all_buyers', 'active_service', 'pending_service'));
}

}
