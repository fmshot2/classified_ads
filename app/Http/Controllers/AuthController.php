<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	public function createUser (Request $request)
	{
		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'state' => ['string'],			
			'password' => ['required', 'string', 'min:6', 'confirmed'],
			'captcha' => 'required|captcha',
			'role' => 'required'
		]);

		$user = new User;

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = $request->role;
		$user->state = $request->state;
		$user->save();

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


	public function showRegister ()
	{
		        $states = State::all(); 

		if (Auth::check()) {
			return redirect()->intended('/');
		}

		return view ('auth/register', compact('states'));
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
				return redirect()->intended('/');
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


	public function updateProfile (Request $request, $id)
	{

		$user = User::find($id);
		$validatedData = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'state' => ['string'],			
			'role' => 'required',
			'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

                // Image set up
        if ( $request->hasFile('file') ) {
        $image_name = time().'.'.$request->file->extension();
        $request->file->move(public_path('images'),$image_name);
        $user->image = $image_name;
        }

		$user->name = $request->name;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->state = $request->state;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->about = $request->about;
		$user->save();
	}

	public function updatePassword (Request $request, $id)
	{

		$user = User::find($id);
		$validatedData = $request->validate([
			'password' => ['required', 'string', 'min:6', 'confirmed'],
		]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->state = $request->state;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->about = $request->about;
		$user->save();
	}

}
