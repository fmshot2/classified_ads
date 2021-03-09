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

        $data = [
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'state'      => $request->state,
            'lga'        => $request->lga,
            'is_agent'   => 1,
            'agent_code' => 'ABJ1234boc',
            'role'       => 'agent',
            'status'     => 1,
            'password'   => Hash::make($request->password)
        ];

        $user = User::create($data);

        if ($user) {
            return redirect()->route('home');
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if ( $request->role == 'agent' ){
                    return redirect()->route('agent.dashboard');;

                } else {
                    return Redirect::to(Session::get('url.intended'));
                }
                return redirect()->intended('/');
            }
        }
    }

    public function createUser (Request $request)
	{
        // dd(str_replace(url('/'), '', Session::get('url.intended')));

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
		if($saveIdOfRefree){
		$refererId = $saveIdOfRefree->id;
		}
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = $request->role;
		if($saveIdOfRefree){
		$user->idOfReferer = $refererId;
		}

		//$user->state = $request->state;
		$user->save();
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
                $failedtosendmail = 'Failed to Mail!.';
            }


			if ($link_from_url) {
                $link = new Refererlink();
                $link->refererlink = $link_from_url;
                $link->save();
            }

		}



		session()->flash('success', ' Succesfull!');

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			if ( $request->role == 'seller' )
				return redirect()->route('seller.dashboard');;

            } else {
                return Redirect::to(Session::get('url.intended'));
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
