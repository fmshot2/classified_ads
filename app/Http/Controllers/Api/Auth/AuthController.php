<?php

namespace App\Http\Controllers\Api\Auth;

use App\Agent;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\UserResource;
use App\Mail\UserRegistered;
use App\Payment;
use App\ProviderSubscription;
use App\Refererlink;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'checkEmailIfExist', 'saveUser']]);
    }

    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity = (168 * 60);

        $this->guard()->factory()->setTTL($token_validity);

        if (!$token = $this->guard()->attempt($validator->validated())) {
            return response()->json([
                'error' => 'Unauthorized!'
            ], 401);
        }

        // return $this->respondWithToken($token);
        return response()->json([
            'token' => $token,
            'token_validity' => $token_validity,
            'token_type' => 'bearer',
            'user_role' => $this->guard()->user()->role,
        ]);
    }



    public function register2(Request $request)
    {
         return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 200);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:3,50',
            'email' => 'required|email|unique:users',
            'role' => 'string',
            'password' => 'required|min:6',
            // 'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()], 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 200);
    }


    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'referParam'     => ['nullable', 'string', 'max:255'],
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'          => ['required', 'numeric'],
            'password'       => ['required', 'string', 'min:6'],
            'role'           => ['required', Rule::in(['seller', 'buyer'])],
            'agent_code'     => ['nullable', 'exists:agents,agent_code'],
            'plan'           => ['nullable', Rule::in([200, 600, 1200, 2400])],
        ]);

        if ($validator->fails()) {
            return response()->json([$validator->errors()], 422);
        }

        if ($request->role == 'buyer') {
            $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));

            if (Auth::attempt(['email' => $user->email, 'password' => $user->password])) {
                $token_validity = (24 * 60);

                $this->guard()->factory()->setTTL($token_validity);

                if (!$token = $this->guard()->attempt($validator->validated())) {
                    return response()->json([
                        'error' => 'Unauthorized!'
                    ], 401);
                }

                return $this->respondWithToken($token);
            }
            else{
                return response()->json([
                    'error' => 'User couldn\'t logged in!'
                ], 401);
            }
        }
        else{
            $amount = $request->amount;
            $tranxRef = $request->trans_ref;
            $this->saveUser($amount, $tranxRef);
        }


    }


    public function saveUser($amount, $tranxRef, Request $request)
    {
        $slug3 = Str::random(8);

        // Get id of owner of $link_from_url if available
        if ($request->referParam) {
            $saveIdOfRefree = User::where('refererLink', $request->referParam)->first();
            if ($saveIdOfRefree) {
                $request->refererId = $saveIdOfRefree->id;
            } else {
                return response()->json([
                    'error' => 'The referer link used is incorrect. Please Confirm the correct link or register without a link!'
                ], 422);
            }
        }

        // Get id of owner of $agent code if available
        if ($request->agent_code) {
            $saveIdOfAgent = Agent::where('agent_code', $request->agent_code)->first();
            if ($saveIdOfAgent) {
                $request->agent_Id = $saveIdOfAgent->id;
            } else {
                return response()->json([
                    'error' => 'Your agent code is incorrect. Please Confirm the correct agent code or register without a code'
                ], 422);
            }
        }

        //save user
        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role     = $request->role;
        //save id of referer if user was reffererd
        $user->idOfReferer = $request->refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $request->agent_Id;
        $user->refererLink = $slug3;
        //send mail

        if ($user->save()) {
            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $request->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }


            if (Auth::attempt(['email' => $user->email, 'password' => $user->password])) {
                $token_validity = (24 * 60);

                $this->guard()->factory()->setTTL($token_validity);

                if (!$token = $this->guard()->attempt($validator->validated())) {
                    return response()->json([
                        'error' => 'Unauthorized!'
                    ], 401);
                }

                return $this->respondWithToken($token);
            }
        }



        if (Auth::check()) {
            $present_user = Auth::user();
            // if referrer link is available, save it to referer table
            $link              = new Refererlink();
            $link->user_id     = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            // save user's subscription module

            if ($amount == 20000) {
                $added_days = 31;
                $sub_type = 'monthly';
            }elseif ($amount == 60000) {
                $added_days = 186;
                $sub_type = '3 months';
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
            $sub_check->last_amount_paid = $request->plan;
            $sub_check->subscription_end_date = Carbon::now()->addDays($added_days);
            $sub_check->last_subscription_starts = $current_date_time;
            $sub_check->save();


            $reg_payments = new Payment();
            $reg_payments->user_id = Auth::id();
            $reg_payments->payment_type = 'registration';
            $reg_payments->amount = $request->plan;
            $reg_payments->tranx_ref = $tranxRef;
            $reg_payments->save();


            /* level 1 start */
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

            /* end level 1 payment */

            /* start level 2 */
                $person_that_refered = $present_user->idOfReferer;
                if ($person_that_refered) {
                    $referer = User::where('id', $person_that_refered)->first();
                    if ($referer) {
                        //level 2 referer id
                        $person_that_refered2 = $referer->idOfReferer;
                        //level 2 referer
                        if ($person_that_refered2) {
                            $referer2 = User::where('id', $person_that_refered2)->first();
                            if ($referer2) {
                                $referer2->refererAmount = $referer2->refererAmount + 150;
                                $referer2->level2 = Auth::id();
                                $referer2->save();
                                // $present_user->level2 = $referer3->id;                    }
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
                            $referer2 = Agent::where('id', $person_that_refered2)->first();
                            if ($referer2) {
                                $referer2->refererAmount = $referer2->refererAmount + 150;
                                $referer2->level2 = Auth::id();
                                $referer2->save();
                                // $present_user->level2 = $referer3->id;                    }
                            }
                            // $present_user->level2 = $referer3->id;
                        }
                    }
                }
            /* end level 2 payment */


            /* Start level 3 */
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
            /* End level 3 payment  */


            /*  start level 4 payment */

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
                                        $person_that_refered4 = $referer4->idOfAgent;

                                        if ($person_that_refered4) {
                                            $referer5 = Agent::where('id', $person_that_refered4)->first();

                                            if ($referer5) {
                                                // add amount to level 4 referer amount
                                                $referer5->refererAmount = $referer5->refererAmount + 50;
                                                $referer5->level4 = Auth::id();
                                                $referer5->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

            /* End level 4 payment */

        }
    }


    public function checkEmailIfExist(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user === null && collect($user)->isEmpty()) {
            return response()->json([
                'status' => 1,
                'message' => 'This E-mail address is available.'
                ], 200);
        }
        else{
            return response()->json([
                'status' => 0,
                'error' => 'E-mail address is already taken!'
            ], 400);
        }
    }

    /**
     * profile
     *
     * @return void
     */
    public function profile()
    {
        return response()->json(new UserResource($this->guard()->user()), 200);
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'state' => ['string'],
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image set up
        if ($request->hasFile('file')) {
            $image_name = Str::of($request->name)->slug('-').'-'.time().'.' . $request->file->extension();
            $request->file->move(public_path('uploads/users'), $image_name);
            $user->image = $image_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->state = $request->state;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;

        if ($user->save()) {
            return response()->json([
                'message' => 'Profile Updated Successfully!',
                'user'    => $this->guard()->user()
            ], 200);
        }
        else{
            return response()->json([
                'message' => 'Profile could not be updated! Try again!',
                'user'    => $this->guard()->user()
            ], 400);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
        $password = $user->password;
        $validatedData = $request->validate([
            'new_password' => ['required', 'string', 'min:6'],
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'message' => 'Password Updated Successfully!',
                'user' => $this->guard()->user()
            ], 200);

        } else {
            return response()->json([
                'message' => 'Password could not be updated!! Try again',
                'reason' => 'Old Password might be wrong!',
                'user' => $this->guard()->user()
            ], 400);
        }

    }

    public function updateBankAccount(Request $request)
    {
        try {
            $user = auth()->user();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        $validatedData = $request->validate([
            'bank_name' => ['required', 'string'],
            'account_name' => ['required', 'string'],
            'account_number' => ['required', 'numeric'],
        ]);

        $user->bank_name = $request->bank_name;
        $user->account_name = $request->account_name;
        $user->account_number = $request->account_number;

        if ($user->save()) {
            return response()->json([
                'message' => 'Account details successfully updated!',
                'user'    => $this->guard()->user()
            ], 200);
        }

        return response()->json([
            'message' => 'Account details could not be updated!! Try again!',
            'user'    => $this->guard()->user()
        ], 400);
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['User logged out successfully!'], 200);
    }

    /**
     * refresh
     *
     * @return void
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * respondWithToken
     *
     * @param  mixed $token
     * @return void
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL() * 60
        ], 200);
    }

    /**
     * guard
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('api');
    }
}
