
@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')

<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Featured Sellers List</h1>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><span>/</span>Featured Sellers</li>
            </ul>
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
                            <span class="title-name">Featured Sellers</span>
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

{{--<div class="col-sm-3 card service-box">
                        <img class="card-img-top" style="height: 90%;" src="{{asset('images')}}/{{$recentService->image[0]}}" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4 style="color: black;"><a href="{{route('serviceDetail', $recentService->slug)}}"  style="font-size: 15px;">{{$recentService->user->name}}, &nbsp; {{$recentService->name}}</a></h4>
                            </div>
                             <div class="location" style="color: black;">
                                    <a href="{{route('serviceDetail', $recentService->slug)}}" tabindex="-1">
                                        
                                    </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$recentService->state}}</span>
                                </div>
                         
                            <!--<a href="#" class="read-more">More...</a>-->
                        </div>
                    </div>--}}







            <div class="col-lg-2 col-md-2 col-sm-6 card">
                        <div class="mt-2">
                        <h6>{{$allFeaturedService->name}}</h6>
                            <a href="{{route('serviceDetail', $allFeaturedService->slug)}}"><img class="card-img-top" style="height: 90%;" src="{{asset('images')}}/{{$allFeaturedService->image[0]}}" alt="agent" class="img-fluid">
                        </a>
                        </div>
                        <div class="detail">
                            <h4>
                                <h5 href="{{route('serviceDetail', $allFeaturedService->slug)}}">{{$allFeaturedService->user->name}}</h5>
                            </h4>

                            <div class="contact">
                                <ul>
                                    <li>
                                        <a href="{{route('serviceDetail', $allFeaturedService->slug)}}"> {{$allFeaturedService->state}}</a>
                                    </li>
                                    {{--<li>
                                        <span>Email:</span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                    </li>--}}
                                    <li>
                                        {{--<span></span><a> {{ Str::limit( $allFeaturedService->phone, 2)}}</a>--}}
                                    </li>
                                </ul>
                            </div>

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