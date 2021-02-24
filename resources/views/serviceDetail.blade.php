
@extends('layouts.app')

@section('title', $serviceDetail->name . ' | ')

@section('content')
<!-- Sub banner start -->
<div class="sub-banner" style="background-image:url({{asset('OurBackend/img/hometeacher.jpg')}})">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12" style="background-color: #fff">
                    <div class="properties-details-section" style="padding-top: 15px;">
                        <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                            <!-- Heading properties start -->
                            <div class="heading-properties-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="service-name">{{$serviceDetail->name}}</h3>
                                        <p><span><i class="fa fa-map-marker"></i> Location:</span> <span style="color: #ca8309" class="tt-capitalize">{{$serviceDetail->state}}</span></p>
                                        <p><span><i class="fa fa-user"></i> Service Providers: </span><span style="color: #ca8309" class="tt-capitalize"> {{$serviceDetail->user->name}}</span></p>
                                    </div>
                                </div>
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
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}">
                                                            <img src="{{asset('uploads/services')}}/{{$image->image_path}}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @for ($i = 1; $i < 4; $i++)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}">
                                                            <img src="{{ asset('uploads/services/noserviceimage.png') }}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
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
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}">
                                                            <img src="{{asset('uploads/services')}}/{{$image->image_path}}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @for ($i = 1; $i < 3; $i++)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}">
                                                            <img src="{{ asset('uploads/services/noserviceimage.png') }}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
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
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}">
                                                            <img src="{{asset('uploads/services')}}/{{$image->image_path}}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @for ($i = 1; $i < 2; $i++)
                                                    <li class="glide__slide">
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}">
                                                            <img src="{{ asset('uploads/services/noserviceimage.png') }}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
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
                                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services')}}/{{$image->image_path}}">
                                                            <img src="{{asset('uploads/services')}}/{{$image->image_path}}" class="img-fluid glide-img" alt="properties-small">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @for ($i = 1; $i <= 4; $i++)
                                    <li class="glide__slide">
                                        <a data-lightbox="roadtrip" href="{{asset('uploads/services/noserviceimage.png')}}">
                                            <img src="{{ asset('uploads/services/noserviceimage.png') }}" class="img-fluid glide-img" alt="properties-small">
                                        </a>
                                    </li>
                                @endfor
                            @endif
                        </div>

                        <hr>

                        <!-- Tabbing box start -->
                        <div class="tabbing tabbing-box tb-2 mb-40 col-sm-12">
                            <ul class="nav nav-tabs" id="carTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="seven-tab" data-toggle="tab" href="#seven" role="tab" aria-controls="six" aria-selected="true">Contact Details</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="true">Location</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true" >Like{{  $service_likes > 1 ? 's' : '' }}
                                        <span class="pull-right-container">
                                            <small id="likeTab" class="label pull-right" style="background-color: #f85858">{{ $service_likes }}</small>
                                        </span>
                                    </a>


                                    {{-- <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Like{{  $service_likes > 1 ? 's' : '' }} <span style="background-color: #ca8309; color:#fff; border-radius: 50%; padding: 5px; width: 10px; height:10px">{{ $service_likes != 0 ? $service_likes : ''}}</span></a> --}}
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="true">Similar Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="six" aria-selected="true">Comments</a>
                                    {{-- {{ $serviceDetail->comments->count() }} --}}
                                </li>
                            </ul>
                            <div class="tab-content" id="carTabContent">
                                <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                    <div class="properties-description mb-50">
                                        <h3 class="heading-2">
                                            Description
                                        </h3>
                                        <p>{{$serviceDetail->description}}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                    <div class="property-details mb-40">
                                        <h6 class="heading-2">This User has {{$service_likes}} likes</h6>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="four" role="tabpanel" aria-labelledby="four-tab">
                                    <div class="inside-properties mb-50">
                                        <h3 class="heading-2">
                                            Service Video
                                        </h3>
                                        <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                        <iframe width="560" height="315" src="{{$serviceDetail->video_link}}" frameborder="0" allowfullscreen></iframe>
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
                                                            <th>Service</th>
                                                            <th>Name</th>
                                                            <th class="hedin-div">Address</th>
                                                            <th><span class="hedin-div">Likes</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($similarProducts))
                                                                @foreach($similarProducts as $similarProduct)
                                                                    <tr>
                                                                       <td class="image">
                                                                            <a href="{{route('serviceDetail', $similarProduct->id)}}"><img alt="properties-small" src="{{asset('uploads/services')}}/{{$similarProduct->service_image}}" class="img-fluid"></a>
                                                                        </td>
                                                                        <td>
                                                                            <div class="inner">
                                                                                <h5><a href="{{route('serviceDetail', $similarProduct->id)}}">{{$similarProduct->name}}</a></h5>
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
                                            <p class="animate__animated animate__bounce">Please login to see this service provider's phone number!</p>
                                        @endguest
                                        @auth
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-phone"></i> Phone Number:</strong> <a class="btn btn-success" href="tel:{{$serviceDetail->phone}}" style="border-radius: 50px;">
                                                     {{$serviceDetail->phone}}
                                                </a>
                                            </p>
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-envelope-open"></i> E-mail Address:</strong> <a href="mailto:{{$serviceDetail->user->email}}"> {{$serviceDetail->user->email}}</a>
                                            </p>
                                            <p class="animate__animated animate__bounce">
                                                <strong><i class="fa fa-map-marker"></i> Address:</strong> {{$serviceDetail->streetAddress}} | {{$serviceDetail->city}} | &nbsp; {{$serviceDetail->state}}
                                            </p>
                                        @endauth
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="comment" role="tabpanel" aria-labelledby="five-tab">
                                    <div class="properties-description mb-50">
                                        {{-- {{ $serviceDetail->comments }} --}}
                                        <x-comments :model="$serviceDetail"/>
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
                                                        <a href="#">
                                                        <i class="fa fa-user fa-2x"></i>
                                                        </a>
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

                        @guest
                        <p>Please login as a service seeker to see your previous conversation with this service provider</p>
                        @endguest


                                {{--
                                            @if (session('liked'))<span class="text-danger">{{ session('liked') }}
                                </span> @else<span class="text-warning">like!
                                </span> @endif --}}

                            @auth
                                <div class="container mb-5 mt-0">
                                    <h5>

                                        {{-- </a>  @else HAPPY WITH THE SERVICE RENDERED? GIVE THIS PROVIDER A  <a href="{{route('admin2.like', $serviceDetail->id)}}"> <i class="fa fa-thumbs-up text-warning" style="font-size: 19px;"></i><span class="text-warning">like!</span> @endif
                                        </a> --}}

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
                                    {{--              @if (session('success2'))
                                        <div id="likeNotice" class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success2') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                        </div>
                                        @endif --}}
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
                                <div>
                                    <b>Registered:</b>  <i>"{{$serviceDetail->created_at->diffForHumans()}}"</i>
                                </div>

                                @guest
                                    <p style="margin-bottom: 5px"><a href="{{route('login')}}"><strong style="color: #28a745">Login</strong></a> or <a href="{{route('register')}}"><strong style="color: #ee6363">Register</strong></a> to view <strong>{{ $the_provider_f_name }}</strong> contact details.</p>
                                @endguest
                            </div>

                            <div class="s-border" style="margin-top: 10px"></div>
                            <div class="m-border"></div>

                            @auth
                                <p style="text-align: center">
                                    <a class="btn btn-warning animate__animated animate__headshake animate__infinite" href="tel:{{$serviceDetail->phone}}" style="border-radius: 50px; text-align: center; padding: 10px 15px; color: #fff; background-color: #ca8309">
                                        <i class="fa fa-phone"></i> {{$serviceDetail->phone}}
                                    </a>
                                </p>

                                <p style="text-align: center">
                                    <a href="https://wa.me/{{$serviceDetail->phone}}/?text=Good%20day.%20I%20am%20interested%20in%your%20service." class="btn btn-success animate__animated animate__headshake animate__infinite" href="tel:{{$serviceDetail->phone}}" style="border-radius: 50px; text-align: center; padding: 10px 15px; color: #fff;">
                                        <i class="fa fa-whatsapp"></i> {{$serviceDetail->phone}}
                                    </a>
                                </p>
                            @endauth

                            <button class="btn btn-outline-success" id="showContactSellerForm">Show Contact Form</button>

                            <div id="sellerContact" class="sellerContactDiv">
                                <form id="myform">
                                </form>
                                <form id="myform" action="POST">
                                    <input type="hidden" name="_method" value="POST">
                                    {{ csrf_field() }}
                                    <input  type="hidden" id="service_id" name="service_id" value="{{$serviceDetail->id}}" class="form-control" placeholder="Name">
                                    <input type="hidden" id="service_user_id" name="service_user_id" value="{{$serviceDetail->user_id}}" class="form-control" placeholder="Name">
                                    <input type="hidden" id="buyer_id" value="{{Auth::id()}}" name="buyer_id" class="text-dark form-control">

                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" id="buyer_name" name="buyer_name" class="text-dark form-control" placeholder=" Your Name">
                                        @if ($errors->has('buyer_name'))
                                            <span>
                                            <strong class="text-danger">{{ $errors->first('buyer_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="buyer_email" name="buyer_email" class="text-dark form-control" placeholder="Your Email">
                                        @if ($errors->has('buyer_email'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('buyer_email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" id="phone" name="phone" class="text-dark form-control" placeholder="Your Phone Number">
                                        @if ($errors->has('phone'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control text-dark" placeholder="Subject">
                                        @if ($errors->has('subject'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group message">
                                        <textarea class="text-dark form-control" id="description" name="description" placeholder="Write message to {{ $serviceDetail->user->name }}"></textarea>
                                        @if ($errors->has('description'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    @guest
                                        <p>Only registered users can message providers. <a href="{{route('login')}}"><strong>Login</strong></a> or <a href="{{route('register')}}"><strong>Register</strong></a> if you dont have an account.</p>
                                    @endguest

                                    @auth
                                        <div class="col-lg-12 col-md-12">
                                            <div class="send-btn">
                                                <button type="submit" class="btn btn-md btn-submit2 btn-warning">Send Message</button>
                                            </div>
                                        </div>
                                    @endauth
                                </form>
                            </div>

                            <div class="posts-by-category widget ser-pg-safety-tips" style="margin-top: 20px; padding: 0">
                                <h3 class="sidebar-title">Safety tips</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <ul class="list-unstyled list-cat">
                                    <li><span style="color: red">*</span> Do not pay in advance even for the delivery.</li>
                                    <li><span style="color: red">*</span> Try to meet at a safe, public location.</li>
                                    <li><span style="color: red">*</span> Check the item BEFORE you buy it.</li>
                                    <li><span style="color: red">*</span> Pay only after collecting the item.</li>
                                    <li><span style="color: red">*</span> You pay only the listed price without any hidden costs.</li>
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
                                                                    Why are you reporting this provider? (<strong>Be specific!</strong>)
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
                                                        <h6>Please log in as a service seeker to report this provider </h6>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    var baseUrl = "{{url('/')}}"
    $(document).ready(function() {
        $(".btn-submit2").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var buyer_id = $("#buyer_id").val();
            var buyer_name = $("#buyer_name").val();
            var service_id = $("#service_id").val();
            var subject = $("#subject").val();
            var service_user_id = $("#service_user_id").val();
            var phone = $("#phone").val();
            var buyer_email = $("#buyer_email").val();
            var description = $("#description").val();

            $.ajax({
                url: baseUrl + '/buyer/createcomment2',
                method:'POST',
                data: {_token:_token, buyer_id:buyer_id, service_id:service_id, service_user_id:service_user_id, description:description, subject:subject, buyer_name, buyer_email, phone },
                success: function(data) {
                    alert(data.success2);
                },
                error: function(error){
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

        $("#showContactSellerForm").click(function(e){
            e.preventDefault();
            $("#sellerContact").toggleClass('sellerContactFormShow');
            // $(".sellerContactDiv").classList.add('animate__animated', 'animate__hinge');

            if ($("#showContactSellerForm").text() == 'Hide Contact Form') {
                $("#showContactSellerForm").text('Show Contact Form')
            } else {
                $("#showContactSellerForm").text('Hide Contact Form')
            }
        });
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
              setTimeout(greet, 20000);
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
        likebtn = document.getElementById('likeBtn');
        dislikebtn = document.getElementById('dislikeBtn');
        liketab = document.getElementById('likeTab');
        loader = document.getElementById('loader');

        $.ajax({
            url: '/admin2/like/' + id,
            method: 'GET',
            success: function(like){
                dislikebtn.style.display = 'block';
                likebtn.style.display = 'none';
                liketab.innerHTML = like;
            }
        });

    }

    function disLikeService(id) {
        likebtn = document.getElementById('likeBtn');
        dislikebtn = document.getElementById('dislikeBtn');
        likeTab = document.getElementById('likeTab');
        loader = document.getElementById('loader');

        $.ajax({
            url: '/admin2/like/' + id,
            method: 'GET',
            success: function(like){
                dislikebtn.style.display = 'none';
                likebtn.style.display = 'block';
                liketab.innerHTML = like;
                console.log(like);
            }
        });

    }
</script>
