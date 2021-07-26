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
use Symfony\Contracts\Service\Attribute\Required;


class OldCodeController extends Controller
{



//original create agent
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

        //save agent details
        $user = new Agent;
        $user->name = $request->name;
        $user->email = $request->email;

        // $user->phone = $request->phone;
        // $user->state = $request->state;
        // $user->identification_type = $request->identification_type;
        // $user->identification_id = $request->identification_id;
        // $user->is_agent = 1;
        // $user->agent_code = $result . $randomCode . $last_letter;
        // $user->role = 'agent';
        // $user->status  = 1;
        // $user->password = Hash::make($request->password);
        $user->save();

        if ($user->save()) {
            $messages = "$user->name, Your registration was successfull! Please click the link below to complete your registration!";
            $name = $user->name;
            $email = $user->email;
            // $origPassword = $request->password;
            $userRole = $user->role;

            // try {
            Mail::to($user->email)->send(new AgentRegistration($messages, $name, $email, $userRole));
            // } catch (\Exception $e) {
            //     $failedtosendmail = 'Failed to Mail!';
            // }
            $success_notification = array(
                'message' => 'Please check your email for verification link',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($success_notification);

            // return back()->route('agent_Complete_Reg')->with('result', 'Successfull, Please go to your email to complete the registration');

            // $credentials = $request->only('email', 'password');

            // if (Auth::attempt($credentials)) {

            //     $present_user = Auth::user();

            //     $link = new Refererlink();
            //     $link->user_id = $present_user->id;
            //     $link->agent_code = $present_user->agent_code;
            //     $link->save();

            //     return redirect()->route('agent.dashboard');
            // } else {
            //     return redirect()->intended('/');
            // }
        }
    }



    // original save agent with pay

    public function agent_save_complete_reg(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique: '],
            'phone'    => ['required', 'numeric', 'unique:users'],
            'state'    => ['string'],
            // 'lga'      => ['string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        // $state = $request->state;
        // $result = substr($state, 0, 3);
        // $ist_3_result = strtoupper($result);
        // $randomCode = Str::random(4);
        // $length = 1;
        // $last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
        // $code = $result . $randomCode . $last_letter;


        $state = $request->state;
        $result = substr($state, 0, 3);
        $ist_3_result = strtoupper($result);
        $randomCode = mt_rand(1000,9999);
        //To Get The Last Letter
        // $length = 1;
        // $last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
        // $code = $ist_3_result . $randomCode . $last_letter;
        $code = $ist_3_result . $randomCode;

        //save agent details

        $user = Agent::where('email', $request->email)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->state = $request->state;
        $user->identification_type = $request->identification_type;
        $user->identification_id = $request->identification_id;
        // $user->is_agent = 1;
        $user->agent_code = $ist_3_result . $randomCode;
        // $user->role = 'agent';
        $user->status  = 1;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            // $messages = "$user->name, Your registration was successfull! Please click the link below to complete your registration!";
            // $name = $user->name;
            // $email = $user->email;
            // $origPassword = $request->password;
            // $userRole = $user->role;

            // try {
            //     Mail::to($user->email)->send(new AgentRegistration($messages, $name, $email, $userRole));
            // } catch (\Exception $e) {
            //     $failedtosendmail = 'Failed to Mail!';
            // }



            // if ($user->save()) {
                // Auth::login($user);
                if (Auth::guard('agent')->attempt(['email' => $request->email, 'password' =>  $request->password])) {
                    //Check login
                    if (Auth::guard('agent')->check()) {
                        $present_user = Auth::guard('agent')->user();

                        $link = new Refererlink();
                        $link->agent_id = $present_user->id;
                        $link->agent_code = $present_user->agent_code;
                        $link->save();
                        //Add 200 naira to agent total amount
                        // $present_user->refererAmount = $referer->refererAmount + 200;


                        //if login pass,redirect to agent dashboard page
                        return redirect()->intended('agent/dashboard');
                    } else {
                        session()->flash('fail', ' Credentials2 Incorect');
                        return view('auth.agent_login');
                    }
                }
                session()->flash('fail', ' Credentials Incorect');
                return view('auth.agent_login');
            }

        // if ($user->save()) {
        //     $success_notification = array(
        //         'message' => 'Please check your email for verification link',
        //         'alert-type' => 'success'
        //     );

        //     //Getting agent inputs and authenticate the agent
        //     $status = Auth::guard('agent')->attempt(
        //         [
        //             'email' => $request->email,
        //             'password' => $request->password
        //         ]
        //     );

