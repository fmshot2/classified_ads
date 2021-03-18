<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Mail\AgentRegistration;
use Illuminate\Http\Request;
use App\User;
use App\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\UserRegistered;
use App\Refererlink;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{

    public function show_agent_Login(Request $request)
    {
        $request->session()->forget('url.intended');
        session(['url.intended' => url()->previous()]);

        if (Auth::guard('agent')->check()) {
            return view('welcome');
        }
        return view('auth/agent_login');
    }

    public function agent_login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        $status = Auth::guard('agent')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        );
        // dd($status);

        //Check login
        if (Auth::guard('agent')->check()) {
            $success_notification = array(
                'message' => 'You are successfully logged in!',
                'alert-type' => 'success'
            );
            return redirect()->route('agent.dashboard')->with($success_notification);
        } else {
            return Redirect::to(Session::get('url.intended'));
        }
    }



    public function createAgent(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
        ]);

        //save agent details
        $user = new Agent;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->save()) {
            $messages = "$user->name, Your registration was successfull! Please click the link below to complete your registration!";
            $name = $user->name;
            $email = $user->email;
            $userRole = 'Agent';

            // try {
            Mail::to($user->email)->send(new AgentRegistration($messages, $name, $email, $userRole));
            // } catch (\Exception $e) {
            // $failedtosendmail = 'Failed to Mail!';
            // }
            $success_notification = array(
                'message' => 'Please check your email for verification link',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }
    }

    public function agent_Complete_Reg_page(Request $request)
    {
        $param = $request->input('email');
        $email_param = Str::replaceLast('%40', '@', $param);
        $states = State::all();

        if ($email_param) {
            $agent = Agent::where('email', $email_param)->first();
            $agent_email = $agent->email;
            $agent_name = $agent->name;
        } else {
            $agent_email = null;
        }
        return view('auth.register_agent2', compact('agent_email', 'agent_name', 'states'));
    }

    public function agent_save_complete_reg(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            // 'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            // 'phone'    => ['required', 'numeric', 'unique:users'],
            'phone'    => ['required', 'numeric'],
            'state'    => ['string'],
            // 'lga'      => ['string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        $state = $request->state;
        $result = substr($state, 0, 3);
        $ist_3_result = strtoupper($result);
        $randomCode = Str::random(4);
        $length = 1;
        $last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
        $code = $ist_3_result . $randomCode . $last_letter;
        //save agent details

        //pay with GTPay
        $gtpay_mert_id        = 14264;
        $gtpay_tranx_id       = $this->gen_transaction_id();
        $gtpay_tranx_amt      = 1 * 100;
        $gtpay_tranx_curr     = 566;
        $gtpay_cust_id        = '1';
        $gtpay_tranx_noti_url = url('create_agent');
        $gtpay_cust_name      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $state . '{?#?#}' . $request->phone . '{?#?#}' . $code;
        $gtpay_tranx_memo     = 'Mobow';
        $gtpay_echo_data      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $state . '{?#?#}' . $request->phone . '{?#?#}' . $code;
        $gtpay_no_show_gtbank = 'yes';
        $gtpay_gway_name      = 'etranzact';
        $hashkey              = '3EBF9CF6D082C89F88490B01D072B0F4E1EE52E86EC731D9B49538F33B551D486AB70673FE1B876B94EF76EC5E0AA1D3D14BA933424037FB1219662AFAB8FF51';
        $gtpay_hash           = $gtpay_mert_id . $gtpay_tranx_id . $gtpay_tranx_amt . $gtpay_tranx_curr . $gtpay_cust_id . $gtpay_tranx_noti_url . $hashkey;
        $hashed               = hash('sha512', $gtpay_hash);
        $gtPay_Data = [
            'gtpay_mert_id'        => $gtpay_mert_id,
            'gtpay_tranx_id'       => $gtpay_tranx_id,
            'gtpay_tranx_amt'      => $gtpay_tranx_amt,
            'gtpay_tranx_curr'     => $gtpay_tranx_curr,
            'gtpay_cust_id'        => $gtpay_cust_id,
            'gtpay_tranx_noti_url' => $gtpay_tranx_noti_url,
            'gtpay_cust_name'      => $gtpay_cust_name,
            'gtpay_tranx_memo'     => $gtpay_tranx_memo,
            'gtpay_echo_data'      => $gtpay_echo_data,
            'gtpay_no_show_gtbank' => $gtpay_no_show_gtbank,
            'gtpay_gway_name'      => $gtpay_gway_name,
            'hashkey'              => $hashkey,
            'hashed'               => $hashed
        ];

        return view('gttPayView_4_agent', $gtPay_Data);
    }


    public function create_agent(Request $request)
    {
        $returned_data = explode('{?#?#}', $request->gtpay_echo_data);
        $user              = new Agent;
        $user->name        = $returned_data[0];
        $user->email       = $returned_data[1];
        $user->password    = Hash::make($returned_data[2]);
        $user->state = $returned_data[3];
        $user->phone   = $returned_data[4];
        $user->agent_code  = $returned_data[5];

        if ($user->save()) {
            // Auth::login($user);
            $status = Auth::guard('agent')->attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password
                ]
            );
            //Check login
            if (Auth::guard('agent')->check()) {
                $present_user = Auth::guard('guard')->user();

                $link = new Refererlink();
                $link->user_id = $present_user->id;
                $link->agent_code = $present_user->agent_code;
                $link->save();
                //Add 200 naira to agent total amount
                // $present_user->refererAmount = $referer->refererAmount + 200;

                $parent_id = $present_user->referer_id;
                if ($parent_id) {
                    $parent = User::find($parent_id);
                    if ($parent) {
                        $parent->refererAmount = $parent->refererAmount + 200;
                        $parent->save();
                        //for grand parent
                        $grand_parent_id = $parent->referer_id;
                        if ($grand_parent_id) {
                            $grand_parent = User::find($grand_parent_id);
                            if ($grand_parent) {
                                $grand_parent->refererAmount = $grand_parent->refererAmount + 100;
                                $grand_parent->save();
                            }
                        }
                    }
                }
                //if login pass,redirect to agent dashboard page
                return redirect()->intended('agent/dashboard');
            } else {
                session()->flash('fail', ' Credential Incorect');
                return view('auth/login');
            }
            session()->flash('fail', ' Credential Incorect');
            return view('auth/login');
        }
    }



    public function gen_transaction_id()
    {
        return mt_rand(1000000000, 9999999999);
    }


    public function pay_with_gtpay(Request $request)
    {
        $link_from_url = $request->refer;
        $code_of_agent = $request->agent_code;

        $slug3 = Str::random(8);

        if ($link_from_url) {
            $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
            $refererId = $saveIdOfRefree->id;
        } else {
            $refererId = null;
        }

        if ($code_of_agent) {
            $saveIdOfAgent = User::where('agent_code', $code_of_agent)->first();
            $agent_Id = $saveIdOfAgent->id;
        } else {
            $agent_Id = null;
        }

        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', Rule::in(['seller', 'buyer']),]
        ]);

        //pay with GTPay
        $gtpay_mert_id        = 14264;
        $gtpay_tranx_id       = $this->gen_transaction_id();
        $gtpay_tranx_amt      = 1 * 100;
        $gtpay_tranx_curr     = 566;
        $gtpay_cust_id        = '1';
        $gtpay_tranx_noti_url = url('create_user');
        $gtpay_cust_name      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $slug3 . '{?#?#}' . $agent_Id . '{?#?#}' . $refererId . '{?#?#}' . $request->role;
        $gtpay_tranx_memo     = 'Mobow';
        $gtpay_echo_data      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $slug3 . '{?#?#}' . $agent_Id .  '{?#?#}' . $refererId . '{?#?#}' . $request->role;
        $gtpay_no_show_gtbank = 'yes';
        $gtpay_gway_name      = 'etranzact';
        $hashkey              = '3EBF9CF6D082C89F88490B01D072B0F4E1EE52E86EC731D9B49538F33B551D486AB70673FE1B876B94EF76EC5E0AA1D3D14BA933424037FB1219662AFAB8FF51';
        $gtpay_hash           = $gtpay_mert_id . $gtpay_tranx_id . $gtpay_tranx_amt . $gtpay_tranx_curr . $gtpay_cust_id . $gtpay_tranx_noti_url . $hashkey;
        $hashed               = hash('sha512', $gtpay_hash);
        $gtPay_Data = [
            'gtpay_mert_id'        => $gtpay_mert_id,
            'gtpay_tranx_id'       => $gtpay_tranx_id,
            'gtpay_tranx_amt'      => $gtpay_tranx_amt,
            'gtpay_tranx_curr'     => $gtpay_tranx_curr,
            'gtpay_cust_id'        => $gtpay_cust_id,
            'gtpay_tranx_noti_url' => $gtpay_tranx_noti_url,
            'gtpay_cust_name'      => $gtpay_cust_name,
            'gtpay_tranx_memo'     => $gtpay_tranx_memo,
            'gtpay_echo_data'      => $gtpay_echo_data,
            'gtpay_no_show_gtbank' => $gtpay_no_show_gtbank,
            'gtpay_gway_name'      => $gtpay_gway_name,
            'hashkey'              => $hashkey,
            'hashed'               => $hashed
        ];

        return view('gttPayView', $gtPay_Data);
    }

    public function create_user(Request $request)
    {
        $returned_data = explode('{?#?#}', $request->gtpay_echo_data);
        $user              = new User;
        $user->name        = $returned_data[0];
        $user->email       = $returned_data[1];
        $user->password    = Hash::make($returned_data[2]);
        $user->refererLink = $returned_data[3];
        $user->idOfAgent   = $returned_data[4];
        // if($user->idOfAgent == '' || $user->idOfAgent == null) {
        //     $user->idOfAgent = null;
        // }
        $user->idOfReferer   = $returned_data[5];
        if ($user->idOfReferer == '' || $user->idOfReferer == null) {
            $user->idOfReferer = null;
        }
        $user->role        = $returned_data[6];
        if ($user->save()) {
            // Auth::login($user);
            Auth::attempt(['email' => $returned_data[1], 'password' => $returned_data[2]]);

            if (Auth::check()) {
                $present_user = Auth::user();
                // if referrer link is available, save it to referer table
                $link = new Refererlink();
                $link->user_id = $present_user->id;
                $link->refererlink = $present_user->refererLink;
                $link->save();

                $person_that_refered = $present_user->idOfReferer;
                if ($person_that_refered) {
                    $referer = User::where('id', $person_that_refered)->first();
                    // dd($referer->refererAmount);
                    if ($referer) {
                        $referer->refererAmount = $referer->refererAmount + 50;
                        $referer->save();
                    }
                }

                $agent_that_refered = $present_user->idOfAgent;
                if ($agent_that_refered) {
                    $referer = Agent::where('id', $agent_that_refered)->first();
                    if ($referer) {
                        $referer->refererAmount = $referer->refererAmount + 100;
                        $referer->save();
                    }
                }

                if (Auth::user()->role == 'seller') {
                    return redirect()->route('seller.dashboard');
                } else if (Auth::user()->role == 'buyer') {
                    return  Redirect::to(Session::get('url.intended'));
                } else {
                    return redirect()->route('admin.dashboard');
                }
            }
            session()->flash('fail', ' Credential Incorect');
            return view('auth/login');
        }
    }




    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }

    public function showRegisterforRefer($refer)
    {
        $referlink = $refer;



        return view('auth/register', compact('referlink'));
    }



    public function showRegister(Request $request)
    {

        $request->session()->forget('url.intended');
        session(['url.intended' => url()->previous()]);

        $param = $request->input('invite');

        //$param = $request->query('param');
        if ($param) {
            $referParam = $param;
        } else {
            $referParam = null;
        }
        $states = State::all();

        if (Auth::check()) {
            return redirect()->intended('/');
        }

        return view('auth/register', compact('states', 'referParam'));
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'seller') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('seller.dashboard')->with($success_notification);
            } else if (Auth::user()->role == 'buyer') {
                // session()->flash('success', ' Login Succesfull');
                // return redirect()->route('buyer.dashboard');
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );

                return Redirect::to(Session::get('url.intended'))->with($success_notification);
            } else if (Auth::user()->role == 'agent') {
                $success_notification = array(
                    'message' => 'You are successfully logged in!',
                    'alert-type' => 'success'
                );
                return redirect()->route('agent.dashboard')->with($success_notification);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        $success_notification = array(
            'message' => 'Incorrect credentials! Try again.',
            'alert-type' => 'success'
        );
        return view('auth/login')->with($success_notification);
    }

    public function showLogin(Request $request)
    {
        $request->session()->forget('url.intended');
        session(['url.intended' => url()->previous()]);

        if (Auth::check()) {
            return view('welcome');
        }
        return view('auth/login');
    }

    public function buyer()
    {
        $buyers = User::where('role', 'buyer')->orderBy('id', 'asc')->paginate(8);
        // Category::orderBy('id', 'asc')->paginate(35);
        return view('admin.user.buyer', compact('buyers'));
    }

    public function seller()
    {
        $seller = User::where('role', 'seller')->paginate(20);
        $approval_status = null;
        return view('admin.user.seller', compact('seller', 'approval_status'));
    }


    public function updateProfile(Request $request, $id)
    {

        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'state' => ['string'],
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image set up
        if ($request->hasFile('file')) {
            $image_name = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $image_name);
            $user->image = $image_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Profile successfully updated!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Profile could not be updated! Try again',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($success_notification);
    }

    public function updatePassword(Request $request, $id)
    {

        $user = User::find($id);
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            // Authentication passed...
            $user->password = Hash::make($request->new_password);
            $user->save();

            $success_notification = array(
                'message' => 'Password successfully changed!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);
        } else {
            $success_notification = array(
                'message' => 'Password could not be updated!! Try again',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($success_notification);
        }
    }



    // $link = new Refererlink();
    // $link->user_id = $present_user->id;
    // $link->refererlink = $present_user->refererLink;
    // $link->save();

    // $person_that_refered = $present_user->idOfReferer;
    // if($person_that_refered){
    // 	$referer = User::where('id', $person_that_refered)->first();
    // 	if ($referer) {
    // 		$referer->refererAmount = $referer->refererAmount + 50;
    // 		$referer->save();
    // 	}
    // }

    // $agent_that_refered = $present_user->idOfAgent;
    // if($agent_that_refered){
    // 	$referer = User::where('id', $agent_that_refered)->first();
    // 	if ($referer) {
    // 		$referer->refererAmount = $referer->refererAmount + 100;
    // 		$referer->save();
    // 	}
    // }

    // if ( $present_user->role == 'seller' ){
    // 	return redirect()->route('seller.dashboard');
    // } else {
    // 	return Redirect::to(Session::get('url.intended'));
    // }
    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'bank_name' => ['required', 'string'],
            'account_name' => ['required', 'string'],
            'account_number' => ['required', 'numeric'],
        ]);

        $user->bank_name = $request->bank_name;
        $user->account_name = $request->account_name;
        $user->account_number = $request->account_number;

        if ($user->save()) {
            $success_notification = array(
                'message' => 'Account details successfully updated!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($success_notification);
        }

        $success_notification = array(
            'message' => 'Account details could not be updated!! Try again',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($success_notification);
    }




    public function loginformail(Request $request)

    {

        if (Auth::user()->email_verified_at == null) {
            return redirect()->intended('/email/verify');
        }
        //$credentials = $request->only('email', 'password');

        //if (Auth::attempt($credentials)) {
        if (Auth::user()->role == 'seller') {
            $success_notification = array(
                'message' => 'You are successfully logged in!',
                'alert-type' => 'success'
            );
            return redirect()->route('seller.dashboard')->with($success_notification);
        } else if (Auth::user()->role == 'buyer') {
            // return redirect()->route('buyer.dashboard');
            $success_notification = array(
                'message' => 'You are successfully logged in!',
                'alert-type' => 'success'
            );
            return Redirect::to(Session::get('url.intended'))->with($success_notification);
        } else {
            return redirect()->route('admin.dashboard');
        }
        //}
        $success_notification = array(
            'message' => 'Incorrect credentials! Try again.',
            'alert-type' => 'error'
        );
        return view('auth/login')->with($success_notification);
    }
}
