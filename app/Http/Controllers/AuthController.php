<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Refererlink;
use Illuminate\Support\Str;


class AuthController extends Controller
{

	public function createUser (Request $request)
	{
		$link_from_url = $request->refer;
		// dd($usrerere);
		// $LGA = User::find(['refererLink'=>$usrerere]);
		// dd($LGA);
		// $Link_owner = User::where('refererLink', $usrerere)->first();

		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'state' => ['string'],			
			'password' => ['required', 'string', 'min:6', 'confirmed'],
			// 'captcha' => 'required|captcha',
			'role' => 'required'
		]);
		
		$saveIdOfRefree = User::where(['refererLink'=>$link_from_url])->first();
		$refererId = $saveIdOfRefree->id;
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = $request->role;	
		$user->idOfReferer = $refererId;		

		//$user->state = $request->state;
		$user->save();
		 	if ($user->save()) {
			$name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";

			Mail::to($user->email)->send(new SendMailable($name));
			if ($link_from_url) {
 			$link = new Refererlink();
           $link->refererlink = $link_from_url;
           $link->save();			}
			
		}



		session()->flash('success', ' Succesfull');

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			if ( $request->role == 'seller' )
				return redirect('/seller/dashboard');

		} else {
			return view('/');
		}
		return redirect()->intended('/');
	}


	

	public function refreshCaptcha()
	{
		return response()->json(['captcha'=> captcha_img('math')]);
	}

	public function showRegisterforRefer($refer)
	{
		//dd('fgfgfgfg');
$referlink = $refer;
		//dd($referlink);

		

		return view ('auth/register', compact('referlink'));
	}



	public function showRegister (Request $request)
	{
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
	//dd(Auth::user());
		//use
		if (Auth::user()->email_verified_at == null) {
			return redirect()->intended('/email/verify');
		}
		//$credentials = $request->only('email', 'password');

		//if (Auth::attempt($credentials)) {
		if (Auth::user()->role == 'seller' ) 
		{
			session()->flash('success', ' Login Succesfull');
			return redirect()->intended('seller/dashboard');
		} else if (Auth::user()->role == 'buyer')
		{
			session()->flash('success', ' Login Succesfull');
			return redirect()->intended('buyer/dashboard');
		} else 
		{
			return redirect()->intended('admin/dashboard');
		}
		//}
		session()->flash('fail', ' Credential Incorect');
		return view ('auth/login');
		
	}




	public function login(Request $request)
	{

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {

			if (Auth::user()->role == 'seller' ) 
			{
				session()->flash('success', ' Login Succesfull');
				return redirect()->intended('seller/dashboard');
			} else if (Auth::user()->role == 'buyer')
			{
				session()->flash('success', ' Login Succesfull');
				return redirect()->intended('buyer/dashboard');
			} else 
			{
				return redirect()->intended('admin/dashboard');
			}
		}

		session()->flash('fail', ' Credential Incorect');
		return view ('auth/login');

	}

	public function showLogin ()
	{
		if (Auth::check()) {
			return view ('welcome');
		}
		return view ('auth/login');
	}

	public function buyer()
	{
		$buyer = User::where('role', 'buyer')->paginate(20);
		return view ('admin.user.buyer', compact('buyer') );
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
