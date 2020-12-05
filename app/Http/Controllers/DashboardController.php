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
  $all_service_count = Service::all()->count();
  $all_categories_count = Category::all()->count();
  $all_sellers_count = User::where('role', 'seller')->count();
  $all_buyers_count = User::where('role', 'buyer')->count();
  $active_service_count = Service::where('status', 1)->count();
  $pending_service_count = Service::where('status', 0)->count();

  $all_service = Service::take(5)->get();
  $category = Category::orderBy('id', 'desc')->take(5)->get();
  $all_sellers = User::where('role', 'seller')->take(5);
  $all_buyers = User::where('role', 'buyer')->take(5);
  $active_service = Service::where('status', 1)->take(5);
  $pending_service = Service::where('status', 0)->take(5);




  return view ('admin.dashboard', compact('all_service_count', 'all_categories_count', 'all_sellers_count', 'all_buyers_count', 'active_service_count', 'pending_service_count', 'category', 'active_service', 'all_sellers'));



}



}
