<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\Notification;
use Illuminate\Support\Str;

class BuyerController extends Controller
{

  public function allService()
  {
    $all_service = Service::where('status', 1)->where('subscription_end_date', '>', now())->get();
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
    $all_received_messages = Message::where('receiver_id', Auth::id())->orderBy('created_at', 'desc')->get();
    $all_sent_messages = Message::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
  return view ('buyer.message.all', compact('all_received_messages', 'all_sent_messages'));
}

public function allNotification()
{
  $all_notification = auth()->user()->notifications;
  return view ('buyer.notification.all_notification', compact('all_notification') );
}

public function viewProfile()
{
  return view ('buyer.profile.update_profile');
}

public function viewMessage($slug)
{
  $message = Message::where('slug', $slug)->first();
  $message->status = 1;
  $message->save();
  return view ('buyer.message.view_message', compact('message') );
}

public function replyMessage($slug)
{
  $message = Message::where('slug', $slug)->first();
  return view ('buyer.message.reply_message', compact('message') );
}

public function storeReplyMessage(Request $request)
{
  $validatedData = $request->validate([
    'description' => 'required|max:255',
  ]);

  $slug = Str::random(3);

  $message = New Message();
  $message->subject = $request->subject;
  $message->description = $request->description;
  $message->service_id = $request->service_id;
  $message->service_user_id = $request->service_user_id;
  $message->buyer_name = Auth::user()->name;
  $message->buyer_email = Auth::user()->email;
  $message->buyer_id = $request->buyer_id;
  $message->reply = 'yes';
  $message->phone = $request->phone;
  $message->slug = $slug;

  if ($message->save()) {
    $request->session()->flash('status', 'Your reply was sent successfully!');
    return redirect()->back();
  }
    return redirect()->back()->with([
        'meesage' => 'Something went wrong!',
        'alert-type' => 'error'
    ]);

}

}
