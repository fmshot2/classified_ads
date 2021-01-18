


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

    @include('frontend_section/search')




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



                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="row">
                        @forelse($category_services as $category_service)


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
                                        <img class="d-block w-100" src="{{asset('images')}}/{{$category_service->image[0]}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="d-flex justify-content-between"><a class="title "  href="{{route('serviceDetail', $category_service->slug)}}"  style="font-size: 14px;">{{$category_service->name}}</a>
                                        <a class="pull-right" href="{{route('serviceDetail', $category_service->slug)}}" style="font-size: 13px;">
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
                            @empty
                            <h6 class="text-muted text-center">There are no services yet within this category</h6>

                            @endforelse
                        </div>
                    </div>








                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar-left">
                            <!-- Advanced search start -->
                        {{--    <div class="sidebar widget advanced-search none-992">
                        <h3 class="sidebar-title">Advanced Search</h3>

                        <form action="{{route('searchonservices')}}" method="POST">
                                {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                    </div>
                                </div>
                                </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12" style="">
                              <div class="form-group">
                                <select class="form-control" id="categories" name="category">
                                    <option value="">-- Select Category --</option>
                                          @if(isset($all_categories))
                                    @foreach($all_categories as $all_category)
                                    <option value="{{ $all_category->id }}"> {{ $all_category->name }}  </option> 
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                  
                                 </div>
                             </div>
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                              <div class="form-group subject">
                                <select class="form-control" id="state" name="state">
                                <option value="">-- Select State--</option>                                
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
                        <div class="col-lg-12">

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
                        </form>
                    </div>  --}}          
                    <!-- Popular posts start -->
                    <div class="widget popular-posts">
                        <h3 class="sidebar-title">Featured Services</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        @forelse($featuredServices as $featuredService)
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('images')}}/{{$featuredService->image[0]}}">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/emeka-auto-mechanic">{{$featuredService->user->name}}, {{$featuredService->name}}, {{$featuredService->city}}</a>
                                </h3>
                            </div>
                        </div>
                        @empty
                        <p>There are no featured services yet!</p>
                        @endforelse
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
</div>
</div>
</div>

</div>


@endsection