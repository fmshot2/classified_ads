<?php

namespace App\Http\Livewire\Agent;

use App\Agent;
use App\Mail\UserRegistered;
use App\Mail\AgentRegistration;
use App\Refererlink;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


use App\State;
use App\Local_government;
use App\Mail\SendMailable;

class Register extends Component
{

    public $agent_name;
    public $agent_email;
    public $password;
    public $password_confirmation;    
    public $phone;
    public $address;
    public $identification_type;
    public $identification_id;
    public $state_id;
    public $city_id;
    public $accountname;
    public $bankname; 
    public $accountno;
    public $states = [];
    public $cities = [];

    public $tab = 1;


    public function mount()
    {
        $this->states = State::all();
    }

    // public function hydrateStateId($value)
    // {
    //     dd($value);
    // }

    public function change_tab($number)
    {
        $this->validate([
            'agent_name'           => ['required', 'string', 'max:255'],
            'state_id'             => ['required'],
            'city_id'              => ['required'],
            'agent_email'          => ['required'],
            'phone'                => ['required', 'string', 'max:255'],
            'address'              => ['required'],
            'identification_type'  => ['required'],
            'identification_id'    => ['required'],
        ]);
        $this->tab = $number;
    }

    public function updatedStateId($value)
    {
        $this->cities = Local_government::where('state_id', $value)->get();
    }

    protected $listeners = ['verifyPaystackAmount', 'reset_view'];

    public function reset_view()
    {
        $this->current_view = 'livewire.agent.register';
    }

    public function validate_form2()
    {
        $this->validate([
            'bankname'           => ['required', 'string', 'max:255'],
            'accountname'        => ['required', 'string'],
            'accountno'          => ['required', 'string'],
            'password'           => ['required', 'string', 'max:255'],
        ]);

     //    $validator = Validator::make($request->all(), [
     //      'name'           => ['required', 'string', 'max:255'],
     //      'agent_email'    => ['required', 'string', 'email', 'max:255', 'unique:agents'],
     //      'password'       => ['required', 'string', 'min:6', 'confirmed'],
     //    ]);

     //    if ($validator->fails()) {
     //     $success_notification = array(
     //        'message' => 'Unsuccessfull Request. Please Retry',
     //        'alert-type' => 'error'
     //    );
     //     return redirect('/')->with($success_notification)->withErrors($validator)->withInput();
     // }

        $data = [
            'key'    => 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
            'amount' => 500 * 100,
            'email'  => $this->agent_email,
            'name'   => $this->agent_name,
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
        if($status === 'success' && ($amount/100) == 500){
            $this->save_user();
        } else {
            session()->flash('message', 'there was an error with your payment, please contact admin.');
        }
    }

    public function save_user()
    {

        $slug3 = Str::random(8);

       


        //save user
        $user           = Agent::where('email', $this->agent_email)->first();
        if ($user) {
        $user->name     = $this->agent_name;
        $user->email    = $this->agent_email;
        $user->password = Hash::make($this->password);

        //send mail

        if ($user->save()) {

            $name         = "$user->name, Your registration was successfull! Have a great time enjoying our services!";
            $name         = $user->name;
            $email        = $user->email;
            $origPassword = $this->password;
            $userRole     = $user->role;

            try {
                Mail::to($user->email)->send(new AgentRegistration($name, $email, $origPassword, $userRole));
                Auth::attempt(['email' => $this->email, 'password' => $this->password]);
            } catch (\Exception $e) {
                $failedtosendmail = 'Failed to Mail!';
            }
        }
    }
            $success_notification = array(
            'message' => 'Your email was not found. Please Re-register',
            'alert-type' => 'error'
            );
            return redirect('/')->with($success_notification);



         if (Auth::guard('agent')->check()) {
                    $present_user = Auth::guard('agent')->user();

                    $link = new Refererlink();
                    $link->agent_id = $present_user->id;
                    $link->agent_code = $present_user->agent_code;
                    $link->save();
                   


                    //if login pass,redirect to agent dashboard page
                    return redirect()->intended('agent/dashboard');
                } else {
                    session()->flash('fail', ' Credentials2 Incorect');
                    return view('auth.agent_login');
                }
    }


    public function render()
    {
        return view('livewire.agent.register');
    }
}
