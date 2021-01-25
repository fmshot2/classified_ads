@extends('layouts.app')

@section('title', $one_category->name . ' | ')

@section('content')
    <div class="main">
        <div class="sub-banner">
            <div class="container">
                <div class="page-name">
                    <h1>{{$one_category->name}} Services</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><span>/</span>{{$one_category->name}} Services</li>
                    </ul>
                </div>
            </div>
        </div>
        @include('frontend_section/search')

        <div class="pull-right">
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
        </div>

        <!-- Properties Details page start -->
        <div class="properties-details-page content-area-7 job-ap-services-page" style="margin-top: 20px">
            <div class="container">
                <div class="row job-ap-services-page-row">
                    <div class="col-lg-8 col-md-12 col-xs-12 jobApSerDesktop">
                        <div class="row">
                            @forelse($category_services as $category_service)
                                <div class="col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="3, 2, 1">
                                    <div class="property-box">
                                        <div class="property-thumbnail">
                                            <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                <div class="listing-badges">
                                                    <span class="featured bg-warning">featured</span>
                                                </div>
                                                <div class="price-ratings-box">
                                                    <p class="price">
                                                        {{$category_service->experience}} Yrs Experience
                                                    </p>
                                                </div>
                                                <div class="listing-time opening">Femi</div>
                                               <a  href="{{route('serviceDetail', $featuredService->slug)}}"> <img class="d-block w-100" src="{{asset('images')}}/{{$category_service->image[0]}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                                <div class="listing-time opening">femi</div>
                                                <img class="d-block w-100" src="{{asset('images')}}/{{$category_service->image[0]}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
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
                            @empty
                                <h6 class="text-muted text-center">There are no services yet within this category</h6>
                            @endforelse
                        </div>
                    </div>


                    <div class="col-md-12 jobApSerMobile">
                        <div class="row mobile-row">
                            @forelse($category_services as $category_service)
                                <div class="col-sm-6" data-category="3, 2, 1" style="">
                                    <div class="property-box">
                                        <div class="property-thumbnail">
                                            <a href="{{route('serviceDetail', $category_service->slug)}}" class="property-img">
                                                <div class="listing-badges">
                                                    <span class="featured bg-warning">featured</span>
                                                </div>
                                                <div class="price-ratings-box">
                                                    <p class="price">
                                                        {{$category_service->experience}} Yrs Experience
                                                    </p>
                                                </div>
                                                <div class="listing-time opening">femi</div>
                                                <img class="d-block w-100" src="{{asset('images')}}/{{$category_service->image[0]}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
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
                                              <a  href="{{route('serviceDetail', $featuredService->slug)}}">   <img class="media-object" src="{{asset('images')}}/{{$featuredService->image[0]}}">
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
                            <div class="widget helping-center">
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <div class="media">
                                    <div class="">
                                        <img style="width: 100%; height: auto; margin: 0 auto; border-radius: 10px" src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid">
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
                                        0700-6258244
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:+0807-9000286">
                                        0807-9000286
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:+080567654345">
                                        080567654345
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
@endsection
