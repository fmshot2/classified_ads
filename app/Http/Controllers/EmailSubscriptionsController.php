<?php

namespace App\Http\Controllers;

use App\Agent;
use App\EmailSubscription;
use App\Mail\EarnMoney;
use App\Siteemaillist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSubscriptionsController extends Controller
{
    public function earnExtraMoneyEmailSubscribeUsersUI(Request $request)
    {
        $siteemaillists = Siteemaillist::all();

        if ($request->user_type == 'all') {
            $users = User::all();
            foreach ($users as $user) {
                foreach ($siteemaillists as $siteemaillist) {
                    $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();
                    $email = new EmailSubscription();
                    $email->name = $siteemaillist->name;
                    $email->siteemaillist_id = $siteemaillist->id;

                    if (!$checkEmailSubscription) {
                        $user->emailsubscriptions()->save($email);
                    }
                }
            }
        }
        elseif ($request->user_type == 'providers') {
            $users = User::where('role', 'seller')->get();
            foreach ($users as $user) {
                foreach ($siteemaillists as $siteemaillist) {
                    $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();
                    $email = new EmailSubscription();
                    $email->name = $siteemaillist->name;
                    $email->siteemaillist_id = $siteemaillist->id;

                    if (!$checkEmailSubscription) {
                        $user->emailsubscriptions()->save($email);
                    }
                }
            }
        }

        elseif ($request->user_type == 'seekers') {
            $users = User::where('role', 'buyer')->get();
            foreach ($users as $user) {
                foreach ($siteemaillists as $siteemaillist) {
                    $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();
                    $email = new EmailSubscription();
                    $email->name = $siteemaillist->name;
                    $email->siteemaillist_id = $siteemaillist->id;

                    if (!$checkEmailSubscription) {
                        $user->emailsubscriptions()->save($email);
                    }
                }
            }
        }
        elseif ($request->user_type == 'agents') {
            $users = Agent::all();
            foreach ($users as $user) {
                try {
                    Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }

        return redirect()->back()->with([
            'message' => 'E-mail has been sent successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function emailSubscribeAllUsersDef(Request $request)
    {
        $users = User::all();
        $siteemaillists = Siteemaillist::all();

        foreach ($users as $user) {
            foreach ($siteemaillists as $siteemaillist) {
                $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();
                $email = new EmailSubscription();
                $email->name = $siteemaillist->name;
                $email->siteemaillist_id = $siteemaillist->id;

                if (!$checkEmailSubscription) {
                    $user->emailsubscriptions()->save($email);
                }
            }
        }
        return 'You\'ve Subscription was successful';
    }

    public function emailSubscription(Request $request)
    {
        $siteemaillist = Siteemaillist::find(1);
        $users = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->get();

        foreach ($users as $user) {
            try {
                Mail::to($user->user->email)->send(new EarnMoney($user->user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $request->link));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!.';
            }
        }
        return 'You\'ve Subscription was successful';
    }

    public function unsubscribe(Request $request)
    {
        $request->id;
        $request->email_id;
    }
}
