<?php

namespace App\Http\Livewire\User;

use App\Agent;
use App\Mail\UserRegistered;
use App\Refererlink;
use App\User;
use App\Subscription;
use App\ProviderSubscription;
use App\Payment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Config;
use Illuminate\Http\Request;
use App\Traits\ReusableCode;



class Register extends Component
{
    use ReusableCode;

    public $referParam;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $role;
    public $agent_code;
    public $terms;
    public $refererId;
    public $agent_Id;
    public $current_view;
    public $plan;
    public $passwordType = 'password';


    public function mount()
    {
        $this->current_view = 'livewire.user.register';
    }

    protected $listeners = ['verifyPaystackAmount', 'reset_view'];

    public function reset_view()
    {
        $this->current_view = 'livewire.user.register';
    }

    public function showPassword()
    {
        if ($this->passwordType == 'password') {
            $this->passwordType = 'text';
        }
        else{
            $this->passwordType = 'password';
        }
    }

    public function validate_form()
    {
        $this->validate([
            'referParam'            => ['nullable', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'                 => ['required', 'numeric'],
            'password'              => ['required', 'string', 'min:6'],
            'role'                  => ['required', Rule::in(['seller', 'buyer'])],
            // 'agent_code'            => ['nullable', 'exists:agents,agent_code'],
            'agent_code'            => ['nullable', 'string'],
            'terms'                 => ['accepted'],
            'plan'                  => ['nullable', Rule::in([200, 600, 1200, 2400])],

        ]);

        $data = [
            // $url = config('example.url');

            // 'key'    => 'pk_live_8921deda409e1196f265fd3a7dcc4eff81d52cdb',
            // 'key'    => 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',


            //test variable from env
            // 'key'    => config('variable.paystack_pk_test'),
            // 'key'    => config('variable.paystack_pk_live'),


            // live variable
            // 'key'    => config('variable.paystack_pk_live'),
            // 'key'    => 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
            'key'    => env('paystack_pk'),
            'amount' => $this->plan * 100,
            'email'  => $this->email,
            'name'   => $this->name,
        ];

        if ($this->role === 'buyer') {
            $this->save_buyer();
        }

        $this->dispatchBrowserEvent('pay_with_paystack', ['data' => $data]);
    }

    public function verifyPaystackAmount($paystack_response)
    {
        // $paystack_sk    = 'sk_test_11395d522a279cf6fb0f8c6cf0fd7f41b2c15200';
        $paystack_sk    = env('paystack_sk');


        $response = Http::withHeaders([
            'content-type' => 'application/json',
        ])
        // ->withToken('sk_live_567bac30399617933d4403048429bcfbd565cba1')
        // ->withToken('sk_test_11395d522a279cf6fb0f8c6cf0fd7f41b2c15200')

        ->withToken($paystack_sk)
        ->get("https://api.paystack.co/transaction/verify/" . $paystack_response['trxref']);

        $json_resp = $response->json();
        $status    = $json_resp['data']['status'];
        $amount    = $json_resp['data']['amount'];

        // dd($json_resp);

        // $t = (int)($this->plan);
        // dd($status, $amount, $this->plan, $t);
        if ($status === 'success' && ($amount == (int)($this->plan * 100))) {
            $this->save_user($amount, $paystack_response['trxref']);
        } else {
            session()->flash('message', 'there was an error with your payment, please contact admin.');
        }
    }


    // public function store(Request $request)
    // {
    //     $product = new Product;
    //     $product->title = $request->title;
    //     $product->slug = $this->createSlug($request->title);
    //     $product->save();
    // }
    // public function createSlug($name, $id = 0)
    // {
    //     // $slug = str_slug($this->name);
    //     $slug = Str::of($this->name)->slug('-');
    //     $allSlugs = $this->getRelatedSlugs($slug, $id);
    //     if (! $allSlugs->contains('slug', $slug)){
    //         return $slug;
    //     }

    //     $i = 1;
    //     $is_contain = true;
    //     do {
    //         $newSlug = $slug . '-' . $i;
    //         if (!$allSlugs->contains('slug', $newSlug)) {
    //             $is_contain = false;
    //             return $newSlug;
    //         }
    //         $i++;
    //     } while ($is_contain);
    // }
    // protected function getRelatedSlugs($slug, $id = 0)
    // {
    //     return User::select('slug')->where('slug', 'like', $slug.'%')
    //     ->where('id', '<>', $id)
    //     ->get();
    // }

    public function save_user($amount, $tranxRef)
    {
        // $request->session()->forget('url.intended');
        $slug3 = Str::random(8);
        $random = Str::random(3);
        $userSlug = Str::of($this->name)->slug('-').''.$random;


        // $length = strlen(utf8_decode($this->agent_code));
        // if (strlen(utf8_decode($this->agent_code)) >= 8) {
        //     $this->agent_code = $this->referParam;
        // }

        // Get id of owner of $link_from_url if available
        if ($this->referParam) {
            $saveIdOfRefree = User::where('refererLink', $this->referParam)->first();
            if ($saveIdOfRefree) {
                $this->refererId = $saveIdOfRefree->id;
            } else {
                session()->flash('fail', ' The referer link used is incorrect. Please Confirm the correct link or register without a link');
                return redirect()->route('home');
            }
        }

        // Get id of owner of $agent code if available
        if ($this->agent_code) {
            $saveIdOfAgent = Agent::where('agent_code', $this->agent_code)->first();
            $saveIdOfRefree = User::where('refererLink', $this->agent_code)->first();
            if ($saveIdOfAgent) {
                $this->agent_Id = $saveIdOfAgent->id;
            } elseif ($saveIdOfRefree) {
                $this->refererId = $saveIdOfRefree->id;
            }else {
                session()->flash('fail', ' Your referer code is incorrect. Please Confirm the correct code or register without a code');
                return redirect()->route('home');
                // return   session()->flash('message', 'there was an error with your payment, please contact admin.');
            }
        }


        //save user
        $user           = new User;
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->phone    = $this->phone;
        $user->password = Hash::make($this->password);
        $user->role     = $this->role;
        //old slug creation
        // $user->slug     = $userSlug;
        //end old slug creation
        $user->slug     = $this->createSlug($this->name, new User());
        //save id of referer if user was reffererd
        $user->idOfReferer = $this->refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $this->agent_Id;
        $user->refererLink = $this->createRefererLink(new User());
        //send mail

        if ($user->save()) {
            session()->forget('current_param');

            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $this->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
                Auth::attempt(['email' => $this->email, 'password' => $this->password]);
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }



        if (Auth::check()) {
            $present_user = Auth::user();
            // if referrer link is available, save it to referer table
            $link              = new Refererlink();
            $link->user_id     = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            if (Auth::user()->role == 'buyer') {
                return  Redirect::to(session(url()->previous()));
            }
            // save user's subscription module

            if ($amount == 20000) {
                $added_days = 31;
                $sub_type = 'monthly';
            }elseif ($amount == 60000) {
                $added_days = 93;
                $sub_type = '3 months';
            } elseif ($amount == 120000) {
                $added_days = 186;
                $sub_type = 'bi-annual';
            } elseif ($amount == 240000) {
                $added_days = 372;
                $sub_type = 'yearly';
            } else {
                $added_days = 0;
                $sub_type = null;
            }

            $current_date_time = Carbon::now()->toDateTimeString();

            // $sub_check = new ProviderSubscription();
            // $sub_check->user_id = Auth::id();
            // $sub_check->sub_type = $sub_type;
            // $sub_check->user_type = 'provider';
            // $sub_check->last_amount_paid = $this->plan;
            // $sub_check->subscription_end_date = Carbon::now()->addDays($added_days);
            // $sub_check->last_subscription_starts = $current_date_time;
            // $sub_check->save();


            Auth::user()->subscriptions()->create(['sub_type' => $sub_type,
             'last_amount_paid' => $this->plan,
             'subscription_end_date' => Carbon::now()->addDays($added_days),
         // 'last_subscription_starts' => $current_date_time,
             'trans_ref' => $tranxRef,
             'email' => Auth::user()->email ]);

            // $reg_payments = new Payment();
            // $reg_payments->user_id = Auth::id();
            // $reg_payments->payment_type = 'registration';
            // $reg_payments->amount = $this->plan;
            // $reg_payments->tranx_ref = $tranxRef;
            // $reg_payments->save();

            Auth::user()->mypayments()->create(['payment_type' => 'registration', 'amount' => $this->plan, 'tranx_ref' => $tranxRef ]);


            //level 1 start
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $referer->referals()->create(['user_id' => Auth::id()]);
                 //save my id  as level 1 on the table of the one that reffered me
                    $referer->level1 = Auth::id();
                    $referer->save();

                    //if your refferer is an efmarketer staff, redirect user to dashboard
                    if ($referer->is_ef_marketer) {

                        if (Auth::user()->role == 'seller') {
                            return redirect()->route('seller.dashboard');
                        } else if (Auth::user()->role == 'buyer') {
                            return  Redirect::to(Session::get('url.intended'));
                        } else {
                            return redirect()->route('admin.dashboard');
                        }
                    }

                    $referer->refererAmount = $referer->refererAmount + 200;
                    $referer->save();

                }
            }

            $agent_that_refered = $present_user->idOfAgent;
            if ($agent_that_refered) {
                $referer2 = Agent::where('id', $agent_that_refered)->first();
                if ($referer2) {
                    //if my referee is an agent, save my id  as level 1 on the table of the Agent that reffered me
                    $referer2->level1 = Auth::id();
                    $referer2->save();

                    $referer2->referals()->create(['user_id' => Auth::id()]);

                    //if your agent is an efmarketer staff, redirect user to dashboard
                    if ($referer2->is_ef_marketer) {

                        if (Auth::user()->role == 'seller') {
                            return redirect()->route('seller.dashboard');
                        } else if (Auth::user()->role == 'buyer') {
                            return  Redirect::to(Session::get('url.intended'));
                        } else {
                            return redirect()->route('admin.dashboard');
                        }
                    }
                    $referer2->refererAmount = $referer2->refererAmount + 200;
                    $referer2->save();
                }
            }

            //end level 1 payment

   //start level 2

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer2 = User::where('id', $person_that_refered2)->first();
                        if ($referer2) {
                            if ($referer2->level2) {

                                if (Auth::user()->role == 'seller') {
                                    return redirect()->route('seller.dashboard');
                                } else if (Auth::user()->role == 'buyer') {
                                    return  Redirect::to(Session::get('url.intended'));
                                } else {
                                    return redirect()->route('admin.dashboard');
                                }
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = Auth::id();
                            $referer2->save();
                            // $present_user->level2 = $referer3->id;                    }
                        }
                    }
                }
            }

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $person_that_refered2 = $referer->idOfAgent;
                    if ($person_that_refered2) {
                        $referer2 = Agent::where('id', $person_that_refered2)->first();
                        if ($referer2) {
                            if ($referer2->level2) {
                                if (Auth::user()->role == 'seller') {
                                    return redirect()->route('seller.dashboard');
                                } else if (Auth::user()->role == 'buyer') {
                                    return  Redirect::to(Session::get('url.intended'));
                                } else {
                                    return redirect()->route('admin.dashboard');
                                }
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = Auth::id();
                            $referer2->save();
                            // $present_user->level2 = $referer3->id;                    }
                        }

                            // $present_user->level2 = $referer3->id;
                    }
                }
            }
            //end level 2 payment


            //start level 3
            //level 1 referer id
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                //level 1 referer
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //level 2 referer id
                    $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            //level 3 referer id
                            $person_that_refered3 = $referer3->idOfReferer;
                            if ($person_that_refered3) {
                                //level 3 referer
                                $referer4 = User::where('id', $person_that_refered3)->first();
                                if ($referer4) {
                                 if($referer4->level3) {
                                   if (Auth::user()->role == 'seller') {
                                    return redirect()->route('seller.dashboard');
                                } else if (Auth::user()->role == 'buyer') {
                                    return  Redirect::to(Session::get('url.intended'));
                                }
                            }

                            // add amount to level 3 referer amount
                            $referer4->refererAmount = $referer4->refererAmount + 100;
                            $referer4->level3 = Auth::id();
                            $referer4->save();
                                    // $present_user->level2 = $referer3->id;
                        }
                    }
                }
            }
        }
    }

            //level 1 referer id
    $person_that_refered = $present_user->idOfReferer;
    if ($person_that_refered) {
                //level 1 referer
        $referer = User::where('id', $person_that_refered)->first();
        if ($referer) {
                    //level 2 referer id
            $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
            if ($person_that_refered2) {
                $referer3 = User::where('id', $person_that_refered2)->first();
                if ($referer3) {
                            //level 3 agent id
                    $person_that_refered3 = $referer3->idOfAgent;
                    if ($person_that_refered3) {
                                //level 3 agent
                        $referer4 = Agent::where('id', $person_that_refered3)->first();
                        if ($referer4) {
                         if($referer4->level3) {
                           if (Auth::user()->role == 'seller') {
                            return redirect()->route('seller.dashboard');
                        } else if (Auth::user()->role == 'buyer') {
                            return  Redirect::to(Session::get('url.intended'));
                        }
                    }

                                    // add amount to level 3 referer amount
                    $referer4->refererAmount = $referer4->refererAmount + 100;
                    $referer4->level3 = Auth::id();
                    $referer4->save();
                    // $present_user->level2 = $referer3->id;
                }
            }
        }
    }
}
}
            //end level 3 payment


            //start level 4 payment

            //level 1 referer id
