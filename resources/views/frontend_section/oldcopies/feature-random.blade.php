<div class="blog content-area bg-grea-3 hm-feat-ser-mid-sec">
    <div class="container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1> Featured Services </h1>
        </div>
        @if(isset($featuredServices))
            <div class="row">
                @foreach($featuredServices as $featuredService)
                    @if ($featuredService->badge_type == 'super')
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$featuredService->is_featured == 1 ? 'Super' : ''}}</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 20) }}
                                            </p>
                                        </div>
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
                    @elseif($featuredService->badge_type == 'moderate')
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$featuredService->is_featured == 1 ? ' Moderate' : ''}}</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 20) }}
                                            </p>
                                        </div>
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
                    @elseif($featuredService->badge_type == 'basic')
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-primary"><i class="fa fa-star"></i> {{$featuredService->is_featured == 1 ? ' Basic' : ''}}</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 20) }}
                                            </p>
                                        </div>
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
                    @else
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 20) }}
                                            </p>
                                        </div>
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
                    @endif
                @endforeach

            </div>
        @endif
    </div>

    <div id="" class="search-section search-area-2">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="{{route('allSellers')}}" class="btn font-weight-bold btn-outline-warning">See all Featured Providers</a>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($superServices as $superService)
                    <a href="{{route('serviceDetail', $superService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$superService->is_featured == 1 ? 'Super' : ''}}</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price" style="text-transform: capitalize">
                                            {{ Str::limit($superService->user->name, 20) }}
                                        </p>
                                    </div>
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


                {{-- MODERATE SERVICES  --}}
                @foreach($moderateServices as $moderateService)
                    <a href="{{route('serviceDetail', $moderateService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$moderateService->is_featured == 1 ? 'Super' : ''}}</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price" style="text-transform: capitalize">
                                            {{ Str::limit($moderateService->user->name, 20) }}
                                        </p>
                                    </div>
                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$moderateService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                {{--    <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties"> --}}

                                </div>
                                <div class="detail">
                                    <div>
                                        <a class="title" href="{{route('serviceDetail', $moderateService->slug)}}">{{ Str::limit($moderateService->name, 50) }}</a>
                                    </div>

                                    <ul class="d-flex flex-row justify-content-between info">
                                        <li>
                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$moderateService->likes->count()}} Likes
                                        </li>
                                        <li>
                                            <a class="pull-right" href="{{route('serviceDetail', $moderateService->slug)}}">
                                                <i class="fa fa-map-marker text-warning"></i> {{$moderateService->state}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach



                {{-- MODERATE SERVICES  --}}
                @foreach($moderateServices as $moderateService)
                    <a href="{{route('serviceDetail', $moderateService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$moderateService->is_featured == 1 ? 'Super' : ''}}</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price" style="text-transform: capitalize">
                                            {{ Str::limit($moderateService->user->name, 20) }}
                                        </p>
                                    </div>
                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$moderateService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                {{--    <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties"> --}}

                                </div>
                                <div class="detail">
                                    <div>
                                        <a class="title" href="{{route('serviceDetail', $moderateService->slug)}}">{{ Str::limit($moderateService->name, 50) }}</a>
                                    </div>

                                    <ul class="d-flex flex-row justify-content-between info">
                                        <li>
                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$moderateService->likes->count()}} Likes
                                        </li>
                                        <li>
                                            <a class="pull-right" href="{{route('serviceDetail', $moderateService->slug)}}">
                                                <i class="fa fa-map-marker text-warning"></i> {{$moderateService->state}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                {{-- BASIC SERVICES  --}}
                @foreach($basicServices as $basicService)
                    <a href="{{route('serviceDetail', $basicService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$basicService->is_featured == 1 ? 'Super' : ''}}</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price" style="text-transform: capitalize">
                                            {{ Str::limit($basicService->user->name, 20) }}
                                        </p>
                                    </div>
                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$basicService->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                {{--    <img class="d-block w-100" src="{{asset('images')}}/{{$featuredService->image[0] ?? ''}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties"> --}}

                                </div>
                                <div class="detail">
                                    <div>
                                        <a class="title" href="{{route('serviceDetail', $basicService->slug)}}">{{ Str::limit($basicService->name, 50) }}</a>
                                    </div>

                                    <ul class="d-flex flex-row justify-content-between info">
                                        <li>
                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$basicService->likes->count()}} Likes
                                        </li>
                                        <li>
                                            <a class="pull-right" href="{{route('serviceDetail', $basicService->slug)}}">
                                                <i class="fa fa-map-marker text-warning"></i> {{$basicService->state}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                {{-- BASIC SERVICES  --}}
                @foreach($featuredServices as $featuredService)
                    <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                        <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <div class="listing-badges">
                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$featuredService->is_featured == 1 ? 'Super' : ''}}</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price" style="text-transform: capitalize">
                                            {{ Str::limit($featuredService->user->name, 20) }}
                                        </p>
                                    </div>
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
