
@extends('layouts.app')

@section('title')
Home |
@endsection

@section('content')

<div class="sub-banner" style="background-image:url({{asset('OurBackend/img/hairdresser.jfif')}})">
    <div class="container">
        <div class="page-name">
            <h1>Sellers List</h1>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><span>/</span>Sellers List</li>
            </ul>
        </div>
    </div>
</div>

<div class="our-team-4 content-area sellers-page-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon bg-warning">
                                <i class="fa fa-th-list"></i>
                            </span>
                            <span class="title-name">Sellers List</span>
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
          @if(isset($approvedServices))
          @foreach($approvedServices as $approvedService)
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="row team-4">
                <div class="col-xl-5 col-lg-5 col-md-12 col-pad" style="background-image:url({{asset('images')}}/{{$approvedService->image[0]}})">
                    <div class="photo mt-2">
                        {{-- <img src="{{asset('images')}}/{{$approvedService->image[0]}}" alt="agent" class=""> --}}
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 col-md-12 col-pad align-self-center mt-2">
                    <div class="detail">
                        <h4 style="font-size: 13px;">
                            <a href="{{route('serviceDetail', $approvedService->slug)}}">
                                {{Str::limit($approvedService->name, 7)}}</h4>
                                <h4 style="font-size: 13px;">
                                    <a href="{{route('serviceDetail', $approvedService->slug)}}">{{Str::limit($approvedService->user->name, 7)}}</a>
                                </h4>

                                <div class="contact">
                                    <ul>
                                        <li>
                                            <h4 style="font-size: 13px;">
                                               <a href="{{route('serviceDetail', $approvedService->slug)}}">
                                                   {{$approvedService->city}} | {{$approvedService->state}}</a>
                                               </h4>
                                           </li>
                                    <!--<li>
                                        <span>Email:</span><a href="mailto:info@themevessel.com"> info@themevessel.com</a>
                                    </li>-->
                                    <li>
                                        <h4 style="font-size: 13px;"> <a href="{{route('serviceDetail', $approvedService->slug)}}"> {{$approvedService->phone}}
                                        </a>
                                    </h4>
                                    </li>
                                </ul>
                            </div>

                            <ul class="social-list clearfix mb-3">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>





@endsection
