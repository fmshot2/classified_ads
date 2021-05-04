
@extends('layouts.app')

@section('title', $serviceDetail->name . ' | ')


@section('content')

<style>
    .btn-submit2{
        color: #fff !important;
        background-color: #CA8309 !important;
    }
    p{
        font-size: 16px;
    }
    form label{
        font-size: 16px !important;
    }
    .b-provider-online-info {
        width: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding: 12px 0;
        border-top: 1px solid #f2f2f2;
        border-bottom: 1px solid #f2f2f2;
        margin-bottom: 15px;
    }
    .b-provider-online-info-block:not(:last-of-type) {
        border-right: 1px solid #f2f2f2;
    }
    .b-provider-online-info-block {
        -webkit-box-flex: 1;
        -webkit-flex: 1 0;
        -ms-flex: 1 0;
        flex: 1 0;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 8px 0;
    }
    .b-provider-online-title {
        color: #efac4e;
        font-size: 16px;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 3px;
    }
    .b-provider-online-aside {
        color: #464b4f;
        font-size: 14px;
        line-height: 1.5;
        font-weight: 600;
    }
    .nav-link:hover #liketab{
        color: #fff !important;
    }
    .lgtbxDiv{
        display: block;
        height: 200px;
        width: auto;
        background-size: cover !important;
        background-position: center !important;
    }
    .user-comments .media-body{
        margin-left: 10px !important;
        font-family: 'Poppins-Regular';
    }
    .user-comments .media-heading{
        font-size: 16px;
        font-family: 'Poppins-Regular';
        text-transform: uppercase;
        color: #ca8309;
    }
    .user-comments .media-heading small{
        font-size: 14px;
        text-transform: initial;
        color: rgb(83, 83, 83);
    }
    .user-comments .media img{
        border-radius: 10px;
    }
    .comment-form h5{
        font-size: 17px;
        text-transform: uppercase;
    }

    @media (max-width: 768px){
        .lgtbxDiv{
            height: 100px;
        }
        .tabbing-box.col-sm-12{
            padding-left: 0;
            padding-right: 0;
        }
        .tabbing-box .nav-tabs li {
            margin-bottom: 5px;
        }
    }

</style>

