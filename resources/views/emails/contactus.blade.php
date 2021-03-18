@component('mail::message')
# Your message has been received!

<p><strong>Subject: </strong>{{ $message }}</p>
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
<em>Wishing you all the best</em><br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
