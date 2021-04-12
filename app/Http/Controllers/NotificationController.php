<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Notifications\GeneralNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
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

    public function notificationMarkAsRead(Request $request)
    {
        $notification = DatabaseNotification::where('id', $request->notification_id)->first();
        $notification->read_at = Carbon::now()->toDateString();

        if ($notification->save()) {
            return response()->json([
                'success' => 'Notification Marked As Read!'
            ]);
        }

        return response()->json([
            'success' => 'Notification Couldn\'t Mark Read!'
        ]);
    }

    public function notificationDelete(Request $request)
    {
        $notification = DatabaseNotification::where('id', $request->notification_id)->first();

        if ($notification->delete()) {
            return response()->json([
                'success' => 'Notification Deleted!'
            ]);
        }

        return response()->json([
            'error' => 'Notification Couldn\'t Deleted!'
        ]);
    }
}