<!-- Sub banner start -->
<div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/servicedetail.jpg')}})">
    <div class="container">
        <div class="page-name">
            @if(isset($ww2))
                <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px; ">
                    <div class="toast bg-warning" style="position: absolute; top: 0; right: 0; border-radius: 8px;">
                        <div class="toast-body">
                            Hello, world! This is a toast message.
                        </div>
                    </div>
                </div>
            @endif

            <div class="sub-banner-text-content">
                <h1>Service Detail</h1>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><span>/</span>{{ $serviceDetail->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div id="complaint_notification2" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
    <div class="toast bg-success mt-2 p-2" style="border-radius: 6px; position: absolute; top: 0; right: 0; display: none">
        <div class="toast-header">
            <i class="fa fa-check-circle"></i>
            <strong class="mr-auto text-white">Your complaint was sent successfully</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

    <!-- Properties Details page start -->
    <div class="properties-details-page content-area-7 service-page-sidebar">
        <div class="service-detail-container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12" style="background-color: #fff">
                    <div class="properties-details-section" style="padding-top: 15px;">
                        <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                            <!-- Heading properties start -->
                            <div class="heading-properties-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="service-name">{{$serviceDetail->name}}</h3>
                                        <p><span><i class="fa fa-map-marker"></i> Location:</span> <span style="color: #ca8309" class="tt-capitalize" id="userAddress">{{$serviceDetail->state}}</span></p>
                                        <p><span><i class="fa fa-user"></i> Service Provider: </span><span style="color: #ca8309" class="tt-capitalize"> {{$serviceDetail->user->name}}</span></p>
                                        <p><span><i class="fa fa-archive"></i> Service Category: </span><span style="color: #ca8309" class="tt-capitalize"> {{$serviceDetail->category->name}}</span></p>
                                        <p><span><i class="fa fa-clock-o"></i> Posted on: </span><span style="color: #ca8309"> {{ $serviceDetail->created_at->diffForHumans() }}</span></p>
                                        <p><span><i class="fa fa-eye"></i> Views: </span><span style="color: #ca8309"> {{ $serviceDetail->views->count() }}</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="margin: 20px 0">
                                <div class="addthis_inline_share_toolbox" data-description="{{$serviceDetail->description}}"></div>
                            </div>
                        </div>

                        <!----------HTML code starts here------->
                        <div class="container" style="padding: 0; margin-top: -20px">
                            @if ($images_4_service->count() != 0)
                                @if ($images_4_service->count() == 1)
                                    <div class="glide">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                @foreach($images_4_service as $key => $image)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services')}}/{{$image->image_path}}');"></a>
                                                    </li>
                                                @endforeach
                                                @for ($i = 1; $i < 4; $i++)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services/noserviceimage.png')}}');"></a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                @elseif ($images_4_service->count() == 2)
                                    <div class="glide">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                @foreach($images_4_service as $key => $image)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services')}}/{{$image->image_path}}');"></a>
                                                    </li>
                                                @endforeach
                                                @for ($i = 1; $i < 3; $i++)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services/noserviceimage.png')}}');"></a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                @elseif ($images_4_service->count() == 3)
                                    <div class="glide">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                @foreach($images_4_service as $key => $image)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services')}}/{{$image->image_path}}');"></a>
                                                    </li>
                                                @endforeach
                                                @for ($i = 1; $i < 2; $i++)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services/noserviceimage.png')}}');"></a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="glide">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                @foreach($images_4_service as $key => $image)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services')}}/{{$image->image_path}}');"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="glide">
                                    <div class="glide__track" data-glide-el="track">
                                        <ul class="glide__slides">
                                            @for ($i = 1; $i <= 4; $i++)
                                                <li class="glide__slide">
                                                    <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}" class="lgtbxDiv" style="background-image: url('{{asset('uploads/services/noserviceimage.png')}}');"></a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <hr>

                        <!-- Tabbing box start -->
                        <div class="tabbing tabbing-box tb-2 mb-40 col-sm-12">
                            <ul class="nav nav-tabs" id="carTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                                </li>
                                @if ($serviceDetail->video_link)
                                    <li class="nav-item">
                                        <a class="nav-link" id="video-tab" data-toggle="tab" href="#four" role="tab" aria-controls="six" aria-selected="true">Service Video</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" id="seven-tab" data-toggle="tab" href="#seven" role="tab" aria-controls="six" aria-selected="true">Contact Details</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="true">Location</a>
                                </li> --}}
                                <li class="nav-item">
                                    {{-- <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true" >Like{{  $service_likes > 1 ? 's' : '' }}
                                        <span class="pull-right-container">
                                            <small id="likeTab" class="label pull-right" style="background-color: #f85858">{{ $service_likes }}</small>
                                        </span>
                                    </a> --}}


                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Like{{  $service_likes > 1 ? 's' : '' }}
                                        (<span id="likeTab">{{ $service_likes != 0 ? $service_likes : '0'}}</span>)
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="true">Similar Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="six" aria-selected="true">Client Feedback</a>
                                    {{-- {{ $serviceDetail->comments->count() }} --}}
                                </li>
                            </ul>
                            <div class="tab-content" id="carTabContent">
                                <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                    <div class="properties-description mb-50">
                                        <h3 class="heading-2">
                                            Description
                                        </h3>
                                        <p>{!! $serviceDetail->description !!}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                    <div class="property-details mb-40">
                                        <h6 class="heading-2">This User has <span id="likeTab2">{{ $service_likes != 0 ? $service_likes : '0'}}</span> like{{$service_likes > 1 ? 's' : ''}}</h6>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="four" role="tabpanel" aria-labelledby="four-tab">
                                    <div class="inside-properties mb-50">
                                        {{-- <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                        <iframe width="560" height="315" src="{{$serviceDetail->video_link}}" frameborder="0" allowfullscreen></iframe> --}}
                                        <iframe width="500" height="600" src="{{$serviceDetail->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width: 100%; height: 500px !important" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="six-tab">
                                    <div class="properties-description mb-50">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <!-- Heading -->
                                            <h3 class="heading-2">Similar Services</h3>
                                            <div class="my-properties">
                                                <div class="table-responsive">
                                                    <table class="table brd-none">
                                                        <thead>
                                                            <tr>
                                                            <th>Image</th>
                                                            <th>Service Name</th>
                                                            <th class="hedin-div">Location</th>
                                                            <th><span class="hedin-div">Likes</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($similarProducts))
                                                                @foreach($similarProducts as $similarProduct)
                                                                    <tr>
                                                                       <td class="image">
                                                                            <a href="{{route('serviceDetail', $similarProduct->slug)}}"><img alt="{{$similarProduct->name}}" src="{{asset('uploads/services')}}/{{$similarProduct->service_image}}" class="img-fluid"></a>
                                                                        </td>
                                                                        <td>
                                                                            <div class="inner">
                                                                                <h5><a href="{{route('serviceDetail', $similarProduct->slug)}}">{{$similarProduct->name}}</a></h5>
                                                                                <figure class="hedin-div"><i class="fa fa-map-marker"></i> {{$similarProduct->state}}, &nbsp; {{$similarProduct->city}}</figure>
                                                                                <!--<div class="price-month">$ 27,000</div>-->
                                                                            </div>
                                                                        </td>
                                                                        <td class="hedin-div">
                                                                            <figure class="hedin-div"><i class="fa fa-map-marker"></i> {{$similarProduct->state}}, &nbsp; {{$similarProduct->city}}</figure>
                                                                        </td>
                                                                        <td>
                                                                            <span class="hedin-div">{{$similarProduct->likes->count()}}</span>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade " id="seven" role="tabpanel" aria-labelledby="seven-tab">
                                    <div class="properties-description mb-50">
                                        @guest
                                            <p class="animate__animated animate__bounce">Please login to see this service provider's contact details!</p>
                                        @endguest
                                        @auth
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-phone"></i> Phone Number:</strong> <a href="tel:{{$serviceDetail->phone}}">
                                                     {{$serviceDetail->phone}}
                                                </a>
                                            </p>
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-envelope-open"></i> E-mail Address:</strong> <a href="mailto:{{$serviceDetail->user->email}}"> {{$serviceDetail->user->email}}</a>
                                            </p>
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-map-marker"></i> State and City:</strong> {{$serviceDetail->city}}, {{$serviceDetail->state}}
                                            </p>
                                            @if ($serviceDetail->address)
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-map"></i> Full Address:</strong> {{ $serviceDetail->address ? $serviceDetail->address : '' }}
                                            </p>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="comment" role="tabpanel" aria-labelledby="five-tab">
                                    <div class="properties-description user-comments mb-50">
                                        <!-- Clients Feedback -->
                                        @livewire('comments.comments-view',
                                        ['comments' => $allServiceComments, 'service_id' => $serviceDetail->id, 'provider_name' => $the_provider_f_name], key($serviceDetail->id))
                                    </div>
                                </div>
                            </div>
                        </div>

                        @auth
                            @if(Auth::user()->role == 'buyer')
                                <ul class="comments">
                                    <li>
                                        @if(isset($userMessages))
                                            @foreach($userMessages as $userMessage)
                                                <div class="comment">
                                                    <div class="comment-author">
                                                        {{-- <img src="{{ asset('nouserimage.png') }}" alt=""> --}}
                                                        <i class="fa fa-user fa-2x"></i>
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-meta">
                                                        <h3>
                                                            {{$userMessage->buyer_name}}
                                                        </h3>
                                                        <div class="comment-meta">
                                                        </div>
                                                        </div>
                                                        <p>{{$userMessage->description}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                        <p>There are no messages here yet</p>
                                        @endif
                                    </li>
                                </ul>
                            @endif
                        @endauth

                        {{-- @guest
                        <p>Please login to see your previous conversation with this service provider</p>
                        @endguest --}}
                        @auth
                            <div class="container mb-5 mt-0">
                                <h5>
                                    @auth
                                        <div id="likeBtn" class="{{ !$likecheck ? 'likeBtnShow' : '' }}">
                                            Do you like this service? Give it a <a onclick="likeService({{ $serviceDetail->id }})" href="#"><i class="fa fa-thumbs-up text-primary" style="font-size: 19px;"></i><span class="text-primary"> Like!</span></a>
                                            {{-- <span id="loader" class="loader"></span> --}}
                                        </div>
                                        <div id="dislikeBtn" class="{{ $likecheck ? 'disLikeBtnShow' : '' }}">
                                            You have liked this service already. <a onclick="disLikeService({{ $serviceDetail->id }})" href="#"><i class="fa fa-thumbs-down text-danger" style="font-size: 19px;"></i><span class="text-danger"> Dislike!</span></a>
                                            {{-- <span id="loader" class="loader"></span> --}}
                                        </div>
                                    @endauth
                                </h5>
                            </div>
                        @endauth

                    </div>
                </div>


                <div class="col-lg-4 col-md-4">
                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="contact-1 financing-calculator widget">
                            <h5 class="sidebar-title">Contact <span style="text-transform: uppercase">{{ $the_provider_f_name }}</span></h5>
                            <div class="s-border"></div>
                            <div class="m-border" style="margin-bottom: 2px"></div>
                            <div class="s-border" style="margin-bottom: 15px"></div>

                            <div style="margin-bottom: 15px">
                                @if ($serviceDetail->service_image)
                                    <img class="img-fluid sp-seller-img" src="{{asset('uploads/services')}}/{{$serviceDetail->service_image}}" alt="{{$serviceDetail->user->name}}" style="width: 100%;height: auto; display: block; margin: 0 auto;">
                                @else
                                    <img src="{{asset('nouserimage.png')}}" class="img-fluid" alt="{{$serviceDetail->user->name}}" style="width: 250px;height: auto; display: block; margin: 0 auto;">
                                @endif
                            </div>

                            <div class="ser-seller-note">

                                @guest
                                    <p style="margin-bottom: 5px; font-size: 16px;"><a href="{{route('login')}}"><strong style="color: #CA8309; font-size: 16px;">Login</strong></a> or <a href="{{route('register')}}"><strong style="color: #28a745">Register</strong></a> to view <strong class="tt-capitalize">{{ $the_provider_f_name }}</strong> contact details.</p>
                                @endguest

                                <div class="s-border" style="margin-top: 10px"></div>
                                <div class="m-border"></div>

                                <div class="b-provider-online-info">
                                    <div class="b-provider-online-info-block">
                                        <div class="b-provider-online-title">
                                            {{ $serviceDetail->user->created_at->diffForHumans() }}
                                        </div>
                                        <div class="b-provider-online-aside">
                                            Registered
                                        </div>
                                    </div>

                                    <div class="b-provider-online-info-block">
                                        <div class="b-provider-online-title">
                                            {{ \Carbon\Carbon::parse($serviceDetail->user->last_seen)->diffForHumans() }}
                                        </div>
                                        <div class="b-provider-online-aside">
                                            Last seen
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @auth
                                <p style="text-align: center">
                                    <a class="btn btn-warning animate__animated animate__headshake animate__infinite" href="tel:{{$serviceDetail->phone}}" style="border-radius: 50px; text-align: center; padding: 10px 15px; color: #fff; background-color: #ca8309; margin-bottom: 4px">
                                        <i class="fa fa-phone"></i> Call: {{$serviceDetail->phone}}
                                    </a>

                                    <a href="https://wa.me/{{$serviceDetail->phone}}/?text=Good%20day.%20I%20am%20interested%20in%your%20service." class="btn btn-success animate__animated animate__headshake animate__infinite" href="tel:{{$serviceDetail->phone}}" style="border-radius: 50px; text-align: center; padding: 10px 15px; color: #fff;">
                                        <i class="fa fa-whatsapp"></i> WhatsApp
                                    </a>
                                </p>
                            @endauth

                            {{-- <button class="btn btn-outline-success" id="showContactSellerForm">Show Contact Form</button> --}}

                            <div id="sellerContact" class="sellerContactDiv">
                                <form id="myform">
                                </form>
                                <form id="myform" action="POST">
                                    <input type="hidden" name="_method" value="POST">
                                    @csrf

                                    <input type="hidden" name="sender_name" id="sender_name" value="{{ Auth::user()->name ?? '' }}">
                                    <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $serviceDetail->user->id }}">
                                    <input type="hidden" name="sender_email" id="sender_email" value="{{ Auth::user()->email ?? '' }}">
                                    <input type="hidden" name="service_id" id="service_id" value="{{ $serviceDetail->id }}">

                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" id="sender_phone" name="sender_phone" class="text-dark form-control" placeholder="Your Phone Number">
                                        @if ($errors->has('phone'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group message">
                                        <textarea class="text-dark form-control" id="message" name="message" placeholder="Write message to {{ $serviceDetail->user->name }}"></textarea>
                                        @if ($errors->has('message'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    @guest
                                        <p>Only registered users can message providers. <a href="{{route('login')}}"><strong>Login</strong></a> or <a href="{{route('register')}}"><strong>Register</strong></a> if you dont have an account.</p>
                                    @endguest

                                    @auth
                                        <div class="col-lg-12 col-md-12">
                                            <div class="send-btn">
                                                <button type="submit" class="btn btn-md btn-submit2 btn-warning" id="btn-submit2">Send Message</button>
                                                <p class="text-success" style="font-size: 15px" id="successMessage"></p>
                                            </div>
                                        </div>
                                    @endauth
                                </form>
                            </div>
                            @if($serviceDetail->address != '')
                            {{-- <div style="width: 640px; height: 480px" id="mapContainer"></div> --}}
                            {{-- <div id='map' style='width: 400px; height: 300px; '></div> --}}
                          <!--   <div class="google-maps">
                                <div class="mapouter">
                                    <div class="gmap_canvas">
                                        <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31518.588844000613!2d7.492251300000006!3d9.07982880000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55e2e606f1c6452e!2sE.F.%20Network%20Ltd!5e0!3m2!1sen!2sng!4v1611820893949!5m2!1sen!2sng" frameborder="0" style="border:0; width: 100%; height: 381px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            </div> -->
                            @else
                            <p class="text text-danger">No address provided.</p>
                            @endif
                            <hr>
                            <div class="posts-by-category widget ser-pg-safety-tips" style="margin-top: 20px; padding: 0">
                                <h3 class="sidebar-title">Safety tips</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <ul class="list-unstyled list-cat">
                                    <li><span style="color: red">*</span> Check the Service Provider profile to ensure they offer the services you need/required.</li>
                                    <li><span style="color: red">*</span> Contact Service Providers only when certain you need their services.</li>
                                    <li><span style="color: red">*</span> Ensure you check authenticity of all products at all times.</li>
                                    <li><span style="color: red">*</span> Confirm identity of person/persons or organisation you are transacting with.</li>
                                    <li><span style="color: red">*</span> Check and ensure that all transactions, services, products are legitimate and legal.</li>
                                    <li>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#exampleModalCenter">
                                        Report Provider  <i class="fa fa-flag"></i>
                                        </button>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Report This Provider</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @auth
                                                            <form id="myform2">
                                                                {{ csrf_field() }}
                                                                <input  type="hidden" id="service_id_report" name="service_id_report" value="{{$serviceDetail->id}}" class="form-control">
                                                                <input type="hidden" id="service_user_id_report" name="service_user_id_report" value="{{$serviceDetail->user_id}}" class="form-control">
                                                                <input type="hidden" id="buyer_id_report" value="{{Auth::id()}}" name="buyer_id_report" class="text-dark form-control">

                                                                <div class="form-group">
                                                                    Why are you reporting this provider?
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="hidden" id="buyer_email_report" value="{{Auth::user()->email}}" name="buyer_email_report" class="text-dark form-control">
                                                                    @if ($errors->has('buyer_email_report'))
                                                                        <span>
                                                                            <strong class="text-danger">{{ $errors->first('buyer_email_report') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group message">
                                                                    <textarea class="text-dark form-control" id="description_report" name="description_report" placeholder="Write message"></textarea>
                                                                    @if ($errors->has('description_report'))
                                                                        <span>
                                                                            <strong class="text-danger">{{ $errors->first('description_report') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                @guest
                                                                    <p>Only registered users can message providers. <a href="{{route('home')}}"><strong>Login</strong></a> or <a href="{{route('home')}}"><strong>Register</strong></a> if you dont have an account.</p>
                                                                @endguest

                                                                @auth
                                                                    <div class="col-lg-12 col-md-12 mb-4">
                                                                        <div class="send-btn">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button id="" type="button" class="btn-submit3 btn btn-danger" data-dismiss="modal">Send Report</button>
                                                                        </div>
                                                                </div>

                                                            @endauth

                                                        </form>
                                                    @endauth

                                                    @guest
                                                        <h6>Please <a style="color: #cc8a19" href="{{ route('login') }}">login</a> to report this provider </h6>
                                                    @endguest

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><h6 id="complaint_notification" class="text-center text-success"></h6></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiaGdhbG9uZSIsImEiOiJja21nbHA4bTgzMWFyMndsYW84ZWxmODV2In0._Ffx_yk8R2WAgjc0a0CD4A';
    var map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [-74.5, 40], // starting position [lng, lat]
    zoom: 9 // starting zoom
    });

    //set the bounds for the map
    var bounds = [[-123.069003, 45.395273], [-122.303707, 45.612333]];
    map.setMaxBounds(bounds);



    // initialize the map canvas to interact with later
    var canvas = map.getCanvasContainer();

    // an arbitrary start will always be the same
    // only the end or destination will change

    var start = [-122.662323, 45.523751];

    // create a function to make a directions request
    function getRoute(end) {
      // make a directions request using cycling profile
      // an arbitrary start will always be the same
      // only the end or destination will change
      var start = [-122.662323, 45.523751];
      var url = 'https://api.mapbox.com/directions/v5/mapbox/cycling/' + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

      // make an XHR request https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
      var req = new XMLHttpRequest();
      req.open('GET', url, true);
      req.onload = function() {
        var json = JSON.parse(req.response);
        var data = json.routes[0];
        var route = data.geometry.coordinates;
        var geojson = {
          type: 'Feature',
          properties: {},
          geometry: {
            type: 'LineString',
            coordinates: route
          }
        };
        // if the route already exists on the map, reset it using setData
        if (map.getSource('route')) {
          map.getSource('route').setData(geojson);
        } else { // otherwise, make a new request
          map.addLayer({
            id: 'route',
            type: 'line',
            source: {
              type: 'geojson',
              data: {
                type: 'Feature',
                properties: {},
                geometry: {
                  type: 'LineString',
                  coordinates: geojson
                }
              }
            },
            layout: {
              'line-join': 'round',
              'line-cap': 'round'
            },
            paint: {
              'line-color': '#3887be',
              'line-width': 5,
              'line-opacity': 0.75
            }
          });
        }
        // add turn instructions here at the end
      };
      req.send();
    }

    map.on('load', function() {
      // make an initial directions request that
      // starts and ends at the same location
      getRoute(start);
      console.log(start);
      // Add starting point to the map
      map.addLayer({
        id: 'point',
        type: 'circle',
        source: {
          type: 'geojson',
          data: {
            type: 'FeatureCollection',
            features: [{
              type: 'Feature',
              properties: {},
              geometry: {
                type: 'Point',
                coordinates: start
              }
            }
            ]
          }
        },
        paint: {
          'circle-radius': 10,
          'circle-color': '#3887be'
        }
      });
      map.on('click', function(e) {
      var coordsObj = e.lngLat;
      canvas.style.cursor = '';
      var coords = Object.keys(coordsObj).map(function(key) {
        return coordsObj[key];
      });
      var end = {
        type: 'FeatureCollection',
        features: [{
          type: 'Feature',
          properties: {},
          geometry: {
            type: 'Point',
            coordinates: coords
          }
        }
        ]
      };
      if (map.getLayer('end')) {
        map.getSource('end').setData(end);
      } else {
        map.addLayer({
          id: 'end',
          type: 'circle',
          source: {
            type: 'geojson',
            data: {
              type: 'FeatureCollection',
              features: [{
                type: 'Feature',
                properties: {},
                geometry: {
                  type: 'Point',
                  coordinates: coords
                }
              }]
            }
          },
          paint: {
            'circle-radius': 10,
            'circle-color': '#f30'
          }
        });
      }
      getRoute(coords);
    });

    });
</script>
<script type="text/javascript">
    var baseUrl = "{{url('/')}}"
    $(document).ready(function() {
        $(".btn-submit2").click(function(e){
            e.preventDefault();

            $(".btn-submit2").text('Please wait, sending!!!')
            $("#btn-submit2").css({"opacity": "0.5", "cursor":"default"});

            var _token = $("input[name='_token']").val();
            var sender_name = $("#sender_name").val();
            var receiver_id = $("#receiver_id").val();
            var sender_email = $("#sender_email").val();
            var sender_phone = $("#sender_phone").val();
            var service_id = $("#service_id").val();
            var message = $("#message").val();

            $.ajax({
                url: '{{ route('client.message.send') }}',
                method:'POST',
                data: {_token:_token, sender_name:sender_name, service_id:service_id, sender_email:sender_email, message:message, sender_phone:sender_phone, receiver_id:receiver_id },
                success: function(data) {
                    $("#phone").val('')
                    $("#description").val('')
                    $("#successMessage").text('Message sent successfully!')
                    $(".btn-submit2").text('Send Message')
                    $("#btn-submit2").css({"opacity": "1", "cursor":"pointer"});


                    toastr.success('Message sent successfully!')
                    // alert(data.success2);
                },
                error: function(error){
                    toastr.error('Message not sent! Try again.')
                    console.log(error)
                }
            });
        });

        function printMsg (msg) {
            if((msg.success)){
                console.log(msg.success);
            }
            else{
                $.each( msg.error, function( key, value ) {
                    $('.'+key+'_err').text(value);
                });
                $('#alert-block').empty().append(msg.error);
            }
        }

        // $("#showContactSellerForm").click(function(e){
        //     e.preventDefault();
        //     $("#sellerContact").toggleClass('sellerContactFormShow');
        //     // $(".sellerContactDiv").classList.add('animate__animated', 'animate__hinge');

        //     if ($("#showContactSellerForm").text() == 'Hide Contact Form') {
        //         $("#showContactSellerForm").text('Show Contact Form')
        //     } else {
        //         $("#showContactSellerForm").text('Hide Contact Form')
        //     }
        // });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var platform = new H.service.Platform({
          'apikey': '{ND-Xev5fNnFaGhfYjub2geEiF0DKntosvZccO7CBFak}'
        });
        // Obtain the default map types from the platform object:
        var defaultLayers = platform.createDefaultLayers();

        // Instantiate (and display) a map object:
        // var map = new H.Map(
        //     document.getElementById('mapContainer'),
        //     defaultLayers.vector.normal.map,
        //     {
        //       zoom: 10,
        //       center: { lat: 52.5, lng: 13.4 }
        //     });
        var map = new H.Map(document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map);

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById("complaint_notification").hidden = true;
        $(".btn-submit3").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var buyer_id = $("#buyer_id_report").val();
        var buyer_name = $("#buyer_name_report").val();
        var service_id = $("#service_id_report").val();
        var service_user_id = $("#service_user_id_report").val();
        var buyer_email = $("#buyer_email_report").val();
        var description = $("#description_report").val();
        function greet(){
            document.getElementById("complaint_notification").hidden = true;
            document.getElementById("complaint_notification").innerHTML = "";
        }
         function set(){
              setTimeout(greet, 2000);
         }


        $.ajax({
            type:'POST',
            url: '/buyer/createcomplaint',
            data: {_token:_token, buyer_id:buyer_id, buyer_name:buyer_name, buyer_email:buyer_email, service_id:service_id, service_user_id:service_user_id,  description:description },
            success: function(data) {
                  document.getElementById("complaint_notification").hidden = false;
                    document.getElementById("complaint_notification").innerHTML = "Your complaint was sent successfully";
            //   greet();
            set();

                }
            });
        });

        $('#dislikeBtn').hide();
        $('#likeBtn').hide();
        $('.likeBtnShow').show();
        $('.disLikeBtnShow').show();
        $('#loader').hide();

    });




    function likeService(id) {
        likebtn    = document.getElementById('likeBtn');
        dislikebtn = document.getElementById('dislikeBtn');
        liketab    = document.getElementById('likeTab');
        liketab2    = document.getElementById('likeTab2');

        $.ajax({
            url: '/admin2/like/' + id,
            method: 'GET',
            success: function(like){
                dislikebtn.style.display = 'block';
                likebtn.style.display = 'none';
                liketab.innerHTML = like;
                liketab2.innerHTML = like;
            }
        });

    }

    function disLikeService(id) {
        likebtn    = document.getElementById('likeBtn');
        dislikebtn = document.getElementById('dislikeBtn');
        liketab    = document.getElementById('likeTab');
        liketab2    = document.getElementById('likeTab2');

        $.ajax({
            url: '/admin2/like/' + id,
            method: 'GET',
            success: function(like){
                dislikebtn.style.display = 'none';
                likebtn.style.display = 'block';
                liketab2.innerHTML = like;
                console.log(like);
            }
        });

    }
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60643ce977f333d6"></script>
@endsection
<script type="text/javascript">
    $(document).ready(function() {
        var address = document.getElementById('userAddress').innerHTML;

        console.log(address);

        function initMap(address) {

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({ 'address': address}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    var longitude = results[0].geometry.location.lng();
                    var latitude = results[0].geometry.location.lat();
                }

                console.log('jkhhjkhkhk',results[0]);

                var MyLngLat = {lat: latitude, lng: longitude};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: MyLngLat
                });

                var marker = new google.maps.Marker({
                    position: MyLngLat,
                    map: map,
                    title: 'Location of service provider'
                });
            });
        }
    });
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY2buDtbYIot8Llm_FkQXHW36f0Cme6TI&callback=initMap">
</script>
