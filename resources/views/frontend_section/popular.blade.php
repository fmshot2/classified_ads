<div class="categories content-area-8 home-verified-business-section">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Verified Businesses</h1>
        </div>
        @if(isset($approvedServices))
            <div class="row wow animated" style="visibility: visible;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach($approvedServices as $approvedService)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-pad">
                                <div class="agenttrusted-badges">
                                    <span class="" style="color: rgb(182, 165, 13)">Trusted <i class="fa fa-star"></i></span>
                                </div>
                                <a class="title " href="{{route('serviceDetail', $approvedService->slug)}}"  style="font-size: 14px;">{{ Str::limit($approvedService->name, 50) }} <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$approvedService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>







<div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Most Popular Places in Nigeria</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="{{ route('allcities') }}" class="btn btn-outline-warning" style="border-radius: 20px">View all the Cities</a>
                </div>
            </div>
        </div>
        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
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
                            <div class="category_bg_box cat-2-bg">
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
