<div class="categories content-area-8">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Featured Businesses</h1>
        </div>
        @if(isset($approvedServices))

        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                        @foreach($approvedServices as $approvedService)

                    <div class="col-sm-3 col-pad">
                        <div class="agenttrusted-badges">
                                <span class="" style="color: rgb(182, 165, 13)">Trusted <i class="fa fa-star"></i></span>
                            </div>
                        <div class="category">
                            <div class="category_bg_box cat-2-bg" style="background-image: url({{asset('images')}}/{{$approvedService->image}})">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="{{route('serviceDetail', $approvedService->id)}}"  style="font-size: 15px;">{{$approvedService->user->name}},  {{$approvedService->name}}</a>
                                        </h3>
                                        <a href="{{route('serviceDetail', $approvedService->id)}}" class="category-subtitle" style="float: left; font-size: 15px;"><i class="fa fa-map-marker"></i> {{$approvedService->state}}</a>
                                        <div class="">
                                <span class="featured text-white">Trusted <i class="fa fa-star text-warning"></i></span>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
@endif
               
                 <!--   <div class="col-sm-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Villa</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">98 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                     
                </div>
            </div>
       <!--  <div class="col-lg-5 col-md-12 col-sm-12 col-pad d-none d-xl-block d-lg-block">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Farm</a>
                                </h3>
                                <a href="properties-list-rightside.html" class="category-subtitle">12 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>







<div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Most Popular Places</h1>
        </div>
        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Lagos</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Port Harcourt</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Enugu</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-pad d-none d-xl-block d-lg-block">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Abuja</a>
                                </h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>