<div class="blog content-area bg-grea-3 hm-feat-ser-mid-sec">


  <div class="container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1> Nearest Services </h1>
        </div>
        {{-- {{dd('ddd')}} --}}



        @if (session('nearestServices'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{-- {{ session('success') }} --}}
    <p>there</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>true
  </button>
</div>
@endif
        @if(isset($nearestServices))
<p>its there</p>

        {{dd($nearestServices)}}
            <div class="row">

                @foreach($nearestServices as $nearestService)
                    <a href="" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i> {{$nearestService->is_featured == 1 ? 'Trusted' : ''}}</span>
                                    </div>

                                    <div class="price-ratings-box">
                                        <p class="price">
                                        {{ Str::limit($nearestService->experience, 5) }} Yrs Experience
                                        </p>
                                    </div>
                                    <div class="listing-time opening">{{ Str::limit($nearestService->user->name, 10) }}</div>
                                       <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$nearestService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="{{ $nearestService->name }}">
                                 {{--    <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties"> --}}

                                </div>
                                <div class="detail">
                                    <div>
                                        <a class="title" href="{{route('serviceDetail', $nearestService->slug)}}">{{ Str::limit($nearestService->name, 50) }}</a>
                                    </div>

                                    <ul class="d-flex flex-row justify-content-between info">
                                        <li>
                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$nearestService->likes->count()}} Likes
                                        </li>
                                        <li>
                                            <a class="pull-right" href="{{route('serviceDetail', $nearestService->slug)}}">
                                                <i class="fa fa-map-marker text-warning"></i> {{$nearestService->state}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
        }
        }
{{-- @if(isset($superServices))
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
@endif --}}
            </div>
        @endif
    </div>

   {{--  <div id="" class="search-section search-area-2">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="{{route('allSellers')}}" class="btn font-weight-bold btn-outline-warning">See all Featured Sellers</a>
                </div>
            </div>
        </div>
    </div> --}}
</div>

