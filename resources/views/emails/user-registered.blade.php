@component('mail::message')
# Your registration was successful!
## <strong>These are your details for backup</strong>

<p><strong>Full Name: </strong> {{ $name ? $name : 'Name not provided!' }}</p>
<p><strong>Email: </strong> {{ $email ? $email : 'Name not provided!' }}</p>
<p><strong>Password: </strong> {{ $password ? $password : 'Name not provided!' }}</p>
<p><strong>Account Type: </strong> {{ $accountType == 'seller' ? 'Service Provider' : 'Service Seeker' }}</p>

@component('mail::button', ['url' => route('login')])
Login Now
@endcomponent

@component('mail::panel')
Thank you for registering to our platform. Start promoting your products and services!
@endcomponent

Thanks,<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
