<?php

namespace App\Http\Livewire\Agent;

use Livewire\Component;

class Register extends Component
{

  public $referParam;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $agent_code;
    public $terms;
    public $refererId;
    public $agent_Id;
    public $current_view;

    public function mount()
    {
        $this->current_view = 'livewire.user.register';
    }

    protected $listeners = ['verifyPaystackAmount', 'reset_view'];

    public function reset_view()
    {
        $this->current_view = 'livewire.user.register';
    }

    public function validate_form()
    {
        $this->validate([
            'referParam'            => ['nullable', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:6', 'confirmed'],
            'role'                  => ['required', Rule::in(['seller', 'buyer'])],
            'agent_code'            => ['nullable'],
            'terms'                 => ['required'],
        ]);

        $data = [
            'key'    => 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
            'amount' => 500 * 100,
            'email'  => $this->email,
            'name'   => $this->name,
        ];

        $this->dispatchBrowserEvent('pay_with_paystack', ['data' => $data]);

    }

    public function verifyPaystackAmount($paystack_response)
    {
        $response = Http::withHeaders([
            'content-type' => 'application/json',
        ])
        ->withToken('sk_test_11395d522a279cf6fb0f8c6cf0fd7f41b2c15200')
        ->get("https://api.paystack.co/transaction/verify/" . $paystack_response['trxref']);

        $json_resp = $response->json();
        $status    = $json_resp['data']['status'];
        $amount    = $json_resp['data']['amount'];

        // dd($json_resp);

        // dd($status, $amount);
        if($status === 'success' && ($amount/100) == 200){
            $this->save_user();
        } else {
            session()->flash('message', 'there was an error with your payment, please contact admin.');
        }
    }

    public function save_user()
    {

        $slug3 = Str::random(8);

        // Get id of owner of $link_from_url if available
        if ($this->referParam) {
            $saveIdOfRefree = User::where('refererLink', $this->referParam)->first();
            $this->refererId = $saveIdOfRefree->id;
        }

        // Get id of owner of $agent code if available
        if ($this->agent_code) {
            $saveIdOfAgent = User::where('agent_code', $this->agent_code)->first();
            $this->agent_Id = $saveIdOfAgent->id;
        }

        //save user
        $user           = new User;
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->password = Hash::make($this->password);
        $user->role     = $this->role;
        //save id of referer if user was reffererd
        $user->idOfReferer = $this->refererId;
        //save id of agent if user was brought by agent
        $user->idOfAgent = $this->agent_Id;
        $user->refererLink = $slug3;
        //send mail

        if ($user->save()) {

            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $this->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new UserRegistered($name, $email, $origPassword, $userRole));
                Auth::attempt(['email' => $this->email, 'password' => $this->password]);
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }



        if (Auth::check()) {
            $present_user = Auth::user();
            // if referrer link is available, save it to referer table
            $link              = new Refererlink();
            $link->user_id     = $present_user->id;
            $link->refererlink = $present_user->refererLink;
            $link->save();

            $person_that_refered = $present_user->idOfReferer;
            if ($person_that_refered) {
                $referer = User::where('id', $person_that_refered)->first();
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
                        if ($referer3) {
                            $referer3->refererAmount = $referer3->refererAmount + 25;
                            $referer3->save();
                        }
                    }
                }
            }

            $agent_that_refered = $present_user->idOfAgent;
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

            if (Auth::user()->role == 'seller') {
                return redirect()->route('seller.dashboard');
            } else if (Auth::user()->role == 'buyer') {
                return  Redirect::to(Session::get('url.intended'));
            } else {
                return redirect()->route('admin.dashboard');
            }
        }
    }







    public function render()
    {
        return view('livewire.agent.register');
    }
}
