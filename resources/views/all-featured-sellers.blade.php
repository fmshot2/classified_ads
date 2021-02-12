
@extends('layouts.app')

@section('title')
 Home |
@endsection

@section('content')

<div class="sub-banner"  style="background-image:url({{asset('uploads/headerBannerImages/categorybg.jpg')}})">
    <div class="container">
        <div class="page-name">
            <div class="sub-banner-text-content">
                <h1>Featured Service Providers</h1>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><span>/</span>Service Providers</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="our-team-4 content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon bg-warning">
                                <i class="fa fa-th-list"></i>
                            </span>
                            <span class="title-name">Featured Service Providers</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad">
                        <div class="sorting-options">
                            <!--<select class="sorting">
                                <option>New To Old</option>
                                <option>Old To New</option>
                                <option>Properties (High To Low)</option>
                                <option>Properties (Low To High)</option>
                            </select>-->
                            <a href="{{route('home')}}" class="btn btn-outline-warning"><i class="fa fa-th-list"></i>Back To Home</a>
                            <!--<a href="agent-grid-2.html" class="change-view-btn"><i class="fa fa-th-large"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
                  @if(isset($allFeaturedServices))
                @foreach($allFeaturedServices as $allFeaturedService)
            <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="photo mt-2">
                        <h6 class="text-muted">{{ Str::limit( $allFeaturedService->name, 20)}}</h6>
                            <a href="{{route('serviceDetail', $allFeaturedService->slug)}}"><img src="{{asset('images')}}/{{$allFeaturedService->image[0]}}" alt="agent" class="img-fluid">
                        </a>
                        </div>
                        <div class="detail">

                                <p class="text-muted mb-0" href="{{route('serviceDetail', $allFeaturedService->slug)}}">{{ Str::limit($allFeaturedService->user->name, 20)}}</p>

                                <ul class="mt-0">
                                    <li>
                                        <p href="{{route('serviceDetail', $allFeaturedService->slug)}}"> {{$allFeaturedService->state}}</p>
                                    </li>
                                    {{--<li>
                                        <span>Email:</span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                    </li>--}}
                                    <li>
                                        {{--<span></span><a> {{ Str::limit( $allFeaturedService->phone, 2)}}</a>--}}
                                    </li>
                                </ul>


                            {{--<ul class="social-list clearfix mb-3">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                            </ul>--}}
                        </div>
            </div>
              @endforeach
                   @endif

        </div>
    </div>
</div>





@endsection