        //     //Check login
        //     if (Auth::guard('agent')->check()) {
        //         $present_user = Auth::guard('agent')->user();

        //         $link = new Refererlink();
        //         $link->user_id = $present_user->id;
        //         $link->agent_code = $present_user->agent_code;
        //         $link->save();

        //         //if login pass,redirect to agent dashboard page
        //         return redirect()->intended('agent/dashboard');
        //     } else {
        //         session()->flash('fail', ' Credential Incorect');
        //         return view('auth/login');
        //     }
        // }
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
              $saveIdOfAgent = Agent::where('agent_code', $code_of_agent)->first();
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



// reg withou payment

      public function createUser2(Request $request)
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
              $saveIdOfAgent = Agent::where('agent_code', $code_of_agent)->first();
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
                  $referer2 = Agent::where('id', $agent_that_refered)->first();
                  if ($referer2) {
                      $referer2->refererAmount = $referer2->refererAmount + 100;
                      $referer2->save();
                  }
              }

              $person_that_refered = $present_user->idOfReferer;
              if ($person_that_refered) {
                  $referer = User::where('id', $person_that_refered)->first();
              if ($referer) {

                $person_that_refered2 = $referer->idOfReferer;
              if ($person_that_refered2) {
                  $referer3 = User::where('id', $person_that_refered2)->first();
                  // dd($referer->refererAmount);
                  if ($referer3) {
                      $referer3->refererAmount = $referer3->refererAmount + 25;
                      $referer3->save();
                  }
              }
            }
        }

        $person_that_refered = $present_user->idOfReferer;
        if ($person_that_refered) {
            $referer = User::where('id', $person_that_refered)->first();
        if ($referer) {

          $agent_that_refered2 = $referer->idOfAgent;
        if ($agent_that_refered2) {
            $referer4 = Agent::where('id', $agent_that_refered2)->first();
            // dd($referer->refererAmount);
            if ($referer4) {
                $referer4->refererAmount = $referer4->refererAmount + 50;
                $referer4->save();
            }
        }
      }
  }

        $agent_that_refered = $present_user->idOfAgent;
        // dd($agent_that_refered);

        if ($agent_that_refered) {
            $referer2 = Agent::where('id', $agent_that_refered)->first();
            if ($referer2) {

              $referer_parent = $referer2->idOfAgent;
              if ($referer_parent) {
                  $the_referer_parent = Agent::where('id', $referer_parent)->first();
                  if ($the_referer_parent) {
                      $the_referer_parent->refererAmount = $the_referer_parent->refererAmount + 50;
                      $the_referer_parent->save();
                  }
              }
            }
        }

        // $referer_parent = $referer2->idOfAgent;
        // if ($referer_parent) {
        //     $the_referer_parent = Agent::where('id', $referer_parent)->first();
        //       if ($the_referer_parent) {
        //        $referer_grand_parent = $the_referer_parent->idOfAgent;
        //       if ($referer_grand_parent) {
        //           $the_referer_grand_parent = Agent::where('id', $referer_grand_parent)->first();
        //           if ($the_referer_grand_parent) {
        //               $the_referer_grand_parent->refererAmount = $the_referer_grand_parent->refererAmount + 25;
        //               $the_referer_grand_parent->save();
        //           }
        //       }
        //     }
        // }

              if ($present_user->role == 'seller') {
                  return redirect()->route('seller.dashboard')->with($success_notification);
              } else {
                  return Redirect::to(Session::get('url.intended'))->with($success_notification);
              }
          }

          return redirect()->intended('/');
      }



      //This is useless

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



    //gtpay_using _test_credentials
    public function pay_with_gtpay(Request $request)
    {
        $agent_Id = null;
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
            $saveIdOfAgent = Agent::where('agent_code', $code_of_agent)->first();
            if ($saveIdOfAgent) {
                $agent_Id = $saveIdOfAgent->id;
            }
        }
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', Rule::in(['seller', 'buyer']),]
        ]);

        //save without payment if role is buyer

        if ($request->role == 'buyer') {
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

            if ($user->save()) {
                $name = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
                $name = $user->name;
                $email = $user->email;
                $origPassword = $request->password;
                $userRole = $user->role;

                //send mail

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


                // $person_that_refered = $present_user->idOfReferer;
                // if ($person_that_refered) {
                //     $referer = User::where('id', $person_that_refered)->first();
                //     if ($referer) {
                //         $referer->refererAmount = $referer->refererAmount + 50;
                //         $referer->save();
                //     }
                // }

                // $agent_that_refered = $present_user->idOfAgent;
                // if ($agent_that_refered) {
                //     $referer = Agent::where('id', $agent_that_refered)->first();
                //     if ($referer) {
                //         $referer->refererAmount = $referer->refererAmount + 100;
                //         $referer->save();
                //     }
                // }

                if ($present_user->role == 'seller') {
                    return redirect()->route('seller.dashboard')->with($success_notification);
                } else {
                    return Redirect::to(Session::get('url.intended'))->with($success_notification);
                }
            }

            return redirect()->intended('/');
        }

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







   /*
   if ( $request->hasFile('files') ) {
                $names = array();

foreach($request->file('files') as $image)
    {

                $image_name = $image->getClientOriginalName();

        $image->move(public_path('images'),$image_name);
        array_push($names, $image_name);

        }
            $category->image = json_encode($names);
}
*/

        // Image set up
        // if ( $request->hasFile('thumbnail') ) {
        //    $names = array();
        // foreach($request->file('thumbnail') as $image)
        // {
        //     $thumbnailImage = Image::make($image);
        //     $thumbnailImage->resize(300,300);
        //     $thumbnailImage_name = $slug.'.'.time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = 'images/';
        //            /* $image_name = $image->getClientOriginalName();
        //            $image->move(public_path('images'),$image_name);*/
        //         //$thumbnailImage_name = $thumbnailImage->getClientOriginalName();
        //            $thumbnailImage->save($destinationPath . $thumbnailImage_name);
        //            array_push($names, $thumbnailImage_name);
        //        }
        //        $service->image = json_encode($names);
        // }



  // foreach ($allServices as $key => $serv) {
  //           // this is assigning a new field called total_likes to allservices
  //           //note, the total_likes is coming from a function in the model
  //           $allServices[$key]->total_likes = $serv->total_likes;
  //       }

  //       // this will also do what the above code does

  //       // $sortedServices = $allServices->(function($serve){
  //       //   $serve->total_likes = $serve->total_likes;
  //       //   return $serve->total_likes;
  //       // });

  public function sort_ef_marketers_sales(Request $request)
  {
    $validatedData = $request->validate([
      'start_date' => ['required'],
      'end_date' => ['required'],
  ]);

  $to = $request->end_date;
  $from  = $request->start_date;
  $efmarketers = User::where('is_ef_marketer', '1')->with(['referals'])->get();

  foreach($efmarketers as $key => $efmarketer) {
    $ref_count = User::where('is_ef_marketer', '1')
    ->whereHas('referals', function($query) use($to,$from) {
      $query->whereBetween(DB::raw('date(created_at)'), [$from, $to]);
    })
    ->count();
// The DB::raw above is to make the date inclusive of today, remove it and it'll not include today

    $efmarketers[$key]->ref = $ref_count;

  }

  // dd($efmarketers);
  return view('admin.user.ef_marketers', compact('efmarketers'));
}

}



        // Image set up
        // if ($request->hasFile('files')) {
        //     $names = array();
        //     foreach ($request->file('files') as $image) {
        //         $thumbnailImage = Image::make($image);
        //         $thumbnailImage->resize(300, 300);
        //         $thumbnailImage_name = $slug . '.' . time() . '.' . $image->getClientOriginalExtension();
        //         $destinationPath = 'images/';
        //         $thumbnailImage->save($destinationPath . $thumbnailImage_name);
        //         array_push($names, $thumbnailImage_name);
        //     }
        //     $service->thumbnai; = json_encode($names);
        // }




        'id'               => $this->id,
            'user_id'          => $this->user_id,
            'message'          => $this->message,
            'receiver_id'      => $this->receiver_id == null ? '' : $this->receiver_id,
            'sender_name'      => $this->sender_name == null ? '' : $this->sender_name,
            'sender_email'     => $this->sender_email == null ? '' : $this->sender_email,
            'sender_phone'     => $this->sender_phone == null ? '': $this->sender_phone,
            'read_at'          => $this->read_at,
            'slug'             => $this->slug == null ? '' : $this->slug,
            'service_user_id'  => $this->service_user_id == null ? '' : $this->service_user_id,
            'status'           => $this->status,
            'service_id'       => $this->service_id == null ? '' : $this->service_id,
            'parent_id'        => $this->parent_id == null ? '' : $this->parent_id,
            'message_id'       => $this->messageable_id,
            'message_type'     => $this->messageable_type,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
            'user'             => new UserResource($this->user),
            'service'          => new ServiceResource($this->service),
            'message_replies'  => MessageResource::collection($this->replies),