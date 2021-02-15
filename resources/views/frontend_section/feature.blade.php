<div class="blog content-area bg-grea-3 hm-feat-ser-mid-sec">

    <div class="container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1> Featured Services </h1>
        </div>

{{--  <div>Country: <span id="country"></span>
    <div>State: <span id="state"></span>
    <div>City: <span id="city"></span>
    <div>Latitude: <span id="latitude"></span>
    <div>Longitude: <span id="longitude"></span>
    <div>IP: <span id="IPv4"></span>
        <button class="btn btn-success" onclick="check()">click</button>
    <script>
        function check(){
    $.ajax({
        url: "https://geolocation-db.com/jsonp",
        jsonpCallback: "callback",
        dataType: "jsonp",
        success: function( location ) {
            $('#country').html(location.country_name);
            $('#state').html(location.state);
            $('#city').html(location.city);
            $('#latitude').html(location.latitude);
            $('#longitude').html(location.longitude);
            $('#ip').html(location.IPv4);
        }
    });
    }
    </script> --}}

        @if(isset($featuredServices))
            <div class="row">
                @foreach($featuredServices as $featuredService)
                    <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i> {{$featuredService->is_featured == 1 ? 'Trusted' : ''}}</span>
                                    </div>

                                    <div class="price-ratings-box">
                                        <p class="price">
                                        {{ Str::limit($featuredService->experience, 5) }} Yrs Experience
                                        </p>
                                    </div>
                                    <div class="listing-time opening">{{ Str::limit($featuredService->user->name, 10) }}</div>
                                       <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                 {{--    <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties"> --}}

                                </div>
                                <div class="detail">
                                    <div>
                                        <a class="title" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 50) }}</a>
                                    </div>

                                    <ul class="d-flex flex-row justify-content-between info">
                                        <li>
                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$featuredService->likes->count()}} Likes
                                        </li>
                                        <li>
                                            <a class="pull-right" href="{{route('serviceDetail', $featuredService->slug)}}">
                                                <i class="fa fa-map-marker text-warning"></i> {{$featuredService->state}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
@if(isset($superServices))
                @foreach($superServices as $superService)


                 <a href="{{route('serviceDetail', $superService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured"><i class="fa fa-star"></i>Super</span>
                                    </div>

                                    <div class="price-ratings-box">
                                        <p class="price">
                                        {{ Str::limit($superService->experience, 5) }} Yrs Experience
                                        </p>
                                    </div>
                                    <div class="listing-time opening">{{ Str::limit($superService->user->name, 10) }}</div>
                                       <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$superService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                 {{--    <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties"> --}}

                                </div>
                                <div class="detail">
                                    <div>
                                        <a class="title" href="{{route('serviceDetail', $superService->slug)}}">{{ Str::limit($superService->name, 50) }}</a>
                                    </div>

                                    <ul class="d-flex flex-row justify-content-between info">
                                        <li>
                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$superService->likes->count()}} Likes
                                        </li>
                                        <li>
                                            <a class="pull-right" href="{{route('serviceDetail', $superService->slug)}}">
                                                <i class="fa fa-map-marker text-warning"></i> {{$superService->state}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
@endif
            </div>
        @endif
    </div>

    <div id="" class="search-section search-area-2">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="{{route('allSellers')}}" class="btn font-weight-bold btn-outline-warning">See all Featured Sellers</a>
                </div>
            </div>
        </div>
    </div>
</div>

