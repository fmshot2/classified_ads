<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Message;
use\App\Category;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\Notification;

class BuyerController extends Controller
{

  public function allService()
  {
    $all_service = Service::paginate(10);
    return view ('buyer.service.index', compact('all_service') );
  }

  public function unreadMessage()
  {

   $reply_message = Message::where('reply', 'yes' );
   $all_message = $reply_message->Where('buyer_id', Auth::id() );
   $unread_message =  $all_message->Where('status', 0)->orderBy('id', 'desc')->paginate(10);
   return view ('buyer.message.unread', compact('unread_message') );
 }

 public function readMessage()
 {
   $reply_message = Message::where('reply', 1 );
   $all_message = $reply_message->Where('buyer_id', Auth::id() );
   $read_message =  $all_message->Where('status', 1)->orderBy('id', 'desc')->paginate(10);
   return view ('buyer.message.read', compact('read_message') );
 }

 public function allMessage()
 {

  $reply_message = Message::where('reply', 1 );
  $all_message = $reply_message->Where('buyer_id', Auth::id() )->orderBy('id', 'desc')->paginate(10);
  return view ('buyer.message.all', compact('all_message') );
}

public function allNotification()
{
  $all_notification = Notification::paginate(8);
  return view ('buyer.notification.all_notification', compact('all_notification') );
}

public function viewProfile()
{
  return view ('buyer.profile.update_profile');
}

}