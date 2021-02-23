
@extends('layouts.app')

@section('title')
Home | 
@endsection

@section('content')

<div class="main">

    <div class="sub-banner">
        <div class="container">
            <div class="page-name">
                <h1>Search Result</h1>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><span>/</span>Search Result</li>
                </ul>
            </div>
        </div>
    </div>



    <!-- Properties section body start -->
    <div class="properties-section content-area searchResultPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if ($services1)
                        <div class="row row-flex searchResults 1">
                            @foreach($services1 as $services1)
                                @if ($loop->index < 30 && $services1->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services1) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services1->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services1)}}">{{ Str::limit($services1->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services1->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services1)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services1->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services1)}}">{{ Str::limit($services1->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services1->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services1)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services1->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services1)}}">{{ Str::limit($services1->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services1)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services1->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services1)}}">{{ Str::limit($services1->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
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

                    @if ($services2)
                        <div class="row row-flex searchResults 2">
                            @foreach($services2 as $services2)
                                @if ($loop->index < 30 && $services2->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services2) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services2->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services2)}}">{{ Str::limit($services2->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services2->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services2->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services2)}}">{{ Str::limit($services2->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services2->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services2->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services2)}}">{{ Str::limit($services2->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services2->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services2)}}">{{ Str::limit($services2->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
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

                    @if ($services3)
                        <div class="row row-flex searchResults 3">
                            @foreach($services3 as $services3)
                                @if ($loop->index < 30 && $services3->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services3) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services3->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services3)}}">{{ Str::limit($services3->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services3->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services3->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services3)}}">{{ Str::limit($services3->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services3->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services3->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services3)}}">{{ Str::limit($services3->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services3->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services3)}}">{{ Str::limit($services3->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
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

                    @if ($services4)
                        <div class="row row-flex searchResults 4">
                            @foreach($services4 as $services4)
                                @if ($loop->index < 30 && $services4->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services4) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services4->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services4)}}">{{ Str::limit($services4->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services4->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services4)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services4->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services4)}}">{{ Str::limit($services4->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services4->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services4)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services4->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services4)}}">{{ Str::limit($services4->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services4)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services4->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services4)}}">{{ Str::limit($services4->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
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

                    @if ($services5)
                        <div class="row row-flex searchResults 5">
                            @foreach($services5 as $services5)
                                @if ($loop->index < 30 && $services5->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services5) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services5->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services5)}}">{{ Str::limit($services5->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services5->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services5)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services5->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services5)}}">{{ Str::limit($services5->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services5->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services5)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services5->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services4)}}">{{ Str::limit($services5->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services5)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$services5->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services5)}}">{{ Str::limit($services5->name, 50) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Likes
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
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

                    @if(!$services1 and !$services2 and !$services3 and !$services4 and !$services5)
                        <div class="info">
                            <h4>Ooops, The Item Could Not Be Found!</h4>
                            <p>The item you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                            <div class="hr"></div>
                            <p>Please try searching again with a diffenrent keyword this time.</p>
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
                                            <input type="text" name="keyword" class="form-control" placeholder="What Service Are You Looking For?">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p style="font-weight: 600; margin-bottom: 0;">Choose Distance(in km): <span id="demo"></span></p>
                        <div class="slidecontainer" style="margin-bottom: 15px;">
                            {{-- <input type="range" min="1" max="100" value="50" class="slider form-control" id="myRange2"> --}}
                            <input type="range" min="1" max="1000000" name="ranges"  value="5000" class="slider" id="myRange">
                        </div>
                    </div>
                               <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="state" class="form-control" placeholder="Enter Your State">
                                    </div>
                                </div>-->
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

                                        <option value="{{$state->name}}"> {{ $state->name }}  </option> 
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
                        <div class="media">
                            <div class="media-left">
                                {{--                         <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->image[0]}}">

                                --}}        
                                <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="#">{{$featuredService->user->name}}, {{$featuredService->name}}, {{$featuredService->city}}</a>
                                </h3>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <!-- Posts by category start -->
                    {{-- <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Cities</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                          @if(isset($featuredServices))
                          @foreach($featuredServices as $featuredService)
                          <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                          @endforeach
                          @endif

                      </ul>
                  </div> --}}


                  <div class="widget helping-center">
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="media">
                        <div class="media-left">
                          <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid">
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
        <!-- Property box 2 start -->
        <div class="col-md-12">
            <div class="row">

              
            @if(isset($services2))
            @foreach($services2 as $service2)       
            <div class="col-sm-3 card service-box 2">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service2->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service2->user->name}}, &nbsp; {{$service2->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service2->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
            @endif
        

            @if(isset($services3))
            @foreach($services3 as $service3)       
            <div class="col-sm-3 card service-box 3">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service3->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service3->user->name}}, &nbsp; {{$service3->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service3->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach 
                        @endif
            @if(isset($services4))
            @foreach($services4 as $service4)              
            <div class="col-sm-3 card service-box 4">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service4->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service4->user->name}}, &nbsp; {{$service4->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service4->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>  
            @endforeach  
                        @endif

                              @if(isset($services5))
            @foreach($services5 as $service5)       
            <div class="col-sm-3 card service-box 5">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service5->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service5->user->name}}, &nbsp; {{$service5->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">
                            
                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service5->city}}</span>
                    </div>
                    
                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
                        @endif  

                                  @if(isset($keywordResponses6))
            @foreach($keywordResponses6 as $keywordResponse6)       
            <div class="col-sm-3 card service-box ky1">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$keywordResponse6->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$keywordResponse6->user->name}}, &nbsp; {{$keywordResponse6->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">
                            
                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$keywordResponse6->state}}</span>
                    </div>
                    
                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
                        @endif


                            @if(isset($keywordResponses5a))
            @foreach($keywordResponses5a as $keywordResponse5a)       
            <div class="col-sm-3 card service-box ky2">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$keywordResponse5a->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$keywordResponse5a->user->name}}, &nbsp; {{$keywordResponse5a->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">
                            
                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$keywordResponse5a->state}}</span>
                    </div>
                    
                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
                        @endif

                                      @if(isset($keywordResponses7a))
            @foreach($keywordResponses7a as $keywordResponse7)       
            <div class="col-sm-3 card service-box ky3">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$keywordResponse7->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$keywordResponse7->user->name}}, &nbsp; {{$keywordResponse7->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">
                            
                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$keywordResponse7->state}}</span>
                    </div>
                    
                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
                        @endif


                                  @if(isset($keywordResponses3))
               @foreach($keywordResponses3 as $keywordResponse3)

               <div class="col-sm-3 card service-box kw">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$keywordResponse3->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$keywordResponse3->user->name}}, &nbsp; {{$keywordResponse3->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$keywordResponse3->state}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
            @endif

                         @if(isset($services1))
               @foreach($services1 as $service1)

               <div class="col-sm-3 card service-box 1">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service1->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service1->user->name}}, &nbsp; {{$service1->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service1->state}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>

            </div>
            @endforeach
            @endif

                        
        
        </div>


@if(!$services1 and !$services2 and !$services3 and !$services4 and !$services5)
        <div class="info">
            <h4>Ooops, The Item Could Not Be Found!</h4>
            <p>The item you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <div class="hr"></div>
            <p>Please try searching again with a diffenrent keyword this time.</p>
        </div>
        @endif
    </div>
    <!-- Page navigation start -->
    <div class="pagination-box hidden-mb-45 text-center">
        <nav aria-label="Page navigation example">
          {{--{{ $all_message->links() }}  --}} 
      </nav>
  </div>
</div>

</div>
</div>
</div>
</div>


@endsection













