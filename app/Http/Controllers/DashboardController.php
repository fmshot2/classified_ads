<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\Message;
use App\Service;
use App\Notification;
use App\Refererlink;
use App\State;
use App\SubCategory;
use App\UserFeedback;
use Illuminate\Support\Str;



class DashboardController extends Controller
{

  public function seller()
  {
    $service_count = Service::where('user_id', Auth::id() )->count();
    $message_count = Message::where('service_user_id', Auth::id())->count();
    $all_service = Service::where('user_id', Auth::id() )->take(5)->get();
    $unread_notification = Notification::where('status', 0)->orderBy('id', 'desc')->take(5)->get();
    $all_notification_count = Notification::count();

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


    $all_service2 = Service::where('user_id', Auth::id())->get();
    $count_badge =  $all_service2->Where('badge_type', null)->count();
    //$active_service_count = $active_service->count();


    $categories = Category::orderBy('name', 'asc')->get();
    $subcategories = SubCategory::orderBy('name', 'asc')->get();
    $states = State::all();

    $slug3 = Str::random(8);
    // $user->randomLink = $slug3;
    // $referLink = new Refererlink;
    // $referLink->refererlink = $slug3;
    // //$new_user = User::where('id', $serviceDetail_id)->count();
    // $referlink->user_id = Auth::id();
    // $referLink_>save();
    $status = "hghgcc";

$accruedAmount = Auth::user()->refererAmount;

    $linkcheck = Refererlink::where(['user_id'=>Auth::id()])->first();
    if ($linkcheck) {

        return view ('seller.dashboard', compact('service_count', 'pending_service_count', 'active_service_count', 'message_count', 'unread_message', 'unread_message_count', 'read_message', 'read_message_count', 'all_service', 'active_service', 'unread_notification', 'all_notification_count', 'active_service_count', 'all_service2', 'count_badge', 'status', 'linkcheck', 'accruedAmount', 'pending_service', 'categories', 'subcategories', 'states'));

    }else{
     $link = new Refererlink();
     $link->user_id = Auth::id();
     $link->refererlink = $slug3;
     $link->save();
     $user = Auth::user();
     $user->refererLink = $slug3;
     $user->save();
     $linkcheck = Refererlink::where(['user_id'=>Auth::id()])->first();


// $likecheck = Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->first();
//     if ($likecheck) {
//      Like::where(['user_id'=>Auth::id(), 'service_id'=>$id])->delete();
//      $likecount = Like::where(['service_id'=>$id])->count();
//      return redirect()->to('serviceDetail/'.$service_slug);
//         //return response()->json(['success'=>$likecount, 'success2'=>'upvote' ]);
//         //return redirect('/home');
//    }else{
//      $like = new Like();
//      $like->user_id = Auth::id();
//      $like->service_id = $id;
//      $like->save();
//      $likecount = Like::where(['service_id'=>$id])->count();
//      return redirect()->to('serviceDetail/'.$service_slug);
//         //return 'Heyyyyy22222'. $likecount;
//    }

     return view ('seller.dashboard', compact('service_count', 'pending_service_count', 'active_service_count', 'message_count', 'unread_message', 'unread_message_count', 'read_message', 'read_message_count', 'all_service', 'active_service', 'unread_notification', 'all_notification_count', 'active_service_count', 'all_service2', 'count_badge', 'status', 'linkcheck', 'accruedAmount', 'pending_service', 'categories', 'subcategories', 'states'));
           //dd($linkcount);
 }

 // return view ('seller.dashboard', compact('service_count', 'pending_service_count', 'active_service_count', 'message_count', 'unread_message', 'unread_message_count', 'read_message', 'read_message_count', 'all_service', 'active_service', 'unread_notification', 'all_notification_count', 'active_service_count', 'all_service2', 'count_badge') );
}

public function buyer()
{

    $reply_message = Message::where('reply', 'yes' );
    $all_message_count = $reply_message->Where('buyer_id', Auth::id() )->count();

    $reply_message_unread = Message::where('reply', 'yes' );
    $unread_message =   $reply_message_unread->Where('status', 0);
    $check_unread_message_table = collect($unread_message)->isEmpty();
    $unread_message_count = $check_unread_message_table == true ? 0 : $unread_message->count();
    $unread_message = $check_unread_message_table == true ? 0 : $unread_message->orderBy('id', 'desc')->take(5)->get();

    $reply_message_read = Message::where('reply', 'yes' );
    $read_message =  $reply_message_read->Where('status', 1);
    $check_read_message_table = collect($read_message)->isEmpty();
    $read_message_count = $check_read_message_table == true ? 0 : $read_message->count();
    $read_message = $check_read_message_table == true ? 0 : $read_message->orderBy('id', 'desc')->take(5)->get();

    $unread_notification = Notification::where('status', 0)->orderBy('id', 'desc')->take(5)->get();
    $all_notification_count = Notification::count();

    $all_service = Service::take(6)->get();

    return view('buyer.dashboard', compact('unread_message', 'unread_notification', 'all_message_count', 'unread_message_count', 'read_message', 'read_message_count', 'all_notification_count', 'all_service' ));
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
    $feedbacks = UserFeedback::all();

    return view ('admin.dashboard', compact('all_service_count', 'all_categories_count', 'all_sellers_count', 'all_buyers_count', 'active_service_count', 'pending_service_count', 'category', 'active_service', 'seller', 'buyer', 'all_service', 'feedbacks'));
}


public function agent()
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
    $feedbacks = UserFeedback::all();

    return view ('agent.dashboard', compact('all_service_count', 'all_categories_count', 'all_sellers_count', 'all_buyers_count', 'active_service_count', 'pending_service_count', 'category', 'active_service', 'seller', 'buyer', 'all_service', 'feedbacks'));
}

public function make_withdrawal_request($refer_id){
            $seller = User::where('refererlink', $refer_id)->first();
            //dd($seller);
            $seller->requestMade = 1;
            $seller->save();
            return back()->with('success', 'Task was successful!');
            // dd($seller->requestMade);

}

public function approve_withdrawal_request($id){

            $seller = User::where('id', $id)->first();
            if ($seller->requestMade == 2) {
   return back()->with('fail', 'Already Approved!');
            }
            $seller->requestMade = 2;
            $seller->save();
            //dd($seller->requestMade);
            $seller_Request = $seller->requestMade;
            $approval_status = 1;
            // dd($seller_Request);
   return back()->with('status', 'Approval was successful!')->with('seller_Request')->with('approval_status');
            // dd($seller->requestMade);

}



}
