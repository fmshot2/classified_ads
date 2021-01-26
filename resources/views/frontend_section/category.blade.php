<div class="recently-properties content-area-12 home-recently-properties" style="">
    <div class="services-2 content-area-5">
        <div class="row container-fluid hm-top-row">
            <div class="col-lg-3 col-md-2 fea-ser-mobile fea-ser-tablet">
                <div class="sidebar-right">
                    <div class="footer-item clearfix container-fluid">
                        <br/>
                        <div class="s-border" style="margin-top: -15px;"></div>
                        <div class="m-border"></div>
                        <h5 style="margin-top: -15px; text-transform: uppercase">Featured Services</h5>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                    </div>

                    <div class="popular-posts featured-service-hm">
                        @foreach($featuredServices as $featuredService)
                        <div class="media p-2">
                            <a href="{{route('serviceDetail', $featuredService->slug)}}">
                                <div class="media-left">
                                    <img class="media-object" src=" {{asset('images')}}/{{ $featuredService->image[0]}} " alt="sub-properties">
                                </div>
                            </a>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading"><a href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 30)}}</a></h3>

                                <p class="fea-ad-hm-location"><strong>Location:</strong> <a href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->state, 30)}}</a></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="col-lg-6 desktop-cat-col">
                <div class="main-title">
                    <h1>What service are you looking for?</h1>
                </div>
                {{-- <div class="sidebar-right"> --}}
                     <div class="">
                    <div class="row" style="visibility: visible;">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 service-info-5 card">
                                    <div class="">
                                        <a href="{{route('services', $category->slug)}}" >
                                            <div style="border-radius: 50px;" class="cat-image-icon">
                                                <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px;" alt="properties">
                                            </div>
                                        </a>

                                        <a href="{{route('services', $category->slug)}}" >
                                            <h6>{{$category->name}}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $categories->links() }}
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-lg-6 mobile-cat-col">
                <div class="main-title">
                    <h1>What service are you looking for?</h1>
                </div>
                <div class="sidebar-right" style="width: 100%; padding: 15px;">
                    <div class="row wow animated" style="visibility: visible;" style="margin: 0; padding: 0; width: 100%">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <div class="col-4 col-xs-2" style="margin: 0; padding: 10px; width: 100%">
                                    <div class="service-info-5" style="margin: 0; padding: 10px; width: 100%">
                                        <a href="{{route('services', $category->slug)}}" >
                                            <div style="border-radius: 50px">
                                                <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px; width: 50px" alt="properties">
                                            </div>
                                        </a>

                                        <a href="{{route('services', $category->slug)}}" >
                                            <h6  class="cat-title">{{$category->name}}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $categories->links() }}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 tablet-cat-col d-none">
                <div class="main-title">
                    <h1>What service are you looking for?</h1>
                </div>
                <div class="sidebar-right" style="width: 100%; padding: 15px;">
                    <div class="row wow animated" style="visibility: visible;" style="margin: 0; padding: 0; width: 100%">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <div class="col-3 col-xs-2" style="margin: 0; padding: 10px; width: 100%">
                                    <div class="service-info-5" style="margin: 0; padding: 10px; width: 100%">
                                        <a href="{{route('services', $category->slug)}}" >
                                            <div style="border-radius: 50px">
                                                <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px; width: 50px" alt="properties">
                                            </div>
                                        </a>

                                        <a href="{{route('services', $category->slug)}}" >
                                            <h6  class="cat-title">{{$category->name}}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $categories->links() }}
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-3 fea-ser-tablet">
                <div class="sidebar-right">
                    <div class="footer-item clearfix container-fluid">
                        <br/>
                        <div class="s-border" style="margin-top: -15px;"></div>
                        <div class="m-border"></div>
                        <h5 style="margin-top: -15px; text-transform: uppercase">Featured Adverts</h5>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                    </div>

                    <div class="">
                          <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid featured-ad-hm-image">
                    </div><br>
                    <div class="s-border"></div>
                    <div class="m-border"></div>

                    <div class="popular-posts featured-ad-hm-list">
                        @foreach($featuredServices as $featuredService)
                        <div class="media p-2">
                            <div class="media-left">
                                <img class="media-object" src=" {{asset('images')}}/{{ $featuredService->image[0]}} " alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading"><a href="#">{{ Str::limit($featuredService->name, 35)}}</a></h3>
                                <p class="fea-ad-hm-location"><strong>Location:</strong> {{ Str::limit($featuredService->state, 30)}}</p>
                            </div>
                        </div>
                        @endforeach

                    <div class="" style="padding: 10px">
                        <div id="wrapper" style="width:100%">
                            <div id="slider-wrap" style="width: 100%">
                               <ul id="slider">
                                    <li style="
                                    background-image: url('{{asset('images')}}/{{'MTN-apptitude.jpg'}}');
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: cover;">
                                    </li>

                                    <li style="
                                    background-image: url('{{asset('images')}}/{{'piano_lessons.jfif'}}');background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: cover;">
                                    </li>

                                    <li style="background-image: url('{{asset('images')}}/{{'portharcout-image.jfif'}}');background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: cover;">
                                    </li>

                                    <li style="
                                    background-image: url('{{asset('images')}}/{{'repair_1200x800.jpeg'}}');
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: cover;">
                                    </li>

                                    <li style="
                                    background-image: url('{{asset('images')}}/{{'Screenshotef.png'}}');
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: cover;">
                                    </li>

                                    <li data-color="#1abc9c">
                                        <div>
                                            <h3>Want your ads here?</h3>
                                            <span>Draw attention to your services or products here!</span>
                                        </div>
                                        <i class="fa fa-image"></i>
                                     </li>
                                </ul>

                                <!--controls-->
                                <div class="btns" id="next"><i class="fa fa-arrow-right"></i></div>
                                <div class="btns" id="previous"><i class="fa fa-arrow-left"></i></div>
                                <div id="counter"></div>

                                <div id="pagination-wrap">
                                    <ul>
                                    </ul>
                                </div>
                                <!--controls-->

                            </div>
                        </div>


                        {{-- <div id="slider">
                            <ul>
                                <li>SLIDE 1</li>
                                <li style="background: #aaa;">
                                    <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid">
                                </li>
                                <li>SLIDE 3</li>
                                <li style="background: #aaa;">
                                    <img src="{{asset('images')}}/{{'piano_lessons.jfif'}}" alt="advert" class="img-fluid featured-ad-hm-image">
                                </li>
                            </ul>
                          </div> --}}
                        {{-- <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid featured-ad-hm-image"><hr>
                        <img src="{{asset('images')}}/{{'piano_lessons.jfif'}}" alt="advert" class="img-fluid featured-ad-hm-image"><hr>
                        <img src="{{asset('images')}}/{{'portharcout-image.jfif'}}" alt="advert" class="img-fluid featured-ad-hm-image"><hr>
                        <img src="{{asset('images')}}/{{'repair_1200x800.jpeg'}}" alt="advert" class="img-fluid featured-ad-hm-image"><hr>
                        <img src="{{asset('images')}}/{{'Screenshotef.png'}}" alt="advert" class="img-fluid featured-ad-hm-image"><hr> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    //current position
    var pos = 0;
    //number of slides
    var totalSlides = $('#slider-wrap ul li').length;
    //get the slide width
    var sliderWidth = $('#slider-wrap').width();

    $(document).ready(function(){
        /*****************
        BUILD THE SLIDER
        *****************/
        //set width to be 'x' times the number of slides
        $('#slider-wrap ul#slider').width(sliderWidth*totalSlides);

        //next slide
        $('#next').click(function(){
            slideRight();
        });

        //previous slide
        $('#previous').click(function(){
            slideLeft();
        });



        /*************************
        //*> OPTIONAL SETTINGS
        ************************/
        //automatic slider
        var autoSlider = setInterval(slideRight, 3000);

        //for each slide
        $.each($('#slider-wrap ul li'), function() {
            //set its color
            var c = $(this).attr("data-color");
            $(this).css("background",c);

            //create a pagination
            var li = document.createElement('li');
            $('#pagination-wrap ul').append(li);
        });

        //counter
        countSlides();

        //pagination
        pagination();

        //hide/show controls/btns when hover
        //pause automatic slide when hover
        $('#slider-wrap').hover(
            function(){ $(this).addClass('active'); clearInterval(autoSlider); },
            function(){ $(this).removeClass('active'); autoSlider = setInterval(slideRight, 3000); }
        );



    });//DOCUMENT READY



    /***********
    SLIDE LEFT
    ************/
    function slideLeft(){
        pos--;
        if(pos==-1){ pos = totalSlides-1; }
        $('#slider-wrap ul#slider').css('left', -(sliderWidth*pos));

        //*> optional
        countSlides();
        pagination();
    }


    /************
    SLIDE RIGHT
    *************/
    function slideRight(){
        pos++;
        if(pos==totalSlides){ pos = 0; }
        $('#slider-wrap ul#slider').css('left', -(sliderWidth*pos));

        //*> optional
        countSlides();
        pagination();
    }


    /************************
    //*> OPTIONAL SETTINGS
    ************************/
    function countSlides(){
        $('#counter').html(pos+1 + ' / ' + totalSlides);
    }

    function pagination(){
        $('#pagination-wrap ul li').removeClass('active');
        $('#pagination-wrap ul li:eq('+pos+')').addClass('active');
    }


</script>
