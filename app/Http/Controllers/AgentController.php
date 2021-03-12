<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refererlink;
use App\User;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    

    public function agentDashboard(Request $request)
    {

        $agent_code_check = Refererlink::where(['user_id'=>Auth::id()])->first();
        $present_user_id = Auth::user()->id;
        $agent_code_users_count = User::where(['idOfAgent' => $present_user_id])->count();
        $all_my_referals = User::where('idOfAgent', $present_user_id);

        $agent_amount_earned = Auth::user()->refererAmount;


        return view ('agent.dashboard', compact('agent_code_check', 'agent_code_users_count', 'agent_amount_earned'));
        
    }

    public function allReferals()
    {
        $present_user_id = Auth::user()->id;
        $all_my_referals = User::where('idOfAgent', $present_user_id )->orderBy('id', 'desc')->paginate(10);
        return view ('agent.referals.all', compact('all_my_referals') );
    }


    public function viewProfile()
    {
        return view ('agent.profile.update_profile');
    }


    public function allNotifications()
    {
        $all_notifications = Notification::paginate(8);
        return view ('agent.notification.all_notification', compact('all_notifications') );
    }

    public function viewNotification($slug)
    {
        $notification = Notification::where('slug', $slug)->first();
        return view ('agent.notification.view_notification', compact('notification') );
    }
}