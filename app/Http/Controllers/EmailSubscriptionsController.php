<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Category;
use App\EmailSubscription;
use App\Mail\EarnMoney;
use App\Mail\HowTo;
use App\Mail\Newsletter;
use App\Service;
use App\Siteemaillist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSubscriptionsController extends Controller
{
    public function popularProductServices(Request $request)
    {
        $siteemaillist = Siteemaillist::find(3);

        if ($request->service_category == 'all') {
            $category = "All Category";
            $services = Service::where('status', 1)->where('subscription_end_date', '>', now())->inRandomOrder()->limit(6)->get();

            if ($services->isEmpty()) {
                return redirect()->back()->with([
                    'message' => 'No service available in that category, probably not approved yet!',
                    'alert-type' => 'error'
                ]);
            }
        }
        else {
            $category = Category::find($request->service_category);
            $services = Service::where('status', 1)->where('subscription_end_date', '>', now())->where('category_id', $request->service_category)->inRandomOrder()->limit(6)->get();

            if ($services->isEmpty()) {
                return redirect()->back()->with([
                    'message' => 'No service available in that category, probably not approved yet!',
                    'alert-type' => 'error'
                ]);
            }
        }

        if ($request->user_type == 'all') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                try {
                    Mail::to($subscription->user->email)->send(new Newsletter($subscription->user->name, $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->user->email, $subscription->unique_identifier));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }
        elseif ($request->user_type == 'providers') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                $user = User::where('id', $subscription->user->id)->where('role', 'seller')->first();
                if ($user) {
                    try {
                        Mail::to($user->email)->send(new Newsletter($user->name, $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->email, $subscription->unique_identifier));
                    } catch (\Exception $e) {
                        $failedtosendmail = 'Failed to Mail!.';
                    }
                }
            }
        }
        elseif ($request->user_type == 'seekers') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                $user = User::where('id', $subscription->user->id)->where('role', 'buyer')->first();
                if ($user) {
                    try {
                        Mail::to($subscription->user->email)->send(new Newsletter($user->name, $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->email, $subscription->unique_identifier));
                    } catch (\Exception $e) {
                        $failedtosendmail = 'Failed to Mail!.';
                    }
                }
            }
        }
        elseif ($request->user_type == 'tests') {
            $user = User::find(4);
            $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();

            if (!$checkEmailSubscription) {
                $email = new EmailSubscription();
                $email->name = $siteemaillist->name;
                $email->email = $user->email;
                $email->role = 'Subscriber';
                $email->siteemaillist_id = $siteemaillist->id;
                $email->unique_identifier = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 30);
                $user->emailsubscriptions()->save($email);
            }
            $subscription = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->where('user_id', $user->id)->first();
            try {
                Mail::to('juliana@eftechnology.net')->send(new Newsletter('Juliana', $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->email, $subscription->unique_identifier));
                Mail::to('paul@eftechnology.net')->send(new Newsletter('Paul', $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->email, $subscription->unique_identifier));
                Mail::to('femi@eftechnology.net')->send(new Newsletter('Femo', $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->email, $subscription->unique_identifier));
                Mail::to('adeoluibidapo@gmail.com')->send(new Newsletter('Ibidapo', $category, $request->subject, $request->header_title, $request->intro, $services, $subscription->email, $subscription->unique_identifier));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!.';
            }
        }

        return redirect()->back()->with([
            'message' => 'E-mail has been sent successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function earnExtraMoney(Request $request)
    {
        $siteemaillist = Siteemaillist::find(1);

        if ($request->user_type == 'all') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                try {
                    Mail::to($subscription->user->email)->send(new EarnMoney($subscription->user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->user->unique_identifier));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }
        elseif ($request->user_type == 'providers') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                $user = User::where('id', $subscription->user->id)->where('role', 'seller')->first();
                if ($user) {
                    try {
                        Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->unique_identifier));
                    } catch (\Exception $e) {
                        $failedtosendmail = 'Failed to Mail!.';
                    }
                }
            }
        }
        elseif ($request->user_type == 'seekers') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                $user = User::where('id', $subscription->user->id)->where('role', 'buyer')->first();
                if ($user) {
                    try {
                        Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->unique_identifier));
                    } catch (\Exception $e) {
                        $failedtosendmail = 'Failed to Mail!.';
                    }
                }
            }
        }
        elseif ($request->user_type == 'tests') {
            $user = User::find(4);
            $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();

            if (!$checkEmailSubscription) {
                $email = new EmailSubscription();
                $email->name = $siteemaillist->name;
                $email->email = $user->email;
                $email->role = 'Subscriber';
                $email->siteemaillist_id = $siteemaillist->id;
                $email->unique_identifier = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 30);
                $user->emailsubscriptions()->save($email);
            }
            $subscription = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->where('user_id', $user->id)->first();
            try {
                Mail::to('juliana@eftechnology.net')->send(new EarnMoney('Juliana', $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->unique_identifier));
                Mail::to('paul@eftechnology.net')->send(new EarnMoney('Paul', $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->unique_identifier));
                Mail::to('femi@eftechnology.net')->send(new EarnMoney('Femi', $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->unique_identifier));
                Mail::to('adeoluibidapo@gmail.com')->send(new EarnMoney('Ibidapo', $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link, $subscription->email, $subscription->unique_identifier));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!.';
            }
        }

        return redirect()->back()->with([
            'message' => 'E-mail has been sent successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function howto(Request $request)
    {
        $siteemaillist = Siteemaillist::find(8);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name = $filename . '-' . time() . '.' . $extension;
            $image->move(public_path('uploads/emails/howto'), $file_name);
        }
        else {
            $file_name = 'noimage';
        }

        if ($request->user_type == 'all') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                try {
                    Mail::to($subscription->user->email)->send(new HowTo($subscription->user->name, $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }
        elseif ($request->user_type == 'providers') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                $user = User::where('id', $subscription->user->id)->where('role', 'seller')->first();
                try {
                    Mail::to($user->email)->send(new HowTo($subscription->user->name, $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }

        elseif ($request->user_type == 'seekers') {
            $subscriptions = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->with('user')->get();
            foreach ($subscriptions as $subscription) {
                $user = User::where('id', $subscription->user->id)->where('role', 'buyer')->first();
                try {
                    Mail::to($user->email)->send(new HowTo($subscription->user->name, $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
                } catch (\Exception $e) {
                    $failedtosendmail = 'Failed to Mail!.';
                }
            }
        }
        elseif ($request->user_type == 'tests') {
            $user = User::find(4);
            $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();

            if (!$checkEmailSubscription) {
                $email = new EmailSubscription();
                $email->name = $siteemaillist->name;
                $email->email = $user->email;
                $email->role = 'Subscriber';
                $email->siteemaillist_id = $siteemaillist->id;
                $email->unique_identifier = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 30);
                $user->emailsubscriptions()->save($email);
            }
            $subscription = EmailSubscription::where('siteemaillist_id', $siteemaillist->id)->where('user_id', $user->id)->first();
            try {
                Mail::to('juliana@eftechnology.net')->send(new HowTo('Juliana', $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
                Mail::to('paul@eftechnology.net')->send(new HowTo('Paul', $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
                Mail::to('femi@eftechnology.net')->send(new HowTo('Fem1', $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
                Mail::to('adeoluibidapo@gmail.com')->send(new HowTo('Ibidapo', $subscription->user->email, $subscription->unique_identifier, $request->subject, $request->introduction, $request->message, $file_name));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!.';
            }
        }

        return redirect()->back()->with([
            'message' => 'E-mail has been sent successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function unsubscribe(Request $request)
    {
        $email = $request->email;
        $subcriptionid = $request->subcriptionid;

        $subscription = EmailSubscription::where('unique_identifier', $subcriptionid)->with('user')->first();

        if ($subscription) {
            if ($subscription->delete()) {
                return view('unsubscribe', [
                    'email' => $email
                ]);
            }
            else{
                return redirect()->back()->with([
                    'message' => 'Something went wrong!',
                    'alert-type' => 'error'
                ]);
            }
        }
        else{
            return redirect()->route('home')->with([
                'message' => 'You are not subscribed to this topic anymore!',
                'alert-type' => 'error'
            ]);
        }
    }




    // WILD CARDS
    public function emailSubscribeAllUsersDef(Request $request)
    {
        $users = User::all();
        $siteemaillists = Siteemaillist::all();

        foreach ($users as $user) {
            foreach ($siteemaillists as $siteemaillist) {
                $checkEmailSubscription = EmailSubscription::where('user_id', $user->id)->where('siteemaillist_id', $siteemaillist->id)->first();
                $email = new EmailSubscription();
                $email->name = $siteemaillist->name;
                $email->email = $user->email;
                $email->role = $user->role;
                $email->siteemaillist_id = $siteemaillist->id;
                $email->unique_identifier = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 30);

                if (!$checkEmailSubscription) {
                    $user->emailsubscriptions()->save($email);
                }
            }
        }

        return redirect()->route('home')->with([
            'message' => 'All users has been subscribed!',
            'alert-type' => 'success'
        ]);
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

}
