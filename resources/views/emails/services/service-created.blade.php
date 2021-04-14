@component('mail::message')
# Your service was created successfully!

<p><strong>Service Name: </strong> {{ $name ? $name : 'Name not provided!' }}</p>
<p><strong>Service Category: </strong> {{ $category ? $category : 'Category not provided!' }}</p>
<p><strong>Phone: </strong> {{ $phone ? $phone : 'Phone not provided!' }}</p>
<p><strong>State: </strong> {{ $state ? $state : 'State not provided!' }}</p>

@component('mail::button', ['url' => route('serviceDetail', ['slug' => $slug])])
View Service
@endcomponent

@component('mail::panel')
Promote your service by sharing it on different platforms. Social media, forums etc.
@endcomponent

Thanks,<br>
<em>Wishing you all the best</em><br>
<strong>{{ config('app.name') }}</strong>
<div class="table" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; padding-bottom: 15px;font-size: 13px; margin-top: -15px">
    <a style="text-decoration: none; color: #ca8309" href="telto:{{ $general_info->hot_line ? $general_info->hot_line : '' }}">📞 {{ $general_info->hot_line ? $general_info->hot_line : '' }}</a> <br>
    <a style="text-decoration: none; color: #ca8309" href="https://wa.me/{{ $general_info->hot_line_3 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services.">{{ $general_info->hot_line_3 ? '📱 Whatsapp' : '' }}</a> <br>
    <a style="text-decoration: none; color: #ca8309" href="mailto:{{ $general_info->hot_line ? $general_info->support_email : '' }}">✉️ {{ $general_info->hot_line ? $general_info->support_email : '' }}</a> <br>
</div>
@endcomponent
