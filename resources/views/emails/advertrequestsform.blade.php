@component('mail::message')
# A user requested for an advert placement!

<p><strong>User Name: </strong>{{ $name ? $name : 'No name!' }}</p>
<p><strong>Subject: </strong>{{ $subject ? $subject : 'No subject!' }}</p>
<p><strong>Advert Type: </strong>{{ $advert_type ? $advert_type : 'No advert type!' }}</p>
<p><strong>Phone: </strong>{{ $phone ? $phone : 'No phone!' }}</p>
<p><strong>Email: </strong>{{ $email ? $email : 'No email!' }}</p>
<p><strong>Email: </strong>{{ $advert_referral_name ? $advert_referral_name : 'No Referral!' }}</p>
<p><strong>Your message: </strong></p>
<p><p>{{ $message ? $message : 'No message!' }}</p>

@endcomponent
