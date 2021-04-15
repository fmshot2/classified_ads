@component('mail::message')
# A user left a feedback!
___

<h4>The Feedback:</h4>
<p>
    {{ $feedback ? $feedback : 'No Feedback!' }}
</p>

@component('mail::button', ['url' => route('login')])
Login Now
@endcomponent

Thanks,<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
