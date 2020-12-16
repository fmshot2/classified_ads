


@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')


<div class="main">
        
<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Search By City </h1>
            <ul>
                <li><a href="https://efcontact.com">Home</a></li>
                <li><span>/</span>Search By City</li>
            </ul>
        </div>
    </div>
</div>


  <!-- <div class="container">
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

<!--<div class="row property-section">

            <div class="col-lg-8 col-md-12 col-xs-12">
            	   @if(isset($services_in_city))
                        @foreach($services_in_city as $service_in_city)
                <div class="col-lg-3 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="http://localhost:8000/serviceDetail/2" class="property-img">
                            <div class="listing-badges">
                                <span class="featured bg-warning">featured</span>
                            </div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    {{$service_in_city->experience}} Yrs Experience
                                </p>
                                </div>
                                <div class="listing-time opening">{{$service_in_city->user->name}},</div>
                                <img class="d-block w-100" src="{{asset('images')}}/{{$service_in_city->image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <span class="d-flex justify-content-around"><a class="title " href="properties-details.html">{{$service_in_city->name}}</a>
                                <a class="pull-right" href="properties-details.html">
                                    <i class="fa fa-map-marker text-warning"></i> {{$service_in_city->city}}, {{$service_in_city->name}}
                                </a></span>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; 5 likes
                                    </li>
                                    <li class="" style="float: right;">
                                        <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="http://localhost:8000/serviceDetail/2">Verified</a>
                                        </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

</div>-->
<div class="container">

<div class="row property-section mt-5">

 <div class="col-lg-8 col-md-12 col-xs-12">
<div class="row">



		<div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon bg-warning">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="title-name">List of Services Available</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad">
                        <!-- Posts by category start -->
                      
                        <ul class="list-unstyled list-cat">
                              @if(isset($featuredServices))
                        @foreach($featuredServices as $featuredService)
                                                        <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                                                            @endforeach
                        @endif
                                                      
                                                    </ul>
                    </div>
                </div>
                @foreach($services_in_city as $service_in_city)
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="https://efcontact.com/services/milean-ventures" class="property-img">
                                                                        <div class="price-ratings-box">
                                        <p class="price">
                                            ₦4,000,000
                                        </p>
                                     
                                    </div>
                                    <img class="d-block w-100" src="{{asset('images')}}/{{$service_in_city->image}}" alt="properties img">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="https://efcontact.com/services/milean-ventures">{{$service_in_city->name}}</a>
                                </h1>
                                                                login to contact  <strong>{{$service_in_city->name}}</strong>
                            </div>
                            <div class="footer clearfix">
                                
                                <div class="pull-right">
                                    <a><i class="flaticon-time"></i> Jul 15, 2020</a>
                                </div>
                                <div class="pull-center">
                                    <a><i class="fa fa-comments"></i> 0</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                                    </div>


</div>














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
                        <div class="col-lg-6">

                            <div class="form-group">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" name="featured">
                                        <span class="lever"></span>  
                                        Featured
                                    </label>
                                </div>
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
                        @if(isset($services_in_city))
                        @foreach($services_in_city as $service_in_city)
                                                <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('images')}}/{{$service_in_city->image}}">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/emeka-auto-mechanic">{{$service_in_city->user->name}}, {{$service_in_city->name}}, {{$service_in_city->city}}</a>
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
                        <ul class="list-unstyled list-cat">
                              @if(isset($featuredServices))
                        @foreach($featuredServices as $featuredService)
                                                        <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning text-gray-dark"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                                                            @endforeach
                        @endif
                                                      
                                                    </ul>
                    </div>

                                 
                    <div class="widget helping-center">
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                                                <div class="media">
                            <div class="media-left">
                                                                <img src="/storage/advert/fresh-toothpaste-advertisement-realistic-style_52683-16161.jpg" alt="advert" class="img-fluid">
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