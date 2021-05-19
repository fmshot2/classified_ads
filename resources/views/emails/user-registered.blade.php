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
<em style="font-size:13px">Wishing you all the best!</em><br>
<strong>{{ config('app.name') }}</strong>
<div class="table" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; padding-bottom: 15px;font-size: 13px; margin-top: -15px">
    <a style="text-decoration: none; color: #ca8309" href="telto:{{ $general_info->hot_line ? $general_info->hot_line : '' }}">📞 {{ $general_info->hot_line ? $general_info->hot_line : '' }}</a> <br>
    <a style="text-decoration: none; color: #ca8309" href="https://wa.me/{{ $general_info->hot_line_3 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services.">{{ $general_info->hot_line_3 ? '📱 Whatsapp' : '' }}</a> <br>
    <a style="text-decoration: none; color: #ca8309" href="mailto:{{ $general_info->hot_line ? $general_info->support_email : '' }}">✉️ {{ $general_info->hot_line ? $general_info->support_email : '' }}</a> <br>
</div>

<div class="table" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; padding-bottom: 15px; text-align: center; font-size: 13px">
Please do not reply to this email.

<p style="font-size:13px; line-height:1.5; text-align:justify"><small><strong style="font-size:11px;">DISCLAIMER:</strong> {{ $general_info->email_disclaimer ? $general_info->email_disclaimer : 'This email and any information transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited. If you are the intended please note that you are not to share or disclose the content of this mail.' }}</small></p>
</div>
@endcomponent
