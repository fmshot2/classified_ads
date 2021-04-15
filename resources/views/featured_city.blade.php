@extends('layouts.app')

@section('title', 'Tourist Sites in Nigeria | ')

@section('content')

<style>
    .touristImage{
        height: 250px;
    }
    .main-header{
        box-shadow: 0px 1px 10px #97979783;
    }
    .filtr-item{
        cursor: pointer;
    }

    * {box-sizing:border-box}

    .alert {
        text-transform: uppercase;
        font-size: 17px;
        text-align: center;
    }
    .alert-success{
        background-color: #138a49c7 !important;
        color: #fff;
    }
    .property-box .detail .location i {
        color: #ca8309;
    }

    .modal-header{
        background-color: #ca8309;
        text-transform: uppercase;
    }
    .modal-title{
        color: #fff;
    }
    .carousel-item img{
        width: 100%;
    }
    .carousel-control-next, .carousel-control-prev {
        position: absolute;
        top: 0;
        bottom: 0;
        z-index: 1;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 15%;
        color: #fff;
        text-align: center;
        opacity: .5;
        transition: opacity .15s ease;
    }
    .carousel-control-prev {
        left: 0;
    }
    .img-size{
        height: 450px;
        width: 700px;
        background-size: cover;
        overflow: hidden;
    }
    .modal-body {
        padding: 0;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
        width: 30px;
        height: 48px;
    }
    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
        width: 30px;
        height: 48px;
    }
    .touristSlideContent{
        padding: 20px;
    }
    .touristSlideContent p{
        padding: 0 !important;
        margin: 0 !important;
        font-size: 16px;
    }
    .touristSlideContent strong{
        text-transform: uppercase;
    }
    .stateNotice{
        text-align: center; font-weight: 600; text-transform: uppercase; padding: 25px
    }
    .carousel-control-prev-icon, .carousel-control-next-icon{
        margin-top: -90px
    }

    @media (max-width: 768px){
        .touristImage{
            height: 80px !important;
        }
        .location h6{
            font-size: 13px !important;
        }
        .detail .title{
            font-size: 12px !important;
        }
        .touristModal .modal-title{
            color: #fff;
            font-size: 16px
        }
        .carousel-item .img-size{
            height: auto;
            background-size: cover;
            overflow: hidden;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon{
            margin-top: -120px
        }
        .stateNotice{
            padding: 15px
        }

        .carousel-control-prev-icon {
            width: 20px;
            height: 38px;
        }
        .carousel-control-next-icon {
            width: 20px;
            height: 38px;
        }
        .touristSlideContent p{
            font-size: 14px;
        }

    }
</style>

<div class="sub-banner" style="background-image:url({{ asset('img/popular-places/featuredcities-bg.jpg') }})">
    <div class="container">
        <div class="page-name">
            <div class="sub-banner-text-content">
                <h1>Tourist Sites in Nigeria</h1>
                <ul>
                    <li><a href="http://127.0.0.1:8000">Home</a></li>
                    <li><span>/</span>Tourist Sites</li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <section class="our-featured-cities-page">
        <div class="featured-properties content-area">
            <div class="container-fluid">
                <div class="row filter-portfolio" style="width: 100%; margin-right: 0;margin-left: 0;">
                    @if ($states)
                        @foreach($states as $key => $state)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-sm-12 filtr-item">
                                <div data-toggle="modal" data-target="#launchModal{{ $key }}" class="property-box">
                                    <div class="property-thumbnail">
                                        <a href="#" class="property-img">
                                            <img class="d-block w-100 touristImage" src="{{ asset('statesthumbnails/'.$state->image) }}" alt="{{ $state->name }}">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <div class="location">
                                            <h6><i class="fa fa-map"></i> {{ $state->name }}</h6>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="launchModal{{ $key }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                @if ($state->tourisms->count() != 0)
                                                    <div id='launchTourist{{ $key }}' class='carousel slide' data-ride='carousel'>
                                                        <ol class='carousel-indicators'>
                                                            @foreach($state->tourisms as $tourism)
                                                                <li data-target="#launchTourist{{ $key }}" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                                            @endforeach
                                                        </ol>
                                                        <div class='carousel-inner'>
                                                            @foreach($state->tourisms as $tourism)
                                                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                    <img class="img-size" src="{{ asset('cities_images/'. $tourism->thumb) }}" alt="{{ $tourism->name }}">

                                                                    <div class="touristSlideContent">
                                                                        <p><strong>State:</strong> {{ $tourism->states }}</p>
                                                                        <p><strong>Name:</strong> {{ $tourism->name }}</p>
                                                                        <p><strong>Region: </strong> {{ $tourism->region }} region of Nigeria</p>
                                                                        <p><strong>Description:</strong> {!! $tourism->description !!}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        @if ($state->tourisms->count() > 1)
                                                            <a class="carousel-control-prev" href="#launchTourist{{ $key }}" role="button" data-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#launchTourist{{ $key }}" role="button "data-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class='sr-only'>Next</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif

                                                <div class="stateNotice">
                                                    Waiting for state to upload content.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #cc8a19; color: #fff">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="alert alert-success" role="alert">
                            <a style="color: #90fff5" href="{{ route('contact') }}">Contact Us</a> to Upload Tourist Sites and Attractions in your state.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
