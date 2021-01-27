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
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 service-info-5 card" style="padding: 5px;background: #fff; margin: 0 0 0 0; border: 0">
                                <div class="" style="border: 1px solid rgba(0,0,0,.125);width: 100%;margin: 0;padding: 15px;">
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

                    {{-- <div class="">
                          <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid featured-ad-hm-image">
                    </div><br>
                    <div class="s-border"></div>
                    <div class="m-border"></div> --}}

                    <div class="popular-posts featured-ad-hm-list">
                   {{--      @foreach($featuredServices as $featuredService)
                        <div class="media p-2">
                            <div class="media-left">
                                <img class="media-object" src=" {{asset('images')}}/{{ $featuredService->image[0]}} " alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading"><a href="#">{{ Str::limit($featuredService->name, 35)}}</a></h3>
                                <p class="fea-ad-hm-location"><strong>Location:</strong> {{ Str::limit($featuredService->state, 30)}}</p>
                            </div>
                        </div>
                        @endforeach --}}




                        <div class="container">
                            <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="900">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'pepsi.jpg'}}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="Third slide">
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



                        <br>
                        <div class="footer-item clearfix container-fluid">
                            <br/>
                            
                            <h6 style="margin-top: -15px; text-transform: uppercase">Recommended Ctities</h6>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                        </div>

                        {{-- @foreach($featuredServices as $featuredService) --}}
                        <div class="media p-2">
                            <div class="media-left">
                               <a href="{{ route('allcities') }}"> <img class="d-block mx-auto img-fluid" src="{{asset('img/popular-places')}}/{{'enugu-2.jpg'}}" alt="First slide"></a>
                           </div>
                           <div class="media-body align-self-center">
                            {{-- <h3 class="media-heading"><a href="#">{{ Str::limit($featuredService->name, 35)}}</a></h3> --}}
                            <a href="{{ route('allcities') }}"> <p class="fea-ad-hm-location"><strong>Ebonyi</strong> 
                                {{-- {{ Str::limit($featuredService->state, 30)}} --}}
                            </p></a>
                        </div>
                    </div>
                    <div class="media p-2">
                        <div class="media-left">
                           <a href="{{ route('allcities') }}"> <img class="d-block mx-auto img-fluid" src="{{asset('img/popular-places')}}/{{'abuja-1.jpg'}}" alt="First slide"></a>
                       </div>
                       <div class="media-body align-self-center">
                            <a href="{{ route('allcities') }}">
                                <p class="fea-ad-hm-location"><strong>Abuja</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="media p-2">
                        <div class="media-left">
                           <a href="{{ route('allcities') }}"> <img class="d-block mx-auto img-fluid" src="{{asset('img/popular-places')}}/{{'lagos-image-1.jfif'}}" alt="First slide"></a>
                        </div>
                        <div class="media-body align-self-center">
                            <a href="{{ route('allcities') }}"> <p class="fea-ad-hm-location"><strong>Lagos</strong> </p></a>
                        </div>
                    </div>
                </div>

            
            {{-- @endforeach --}}

        </div>
    </div>
</div>
</div>
</div>









<script type="text/javascript">
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