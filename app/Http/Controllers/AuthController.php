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

    public function createAgent(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'phone'    => ['required', 'numeric', 'unique:users'],
            // 'state'    => ['string'],
            // // 'lga'      => ['string'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        $state = $request->state;
        $result = substr($state, 0, 3);
        $ist_3_result = strtoupper($result);
        $randomCode = Str::random(4);
        $length = 1;
        $last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);

        // $data = [
        // 	'name'       => $request->name,
        // 	'email'      => $request->email,
        // 	'phone'      => $request->phone,
        // 	'state'      => $request->state,
        // 	'identification_type' => $request->identification_type,
        // 	'identification_id'   => $request->identification_id,
        // 	'lga'        => $request->lga,
        // 	'is_agent'   => 1,
        // 	'agent_code' => $result . $randomCode . $last_letter,
        // 	'role'       =>  'agent',
        // 	'status'     => 1,
        // 	'password'   => Hash::make($request->password)
        // ];


        //save agent details
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->state = $request->state;
        $user->identification_type = $request->identification_type;
        $user->identification_id = $request->identification_id;
        $user->is_agent = 1;
        $user->agent_code = $result . $randomCode . $last_letter;
        $user->role = 'agent';
        $user->status  = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user->save()) {
            $name = "$user->name, Your registration was successfull! Please click the link below to complete your registration!";
            $name = $user->name;
            $email = $user->email;
            $origPassword = $request->password;
            $userRole = $user->role;

            try {
                Mail::to($user->email)->send(new AgentRegistration($name, $email, $origPassword, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }

            return redirect()->route('agent_Complete_Reg')->with('result', 'Succeffull, Please go to your email to complete the registration');

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                $present_user = Auth::user();

                $link = new Refererlink();
                $link->user_id = $present_user->id;
                $link->agent_code = $present_user->agent_code;
                $link->save();

                return redirect()->route('agent.dashboard');
            } else {
                return redirect()->intended('/');
            }
        }
    }

    public function agent_Complete_Reg()
    {
        return view('auth.register_agent');
    }


    public function gen_transaction_id()
    {
        return mt_rand(1000000000, 9999999999);
    }


    //Registration without payments

    public function createUser(Request $request)
    {

        $link_from_url = $request->refer;
        $code_of_agent = $request->agent_code;

        $slug3 = Str::random(8);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'state' => ['string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'captcha' => 'required|captcha',
            'role' => 'required'
        ]);

        // Get id of owner of $link_from_url of available
        if ($link_from_url) {
            $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
            $refererId = $saveIdOfRefree->id;
        } else {
            $refererId = null;
        }

        // Get id of owner of $agent code if available
        if ($code_of_agent) {
            $saveIdOfAgent = User::where('agent_code', $code_of_agent)->first();
            // dd($saveIdOfAgent);
            $agent_Id = $saveIdOfAgent->id;
        } else {
            $agent_Id = null;
        }


        //save user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        //save id of referer if user was reffererd
        $user->idOfReferer = $refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $agent_Id;
        $user->refererLink = $slug3;
        //$user->state = $request->state;
        $user->save();
        //send mail

        if ($user->save()) {
            $name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name = $user->name;
            $email = $user->email;
            $origPassword = $request->password;
            $userRole = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }

        $success_notification = array(
            'message' => 'User Created successfully!',
            'alert-type' => 'success'
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $present_user = Auth::user();
            // 		$user_hasUploadedService = $present_user->hasUploadedService;
            // 		if ($user_hasUploadedService == 1) {
            // 			if ( $present_user->role == 'seller' ){
            // 			return redirect()->route('seller.dashboard');

            // 	} else {
            // 		return Redirect::to(Session::get('url.intended'));
            // 	}
            // }



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
                $referer = User::where('id', $agent_that_refered)->first();
                if ($referer) {
                    $referer->refererAmount = $referer->refererAmount + 100;
                    $referer->save();
                }
            }

            if ($present_user->role == 'seller') {
                return redirect()->route('seller.dashboard')->with($success_notification);
            } else {
                return Redirect::to(Session::get('url.intended'))->with($success_notification);
            }
        }

        return redirect()->intended('/');
    }

    public function pay_with_gtpay(Request $request)
    {

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
        $gtpay_tranx_noti_url = url('api/create_user');
        $gtpay_cust_name      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $request->role;
        $gtpay_tranx_memo     = 'Mobow';
        $gtpay_echo_data      = $request->name . '{?#?#}' . $request->email . '{?#?#}' . $request->password . '{?#?#}' . $request->role;
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
        $user->role        = $returned_data[3];

        if ($user->save()) {

            Auth::login($user);

            if (Auth::check()) {

                if (Auth::user()->role == 'seller') {
                    session()->flash('success', ' Login Succesfull');
                    return redirect()->route('seller.dashboard');
                } else if (Auth::user()->role == 'buyer') {
                    // session()->flash('success', ' Login Succesfull');
                    // return redirect()->route('buyer.dashboard');

                    return Redirect::to(Session::get('url.intended'));
                } else {
                    return redirect()->route('admin.dashboard');
                }
            }

            session()->flash('fail', ' Credential Incorect');

            return view('auth/login');
        }
    }


    //Registration using payments(GTPAY)
    public function createUserWithGTPay(Request $request)
    {
        $link_from_url = $request->refer;
        $code_of_agent = $request->agent_code;

        $slug3 = Str::random(8);

        $validatedData = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'state'    => ['string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => 'required'
        ]);

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


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->idOfReferer = $refererId;
        $user->idOfAgent = $agent_Id;
        $user->refererLink = $slug3;
        $user->save();

        if ($user->save()) {
            $name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name = $user->name;
            $email = $user->email;
            $origPassword = $request->password;
            $userRole = $user->role;
            $reg_amount = 1;

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $present_user = Auth::user();

                //pay with GTPay

                $gtpay_mert_id        = 14264;
                $gtpay_tranx_id      = $this->gen_transaction_id();
                $gtpay_tranx_amt      = 1 * 100;
                $gtpay_tranx_curr     = 566;
                $gtpay_cust_id        = $present_user->id;
                // $gtpay_tranx_noti_url = "https://yellowpage.test/api/gt_payment_details/{$request->user()->id}/{$request->badge_type}";
                $gtpay_tranx_noti_url = "https://yellowpage.test/api/logintestPayment/$present_user->id";
                $gtpay_cust_name      = 'DEQFOOIPP0;REG13762;John Adebisi: 2nd term school and accomodation fees;XNFYGHT325541;1209';
                $gtpay_tranx_memo     = 'Mobow';
                $gtpay_echo_data      = $present_user->name;
                $gtpay_no_show_gtbank = 'yes';
                $gtpay_gway_name      = 'etranzact';
                $hashkey = '3EBF9CF6D082C89F88490B01D072B0F4E1EE52E86EC731D9B49538F33B551D486AB70673FE1B876B94EF76EC5E0AA1D3D14BA933424037FB1219662AFAB8FF51';

                $gtpay_hash = $gtpay_mert_id . $gtpay_tranx_id . $gtpay_tranx_amt . $gtpay_tranx_curr . $gtpay_cust_id . $gtpay_tranx_noti_url . $hashkey;

                $hashed = hash('sha512', $gtpay_hash);

                $gtPay_Data = [
                    'gtpay_mert_id' => $gtpay_mert_id,
                    'gtpay_tranx_id' => $gtpay_tranx_id,
                    'gtpay_tranx_amt' => $gtpay_tranx_amt,
                    'gtpay_tranx_curr' => $gtpay_tranx_curr,
                    'gtpay_cust_id' =>  $gtpay_cust_id,
                    'gtpay_tranx_noti_url' => $gtpay_tranx_noti_url,
                    'gtpay_cust_name' => $gtpay_cust_name,
                    'gtpay_tranx_memo' => $gtpay_tranx_memo,
                    'gtpay_echo_data'      => $gtpay_echo_data,
                    'gtpay_no_show_gtbank' => $gtpay_no_show_gtbank,
                    'gtpay_gway_name'      => $gtpay_gway_name,
                    'hashkey'              => $hashkey,
                    'hashed'              => $hashed


                ];
                // dd($gtPay_Data);
                return view('gttPayView', $gtPay_Data);
            }
        }

        return redirect()->intended('/');
    }


    public function logintestPayment(Request $request, $id)
    {
        dd($request);
        $id1 = $id;

        $credentials = $id1;

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'seller') {
                session()->flash('success', ' Login Succesfull');
                return redirect()->route('seller.dashboard');
            } else if (Auth::user()->role == 'buyer') {
                // session()->flash('success', ' Login Succesfull');
                // return redirect()->route('buyer.dashboard');

                return Redirect::to(Session::get('url.intended'));
            } else if (Auth::user()->role == 'agent') {
                return redirect()->route('agent.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        session()->flash('fail', ' Credential Incorect');
        return view('auth/login');

        // return view('logintestPayment', compact('id1'));

        // return redirect()->route('home');
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
            'account_number' => ['required', 'numeric'],
        ]);

        $user->bank_name = $request->bank_name;
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
}