$person_that_refered = $present_user->idOfReferer;
if ($person_that_refered) {
                //level 1 referer
    $referer = User::where('id', $person_that_refered)->first();
    if ($referer) {
                    //level 2 referer id
        $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
        if ($person_that_refered2) {
            $referer3 = User::where('id', $person_that_refered2)->first();
            if ($referer3) {
                            //level 3 referer id
                $person_that_refered3 = $referer3->idOfReferer;
                if ($person_that_refered3) {
                                //level 3 referer
                    $referer4 = User::where('id', $person_that_refered3)->first();
                    if ($referer4) {

                        $person_that_refered4 = $referer4->idOfReferer;

                        if ($person_that_refered4) {
                            $referer5 = User::where('id', $person_that_refered4)->first();
                            if ($referer5) {

                                if ($referer5->level4) {
                                   if (Auth::user()->role == 'seller') {
                                    return redirect()->route('seller.dashboard');
                                } else if (Auth::user()->role == 'buyer') {
                                    return  Redirect::to(Session::get('url.intended'));
                                }
                            }

                                            // add amount to level 4 referer amount
                            $referer5->refererAmount = $referer5->refererAmount + 50;
                            $referer5->level4 = Auth::id();
                            $referer5->save();
                                            // $present_user->level2 = $referer3->id;
                        }
                    }

                }
            }
        }
    }
}
}

            //level 1 referer id
