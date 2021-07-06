<?php

namespace App\Http\Livewire\User;

use App\Agent;
use App\GroupRegistrationCode;
use App\Mail\UserRegistered;
use App\Refererlink;
use App\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;



class GroupRegisteration extends Component
{

    public $group_code;
    public $agent_code;
    public $refer;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $terms;
    public $role = 'seller';
    public $agent_Id;
    public $current_view;

    public function validate_group_code($code): bool
    {
        $group_reg_code = GroupRegistrationCode::where('code', $code)->first();

        if ($group_reg_code && ($group_reg_code->max_usable > $group_reg_code->total_used)) {
            return true;
        }

        return false;
    }

    public function update_group_code($code): bool
    {
        $group_reg_code = GroupRegistrationCode::where('code', $code)->first();

        if ($group_reg_code && ($group_reg_code->max_usable > $group_reg_code->total_used)) {
            $group_reg_code->total_used++;
            $group_reg_code->save();

            return true;
        }

        return false;
    }

    public function save_user()
    {

        // validate form
        $this->validate([
            'group_code' => ['required', 'string', 'max:255', 'exists:group_registration_codes,code'],
            'refer'      => ['nullable', 'string', 'max:255'],
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'      => ['required', 'numeric'],
            'password'   => ['required', 'string', 'min:6'],
            'role'       => ['required', Rule::in(['seller', 'buyer'])],
            'agent_code' => ['nullable', 'exists:agents,agent_code'],
            'terms'      => [],
        ]);

        // check if the group code exists and has not been used to limit
        if (!$this->validate_group_code($this->group_code)) {
            session()->flash('error', 'An invalid group code was provided.');
            return;
        }

        $group_reg_code = GroupRegistrationCode::where('code', $this->group_code)->first();

        $link_from_url = $this->refer;
        $code_of_agent = $this->agent_code;

        $slug3 = Str::random(8);


        $slug3 = Str::random(8);
        $random = Str::random(3);
        // $userSlug = Str::of($this->name)->slug('-').''.$random;
        $userSlug = Str::of($this->name)->slug('-') . '' . $random;

        // Get id of owner of $link_from_url if available
        if ($link_from_url) {
            $saveIdOfRefree = User::where('refererLink', $link_from_url)->first();
            if ($saveIdOfRefree) {
                $refererId = $saveIdOfRefree->id;
            } else {
                session()->flash('error', 'The referer link used is incorrect!');
                return;
            }
        } else {
            $refererId = null;
        }


        // Get id of owner of $agent code if available
        if ($code_of_agent) {
            $saveIdOfAgent = Agent::where('agent_code', $code_of_agent)->first();
            if ($saveIdOfAgent) {
                $agent_Id = $saveIdOfAgent->id;
            } else {
                session()->flash('error', 'The Agent Code used is incorrect!');
                return;
            }
        } else {
            $agent_Id = null;
        }

        //save user
        $user           = new User;
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->phone    = $this->phone;
        $user->password = Hash::make($this->password);
        $user->role     = $this->role;
        $user->slug     = $userSlug;
        //save id of referer if user was reffererd
        $user->idOfReferer = $refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $agent_Id;
        $user->refererLink = $slug3;
        //send mail

        if ($new_user = $user->save()) {
            
            $this->update_group_code($this->group_code);
            session()->forget('current_param');

            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $this->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }

        if ($new_user) {
            $present_user = $user;
            // if referrer link is available, save it to referer table
            $link              = new Refererlink();
            $link->user_id     = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            // if ($user->role == 'buyer') {
            //     // return  Redirect::to(session(url()->previous()));
            //     $success_notification = array(
            //         'message' => 'Done!',
            //         'alert-type' => 'success'
            //     );

            //     session()->flash('message', 'Account created successfuly.');
            $this->clearFields();

            //     return;
            // }
            // save user's subscription module

            if ($group_reg_code->amount == 200) {
                $added_days = 31;
                $sub_type = 'monthly';
            } elseif ($group_reg_code->amount == 600) {
                $added_days = 93;
                $sub_type = '3 months';
            } elseif ($group_reg_code->amount == 1200) {
                $added_days = 186;
                $sub_type = 'bi-annual';
            } elseif ($group_reg_code->amount == 2400) {
                $added_days = 372;
                $sub_type = 'yearly';
            } else {
                $added_days = 0;
                $sub_type = null;
            }

            $user->subscriptions()->create([
                'sub_type' => $sub_type,
                'last_amount_paid' => $group_reg_code->amount,
                'subscription_end_date' => Carbon::now()->addDays($added_days),
                'email' => $user->email
            ]);

            $user->mypayments()->create(['payment_type' => 'registration', 'amount' => $group_reg_code->amount, 'tranx_ref' => null]);


            //level 1 start
            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
                if ($referer) {
                    //if your refferer is an efmarketer staff, redirect user to dashboard
                    if ($referer->is_ef_marketer) {
                        session()->flash('message', 'Account created successfuly.');
                        $this->clearFields();
                        return;
                    }

                    $referer->refererAmount = $referer->refererAmount + 200;
                    //save my id  as level 1 on the table of the one that reffered me
                    $referer->level1 = $user->id;
                    $referer->save();

                }
            }

            $agent_that_refered = $present_user->idOfAgent;
            if ($agent_that_refered) {
                $referer2 = Agent::where('id', $agent_that_refered)->first();
                if ($referer2) {
                    //if your agent is an efmarketer staff, redirect user to dashboard
                    if ($referer2->is_ef_marketer) {
                        session()->flash('message', 'Account created successfuly.');
                        $this->clearFields();
                        return;
                    }

                    $referer2->refererAmount = $referer2->refererAmount + 200;

                    //if my referee is an agent, save my id  as level 1 on the table of the Agent that reffered me
                    $referer2->level1 = $user->id;
                    $referer2->save();

                    $referer2->referals()->create(['user_id' => $user->id]);
                }
            }

            //end level 1 payment

            //start level 2

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
                            if ($referer2->level2) {
                                session()->flash('message', 'Account created successfuly.');
                                $this->clearFields();
                                return;
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = $user->id;
                            $referer2->save();
                            
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
                            if ($referer2->level2) {
                                session()->flash('message', 'Account created successfuly.');
                                $this->clearFields();
                                return;
                            }

                            $referer2->refererAmount = $referer2->refererAmount + 150;
                            $referer2->level2 = $user->id;
                            $referer2->save();
                            // $present_user->level2 = $referer3->id;                    }
                        }

                        // $present_user->level2 = $referer3->id;
                    }
                }
            }
            //end level 2 payment


            //start level 3
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
                                    if ($referer4->level3) {
                                        session()->flash('message', 'Account created successfuly.');
                                        $this->clearFields();
                                        return;
                                    }

                                    // add amount to level 3 referer amount
                                    $referer4->refererAmount = $referer4->refererAmount + 100;
                                    $referer4->level3 = $user->id;
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
                                    if ($referer4->level3) {
                                        session()->flash('message', 'Account created successfuly.');
                                        $this->clearFields();
                                        return;
                                    }

                                    // add amount to level 3 referer amount
                                    $referer4->refererAmount = $referer4->refererAmount + 100;
                                    $referer4->level3 = $user->id;
                                    $referer4->save();
                                    // $present_user->level2 = $referer3->id;
                                }
                            }
                        }
                    }
                }
            }
            //end level 3 payment


            //start level 4 payment

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

                                            if ($referer5->level4) {
                                                session()->flash('message', 'Account created successfuly.');
                                                $this->clearFields();
                                                return;
                                            }

                                            // add amount to level 4 referer amount
                                            $referer5->refererAmount = $referer5->refererAmount + 50;
                                            $referer5->level4 = $user->id;
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
                                            if ($referer5->level4) {
                                                session()->flash('message', 'Account created successfuly.');
                                                $this->clearFields();
                                                return;
                                            }

                                            // add amount to level 4 referer amount
                                            $referer5->refererAmount = $referer5->refererAmount + 50;
                                            $referer5->level4 = $user->id;
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
            // end level 4 payment
            if ($user->role == 'seller') {
                session()->flash('message', 'Account created successfuly.');
                $this->clearFields();
                return;
            }
        }

        session()->flash('message', 'Account created successfuly.');
        $this->clearFields();
    }

    public function clearFields()
    {
        $this->group_code            = '';
        $this->refer                 = '';
        $this->name                  = '';
        $this->email                 = '';
        $this->phone                 = '';
        $this->password              = '';
        $this->password_confirmation = '';
        $this->agent_code            = '';
        $this->terms                 = '';
    }


    public function render()
    {
        return view('livewire.user.group-registeration');
    }
}
