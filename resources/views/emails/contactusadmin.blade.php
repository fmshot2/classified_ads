@component('mail::message')
# A user messaged you!

<p><strong>User Name: </strong>{{ $name ? $name : 'No name!' }}</p>
<p><strong>Subject: </strong>{{ $subject ? $subject : 'No subject!' }}</p>
<p><strong>Phone: </strong>{{ $phone ? $phone : 'No phone!' }}</p>
<p><strong>Email: </strong>{{ $email ? $email : 'No email!' }}</p>
<p><strong>Your message: </strong></p>
<p><p>{{ $message ? $message : 'No message!' }}</p>

@endcomponent