$person_that_refered = $present_user->idOfReferer;
if ($person_that_refered) {
                //level 1 referer
    $referer = User::where('id', $person_that_refered)->first();
    if ($referer) {
                    //level 2 referer id
        $person_that_refered2 = $referer->idOfReferer;
                    //level 2 referer
        if ($person_that_refered2) {
            $referer3 = User::where('id', $person_that_refered2)->first();
            if ($referer3) {
                            //level 3 referer id
                $person_that_refered3 = $referer3->idOfReferer;
                if ($person_that_refered3) {
                                //level 3 referer
                    $referer4 = User::where('id', $person_that_refered3)->first();
                    if ($referer4) {

                        $person_that_refered4 = $referer4->idOfAgent;

                        if ($person_that_refered4) {
                            $referer5 = Agent::where('id', $person_that_refered4)->first();

                            if ($referer5) {
                               if($referer5->level4) {
                                   if (Auth::user()->role == 'seller') {
                                    return redirect()->route('seller.dashboard');
                                } else if (Auth::user()->role == 'buyer') {
                                    return  Redirect::to(Session::get('url.intended'));
                                }
                            }

                                            // add amount to level 4 referer amount
                            $referer5->refererAmount = $referer5->refererAmount + 50;
                            $referer5->level4 = Auth::id();
                            $referer5->save();
                                            // $present_user->level2 = $referer3->id;
                        }
                    }
                }
            }
        }
    }
}
}

            // end level 4 payment


