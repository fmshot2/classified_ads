<div class="blog content-area bg-grea-3 hm-feat-ser-mid-sec">
    <div class="service-detail-container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1> Featured Services </h1>
        </div>



        @if(isset($featuredServices))
            <div class="row row-flex">
                @foreach($featuredServices as $featuredService)
                    @if ($loop->index < 30 && $featuredService->badge_type == 1)
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$featuredService->is_featured == 1 ? ' Super' : ''}}</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize;">
                                                {{ Str::limit($featuredService->user->name, 10) }}
                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}" alt="{{ $featuredService->name }}">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 18) }}</a>
                                            <a class="title title-mb" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 10) }}</a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$featuredService->likes->count()}} Likes
                                            </li>
                                            <li>
                                                <a class="pull-right" href="{{route('serviceDetail', $featuredService->slug)}}">
                                                    <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($featuredService->state, 5) }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @elseif ($loop->index < 30 && $featuredService->badge_type == 2)
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i>{{$featuredService->is_featured == 1 ? ' Moderate' : ''}}</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 10) }}
                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}" alt="{{ $featuredService->name }}">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 18) }}</a>
                                            <a class="title title-mb" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 10) }}</a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$featuredService->likes->count()}} Likes
                                            </li>
                                            <li>
                                                <a class="pull-right" href="{{route('serviceDetail', $featuredService->slug)}}">
                                                    <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($featuredService->state, 5) }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @elseif ($loop->index < 30 && $featuredService->badge_type == 3)
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="listing-badges">
                                            <span class="featured bg-primary"><i class="fa fa-star"></i>{{$featuredService->is_featured == 1 ? ' Basic' : ''}}</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 10) }}
                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}" alt="{{ $featuredService->name }}">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 18) }}</a>
                                            <a class="title title-mb" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 10) }}</a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$featuredService->likes->count()}} Likes
                                            </li>
                                            <li>
                                                <a class="pull-right" href="{{route('serviceDetail', $featuredService->slug)}}">
                                                    <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($featuredService->state, 5) }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{route('serviceDetail', $featuredService->slug)}}" class="property-img">
                            <div class="col-lg-2 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <div class="price-ratings-box">
                                            <p class="price" style="text-transform: capitalize">
                                                {{ Str::limit($featuredService->user->name, 10) }}
                                            </p>
                                        </div>
                                        <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}" alt="{{ $featuredService->name }}">

                                    </div>
                                    <div class="detail">
                                        <div>
                                            <a class="title title-dk" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 18) }}</a>
                                            <a class="title title-mb" href="{{route('serviceDetail', $featuredService->slug)}}">{{ Str::limit($featuredService->name, 10) }}</a>
                                        </div>

                                        <ul class="d-flex flex-row justify-content-between info">
                                            <li>
                                                <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$featuredService->likes->count()}} Likes
                                            </li>
                                            <li>
                                                <a class="pull-right" href="{{route('serviceDetail', $featuredService->slug)}}">
                                                    <i class="fa fa-map-marker text-warning"></i> {{ Str::limit($featuredService->state, 5) }}
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
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{route('allSellers')}}" class="btn font-weight-bold btn-outline-warning">See all Featured Services</a>
            </div>
        </div>
    </div>
</div>

