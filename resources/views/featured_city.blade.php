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
    }


    * {box-sizing:border-box}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
    right: 0;
    border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
    background-color: #717171;
    }

    /* Fading animation */
    .tsfade {
    -webkit-animation-name: tsfade;
    -webkit-animation-duration: 1.5s;
    animation-name: tsfade;
    animation-duration: 1.5s;
    }

    @-webkit-keyframes tsfade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes tsfade {
        from {opacity: .4}
        to {opacity: 1}
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
                    @if ($tourist_attractions)
                        @foreach($tourist_attractions as $tourist_attraction)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-sm-12 filtr-item" onclick="loadTouristSites('{{ $tourist_attraction->states }}')">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <a href="#" onclick="loadTouristSites()" class="property-img">
                                            <img class="d-block w-100 touristImage" src="{{ asset('cities_images/'.$tourist_attraction->thumb) }}" alt="{{ $tourist_attraction->name }}">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <h1 class="title">
                                            <a href="#">{{ $tourist_attraction->name }}</a>
                                        </h1>
                                        <div class="location">
                                            <h6><i class="fa fa-map"></i> {{ $tourist_attraction->states }}</h6>
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i>{{ $tourist_attraction->region }} Part of Nigeria
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div id="launchTouristModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h5 class="modal-title" style="color: #fff">All Tourist Sites Here</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                            <!-- Full-width images with number and caption text -->
                            @if ($tourist_attractions)
                                @foreach($tourist_attractions as $key => $tourist_attraction)
                                    <div class="mySlides tsfade">
                                        <div class="numbertext">{{ $key + 1 }}/ {{ $loop->count }}</div>
                                        <img src="{{ asset('cities_images/'.$tourist_attraction->thumb) }}" style="width:100%; height: 400px">
                                        <div class="text">{{ $tourist_attraction->name }}</div>
                                        <div>{{ $tourist_attraction->description }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            @if ($tourist_attractions)
                                @foreach($tourist_attractions as $key => $tourist_attraction)
                                    <span class="dot" onclick="currentSlide({{ $key + 1 }})"></span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal" style="background-color: #cc8a19; color: #fff">Close</button>
                    </div>
                </div>

            </div>
        </div>


        {{-- <div class="featured-properties content-area">
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
        </div> --}}



        <script>
            function loadTouristSites(state){
                event.preventDefault();
                jQuery.noConflict();
                $.ajax({
                    url: '/get-tourist-sites/' + state,
                    method: 'get',
                    success: function(result){
                        console.log(result)

                        $('#launchTouristModal').modal('show');
                    }
                });
            }

            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous controls
            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            // Thumbnail image controls
            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
            }

            </script>

    </section>
@endsection
