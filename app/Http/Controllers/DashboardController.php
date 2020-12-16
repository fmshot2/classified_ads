<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\Message;
use App\Service;
use App\Notification;


class DashboardController extends Controller
{

  public function seller()
  {
    $service_count = Service::where('user_id', Auth::id() )->count();
    $message_count = Message::where('service_user_id', Auth::id())->count();
    $all_service = Service::where('user_id', Auth::id() )->take(5)->get();
    $unread_notification = Notification::where('status', 0)->orderBy('id', 'desc')->take(5)->get();

    $all_service_active = Service::where('user_id', Auth::id() );
    $active_service =  $all_service_active->Where('status', 1);
    $check_active_service_table = collect($active_service)->isEmpty();
    $active_service_count = $check_active_service_table == true ? 0 : $active_service->count();
    $active_service = $check_active_service_table == true ? 0 : $active_service->take(5)->get();

    $service = Service::where('user_id', Auth::id() );
    $pending_service =  $service->Where('status', 0);
    $check_pending_service_table = collect($pending_service)->isEmpty();
    $pending_service_count = $check_pending_service_table == true ? 0 : $pending_service->count();
    $pending_service = $check_pending_service_table == true ? 0 : $pending_service->take(5)->get();

    $all_message = Message::where('service_user_id', Auth::id() );
    $unread_message =  $all_message->Where('status', 0);
    $check_unread_message_table = collect($unread_message)->isEmpty();
    $unread_message_count = $check_unread_message_table == true ? 0 : $unread_message->count();
    $unread_message = $check_unread_message_table == true ? 0 : $unread_message->orderBy('id', 'desc')->take(5)->get();

    $message = Message::where('service_user_id', Auth::id() );
    $read_message =  $message->Where('status', 1);
    $check_read_message_table = collect($read_message)->isEmpty();
    $read_message_count = $check_read_message_table == true ? 0 : $read_message->count();
    $read_message = $check_read_message_table == true ? 0 : $read_message->orderBy('id', 'desc')->take(5)->get();


    return view ('seller.dashboard', compact('service_count', 'pending_service_count', 'active_service_count', 'message_count', 'unread_message', 'unread_message_count', 'read_message', 'read_message_count', 'all_service', 'active_service', 'unread_notification') );

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
