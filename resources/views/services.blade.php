


@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')


<div class="main">
        
<div class="sub-banner">
    <div class="container">
        <div class="page-name">

            <h1>{{$one_category->name}} services</h1>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><span>/</span>{{$one_category->name}} services</li>
            </ul>
        </div>
    </div>
</div>



  <div class="pull-right">
                                    <h3><span class="text-right">
                                        <div class="posts-by-category widget">
                                            <!--<h3 class="sidebar-title">Cities</h3>-->                       
                                            <ul class="list-unstyled list-cat">

                                         
                                              <a href="{{route('home')}}" class="btn btn-outline-warning"><i class="fa fa-home">Back To Home</i></a>
                                            
                                          </ul>
                                      </div></span></h3>
                                  
                                  </div>
<!-- Properties Details page start -->
<div class="properties-details-page content-area-7">
    <div class="container">
        <div class="row">


   <!--<div class="container">
            @if(isset($closerServices))
            <p> The Search results for your query <b> query</b> are :</p>
            <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($closerServices as $closerService)
                    <tr>
                        <td>{{$closerService->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>-->

                @if(isset($category_services))

            <div class="col-lg-8 col-md-12 col-xs-12">
<div class="row">
    @foreach($category_services as $category_service)


                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
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
                                <img class="d-block w-100" src="{{asset('images')}}/{{$category_service->image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                     <div class="detail">
                            <div class="d-flex justify-content-between"><a class="title " href="{{route('serviceDetail', $category_service->id)}}"  style="font-size: 14px;">{{$category_service->name}}</a>
                                <a class="pull-right" href="{{route('serviceDetail', $category_service->id)}}" style="font-size: 13px;">
                                    <i class="fa fa-map-marker text-warning"></i> {{$category_service->city}}, {{$category_service->state}}                                   
                                </a></div>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i>                                    {{$category_service->likes->count()}} likes
                                    </li>                               
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach 

            </div>
            </div>
                        @endif

           
          <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                   <div class="sidebar widget advanced-search none-992">
                        <h3 class="sidebar-title">Advanced Search</h3>

                        <form action="{{route('search3')}}" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                    </div>
                                </div>
                                
                               <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="state" class="form-control" placeholder="Enter Your State">
                                    </div>
                                </div>-->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                       <!--  <input type="text" name="serviceDetail_id" value= class="form-control"> -->
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                                  <div class="form-group subject">
                                    <select class="form-control" id="state" name="state">                                
                                        @if(isset($all_states))

                                        @foreach($all_states as $state)

                                        <option value="{{$state->id}}"> {{ $state->name }}  </option> 
                                        @endforeach
                                        @endif                         

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="number" name="minprice" id="minprice" class="form-control" placeholder="Min Price" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="number" name="maxprice" id="maxprice" class="form-control" placeholder="Max Price" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" name="featured">
                                        <span class="lever"></span>  
                                        Featured
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-outline-warning btn-block bg-warning text-white">Search  <i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <!-- Popular posts start -->
                    <div class="widget popular-posts">
                        <h3 class="sidebar-title">Featured Services</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        @if(isset($featuredServices))
                        @foreach($featuredServices as $featuredService)
                                                <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('images')}}/{{$featuredService->image}}">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/emeka-auto-mechanic">{{$featuredService->user->name}}, {{$featuredService->name}}, {{$featuredService->city}}</a>
                                </h3>
                                                            </div>
                        </div>
                        @endforeach
                        @endif
                                            </div>
                    <!-- Posts by category start -->
                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Cities</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat mt-5">
                              @if(isset($featuredServices))
                        @foreach($featuredServices as $featuredService)
                                                        <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                                                            @endforeach
                        @endif
                                                      
                                                    </ul>
                    </div>

                                 
                      <div class="widget helping-center">
                <div class="s-border"></div>
                <div class="m-border"></div>
                <div class="media">
                    <div class="media-left">
                      <img src="{{asset('images')}}/{{'MTN-apptitude.jpg'}}" alt="advert" class="img-fluid">
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
                    <!-- Latest reviews start -->
                    <div class="widget latest-reviews">
                        <h3 class="sidebar-title">Reviews</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>


@endsection