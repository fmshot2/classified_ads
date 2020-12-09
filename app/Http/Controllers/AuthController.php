<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	public function createUser (Request $request)
	{

		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:6', 'confirmed'],
			'captcha' => 'required|captcha',
			'role' => 'required'
		]);

		$user = new User;

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = $request->role;
		$user->save();

		session()->flash('success', ' Succesfull');

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			if ( $request->role == 'seller' )
        return redirect('/seller/dashboard');
		}
		return redirect()->intended('/');
		
	}


	public function refreshCaptcha()
	{
		return response()->json(['captcha'=> captcha_img('math')]);
	}


	public function showRegister ()
	{
		if (Auth::check()) {
			return redirect()->intended('/');
		}

		return view ('auth/register');
	}


	public function login(Request $request)
	{

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {

			if (Auth::user()->role == 'seller' ) 
			{
				session()->flash('success', ' Login Succesfull');
				return redirect()->intended('seller/dashboard');
			} else {
				session()->flash('success', ' Login Succesfull');
				return redirect()->intended('welcome');
			}
		}

		session()->flash('fail', ' Credential Incorect');
		return view ('auth/login');

	}

	public function showLogin ()
	{
		if (Auth::check()) {
			return view ('/');
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
		return view ('admin.user.seller', compact('seller') );
	}


}
