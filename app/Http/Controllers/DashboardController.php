<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\Message;
use App\Service;


class DashboardController extends Controller
{

  public function seller()
  {
    $service_count = Service::where('user_id', Auth::id() )->count();

    $all_service = Service::where('user_id', Auth::id() );
    $active_service =  $all_service->Where('status', 1);
    $check_active_service_table = collect($active_service)->isEmpty();
    $active_service_count = $check_active_service_table == true ? 0 : $active_service->count();
    $active_service = $check_active_service_table == true ? 0 : $active_service->take(5)->get();

    $service = Service::where('user_id', Auth::id() );
    $pending_service =  $service->Where('status', 0);
    $check_pending_service_table = collect($pending_service)->isEmpty();
    $pending_service_count = $check_pending_service_table == true ? 0 : $pending_service->count();
    $pending_service = $check_pending_service_table == true ? 0 : $pending_service->take(5)->get();

    return view ('seller.dashboard', compact('service_count', 'pending_service_count', 'active_service_count') );

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
    $seller = User::where('role', 'seller')->take(5)->get();
    $buyer = User::where('role', 'buyer')->take(5)->get();
    $active_service = Service::where('status', 1)->take(5)->get();
    $pending_service = Service::where('status', 0)->take(5);

    return view ('admin.dashboard', compact('all_service_count', 'all_categories_count', 'all_sellers_count', 'all_buyers_count', 'active_service_count', 'pending_service_count', 'category', 'active_service', 'seller', 'buyer'));
    
  }



}
