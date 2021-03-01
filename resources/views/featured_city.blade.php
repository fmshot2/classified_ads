@extends('layouts.app')

@section('title', 'Featured Cities')

@section('content')
<div class="sub-banner" style="background-image:url({{ asset('img/popular-places/featuredcities-bg.jpg') }})">
    <div class="container">
        <div class="page-name">
            <div class="sub-banner-text-content">
                <h1>Featured Cities </h1>
                <ul>
                    <li><a href="http://127.0.0.1:8000">Home</a></li>
                    <li><span>/</span>Featured Cities</li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <section class="our-featured-cities-page">
        <!-- Featured properties start -->
        <div class="featured-properties content-area">
            <div class="container-fluid">
                <div class="row filter-portfolio" style="width: 100%; margin-right: 0;margin-left: 0;">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 filtr-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <img class="d-block w-100" src="{{ asset('img/popular-places/lagos-1.jpg') }}" alt="Lagos State">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="#">Lagos State</a>
                                </h1>
                                <div class="location">
                                    <a href="#">
                                        <i class="fa fa-map-marker"></i>South West Part of Nigeria
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <img class="d-block w-100" src="{{ asset('img/popular-places/portharcout-1.jfif') }}" alt="Port Harcourt">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="#">Port Harcourt</a>
                                </h1>
                                <div class="location">
                                    <a href="#">
                                        <i class="fa fa-map-marker"></i>South South Region of Nigeria
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <img class="d-block w-100" src="{{ asset('img/popular-places/enugu-1.jfif') }}" alt="Enugu State">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Enugu State</a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="fa fa-map-marker"></i>South East of Nigeria
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <img class="d-block w-100" src="{{ asset('img/popular-places/abuja-1.jpg') }}" alt="Abuja FCT">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Abuja FCT</a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="fa fa-map-marker"></i>North Central of Nigeria
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .main-header{
        box-shadow: 0px 1px 10px #97979783;
    }

</style>

</style>
