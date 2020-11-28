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
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'captcha' => 'required|captcha',
		]);

		$user = new User;

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = $request->role;
		$user->save();
		return view('auth/login');

	}


	public function refreshCaptcha()
	{
		return response()->json(['captcha'=> captcha_img('math')]);
	}


	public function showRegister ()
	{
		return view ('auth/register');
	}


	public function showLogin ()
	{
		return view ('auth/login');
	}

	public function logout ()
	{
		Auth::logout();
		return view ('welcome');
	}



}
