@extends('layouts.app')

@section('title', 'All Services | ')

@section('content')

<div class="main">
    <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/servicesbg.jpg')}})">
        <div class="container">
            <div class="page-name">
                <div class="sub-banner-text-content">
                    <h1>Services </h1>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><span>/</span>All Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="">
        <h3 class="go-back-btn">
            <span class="text-right">
                <div class="posts-by-category widget">
                    <!--<h3 class="sidebar-title">Cities</h3>-->
                    <ul class="list-unstyled list-cat">
                        <a href="{{route('home')}}" class="btn btn-outline-warning"><i class="fa fa-home"> Back To Home</i></a>
                    </ul>
                </div>
            </span>
        </h3>
    </div> --}}



    <!-- Properties Details page start -->
    <div class="properties-details-page content-area-7 all-services-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- Option bar start -->
                    <div class="option-bar">
                        <div class="float-left">
                            <h4 href="{{route('home')}}">
                                <span class="heading-icon bg-warning">
                                    <i class="fa fa-th-large"></i>
                                </span>
                                <span class="title-name">All Services</span>
                            </h4>
                        </div>
                        {{-- <div class="float-right cod-pad">
                            <div class="sorting-options">
                                @if(isset($featuredServices))
                                    <div class="all-ser-pg-top-ct-mbl">
                                        @foreach($featuredServices as $featuredService)
                                            @if ($loop->index < 2)
                                               <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-compass"> {{$featuredService->city}}</i></a>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="all-ser-pg-top-ct-dkt">
                                        @foreach($featuredServices as $featuredService)
                                          <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-compass"> {{$featuredService->city}}</i></a>
                                        @endforeach
                                    </div>
                                    <div class="all-ser-pg-top-ct-tbl">
                                        @foreach($featuredServices as $featuredService)
                                            @if ($loop->index < 3)
                                                <a style="font-size: 13px;" href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-compass"> {{$featuredService->city}}</i></a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                    </div>

                    <!-- Property section start -->
                    <div class="row property-section all-services-card">
                        @if(isset($approvedServices))
                            @foreach($approvedServices as $approvedService)
                                @if ($loop->index < 30 && $approvedService->badge_type == 1)
                                    <a href="{{route('serviceDetail', $approvedService->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$approvedService->is_featured == 1 ? ' Super' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($approvedService->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$approvedService->service_image}}" alt="{{ $approvedService->name }}">
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 30) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$approvedService->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $approvedService->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($approvedService->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $approvedService->badge_type == 2)
                                    <a href="{{route('serviceDetail', $approvedService->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$approvedService->is_featured == 1 ? ' Moderate' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($approvedService->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$approvedService->service_image}}" alt="{{ $approvedService->name }}">
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 30) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$approvedService->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $approvedService->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($approvedService->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $approvedService->badge_type == 3)
                                    <a href="{{route('serviceDetail', $approvedService->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$approvedService->is_featured == 1 ? ' Basic' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($approvedService->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$approvedService->service_image}}" alt="{{ $approvedService->name }}">
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 30) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$approvedService->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $approvedService->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($approvedService->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $approvedService->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($approvedService->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$approvedService->service_image}}" alt="{{ $approvedService->name }}">
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 30) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $approvedService->slug)}}">{{ Str::limit($approvedService->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$approvedService->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $approvedService->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($approvedService->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                @endif
                            @endforeach
                        @endif
                    </div>
                    {{-- <!-- Page navigation start -->
                    <div class="pagination-box hidden-mb-45 text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                            </ul>
                        </nav>
                    </div> --}}
                </div>
                <form action="" method="POST">
                </form>


                <div class="col-lg-4 col-md-4">
                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="sidebar widget advanced-search none-992">
                            <h3 class="sidebar-title">Advanced Search</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <form action="{{route('search3')}}" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group subject">
                                            <!--  <input type="text" name="serviceDetail_id"class="form-control"> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                                        <div class="form-group subject">
                                            <select class="form-control" id="state" name="state">
                                                @if(isset($all_states))
                                                    @foreach($all_states as $state)
                                                        <option value="{{$state->id}}"> {{ $state->name }}  </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                  {{--   <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" name="minprice" id="minprice" class="form-control" placeholder="Min Price" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" name="maxprice" id="maxprice" class="form-control" placeholder="Max Price" autocomplete="off">
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="switch">
                                                <label>
                                                    <input type="checkbox" name="featured">
                                                    <span class="lever"></span>
                                                    Featured
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-outline-warning btn-block bg-warning text-white">Search  <i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
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
                                @foreach($featuredServices as $key => $featuredService)
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                                        </div>
                                        <div class="media-body align-self-center all-ser-pg-sidebar-feat-ser">
                                            <h3 class="media-heading">
                                                <a href="{{ route('serviceDetail', $featuredService->slug) }}">
                                                    <strong style="text-transform: capitalize">{{ $featuredService->name }}</strong>
                                                    <br>
                                                    <span style="text-transform: capitalize">{{ $featuredService->user->name }}</span>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Popular posts start -->
                        <div class="widget popular-posts">
                            <h3 class="sidebar-title">Featured Categories</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            @if(isset($featuredcategories))
                                @foreach($featuredcategories as $key => $featuredcategory)
                                    <div class="media">
                                        <div class="media-left">
                                            {{-- <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}"> --}}
                                        </div>
                                        <div class="media-body align-self-center all-ser-pg-sidebar-feat-ser">
                                            <h3 class="media-heading">
                                                <a href="{{ route('services', $featuredcategory->slug) }}" class="sub_cat_link">
                                                    <strong style="text-transform: capitalize"><i class="fa fa-long-arrow-right" style="color: #FFC107"></i>  {{ $featuredcategory->name }}</strong>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Posts by category start -->
                    {{--     <div class="posts-by-category widget">
                            <h3 class="sidebar-title">Cities</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="list-unstyled list-cat">
                                @if(isset($featuredServices))
                                    @foreach($featuredServices as $featuredService)
                                        <li><a href="{{route('search_by_city', $featuredService->city)}}"><i class="fa fa-map-marker"> {{$featuredService->city}}</i></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
 --}}
                        <div class="widget helping-center">
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <div class="media">
                                <div class="">
                                    <img style="width: 100%; height: auto; margin: 0 auto; border-radius: 10px" src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid">
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
        </div>
    </div>
</div>
@endsection
