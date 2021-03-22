<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Notifications\GeneralNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    public function GeneralNofications(Request $request)
    {
        if ($request->user_type == 'all') {
            $users = User::all();
        }
        elseif($request->user_type == 'agent'){
            $users = Agent::all();
        }
        else{
            $users = User::where('role', $request->user_type)->get();
        }

        $notification = $request->all();
        Notification::send($users, new GeneralNotification($notification));

        return redirect()->back()->with([
            'message' => 'Notification sent!',
            'alert-type' => 'success'
        ]);
    }

    public function notificationMarkAsAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back()->with([
            'message' => 'All Notifications Marked as Read!',
            'alert-type' => 'success'
        ]);
    }
}
