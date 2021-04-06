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
@endcomponent
