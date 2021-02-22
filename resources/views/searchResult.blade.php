@extends('layouts.app')
@section('title', 'Search Results | ')

@section('content')
<div class="main">
    <div class="sub-banner">
        <div class="container">
            <div class="page-name">
                <div class="sub-banner-text-content">
                    <h1>Search Results</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>/</span>Search Results</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties section body start -->
    <div class="properties-section content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Advanced search start -->
                        <div class="sidebar widget advanced-search none-992">
                            <h3 class="sidebar-title">Search For A Service</h3>

                            <form action="{{route('search3')}}" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <p style="font-weight: 600; margin-bottom: 0;">Choose Distance(in km): <span id="demo"></span></p>
                                    <div class="slidecontainer" style="margin-bottom: 15px;">
                                        <input type="range" min="1" max="1000000" name="ranges"  value="5000" class="slider" id="myRange">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                       <!--  <input type="text" name="serviceDetail_id" value= class="form-control"> -->
                                   </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                                    <div class="form-group subject">
                                        <select class="form-control" id="state" name="state">
                                            <option class="text-center" value="">--Choose a state--</option>
                                            @if(isset($all_states))
                                                @foreach($all_states as $state)
                                                    <option value="{{$state->id}}"> {{ $state->name }}  </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-outline-warning btn-block bg-warning text-white">Search  <i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Popular posts start -->
                        <div class="widget popular-posts">
                            <h3 class="sidebar-title">Featured Services</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            @if(isset($featuredServices))
                                @foreach($featuredServices as $featuredService)
                                    <a href="{{ route('serviceDetail', $featuredService) }}">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                                            </div>
                                            <div class="media-body align-self-center">
                                                <p class="fea-ad-hm-location tt-capitalize">
                                                    <strong>{{ Str::limit($featuredService->name, 30)}}</strong>
                                                </p>
                                                <p class="fea-ad-hm-location  tt-capitalize">
                                                    <strong>Provider:</strong> {{$featuredService->user->name}} <br>  <strong>Location:</strong> {{ Str::limit($featuredService->state, 30)}}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>

                        <div class="footer-item clearfix container-fluid">
                            <br/>
                            <div class="s-border" style="margin-top: -15px;"></div>
                            <div class="m-border"></div>
                            <h5 style="margin-top: -15px; text-transform: uppercase">Featured Adverts</h5>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                        </div>
                        <div class="popular-posts featured-ad-hm-list">
                            <div class="container">
                                <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'do_smart_business.png'}}" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'efskyviewSidebarSlider.png'}}" alt="Second slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Helping Center start -->
                        <div class="widget helping-center">
                            <h3 class="sidebar-title">Helping Center</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="contact-link">
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:+0700-6258244">
                                        0700-6258244
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:+0807-9000286">
                                        0807-9000286
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:+080567654345">
                                        080567654345
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-envelope"></i>
                                    <a href="mailto:info@efcontact.com">
                                        info@efcontact.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8 col-md-12">

                </div>

            </div>
        </div>
    </div>


</div>

@endsection