if (Auth::user()->role == 'seller') {
    return redirect()->route('seller.dashboard');
} else if (Auth::user()->role == 'buyer') {
    return  Redirect::to(Session::get('url.intended'));
} else {
    return redirect()->route('admin.dashboard');
}
}
}

public function render()
{
    return view($this->current_view);
}



public function save_buyer(){
     //save user


    $slug3 = Str::random(8);
    $random = Str::random(3);
    $userSlug = Str::of($this->name)->slug('-').''.$random;

    $user           = new User;
    $user->name     = $this->name;
    $user->email    = $this->email;
    $user->password = Hash::make($this->password);
    $user->role     = $this->role;
    $user->slug     = $userSlug;
    //save id of referer if user was reffererd
    $user->idOfReferer = $this->refererId;
    //save id of agent if user was brought by agent
    $user->idOfAgent = $this->agent_Id;
    // $user->refererLink = $slug3;
    //send mail

    if ($user->save()) {
        $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
        $name         = $user->name;
        $email        = $user->email;
        $origPassword = $this->password;
        $userRole     = $user->role;

        try {
            Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
            Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        } catch (\Exception $e) {
            $failedtosendmail = 'Failed to Mail!';
        }
    }

    if (Auth::check()) {
        $present_user = Auth::user();
            // if referrer link is available, save it to referer table
        $link              = new Refererlink();
        $link->user_id     = $present_user->id;
        $link->refererlink = $present_user->refererLink;
        $link->save();

        if (Auth::user()->role == 'buyer') {
            return  Redirect::to(session(url()->previous()));
        }
    }
}

}
