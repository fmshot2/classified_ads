<?php

namespace App\Http\Controllers;

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


class AuthController extends Controller
{

	public function createAgent(Request $request)
	{
		$request->validate([
			'name'     => ['required', 'string', 'max:255'],
			'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'phone'    => ['required', 'numeric', 'unique:users'],
			'state'    => ['string'],
			'lga'      => ['string'],
			'password' => ['required', 'string', 'min:6', 'confirmed'],
		]);


		$state = $request->state;
		$result = substr($state, 0, 3);
		$ist_3_result = strtoupper($result);
		$randomCode = Str::random(4);
		$length = 1;
		$last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

		$data = [
			'name'       => $request->name,
			'email'      => $request->email,
			'phone'      => $request->phone,
			'state'      => $request->state,
			'identification_type' => $request->identification_type,
			'identification_id'   => $request->identification_id,
			'lga'        => $request->lga,
			'is_agent'   => 1,
			'agent_code' => $result . $randomCode . $last_letter,
			'role'       =>  'agent',
			'status'     => 1,
			'password'   => Hash::make($request->password)
		];

		$user = User::create($data);

		if ($user) {
			$credentials = $request->only('email', 'password');

			if (Auth::attempt($credentials)) {
				return redirect()->route('agent.dashboard');
			}
			else{
				return redirect()->intended('/');
			}
		}
	}

	public function createUser (Request $request)
	{

		$link_from_url = $request->refer;
		$code_of_agent = $request->agent_code;
		// dd($link_from_url, 'and', $code_of_agent);

		$slug3 = Str::random(8);

		// $LGA = User::find(['refererLink'=>$usrerere]);
		// $Link_owner = User::where('refererLink', $usrerere)->first();

		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'state' => ['string'],
			'password' => ['required', 'string', 'min:6', 'confirmed'],
			// 'captcha' => 'required|captcha',
			'role' => 'required'
		]);
// Get id of owner of $link_from_url of available
		if($link_from_url){
			$saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
			$refererId = $saveIdOfRefree->id;
		}else{
			$refererId = null;
		}	

		// Get id of owner of $agent code if available
		if($code_of_agent){
			$saveIdOfAgent = User::where('agent_code', $code_of_agent)->first();
		// dd($saveIdOfAgent);
			$agent_Id = $saveIdOfAgent->id;
		}else{
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

			try{
				Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
			}
			catch(\Exception $e){
				$failedtosendmail = 'Failed to Mail!';
			}

		}
		session()->flash('success', ' succesfull!');

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
			// dd($person_that_refered);
			if($person_that_refered){
				$referer = User::where('id', $person_that_refered)->first();
				if ($referer) {
					$referer->refererAmount = $referer->refererAmount + 50;
					$referer->save();
				}
			}

			$agent_that_refered = $present_user->idOfAgent;
			if($agent_that_refered){
				$referer = User::where('id', $agent_that_refered)->first();
				if ($referer) {
					$referer->refererAmount = $referer->refererAmount + 100;
					$referer->save();
				}
			}

			if ( $present_user->role == 'seller' ){
				return redirect()->route('seller.dashboard');
			} else {
				return Redirect::to(Session::get('url.intended'));
			}
		}
		
		return redirect()->intended('/');
	}




	public function refreshCaptcha()
	{
		return response()->json(['captcha'=> captcha_img('math')]);
	}

	public function showRegisterforRefer($refer)
	{
		$referlink = $refer;



		return view ('auth/register', compact('referlink'));
	}



	public function showRegister (Request $request)
	{

		$request->session()->forget('url.intended');
		session(['url.intended' => url()->previous()]);

		$param = $request->input('invite');

		//$param = $request->query('param');
		if($param){
			$referParam = $param;
		}else{
			$referParam = null;
		}
		$states = State::all();

		if (Auth::check()) {
			return redirect()->intended('/');
		}

		return view ('auth/register', compact('states', 'referParam'));
	}



	public function loginformail(Request $request)

	{

		if (Auth::user()->email_verified_at == null) {
			return redirect()->intended('/email/verify');
		}
		//$credentials = $request->only('email', 'password');

		//if (Auth::attempt($credentials)) {
		if (Auth::user()->role == 'seller' )
		{
			session()->flash('success', ' Login Succesfull');
			return redirect()->route('seller.dashboard');
		} else if (Auth::user()->role == 'buyer')
		{
			session()->flash('success', ' Login Succesfull');
			// return redirect()->route('buyer.dashboard');
			return Redirect::to(Session::get('url.intended'));
		} else
		{
			return redirect()->route('admin.dashboard');;
		}
		//}
		session()->flash('fail', ' Credential Incorect');
		return view('auth/login');

	}




	public function login(Request $request)
	{

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {

			if (Auth::user()->role == 'seller' )
			{
				session()->flash('success', ' Login Succesfull');
				return redirect()->route('seller.dashboard');
			} else if (Auth::user()->role == 'buyer')
			{
				// session()->flash('success', ' Login Succesfull');
				// return redirect()->route('buyer.dashboard');

				return Redirect::to(Session::get('url.intended'));

			} else if (Auth::user()->role == 'agent')
			{
				return redirect()->route('agent.dashboard');

			} else
			{
				return redirect()->route('admin.dashboard');
			}
		}

		session()->flash('fail', ' Credential Incorect');
		return view ('auth/login');

	}

	public function showLogin (Request $request)
	{
		$request->session()->forget('url.intended');
		session(['url.intended' => url()->previous()]);

		if (Auth::check()) {
			return view ('welcome');
		}
		return view ('auth/login');
	}

	public function buyer()
	{
		$buyers = User::where('role', 'buyer')->orderBy('id', 'asc')->paginate(8);
		 // Category::orderBy('id', 'asc')->paginate(35);
		return view ('admin.user.buyer', compact('buyers') );
	}

	public function seller()
	{
		$seller = User::where('role', 'seller')->paginate(20);
		$approval_status = null;
		return view ('admin.user.seller', compact('seller', 'approval_status'));
	}


	public function updateProfile (Request $request, $id)
	{

		$user = User::find($id);
		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'state' => ['string'],
			'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		session()->flash('status', ' Succesfull');

        // Image set up
		if ( $request->hasFile('file') ) {
			$image_name = time().'.'.$request->file->extension();
			$request->file->move(public_path('images'),$image_name);
			$user->image = $image_name;
		}

		$user->name = $request->name;
		$user->email = $request->email;
		$user->state = $request->state;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->about = $request->about;
		$user->save();
		return back();
	}

	public function updatePassword (Request $request, $id)
	{

		$user = User::find($id);
		$validatedData = $request->validate([
			'password' => ['required', 'string', 'min:6', 'confirmed'],
		]);

		$hashedPassword = Auth::user()->password;

		if ( Hash::check($request->old_password, $hashedPassword) ) {
            // Authentication passed...
			$user->password = Hash::make($request->new_password);
			$user->save();
			session()->flash('status', ' Succesfull');
			return back();
		} else {
			session()->flash('fail', ' Failed');
			return back();
		}

	}

}
