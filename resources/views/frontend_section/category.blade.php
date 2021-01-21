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
                                            <div style="border-radius: 50px">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
