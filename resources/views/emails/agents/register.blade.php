@component('mail::message')
# Welcome To EFContact Agent registration
## <strong>Here are your details</strong>

<p><strong>Full Name: </strong> {{ $name ? $name : 'Name not provided!' }}</p>
<p><strong>Email: </strong> {{ $email ? $email : 'Name not provided!' }}</p>

@component('mail::button', ['url' => route('agent_Complete_Reg', ['email'=> $email])])
Click here to complete your agent registeration
@endcomponent

@component('mail::panel')
<strong>Note:</strong> The registration to be an agent on EFContact will attract a fee of <strong>&#8358;500.</strong>
@endcomponent

Thanks,<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
