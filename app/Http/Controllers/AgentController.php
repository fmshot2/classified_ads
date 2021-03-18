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

        $agent_code_check = Refererlink::where(['user_id'=>Auth::guard('agent')->id()])->first();
        $present_user_id = Auth::guard('agent')->user()->id;
        $agent_code_users_count = User::where(['idOfAgent' => $present_user_id])->count();
        $all_my_referals = User::where('idOfAgent', $present_user_id);

        $agent_amount_earned = Auth::guard('agent')->user()->refererAmount;


        return view ('agent.dashboard', compact('agent_code_check', 'agent_code_users_count', 'agent_amount_earned'));
        
    }

    public function allReferals()
    {
        $present_user_id = Auth::guard('agent')->user()->id;
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

    public function agentRequest(Request $request)
    {
        $data = array(
            'amount_requested' => $request->amount_requested
        );

        $validator = \Validator::make($data, [
            'amount_requested'   => 'required',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }



        $user = Auth::guard('agent');
        $user_total_balance = $user->refererAmount;

        $total_balance = (int)$user_total_balance;
        // dd($total_balance);

        $amount = $request->amount_requested;
        $converted_amount = (int)$amount;


        if($total_balance > 0)
        {
            if($converted_amount >= 1000)
            {
                if($converted_amount <= $total_balance)
                {
                    $payment = new PaymentRequest;

                    $payment->user_id = $user->id;
                    $payment->is_paid = 0;
                    $payment->amount_requested = $request->amount_requested;
                    $payment->user_type = auth()->user()->role;
                    $payment->save();
                    
                    $new_balance = $total_balance - $converted_amount;

                    DB::table('agents')->where('id', '=', $user->id)->update(['refererAmount' => $new_balance]);
                    
                    return redirect()->back()->with('status', 'Your request has been submitted!');


                } else {
                    return redirect()->back()->with('fail', 'You cannot withdraw more than your total balance!');
                }
            } else {
                return redirect()->back()->with('fail', 'Your withdrawal amount is less than ₦1000!');
            }
        } else{

            return redirect()->back()->with('fail', 'You have insufficient balance!');
        }
    }
}