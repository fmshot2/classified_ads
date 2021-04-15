{{-- <div class="categories content-area-8 home-verified-business-section bg-grea-3" style="margin-top: 20px">
    <div class="service-detail-container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Hot Services</h1>
        </div>
        @if(isset($hotServices))
            <div class="row wow animated" style="visibility: visible;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach($hotServices as $hotService)
                            @if ($hotService->badge_type == 1)
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges">
                                        <span class="text-warning" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                    </div>
                                    <a class="title title-dk hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 21) }}</a>
                                    <a class="title title-mb hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 12) }}</a>

                                    <a href="{{route('serviceDetail', $hotService->slug)}}"><img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$hotService->service_image}}" alt="{{ $hotService->name }}">
                                    </a>
                                </div>
                            @elseif($hotService->badge_type == 2)
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges">
                                        <span class="text-success" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                    </div>
                                    <a class="title title-dk hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 21) }}</a>
                                    <a class="title title-mb hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 12) }}</a>

                                    <a href="{{route('serviceDetail', $hotService->slug)}}"><img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$hotService->service_image}}" alt="{{ $hotService->name }}">
                                    </a>
                                </div>
                            @elseif($hotService->badge_type == 3)
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges">
                                        <span class="text-primary" style="text-transform: uppercase; font-size: 13px;"><i class="fa fa-star"></i> Basic</span>
                                    </div>
                                    <a class="title title-dk hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 21) }}</a>
                                    <a class="title title-mb hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 12) }}</a>

                                    <a href="{{route('serviceDetail', $hotService->slug)}}"><img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$hotService->service_image}}" alt="{{ $hotService->name }}">
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-2 col-md-4 col-sm-6 col-pad" style="margin-bottom: 30px">
                                    <div class="agenttrusted-badges" style="margin-top: 25px">
                                    </div>
                                    <a class="title title-dk hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 21) }}</a>
                                    <a class="title title-mb hot-business-name" href="{{route('serviceDetail', $hotService->slug)}}"  style="font-size: 16px;">{{ Str::limit($hotService->name, 12) }}</a>

                                    <a href="{{route('serviceDetail', $hotService->slug)}}"><img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$hotService->service_image}}" alt="{{ $hotService->name }}">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div> --}}



{{-- <div class="blog content-area home-advert-section">
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
</div> --}}





 <div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Tourist Sites in Nigeria</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="{{ route('allcities') }}" class="btn btn-outline-warning" style="border-radius: 20px">View all the Sites</a>
                </div>
            </div>
        </div>
        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    @if ($tourist_attractions)
                        @foreach($tourist_attractions->shuffle() as $tourist_attraction)
                            @if ($loop->first || $loop->index == 1)
                                <div class="col-sm-6 col-pad">
                                    <div class="category">
                                        <div class="category_bg_box cat-1-bg" style="background-image: url({{ asset('cities_images/'.$tourist_attraction->thumb) }});">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#">{{ $tourist_attraction->states }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($loop->index == 2)
                                <div class="col-sm-12 col-pad">
                                    <div class="category">
                                        <div class="category_bg_box cat-3-bg" style="background-image: url({{ asset('cities_images/'.$tourist_attraction->thumb) }});">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#">{{ $tourist_attraction->states }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
            </div>
                            @elseif($loop->index == 3)
                                <div class="col-lg-5 col-md-12 col-sm-12 col-pad d-none d-xl-block d-lg-block">
                                    <div class="category">
                                        <div class="category_bg_box category_long_bg cat-4-bg" style="background-image: url({{ asset('cities_images/'.$tourist_attraction->thumb) }});">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#">{{ $tourist_attraction->states }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
        </div>
    </div>




{{--
<div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <div class="main-title">
            <h1>Distinguished National Assembly Of Nigeria</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                </div>
            </div>
        </div>
        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                                <div class="col-sm-6 col-pad">
                                    <div class="category">
                                        <div class="category_bg_box cat-1-bg" style="background-image: url({{ asset('cities_images/senators.jpg') }});">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#">Distinguished Senators</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-pad">
                                    <div class="category">
                                        <div class="category_bg_box cat-3-bg" style="background-image: url({{ asset('cities_images/nass.jpg') }});">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#">Nigeria House Of Assembly</a>
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
                                        <div class="category_bg_box category_long_bg cat-4-bg" style="background-image: url({{ asset('cities_images/nigeriaassembly.jpg') }});">
                                            <div class="category-overlay">
                                                <div class="category-content">
                                                    <h3 class="category-title">
                                                        <a href="#">Towards Our Collective Greatness</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                </div>
        </div>
    </div> --}}


</div>
