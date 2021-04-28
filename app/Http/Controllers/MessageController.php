<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class MessageController extends Controller
{
    public function store(Request $request)
    {

        $message = new Message();
        $message->message = $request->message;
        $message->receiver_id = $request->receiver_id;
        $message->sender_name = $request->sender_name;
        $message->sender_phone = $request->sender_phone;
        $message->sender_email = $request->sender_email;
        $message->service_id = $request->service_id;
        $message->slug = Str::random(6);
        $message->user()->associate($request->user());

        $user = User::find($request->user()->id);
        $user->messages()->save($message);

        return $message;
     }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        $reply = new Message();
        $reply->message = $request->message;
        $reply->receiver_id = $request->receiver_id;
        $reply->sender_name = $request->sender_name;
        $reply->sender_phone = $request->sender_phone;
        $reply->sender_email = $request->sender_email;
        $reply->service_id = $request->service_id;
        $reply->parent_id = $request->message_id;
        $reply->slug = Str::random(6);
        $reply->user()->associate($request->user());

        $user = User::find($request->user()->id);
        $user->messages()->save($reply);

        return redirect()->back()->with([
            'message' => 'Reply sent successfully!',
            'alert-type' => 'success'
        ]);
    }






    public function unreadMessage()
    {
    $all_message = Message::where('service_user_id', Auth::id() );
    $unread_message =  $all_message->Where('status', 0)->orderBy('id', 'desc')->paginate(10);
    return view ('seller.message.unread', compact('unread_message') );
    }

    public function readMessage()
    {
        $all_message = Message::where('service_user_id', Auth::id() );
        $read_message =  $all_message->Where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return view ('seller.message.read', compact('read_message') );
    }

    public function allMessage()
    {
        $all_message = Message::where('buyer_id', Auth::id())->orwhere('service_user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view ('seller.message.all', compact('all_message') );
    }


    public function destroyMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        session()->flash('status', 'Task was successful!');
        return back();
    }

    public function viewMessage($slug)
    {
        $message = Message::where('slug', $slug)->first();
        $message->status = 1;
        $message->save();
        return view ('seller.message.view_message', compact('message') );
    }

    public function MessageController($slug)
    {
        $message = Message::where('slug', $slug)->first();
        return view ('seller.message.reply_message', compact('message') );
    }



}
