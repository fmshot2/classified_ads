
@extends('layouts.app')

@section('title')
Home | 
@endsection

@section('content')

<div class="main">

    <div class="sub-banner">
        <div class="container">
            <div class="page-name">
                <h1>Search Result</h1>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><span>/</span>Search Result</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Properties section body start -->
    <div class="properties-section content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Advanced search start -->
                        <div class="sidebar widget advanced-search none-992">
                            <h3 class="sidebar-title">Search For A Service</h3>

                            <form action="{{route('search3')}}" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p style="font-weight: 600; margin-bottom: 0;">Choose Distance(in km): <span id="demo"></span></p>
                        <div class="slidecontainer" style="margin-bottom: 15px;">
                            {{-- <input type="range" min="1" max="100" value="50" class="slider form-control" id="myRange2"> --}}
                            <input type="range" min="1" max="1000000" name="ranges"  value="5000" class="slider" id="myRange">
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
                                        <option class="text-center" value="">--Choose a state--</option>                                
                                        @if(isset($all_states))

                                        @foreach($all_states as $state)

                                        <option value="{{$state->id}}"> {{ $state->name }}  </option> 
                                        @endforeach
                                        @endif                         

                                    </select>
                                </div>
                            </div>
                           
                           


                            <div class="col-lg-12 col-md-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-outline-warning btn-block bg-warning text-white">Search  <i class="fa fa-search" aria-hidden="true"></i></button>
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
                                {{--                         <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->image[0]}}">

                                --}}        
                                <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="#">{{$featuredService->user->name}}, {{$featuredService->name}}, {{$featuredService->city}}</a>
                                </h3>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <!-- Posts by category start -->
                    {{-- <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Cities</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                          @if(isset($featuredServices))
                          @foreach($featuredServices as $featuredService)
                          <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                          @endforeach
                          @endif

                      </ul>
                  </div> --}}


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
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <!-- Property box 2 start -->
        <div class="col-md-12">
            <div class="row">

               @if(isset($services1))
               @foreach($services1 as $service1)

               <div class="col-sm-3 card service-box 1">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service1->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service1->user->name}}, &nbsp; {{$service1->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service1->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
            @endif
            @if(isset($services2))
            @foreach($services2 as $service2)       
            <div class="col-sm-3 card service-box 2">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service2->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service2->user->name}}, &nbsp; {{$service2->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service2->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
            @endif
        

            @if(isset($services3))
            @foreach($services3 as $service3)       
            <div class="col-sm-3 card service-box 3">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service3->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service3->user->name}}, &nbsp; {{$service3->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service3->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach 
                        @endif
            @if(isset($services4))
            @foreach($services4 as $service4)              
            <div class="col-sm-3 card service-box 4">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service4->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service4->user->name}}, &nbsp; {{$service4->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">

                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service4->city}}</span>
                    </div>

                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>  
            @endforeach  
                        @endif

                              @if(isset($services5))
            @foreach($services5 as $service5)       
            <div class="col-sm-3 card service-box 5">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$service2->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$service5->user->name}}, &nbsp; {{$service5->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">
                            
                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$service5->city}}</span>
                    </div>
                    
                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
                        @endif
        
        </div>


@if(!$services1 and !$services2 and !$services3 and !$services4 and !$services5)
        <div class="info">
            <h4>Ooops, The Item Could Not Be Found!</h4>
            <p>The item you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <div class="hr"></div>
            <p>Please try searching again with a diffenrent keyword this time.</p>
        </div>
        @endif
    </div>
    <!-- Page navigation start -->
    <div class="pagination-box hidden-mb-45 text-center">
        <nav aria-label="Page navigation example">
          {{--{{ $all_message->links() }}  --}} 
      </nav>
  </div>
</div>

</div>
</div>
</div>
</div>

@endsection













