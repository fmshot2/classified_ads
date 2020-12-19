
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
                <ul class="list-unstyled list-cat">
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
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <!-- Property box 2 start -->
                                <div class="col-md-12">
                                    <div class="row">

     @if(isset($userSer))
    @foreach($userSer as $userSer1)

    <div class="col-sm-3 card service-box">
                        <img class="card-img-top" src="{{asset('images')}}/{{$userSer1->image}}" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4><a href="#" style="font-size: 15px;">{{$userSer1->user->name}}, &nbsp; {{$userSer1->name}}</a></h4>
                            </div>
                             <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        
                                    </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$userSer1->city}}</span>
                                </div>
                         
                            <!--<a href="#" class="read-more">More...</a>-->
                        </div>
                    </div>
                    @endforeach
</div>
@else



                    <div class="info">
                        <h4>Ooops, The Item Could Not Be Found!</h4>
                        <p>The item you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                        <div class="hr"></div>
                        <p>Please try searching again with a diffenrent keyword this time.</p>
                    </div>
                </div>
                         @endif
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













