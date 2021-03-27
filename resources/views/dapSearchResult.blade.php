@extends('layouts.app')
@section('title', 'Search Results | ')

@section('content')
<style>
    .panel-body {
        padding: 10px;
        border: 0;
    }
    .panel-warning{
        background: -webkit-linear-gradient(341.14deg, #03a84dc9 15.19%, #69cf97 84.14%);
        background: -o-linear-gradient(341.14deg, #03a84dc9 15.19%, #69cf97 84.14%);
        background: linear-gradient(341.14deg, #03a84dc9 15.19%, #69cf97 84.14%);
        text-align: center;
        margin-bottom: 20px;
        border: 0 !important;
        font-size: 15px;
        color: #fff;
    }
    .search-message{
        font-family: "Poppins-Regular";
        font-size: 16px;
    }
</style>
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
    <div class="properties-section content-area searchResultPage">
        <div class="service-detail-container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if (isset($message))
                        <div style="margin-bottom: 20px">
                            <h4 class="search-message">{!! $message !!}</h4>
                        </div>
                    @endif
                    @if (isset($noserviceinstate))
                        <h5>{!! $noserviceinstate !!}</h5>
                        <div class="panel panel-warning">
                            <div class="panel-body">
                                You may also be interested in services from all over Nigeria.
                            </div>
                        </div>
                    @endif
                    @if (isset($services))
                        <div class="row row-flex searchResults 1">
                            @foreach($services as $service)
                                @if ($loop->index < 30 && $service->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $service->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$service->likes->count()}} Like{{$service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $service->badge_type == 2)
                                    <a href="{{route('serviceDetail', $service->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$service->likes->count()}} Like{{$service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $service->badge_type == 3)
                                    <a href="{{route('serviceDetail', $service->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$service->likes->count()}} Like{{$service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $service->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $service->slug)}}">{{ Str::limit($service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$service->likes->count()}} Like{{$service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if (isset($related_services))
                        <div class="panel panel-warning">
                            <div class="panel-body">
                                You may also be interested in services from all over Nigeria.
                            </div>
                        </div>

                        <div class="row row-flex searchResults 1">
                            @foreach($related_services as $related_service)
                                @if ($loop->index < 30 && $related_service->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $related_service->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($related_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$related_service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$service->likes->count()}} Like{{$related_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $related_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$related_service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $related_service->badge_type == 2)
                                    <a href="{{route('serviceDetail', $related_service->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($related_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$related_service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$related_service->likes->count()}} Like{{$related_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $related_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$related_service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $related_service->badge_type == 3)
                                    <a href="{{route('serviceDetail', $related_service->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($related_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$related_service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($related_service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($related_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$related_service->likes->count()}} Like{{$related_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $related_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$related_service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $related_service->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($related_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$related_service->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($related_service->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $related_service->slug)}}">{{ Str::limit($related_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$related_service->likes->count()}} Like{{$related_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $related_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$related_service->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>



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

                        <div class="footer-item clearfix container-fluid">
                            <br/>
                            <div class="s-border" style="margin-top: -20px;"></div>
                            <div class="m-border"></div>
                        </div>
                        <div class="popular-posts featured-ad-hm-list">
                            <div class="container">
                                <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                    {{-- <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol> --}}
                                    <div class="carousel-inner">
                                        @if ($advertisements)
                                            @foreach($advertisements as $advertisement)
                                                @if ($advertisement->advert_location == 3)
                                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                                        <img class="d-block mx-auto img-fluid" src="{{asset('uploads/sponsored/'.$advertisement->banner_img)}}" alt="{{ $advertisement->brand_name }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No Advert here!</p>
                                        @endif
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
                        <div class="s-border" style="margin-top: 20px;"></div>
                        <div class="m-border"></div>
                        <br/>

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
                        </div>
                        <div class="popular-posts featured-ad-hm-list">
                            <div class="container">
                                <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                    {{-- <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol> --}}
                                    <div class="carousel-inner">
                                        @if ($advertisements)
                                            @foreach($advertisements as $advertisement)
                                                @if ($advertisement->advert_location == 5)
                                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                                        <img class="d-block mx-auto img-fluid" src="{{asset('uploads/sponsored/'.$advertisement->banner_img)}}" alt="{{ $advertisement->brand_name }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No Advert here!</p>
                                        @endif
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
                            <h3 class="sidebar-title">Help Center</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="contact-link">
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:{{ $check_general_info == 0 ? $general_info->hot_line : '' }}">
                                        {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:{{ $check_general_info == 0 ? $general_info->hot_line_2 : '' }}">
                                        {{ $check_general_info == 0 ? $general_info->hot_line_2 : '' }}
                                    </a>
                                </li>
                                <li>
                                    <a style="color: #05cc6c" href="https://wa.me/{{ $check_general_info == 0 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services.">
                                        <i class="fa fa-whatsapp" style="color: #05cc6c"></i>
                                        WhatsApp Message
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-envelope"></i>
                                    <a href="mailto:{{ $check_general_info == 0 ? $general_info->header_email : '' }}">
                                        {{ $check_general_info == 0 ? $general_info->header_email : '' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

@endsection
