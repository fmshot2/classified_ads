<?php

namespace App\Http\Livewire\User;

use App\Agent;
use App\GroupRegistrationCode;
use App\Mail\UserRegistered;
use App\Refererlink;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;



class GroupRegisteration extends Component
{

    public $group_code;
    public $agent_code;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $terms;
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
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'string', 'min:6', 'confirmed'],
            'agent_code' => ['nullable'],
            // 'group_code' => ['required', 'exists:group_registration_codes,code'],
            'terms'      => ['required'],
        ]);

        // check if the group code exists and has not been used to limit
        if (!$this->validate_group_code($this->group_code)) {
            session()->flash('error', 'An invalid group code was provided.');
            return;
        }

        // generate random number for user's referal link
        $slug3 = Str::random(8);

        // Get id of owner of $agent code if available
        if ($this->agent_code) {
            $saveIdOfAgent  = User::where('agent_code', $this->agent_code)->first();
            if($saveIdOfAgent){
                $this->agent_Id = $saveIdOfAgent->id;
            }
        }

        //save user
        $user           = new User;
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->password = Hash::make($this->password);
        $user->role     = 'seller';
        //save id of agent if user was brought by agent
        $user->idOfAgent   = $this->agent_Id;
        $user->refererLink = $slug3;
        $result            = $user->save();
        

        // check if the user was created success
        if (!$result) {
            session()->flash('error', 'there was an error while creating user, please try again.');
            return;
        }

        //send new user mail
        try {
            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $this->password;
            $userRole     = $user->role;

            Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));

        } catch (\Exception $e) {
            // $failedtosendmail = 'Failed to Mail!';
        }

        // increament the groupcode's total_used by one
        $this->update_group_code($this->group_code);

        // create referal link
        $link              = new Refererlink();
        $link->user_id     = $user->id;
        $link->refererlink = $user->refererLink;
        $link->save();

        // give referal commission
        $agent_that_refered = $user->idOfAgent;
        if ($agent_that_refered) {
            $referer2 = Agent::where('id', $agent_that_refered)->first();
            if ($referer2) {
                $referer2->refererAmount = $referer2->refererAmount + 100;
                $referer2->save();
            }
        }

        $agent_that_refered = $user->idOfAgent;
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

        $this->password              = '';
        $this->password_confirmation = '';
        $this->name                  = '';
        $this->email                 = '';
        $this->terms                 = '';

        session()->flash('message', 'Seller created successfuly.');

    }


    public function render()
    {
        return view('livewire.user.group-registeration');
    }
}
