<div class="categories content-area-8 home-verified-business-section  bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Hot Businesses</h1>
        </div>
        @if(isset($hotServices))
            <div class="row wow animated" style="visibility: visible;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach($hotServices as $hotService)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                <div class="agenttrusted-badges">
                                    <span class="" style="color: rgb(182, 165, 13)">{{$hotService->badge_type}} <i class="fa fa-star"></i></span>
                                </div>
                                <a class="title " href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 14px;">{{ Str::limit($hotService->name, 50) }} <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$hotService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="{{ $hotService->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>



<div class="blog content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Advertisement</h1>
        </div>
        <div class="row">

                        <div class="col-lg-4 col-md-12">
                <div class="blog-3">
                    <div class="blog-photo">
                                    <a class="title " href="#"  style="font-size: 14px;"><img style="max-height: 170px;" src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid"></a>
                                            </div>
                </div>
            </div>
                        <div class="col-lg-4 col-md-12">
                <div class="blog-3">
                    <div class="blog-photo">
                                                 <a class="title " href="#"  style="font-size: 14px;"><img style="max-height: 170px;" src="{{asset('images')}}/{{'download.jpg'}}" alt="advert" class="img-fluid"></a>
                                            </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-12">
                <div class="blog-3">
                    <div class="blog-photo">
                                                 <a class="title " href="#"  style="font-size: 14px;"><img style="max-height: 170px;" src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid"></a>
                                            </div>
                </div>
            </div>

                    </div>
        <p>Got a content and need an <a href="{{route('advertisement')}}"><strong>ADVERT</strong></a> on this page? click<strong> <a href="{{route('advertisement')}}"> HERE</a></strong></p>
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
