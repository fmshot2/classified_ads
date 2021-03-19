@component('mail::message')
{{-- # Your registration was successful! --}}
## <strong>Here are your details</strong>

<p><strong>Full Name: </strong> {{ $name ? $name : 'Name not provided!' }}</p>
<p><strong>Email: </strong> {{ $email ? $email : 'Name not provided!' }}</p>
{{-- <p><strong>Password: </strong> {{ $password ? $password : 'Name not provided!' }}</p> --}}
{{-- <p><strong>Account Type: </strong> {{ $accountType == 'agent' ? 'EFContact Agent' : '' }}</p> --}}

@component('mail::button', ['url' => route('agent_Complete_Reg', ['email'=> $email])])
Click here to complete your agent registeration
@endcomponent

@component('mail::panel')
{{-- EFContact. Your Pathway To Greatness. 😃 --}}
@endcomponent

Thanks,<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
