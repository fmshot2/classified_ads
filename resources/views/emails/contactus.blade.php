@component('mail::message')
# Your message has been received!

<p><strong>Subject: </strong>{{ $subject ? $subject : 'No message!' }}</p>
<p><strong>Message:</strong></p>
<p>{{ $message ? $message : 'No message!' }}</p>

@component('mail::button', ['url' => route('home')])
Visit our website
@endcomponent

@component('mail::panel')
Thank you for contacting EFContact. We will get back you as soon as possible
@endcomponent

<div style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
position: relative; margin: 21px 0;">
    <div style="box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    position: relative;
    background-color: #edf2f7;
    color: #718096;
    padding: 16px;">
        <img src="https://efcontact.com/uploads/sponsored/Artboard%201%20(1)-1615901555.png" alt="" style="width: 100%; padding: 0; margin: 0">
        @if ($advertisements)
            @foreach($advertisements->shuffle() as $advertisement)
                @if ($advertisement->advert_location == 7 && $loop->index < 1)
                    <div class="media">
                        <div class="media-body align-self-center">
                            <a class="title" href="{{ $advertisement->website_link ? $advertisement->website_link : '#' }}"  style="font-size: 14px;"><img class="media-object" src="{{ asset('uploads/sponsored/'.$advertisement->banner_img) }}" alt="{{ $advertisement->title }}" style="width: 250px; height: 65px"></a>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p>No advert here!</p>
        @endif
    </div>

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

<p style="font-size:13px; line-height:1.5; text-align:justify"><small><strong style="font-size:11px;">DISCLAIMER:</strong> {{ $general_info->email_disclaimer ? $general_info->email_disclaimer : 'This email and any information transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited. If you are the intended please note that you are not to share or disclose the content of this mail.' }}</small></p>
</div>
@endcomponent
