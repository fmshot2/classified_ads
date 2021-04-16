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
use App\Bank;

use App\Local_government;
use App\Mail\SendMailable;
use Config;


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
    public $banks = [];


    public $tab = 1;


    public function mount()
    {
        $this->states = State::all();

        $this->banks = Bank::all();
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
            'accountno'          => ['required', 'numeric'],
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

            // $url = config('example.url');

            // 'key'    => 'pk_live_8921deda409e1196f265fd3a7dcc4eff81d52cdb',
            // 'key'    => 'pk_test_b951412d1d07c535c90afd8a9636227f54ce1c43',
            
            //test variable from env
            // 'key'    => config('variable.paystack_pk_test'),
            // 'key'    => config('variable.paystack_pk_live'),

            // live variable
            'key'    => env('paystack_pk'),      
            'amount' => 500 * 100,
            'email'  => $this->agent_email,
            'name'   => $this->agent_name,
        ];

        $this->dispatchBrowserEvent('pay_with_paystack', ['data' => $data]);

    }

    public function verifyPaystackAmount($paystack_response)
    {
        $paystack_sk    = env('paystack_sk');

        $response = Http::withHeaders([
            'content-type' => 'application/json',
        ])
        // ->withToken('sk_live_567bac30399617933d4403048429bcfbd565cba1')
        // ->withToken('sk_test_11395d522a279cf6fb0f8c6cf0fd7f41b2c15200')


        ->withToken($paystack_sk)
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

        $state =  State::where('id', $this->state_id)->first();
        $result = $state->abbr;
        $ist_3_result = strtoupper($result);
        $randomCode = mt_rand(1000, 9999);
        //To Get The Last Letter
        // $length = 1;
        // $last_letter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
        // $code = $ist_3_result . $randomCode . $last_letter;
        $code = $result . $randomCode;

        //save user
        $user = Agent::where('email', $this->agent_email)->first();

        if (!$user) {
           
            session()->flash('fail', ' Your email was not found. Please Re-register');
            return redirect()->route('home');     
        }

        if ($user) {
        $user->name                     = $this->agent_name;
        $user->email                    = $this->agent_email;
        $user->password                 = Hash::make($this->password);
        $user->identification_type      = $this->identification_type;
        $user->identification_id        = $this->identification_id;
        $user->state                    = $this->state_id;
        $user->lga                      = $this->city_id;
        $user->address                  = $this->address;
        $user->accountname              = $this->accountname;
        $user->bankname                 = $this->bankname;
        $user->accountno                = $this->accountno;
        $user->agent_code               = $code;


        //send mail
        //                 Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        // if (Auth::check()) {


        if ($user->save()) {  

            Auth::guard('agent')->attempt(['email' => $this->agent_email, 'password' => $this->password]);

            if (Auth::guard('agent')->check()) {
            //Check login

                $present_user = Auth::guard('agent')->user();

                $link = new Refererlink();
                $link->agent_id = $present_user->id;
                $link->agent_code = $present_user->agent_code;
                $link->save();   






                            

                    //if login pass,redirect to agent dashboard page
                session()->flash('success', 'Content Created Successfully.');
                
                return redirect()->route('agent.dashboard');
            } else {
                session()->flash('fail', ' Credentials Incorect');
                return view('auth.agent_login');
            }
        }
    }
}


    public function render()
    {
        return view('livewire.agent.register');
    }
}
