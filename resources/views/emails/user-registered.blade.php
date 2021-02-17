@component('mail::message')
# Your registration was successfull!
## <strong>These are your details for backup</strong>

<p><strong>Email: </strong></p>

@component('mail::button', ['url' => 'login'])
Login Now
@endcomponent

Thanks,<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
