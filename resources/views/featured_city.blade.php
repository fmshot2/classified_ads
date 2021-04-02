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

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }
    .slideshow-container .activeslide {
        display: block !important;
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

    .slideshow-container .active, .dot:hover {
    background-color: #717171;
    }

    /* Fading animation */
    .tsfade {
    -webkit-animation-name: tsfade;
    -webkit-animation-duration: 1.5s;
    animation-name: tsfade;
    animation-duration: 1.5s;
    }
    .mySlides .siteImage{
        width:100%; height: 400px
    }
    #launchTouristModal .modal-title{
        color: #fff;
        text-transform: uppercase;
    }
    .mySlidesContent{
        margin-top: 20px
    }

    @-webkit-keyframes tsfade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes tsfade {
        from {opacity: .4}
        to {opacity: 1}
    }

    .alert {
        text-transform: uppercase;
        font-size: 17px;
        text-align: center;
    }
    .alert-success{
        background-color: #03A84E !important;
        color: #fff;
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
        .mySlides .siteImage{
            height: 200px
        }
        #launchTouristModal .modal-title{
            font-size: 16px
        }
        .mySlidesContent{
            font-size: 15px
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
                        @foreach($states as $state)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-sm-12 filtr-item" onclick="loadTouristSites('{{$state->name}}')">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <a href="#" onclick="loadTouristSites({{$state->name}})" class="property-img">
                                            <img class="d-block w-100 touristImage" src="{{ asset('statesthumbnails/'.$state->image) }}" alt="{{ $state->name }}">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <div class="location">
                                            <h6><i class="fa fa-map"></i> {{ $state->name }}</h6>
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
                            Take advantage of our platform to showcase your skills, products and services to customers and clients.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="launchTouristModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h5 class="modal-title">All Tourist Sites In this State</h5>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- Slideshow container -->
                        <div class="slideshow-container" id="touristSlides">

                            <!-- Full-width images with number and caption text -->
                            {{-- @if ($tourist_attractions)
                                @foreach($tourist_attractions as $key => $tourist_attraction)
                                    <div class="mySlides tsfade">
                                        <div class="numbertext">{{ $key + 1 }}/ {{ $loop->count }}</div>
                                        <img src="{{ asset('cities_images/'.$tourist_attraction->thumb) }}" style="width:100%; height: 400px">
                                        <div class="text">{{ $tourist_attraction->name }}</div>
                                        <div>{{ $tourist_attraction->description }}</div>
                                    </div>
                                @endforeach
                            @endif --}}
                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            {{-- @if ($tourist_attractions)
                                @foreach($tourist_attractions as $key => $tourist_attraction)
                                    <span class="dot" onclick="currentSlide({{ $key + 1 }})"></span>
                                @endforeach
                            @endif --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal" style="background-color: #cc8a19; color: #fff">Close</button>
                    </div>
                </div>

            </div>
        </div>



        <script>
            function loadTouristSites(state){
                event.preventDefault();
                jQuery.noConflict();
                $('.mySlides').remove()

                $.ajax({
                    url: '/get-tourist-sites/' + state,
                    method: 'get',
                    success: function(results){
                        console.log(results)
                        if (!$.trim(results)){
                            toastr.info('No tourist site here!')
                        }
                        else{
                            results.forEach((data, key) => {
                                current = (key == 0 ? ' activeslide' : '')
                                $('#touristSlides').append(`
                                    <div class="mySlides tsfade`+ current +`">
                                        <div class="numbertext">`+ (key+1) + `/` + results.length + `</div>
                                        <img src="cities_images/`+ data.thumb + `" class="siteImage">
                                        <div class="mySlidesContent">
                                            <div><strong>Site Name:</strong> `+ data.name +`</div>
                                            <div><strong>Description:</strong> `+ data.description +`</div>
                                            <div><strong>Region: </strong>`+ data.region +` region of Nigeria</div>
                                        </div>
                                    </div>
                                `)
                            })
                            $('#launchTouristModal').modal('show');
                        }
                    },
                    error:function(){
                        toastr.error('Something went wrong!')
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
                    $('.mySlides').removeClass('activeslide')
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
