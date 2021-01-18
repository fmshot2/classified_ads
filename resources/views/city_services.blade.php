


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
                <li><a href="{{route('home')}}">Home</a></li>
                <li><span>/</span>Search By City</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
 <div class="">
        <h3><span class="text-right">
            <div class="posts-by-category widget">
                <!--<h3 class="sidebar-title">Cities</h3>-->                       
                <ul class="list-unstyled list-cat">

                   
                  <a href="{{route('home')}}" class="btn btn-outline-warning"><i class="fa fa-home">Back To Home</i></a>
                  
              </ul>
          </div></span></h3>
          
      </div>
      </div>


<div class="container">


<div class="row property-section mt-5">

 <div class="col-lg-8 col-md-12 col-xs-12">
<div class="row">



		<div class="option-bar">
                    <div class="float-left">
                    <h4 href="{{route('home')}}">
                        <span class="heading-icon bg-warning">
                            <i class="fa fa-th-large"></i>
                        </span>
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
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a class="property-img">
                                                                        <div class="price-ratings-box">
                                        <p class="price">
                                            {{ $service_in_city->is_verified == 1 ? 'verified' : 'Not yet verified' }}

                                        </p>
                                     
                                    </div>
                                    <img class="d-block w-100" src="{{asset('images')}}/{{$service_in_city->image[0]}}" alt="properties img">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title text-primary" >{{$service_in_city->user->name}}
                                </h1>
                                 <p><strong class="text-primary">{{Str::limit($service_in_city->name, 40)}}</strong></p>
                                <a href="{{route('login')}}">  Login to contact  <strong class="text-primary"> {{Str::limit($service_in_city->user->name, 5)}}</strong></a>                     
                            </div>
                            <div class="footer clearfix">
                                
                                <div class="pull-right">
                                    <a><i class="flaticon-time"></i>{{$service_in_city->experience}} yrs experience</a>
                                </div>
                                <div class="pull-center">
                                    <a><i class="fa fa-thumbs-up"></i> {{$service_in_city->likes->count()}}</a>
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
                                    <option value="">-- Please select category --</option>                                
                                    @if(isset($all_categories))

                                    @foreach($all_categories as $all_category)

                                    <option value="{{$all_category->id}}"> {{ $all_category->name }}  </option> 
                                    @endforeach
                                    @endif                         

                                </select>


                            </div>
                        </div>
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                              <div class="form-group subject">
                                <select class="form-control" id="state" name="state">
                                    <option value="">-- Please select state --</option>                                
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
                                <img class="media-object" src="{{asset('images')}}/{{$service_in_city->image[0]}}">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/emeka-auto-mechanic">{{$service_in_city->user->name}} | {{Str::limit($service_in_city->name, 10)}}</a>
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
                                <a href="mailto:support@efcontact.com">
                                    support@efcontact.com
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