@component('mail::message')

<h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 23px; font-weight: bold; margin-top: 0; text-transform: uppercase;color:#CA8309;">{{ $header_title }}</h1>

<h3 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 19px; font-weight: bold; margin-top: 0;">Hello, {{ $username }}!</h3>

<h5 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 15px; font-weight: bold; margin-top: -10px;">{{ $intro }}</h5>

<div class="table" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;"></div>
    <table style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 30px auto; width: 100%;">
    <tbody style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; border-top: 0"><tr style="width: 100%">
        <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #74787e; font-size: 15px; line-height: 18px; margin: 0; padding: 15px; width: 30%; display:inline-block"><img src="{{asset('earnmoney.png')}}" alt="EFContact"></td><td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #74787e; font-size: 16px; line-height: 18px; margin: 0; padding: 15px; width: 50%; display:inline-block">{{ $tagline }}</td></tr>
    </tbody></table>
</div>
<div class="table" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
    {!! $body !!}
</div>

@component('mail::button', ['url' => $link])
Visit Website
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
<div style="font-size: 13px; font-style:italic">
You are receiving this email because you have an EFContact account. <a style="text-decoration: none" href="{{ route('contact') }}">Unsubscribe</a>
</div>
@endcomponent
