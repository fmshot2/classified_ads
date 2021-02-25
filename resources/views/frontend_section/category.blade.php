<div class="recently-properties content-area-12 home-recently-properties">
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
                         @if(isset($featuredServices))
                            @foreach($featuredServices as $featuredService)
                                @if ($loop->index < 16)
                                    <div class="media p-2">
                                        <a href="{{route('serviceDetail', $featuredService->slug)}}">
                                            <div class="media-left">
                                                <img class="media-object" src="{{asset('uploads/services')}}/{{ $featuredService->service_image}}" alt="sub-properties">
                                            </div>
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h3 class="media-heading"><a href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 30)}}</a></h3>

                                            <p class="fea-ad-hm-location"><strong>Location:</strong> <a href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->state, 30)}}</a></p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 desktop-cat-col">
                <div class="main-title">
                    <h1>What service are you looking for?</h1>
                </div>
                <div class="">
                    <div class="row" style="visibility: visible;">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 service-info-5 card" style="padding: 5px;background: #fff; margin: 0 0 0 0; border: 0; border-radius: 0">
                                    <div style="border: 1px solid rgba(0,0,0,.125);width: 100%;margin: 0;padding: 15px;">
                                        <div class="cat-image-icon">
                                            <a href="{{route('services', $category->slug)}}" >
                                                <div style="border-radius: 50px;">
                                                    <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px;" alt="{{$category->name}}">
                                                </div>
                                            </a>

                                            <a href="{{route('services', $category->slug)}}" >
                                                <h6>{{$category->name}}</h6>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mobile-cat-col">
                <div class="main-title">
                    <h2>What service are you looking for?</h2>
                </div>
                <div class="sidebar-right" style="width: 100%; padding: 15px;">
                    <div class="row wow animated" style="visibility: visible;" style="margin: 0; padding: 0; width: 100%">
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <div class="col-4 col-xs-2" style="margin: 0; padding: 10px; width: 100%">
                                    <div class="service-info-5" style="margin: 0; padding: 10px; width: 100%; border: 1px solid rgba(0,0,0,.125);">
                                        <div class="cat-image-icon">
                                            <a href="{{route('services', $category->slug)}}" >
                                                <div style="border-radius: 50px">
                                                    <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px; width: 50px" alt="{{$category->name}}">
                                                </div>
                                            </a>

                                            <a href="{{route('services', $category->slug)}}">
                                                <h6 class="cat-title" style="margin-top: 5px;">{{$category->name}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                        <div class="cat-image-icon">
                                            <a href="{{route('services', $category->slug)}}" >
                                                <div style="border-radius: 50px">
                                                    <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px; width: 50px" alt="{{$category->name}}">
                                                </div>
                                            </a>

                                            <a href="{{route('services', $category->slug)}}">
                                                <h6  class="cat-title">{{$category->name}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

                    <div class="footer-item clearfix container-fluid" style="margin-top:20px">
                        <br/>
                        <h6 style="margin-top: -15px; text-transform: uppercase">Trending Services</h6>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                    </div>

                    <div class="popular-posts featured-ad-hm-list" style="margin-top: -10px">
                        @if(isset($trendingServices))
                        @foreach ($trendingServices as $trendingService)
                            @if ($loop->index < 13)
                                <div class="media p-2">
                                    <a href="{{ route('serviceDetail', $trendingService->slug) }}">
                                        <div class="media-left">
                                            <img class="d-block mx-auto img-fluid" src="{{asset('uploads/services')}}/{{ $trendingService->service_image }}" alt="First slide">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <p class="fea-ad-hm-location tt-capitalize"><strong>{{ Str::limit($trendingService->name, 30)}}</strong>
                                            </p>
                                            <p class="fea-ad-hm-location"><strong>Location:</strong> {{ Str::limit($trendingService->state, 30)}}</a></p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    .vert .carousel-item-next.carousel-item-left,
    .vert .carousel-item-prev.carousel-item-right {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .vert .carousel-item-next,
    .vert .active.carousel-item-right {
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100% 0);
    }
    .vert .carousel-item-prev,
    .vert .active.carousel-item-left {
        -webkit-transform: translate3d(0,-100%, 0);
        transform: translate3d(0,-100%, 0);
    }
</script>
