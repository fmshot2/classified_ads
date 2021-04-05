 <?php

namespace App\Http\Livewire\User;

use App\Agent;
use App\Mail\UserRegistered;
use App\Refererlink;
use App\User;
use App\Subscription;
use App\ProviderSubscription;
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


class Register extends Component
{
    public $referParam;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $agent_code;
    public $terms;
    public $refererId;
    public $agent_Id;
    public $current_view;
    public $plan;

    public function mount()
    {
        $this->current_view = 'livewire.user.register';
    }

    protected $listeners = ['verifyPaystackAmount', 'reset_view'];

    public function reset_view()
    {
        $this->current_view = 'livewire.user.register';
    }

    public function validate_form()
    {
        $this->validate([
            'referParam'            => ['nullable', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:6'],
            'role'                  => ['required', Rule::in(['seller', 'buyer'])],
            'agent_code'            => ['nullable', 'exists:agents,agent_code'],
            'terms'                 => ['accepted'],
            'plan'                  => ['required', Rule::in([20000, 120000, 240000])],

        ]);

        $data = [
            'key'    => 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
            'amount' => $this->plan,
            'email'  => $this->email,
            'name'   => $this->name,
        ];

        if ($this->role === 'buyer') {
            $this->save_user();
        }
        $this->dispatchBrowserEvent('pay_with_paystack', ['data' => $data]);
    }

    public function verifyPaystackAmount($paystack_response)
    {
        $response = Http::withHeaders([
            'content-type' => 'application/json',
        ])
            ->withToken('sk_test_11395d522a279cf6fb0f8c6cf0fd7f41b2c15200')
            ->get("https://api.paystack.co/transaction/verify/" . $paystack_response['trxref']);

        $json_resp = $response->json();
        $status    = $json_resp['data']['status'];
        $amount    = $json_resp['data']['amount'];

        // dd($json_resp);

        // $t = (int)($this->plan);
        // dd($status, $amount, $this->plan, $t);
        if ($status === 'success' && ($amount == (int)($this->plan))) {
            $this->save_user($amount);
        } else {
            session()->flash('message', 'there was an error with your payment, please contact admin.');
        }
    }


    public function createSubpay(Request $request)
    {
        $added_days = 0;
        $mytime = Carbon::now();

        // Produces something like "2019-03-11 12:25:00"
        $current_date_time = Carbon::now()->toDateTimeString();
        //
        $added_date_time = Carbon::now()->addDays(5)->toDateTimeString();




        $data = $request->all();



        $this->validate($request, [
            'amount' => 'required',
            'email' => 'required',
        ]);
        $sub_check = ProviderSubscription::where(['user_id' => Auth::id()])->first();
        //  $user_check->badgetype = $data['badge_type'];
        //  $user_check->save();
        if ($data['amount'] == '200') {
            $added_days = 31;
        }
        if ($data['amount'] == '1200') {
            $added_days = 186;
        }
        if ($data['amount'] == '2400') {
            $added_days = 372;
        }

        $sub_check = new ProviderSubscription();
        $sub_check->user_id = Auth::id();
        $sub_check->sub_type = $data['sub_type'];
        $sub_check->user_type = 'provider';
        $sub_check->last_amount_paid = $data['amount'];
        $sub_check->subscription_end_date = Carbon::now()->addDays($added_days);
        $sub_check->last_subscription_starts = $current_date_time;
        $sub_check->save();

        return response()->json(['success' => $sub_check, 'success3' => $current_date_time], 200);
    }





    public function save_user($amount)
    {
        // $request->session()->forget('url.intended');
        // dd((Session::get('url.intended')));
        $slug3 = Str::random(8);

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
            if ($saveIdOfAgent) {
                $this->agent_Id = $saveIdOfAgent->id;
            } else {
                session()->flash('fail', ' Your agent code is incorrect. Please Confirm the correct agent code or register without a code');
                return redirect()->route('home');
                // return   session()->flash('message', 'there was an error with your payment, please contact admin.');
            }
        }

        //save user
        $user           = new User;
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->password = Hash::make($this->password);
        $user->role     = $this->role;
        //save id of referer if user was reffererd
        $user->idOfReferer = $this->refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $this->agent_Id;
        $user->refererLink = $slug3;
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




            // $subscription              = new Subscription();
            // $subscription->user_id     = $present_user->id;
            // $subscription->user_registration_date = $present_user->refererLink;
            // $subscription->save();

            if (Auth::user()->role == 'buyer') {
                return  Redirect::to(session(url()->previous()));
                // dd('sss');
                // return back();

            }


            // 'amount' => $this->plan,
            //    'email'  => $this->email,
            //    'name'   => $this->name,

            // save user's subscription module

            if ($amount == 20000) {
                $added_days = 31;
                $sub_type = 'monthly';
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

            $sub_check = new ProviderSubscription();
            $sub_check->user_id = Auth::id();
            $sub_check->sub_type = $sub_type;
            $sub_check->user_type = 'provider';
            $sub_check->last_amount_paid = $this->plan;
            $sub_check->subscription_end_date = Carbon::now()->addDays($added_days);
            $sub_check->last_subscription_starts = $current_date_time;
            $sub_check->save();


            //level 1 start
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    $referer->refererAmount = $referer->refererAmount + 200;
                    //save my id  as level 1 on the table of the one that reffered me
                    $referer->level1 = Auth::id();
                    $referer->save();

                    $referer->referals()->create(['user_id' => Auth::id()]);
                }
            }

            $agent_that_refered = $present_user->idOfAgent;
            if ($agent_that_refered) {
                $referer2 = Agent::where('id', $agent_that_refered)->first();
                if ($referer2) {
                    $referer2->refererAmount = $referer2->refererAmount + 200;

                    //if my referee is an agent, save my id  as level 1 on the table of the Agent that reffered me
                    $referer2->level1 = Auth::id();
                    $referer2->save();

                    $referer2->referals()->create(['user_id' => Auth::id()]);
                }
            }

            //end level 1 payment


            //start level 2

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {

                    $person_that_refered2 = $referer->idOfReferer;
                    if ($person_that_refered2) {
                        $referer3 = User::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            $referer3->refererAmount = $referer3->refererAmount + 150;
                            $referer3->level2 = Auth::id();
                            $referer3->save();
                            // $present_user->level2 = $referer3->id;
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
                        $referer3 = Agent::where('id', $person_that_refered2)->first();
                        if ($referer3) {
                            $referer3->refererAmount = $referer3->refererAmount + 150;
                            $referer3->level2 = Auth::id();
                            $referer3->save();
                            // $present_user->level2 = $referer3->id;
                        }
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

                                    $person_that_refered4 = $referer4->idOfReferer;

                                    if ($person_that_refered4) {
                                        $referer5 = Agent::where('id', $person_that_refered4)->first();

                                        if ($referer5) {
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
}
