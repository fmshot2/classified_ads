<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{



	public function createUser (Request $request)
	{


		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'captcha' => ['required','captcha'],
		]);

		return "Yuppy";


	}


	public function refreshCaptcha()
	{
		return response()->json(['captcha'=> captcha_img('math')]);
	}



	public function login ()
	{

	}



	public function showRegister ()
	{
		return view ('user.auth.register');
	}


	public function showLogin ()
	{
		return view ('user.auth.login');
	}





}
