<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;


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

}
