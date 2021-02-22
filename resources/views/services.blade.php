@extends('layouts.app')

@section('title', $one_category->name . ' | ')

@section('content')
    <div class="main">
        <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/categorybg.jpg')}})">
            <div class="container">
                <div class="page-name">
                    <div class="sub-banner-text-content">
                        <h1>{{$one_category->name}} Services</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><span>/</span>{{$one_category->name}} Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend_section/search')

        {{-- <div class="pull-right">
            <h3>
                <span class="text-right">
                    <div class="posts-by-category widget">
                        <!--<h3 class="sidebar-title">Cities</h3>-->
                        <ul class="list-unstyled list-cat">
                            <a href="{{route('home')}}" class="btn btn-outline-warning"><i class="fa fa-home">Back To Home</i></a>
                        </ul>
                    </div>
                </span>
            </h3>
        </div> --}}

        <!-- Properties Details page start -->
        <div class="properties-details-page content-area-7 job-ap-services-page" style="margin-top: -20px">
            <div class="container">
                <div class="row job-ap-services-page-row">
                    <div class="col-lg-8 col-md-12 col-xs-12 jobApSerDesktop">
                        <div class="row">
                            @forelse($category_services as $category_service)
                                @if ($loop->index < 30 && $category_service->badge_type == 1)
                                    <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Super' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                   <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($loop->index < 30 && $category_service->badge_type == 2)
                                    <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Moderate' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($loop->index < 30 && $category_service->badge_type == 3)
                                    <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Basic' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>

                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                <a  href="{{route('serviceDetail', $category_service->slug)}}"> <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>

                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <h6 class="text-muted text-center">There are no services yet within this category</h6>
                            @endforelse
                        </div>
                    </div>


                    <div class="col-md-12 jobApSerMobile">
                        <div class="row mobile-row">
                            @forelse($category_services as $category_service)
                                @if ($loop->index < 30 && $category_service->badge_type == 1)
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> {{$category_service->is_featured == 1 ? ' Super' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($loop->index < 30 && $category_service->badge_type == 2)
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i>{{$category_service->is_featured == 1 ? ' Moderate' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($loop->index < 30 && $category_service->badge_type == 3)
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i>{{$category_service->is_featured == 1 ? ' Basic' : ''}}</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-6" data-category="3, 2, 1" style="">
                                        <div class="property-box">
                                            <div class="property-thumbnail">
                                                <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($category_service->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100" src="{{asset('uploads/services')}}/{{$category_service->service_image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                </a>
                                            </div>
                                            <div class="detail">
                                                <div>
                                                    <a class="title" href="{{route('serviceDetail', $category_service->slug)}}">{{ Str::limit($category_service->name, 50) }}</a>
                                                </div>

                                                <ul class="d-flex flex-row justify-content-between info">
                                                    <li>
                                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$category_service->likes->count()}} Likes
                                                    </li>
                                                    <li>
                                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}">
                                                            <i class="fa fa-map-marker text-warning"></i> {{$category_service->state}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                            @empty
                                <h6 class="text-muted text-center">There are no services yet within this category</h6>
                            @endforelse
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar-right">

                            <!-- Popular posts start -->
                            <div class="widget popular-posts">
                                <h3 class="sidebar-title">Featured Services</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                @if(isset($featuredServices))
                                    @foreach($featuredServices as $key => $featuredService)
                                        <div class="media">
                                            <div class="media-left">
                                              <a  href="{{route('serviceDetail', $featuredService->slug)}}">   <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                                                </a>
                                            </div>
                                            <div class="media-body align-self-center all-ser-pg-sidebar-feat-ser">
                                                <h3 class="media-heading">
                                                    <a  href="{{route('serviceDetail', $featuredService->slug)}}">
                                                        <strong style="text-transform: capitalize">{{ $featuredService->name }}</strong>
                                                        <br>
                                                        <span style="text-transform: capitalize">{{ $featuredService->user->name }}</span>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- Sub Categories -->
                            <div class="widget popular-posts">
                                <h3 class="sidebar-title">Related Categories</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                @if(isset($sub_categories))
                                    @foreach($sub_categories as $key => $all_sub_category)
                                        <div class="media">
                                            <div class="media-body align-self-center all-ser-pg-sidebar-feat-ser">
                                                <h3 class="media-heading">
                                                    <a href="" class="sub_cat_link">
                                                        <strong style="text-transform: capitalize"><i class="fa fa-long-arrow-right" style="color: #FFC107"></i>  {{ $all_sub_category->name }}</strong>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="popular-posts featured-ad-hm-list">
                                <div class="container">
                                    <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'do_smart_business.png'}}" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block mx-auto img-fluid" src="{{asset('images')}}/{{'efskyviewSidebarSlider.png'}}" alt="Second slide">
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
                            </div>

                            <!-- Helping Center start -->
                            <div class="widget helping-center">
                                <h3 class="sidebar-title">Helping Center</h3>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <ul class="contact-link">
                                    <li>
                                        <i class="flaticon-technology-1"></i>
                                        <a href="tel:+0700-6258244">
                                            0700-625-8244
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-technology-1"></i>
                                        <a href="tel:+0807-9000286">
                                            0807-900-0286
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://wa.me/{{ $check_general_info == 0 ? $general_info->hot_line : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank">
                                            <i class="fa fa-whatsapp"></i> {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-envelope"></i>
                                        <a href="mailto:info@efcontact.com">
                                            info@efcontact.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<script type="text/javascript">
    $('#categories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
         $.ajax({
            type:"GET",
                //url:"{{url('qqq')}}"+stateID,
                url: '/api/get-category-list/'+categoryID,
                    success:function(res){
                    if(res){
                        console.log(res);
                        console.log(categoryID);
                        $("#sub_category ").empty();
                        $.each(res,function(key,value){
                            $("#sub_category").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }else{
                        $("#sub_category").empty();
                    }
                }
            });
        }else{
         $("#sub_category").empty();
        }
    });
</script>

<script type="text/javascript">

    $('#state').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
         $.ajax({
          type:"GET",
            //url:"{{url('qqq')}}"+stateID,
            url: '/api/get-city-list/'+state_name,
            success:function(res){
             if(res){
                console.log(res);
                console.log(state_name);
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
              $("#city").empty();
            }
        }
    });
        }else{
            $("#city").empty();
        }

    });

</script>

<style>
    .sub_cat_link{
        display: block;
    }
    .sub_cat_link:hover{
        margin-left: 10px;
    }
</style>
@endsection
