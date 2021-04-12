@extends('layouts.app')

@section('title', $sub_category->name . ' | ')

@section('content')
    <style>
            .searchInput{
        padding-top: 30px !important;
        padding-left: 30px !important;
        padding-bottom: 30px !important;
        border-radius: 50px !important;
        border: 2px solid #e7a32d9d !important;
    }
    .search-area-2 {
        padding-top: 5px !important;
    }
    .search-section.bg-grea {
        background: #ca830921;
    }
    .search-section .navbar-top-post-btn button {
        font-size: 17px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: none;
        padding: 15px 40px;
        background: #CA8309 !important;
        color: #fff !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .navbar-top-post-btn button:hover {
        background: #ffffff !important;
        color: #CA8309 !important;
        border: 2px solid #e7a32d9d;
        transition: .7s background, color;
    }
    .search-section .location {
        font-size: 15px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: 2px solid #e7a32d9d !important;
        padding: 15px 40px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .jxcategory {
        font-size: 14px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: 2px solid #e7a32d9d !important;
        padding: 15px 30px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .location:hover, .search-section .jxcategory:hover, .search-section .location:hover span, .search-section .jxcategory:hover span{
        background: #CA8309 !important;
        color: #ffffff !important;
        transition: .7s all;
    }

    .ajaxSearchList{
        width: fit-content;
        position: absolute;
    }
    .ajaxSearchCategoryList{
        color: #CA8309;
    }
    .col-lg-2{
        padding: 5px
    }
    .col-lg-2 button{
        width: 100%;
        display: block;
        font-size: 13px !important;
        text-align: center !important;
    }
    .categoriesModalList{
        list-style: none;
    }
    .categoriesModalList li{
        list-style: none;
        display: block;
        border-bottom: 1px solid rgba(206, 206, 206, 0.233);
        padding-bottom: 10px;
    }
    .categoriesModalList li:last-child{
        border-bottom: 0;
    }
    .categoriesModalList li .fa{
        font-size: 10px;
        color: rgb(177, 177, 177);
    }
    .categoriesModalList li a{
        display: block;
    }
    .categoriesModalList li a span{
        font-size: 12px;
        color: #11a182;
    }
    .categoriesModalList li:hover a, .categoriesModalList li:hover .fa{
        color: #e7a32d;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .searchFilterModalTitle{
        font-size: 17px;
        margin-bottom: 20px;
        font-weight: 600;
        font-family: "Poppins-Regular";
    }

    /* @media (min-width: 768px) */

    .popover__title {
        font-size: 24px;
        line-height: 36px;
        text-decoration: none;
        color: rgb(228, 68, 68);
        text-align: center;
        padding: 15px 0;
    }

    .popover__wrapper {
        position: relative;
        display: inline-block;
    }
    .popover__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: 100px;
        top: 50px;
        transform: translate(0, 10px);
        background-color: #f5f5f5;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: fit-content;
    }
    .popover__content ul li {
        color: #000 !important;
        padding-left: 30px;
        padding-right: 30px;
        display: block;
    }
    .popover__content ul li:first-child {
        padding-top: 15px;
    }
    .popover__content ul li a{
        color: #000 !important;
        display: block;
    }
    .popover__content ul li:hover a{
        color: #e7a32d !important;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .popover__content:before {
        position: absolute;
        z-index: -1;
        content: "";
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #f5f5f5 transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }


    /* Mobile Popover  */
    .popover__mobile__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: 100px;
        top: 50px;
        transform: translate(0, 10px);
        background-color: #f5f5f5;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: auto;
    }
    .popover__mobile__content ul li {
        color: #000 !important;
        padding-left: 30px;
        padding-right: 30px;
        display: block;
    }
    .popover__mobile__content ul li:first-child {
        padding-top: 15px;
    }
    .popover__mobile__content ul li a{
        color: #000 !important;
        display: block;
    }
    .popover__mobile__content ul li:hover a{
        color: #e7a32d !important;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .popover__mobile__content:before {
        position: absolute;
        z-index: -1;
        content: "";
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #f5f5f5 transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }

    @media (min-width: 768px){
        #desktopSearchForm{
            display: block !important;
            padding-top: 20px;
        }
        #mobileSearchForm{
            display: none;
        }
        .popover__wrapper:hover .popover__content {
            z-index: 10;
            opacity: 1;
            visibility: visible;
            transform: translate(0, -20px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }
    }

    @media (max-width: 768px){
        #desktopSearchForm{
            display: none;
        }
        #mobileSearchForm{
            display: block !important;
        }
        .searchInput{
            padding-top: 20px !important;
            padding-left: 20px !important;
            padding-bottom: 20px !important;
            border-radius: 50px !important;
        }
        .search-section .navbar-top-post-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center
        }
        .search-section .navbar-top-post-btn button {
            font-size: 15px !important;
            border-radius: 200px;
            padding: 10px 40px !important;
            color: #fff !important;
            display: inline;
            width: fit-content;
        }
        .search-section .location {
            font-size: 12px !important;
            text-transform: uppercase;
            border-radius: 200px;
            border: none;
            padding: 10px 20px;
            background: #ffffff !important;
            color: #e7a32d !important;
            cursor: pointer;
            box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        }
        .search-section .jxcategory {
            font-size: 12px !important;
            text-transform: uppercase;
            border-radius: 200px;
            border: none;
            padding: 10px 20px;
            background: #ffffff !important;
            color: #e7a32d !important;
            cursor: pointer;
            box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        }
        .stateLGApopup{
            display: none;
        }
        .form-group{
            margin-bottom: 5px !important;
        }
        .showStateFg{
            padding-left: 15px;
        }
        .showCatFg{
            padding-right: 15px;
        }
        .categoriesModalList li a{
            display: inline-block;
            justify-content: space-evenly;
        }
        .categoriesModalList li a.selectSubOption{
            color: #11a182;
        }
        .popover__content {
            z-index: 10;
            opacity: 1;
            visibility: visible;
            transform: translate(0, -20px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }
    }
    </style>
    <div class="main">
        <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/categorybg.jpg')}})">
            <div class="container">
                <div class="page-name">
                    <div class="sub-banner-text-content">
                        <h1>{{$sub_category->name}} Services</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><span>/</span>{{$sub_category->name}} Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Properties Details page start -->
        <div class="properties-details-page content-area-7 job-ap-services-page" style="margin-top: -20px">
            <div class="service-detail-container">
                <div class="row job-ap-services-page-row">
                    <div class="col-lg-9 col-md-12 col-xs-12 jobApSerDesktop">
                        <div class="row">
                            @forelse($sub_categories as $category_service)
                                @if ($loop->index < 30 && $category_service->badge_type == 1)
                                    <div class="col-lg-3 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Super' : ''}}</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                    <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 21) }}</a>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @elseif($loop->index < 30 && $category_service->badge_type == 2)
                                    <div class="col-lg-3 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Moderate' : ''}}</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                    <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 21) }}</a>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @elseif($loop->index < 30 && $category_service->badge_type == 3)
                                    <div class="col-lg-3 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured bg-primary"><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Basic' : ''}}</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                    <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>

                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 21) }}</a>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="col-lg-3 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                    <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>

                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 21) }}</a>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                                <h4 class="text-muted text-center" style="font-family: Poppins-Regular; color: #000">There are no services yet within this subcategory</h4>
                            @endforelse
                        </div>
                    </div>


                    <div class="col-md-12 jobApSerMobile">
                        <div class="row mobile-row">
                            @forelse($sub_categories as $category_service)
                                @if ($loop->index < 30 && $category_service->badge_type == 1)
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Super' : ''}}</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @elseif ($loop->index < 30 && $category_service->badge_type == 2)
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i>{{$category_service->is_featured == 1 ? ' Moderate' : ''}}</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @elseif ($loop->index < 30 && $category_service->badge_type == 3)
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured bg-success"><i class="fa fa-star"></i>{{$category_service->is_featured == 1 ? ' Basic' : ''}}</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <a  href="{{route('serviceDetail', $category_service->slug)}}">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                        <div class="price-ratings-box">
                                                            <p class="price" style="text-transform: capitalize;">
                                                                {{ Str::limit($category_service->user->name, 20) }}
                                                            </p>
                                                        </div>
                                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" alt="{{ $category_service->name }}">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-mb" href="{{ route('serviceDetail', $category_service->slug) }}">{{ Str::limit($category_service->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Like{{$category_service->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($category_service->state, 5) }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endif

                            @empty
                                {{-- <h5 class="text-muted text-center">There are no services yet within this category</h5> --}}
                            @endforelse
                        </div>
                        @if ($sub_categories->isEmpty())
                            <h5 class="text-muted text-center" style="margin-bottom: 20px;">There are no services yet within this category</h5>
                        @endif
                    </div>


                    <div class="col-lg-3 col-md-12">
                        <div class="sidebar-right">
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

                            <!-- Sub Categories -->
                            <div class="widget popular-posts">
                                <h3 class="sidebar-title">Related Sub Categories</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                @if(isset($related_sub_categories))
                                    @foreach($related_sub_categories as $key => $all_sub_category)
                                        <div class="media">
                                            <div class="media-body align-self-center all-ser-pg-sidebar-feat-ser">
                                                <h3 class="media-heading">

                                                    <a href="{{ route('show_subcat_items', $all_sub_category->slug) }}" class="sub_cat_link">
                                                        <strong style="text-transform: capitalize"><i class="fa fa-long-arrow-right" style="color: #FFC107"></i>  {{ $all_sub_category->name }}</strong>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
                                              <a  href="{{route('serviceDetail', $featuredService->slug)}}">   <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                                                </a>
                                            </div>
                                            <div class="media-body align-self-center all-ser-pg-sidebar-feat-ser">
                                                <h3 class="media-heading">
                                                    <a  href="{{route('serviceDetail', $featuredService->slug)}}">
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

                            <!-- Helping Center start -->
                            <div class="widget helping-center">
                                <h3 class="sidebar-title">Helping Center</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <ul class="contact-link">
                                    <li>
                                        <i class="flaticon-technology-1"></i>
                                        <a href="tel:{{ $check_general_info == 0 ? $general_info->hot_line : '' }}">
                                            {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                        </a>
                                    </li>
                                    @if ($general_info->hot_line_2)
                                        <li>
                                            <i class="flaticon-technology-1"></i>
                                            <a href="tel:{{ $general_info->hot_line_2 ? $general_info->hot_line_2 : '' }}">
                                                {{ $general_info->hot_line_2 ? $general_info->hot_line_2 : '' }}
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a style="color: #05cc6c" href="https://wa.me/{{ $check_general_info == 0 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services.">
                                            <i class="fa fa-whatsapp" style="color: #05cc6c"></i>
                                            WhatsApp Message
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-envelope"></i>
                                        <a href="mailto:{{ $check_general_info == 0 ? $general_info->support_email : '' }}">
                                            {{ $check_general_info == 0 ? $general_info->support_email : '' }}
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




<script type="text/javascript">
    $('#categories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
         $.ajax({
            type:"GET",
                //url:"{{url('qqq')}}"+stateID,
                url: '/api/get-category-list/'+categoryID,
                    success:function(res){
                    if(res){
                        console.log(res);
                        console.log(categoryID);
                        $("#sub_category ").empty();
                        $.each(res,function(key,value){
                            $("#sub_category").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }else{
                        $("#sub_category").empty();
                    }
                }
            });
        }else{
         $("#sub_category").empty();
        }
    });
</script>

<script type="text/javascript">

    $('#state').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
         $.ajax({
          type:"GET",
            //url:"{{url('qqq')}}"+stateID,
            url: '/api/get-city-list/'+state_name,
            success:function(res){
             if(res){
                console.log(res);
                console.log(state_name);
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
              $("#city").empty();
            }
        }
    });
        }else{
            $("#city").empty();
        }

    });

</script>

<style>
    .sub_cat_link{
        display: block;
    }
    .sub_cat_link:hover{
        margin-left: 10px;
    }
</style>
@endsection
