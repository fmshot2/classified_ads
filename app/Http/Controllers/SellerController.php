<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Message;


class SellerController extends Controller
{


    public function createService()
    {
    	return view ('seller.service.create');
    }

    public function storeService(Request $request)
    {
    	return view ('seller.service.create');
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
        $all_message = Message::where('service_user_id', Auth::id() )->orderBy('id', 'desc')->paginate(10);
        return view ('seller.message.all', compact('all_message') );
    }


    public function destroyMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        session()->flash('status', 'Task was successful!');
        return back();
    }

    public function viewMessage($id)
    {
        $message = Message::find($id);
        return view ('seller.message.view_message', compact('message') );
    }

    public function unreadNotification()
    {
        $all_notification = Message::all();
        $unread_notification =  $all_notification->Where('status', 0)->orderBy('id', 'desc')->paginate(10);
        return view ('seller.notification.unread_notification_table', compact('unread_notification') );
    }

    public function activeService()
    {
        $all_service = Service::where('user_id', Auth::id() );
        $active_service =  $all_service->Where('status', 1);
        $check_active_service_table = collect($active_service)->isEmpty();
        $active_service_count = $check_active_service_table == true ? 0 : $active_service->count();
        $active_service = $check_active_service_table == true ? 0 : $active_service->take(5)->get();
        return view ('admin.service.active', compact('active_service') );
    }

}
