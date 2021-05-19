@component('mail::message')

<style>
    @media (max-width: 768px){
        .ser-row td{
            width: 100% !important;
        }
    }
</style>

<h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 23px; font-weight: bold; margin-top: 0; text-align: center; text-transform: uppercase;color:#CA8309;">{{ $header_title }}</h1>

<h3 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 19px; font-weight: bold; margin-top: 0; text-align: center;">Hello, {{ $username }}!</h3>

<h5 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 15px; font-weight: bold; margin-top: -10px; text-align: center;">{{ $intro }}</h5>

{{-- <h4 style="font-size: 18px; margin-bottom: -30px;padding-left:20px;color:#CA8309;text-transform:uppercase">{{ $category->name }}</h4> --}}
<div class="table" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;"></div>
    <table style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 30px auto; width: 100%;">
    <tbody style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; border-top: 0"><tr class="ser-row">@foreach ($services as $service) @if ($loop->index <= 5)
        <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #74787e; font-size: 15px; line-height: 18px; margin: 0; padding: 15px; width: 50%; display:inline-block">
            <div><div style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100%; width: 100%; background-image: url('{{asset('uploads/services/'.$service->thumbnail)}}');display: block;height: 200px;width: auto;background-size: cover !important;background-position: center !important;"></div>
            <div>
                <h4>{{ Str::limit($service->name, 30) }}</h4>
                <p style="font-size: 12px;margin-top: -18px">{{ $service->state }}, {{ $service->city }}</p>
            </div>
            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="button button-primary" target="_blank" rel="noopener" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #ca8309; border-bottom: 8px solid #ca8309; border-left: 18px solid #ca8309; border-right: 18px solid #ca8309; border-top: 8px solid #ca8309;margin-top: -5px;">View Service</a></div></td> @endif @endforeach</tr>
    </tbody></table>
</div>


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
