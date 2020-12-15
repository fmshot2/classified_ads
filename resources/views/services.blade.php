


@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')


<div class="main">
        
<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Properties </h1>
            <ul>
                <li><a href="https://efcontact.com">Home</a></li>
                <li><span>/</span>Properties</li>
            </ul>
        </div>
    </div>
</div>
<!-- Properties Details page start -->
<div class="properties-details-page content-area-7">
    <div class="container">
        <div class="row">


   <div class="container">
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
        </div>



            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="http://localhost:8000/serviceDetail/2" class="property-img">
                            <div class="listing-badges">
                                <span class="featured bg-warning">featured</span>
                            </div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    4 Yrs Experience
                                </p>
                                </div>
                                <div class="listing-time opening">femi</div>
                                <img class="d-block w-100" src="http://localhost:8000/images/1607874476.jpeg" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <span class="d-flex justify-content-around"><a class="title " href="properties-details.html">Music</a>
                                <a class="pull-right" href="properties-details.html">
                                    <i class="fa fa-map-marker text-warning"></i> Lagos
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
            </div>
          <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="sidebar widget advanced-search">
                        <h3 class="sidebar-title text-center"> Advanced Search</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <form action="https://efcontact.com/search" method="GET">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Keyword" autocomplete="on">
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City e.g Ikeja" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="category" tabindex="-98">
                                        <option value="" disabled="" selected="">Category</option>
                                                                                <option value="Agriculture and food">Agriculture and food</option>
                                                                                <option value="Animals and pets">Animals and pets</option>
                                                                                <option value="Babies and kids">Babies and kids</option>
                                                                                <option value="Business">Business</option>
                                                                                <option value="Commercial equipment and tools">Commercial equipment and tools</option>
                                                                                <option value="Electronics">Electronics</option>
                                                                                <option value="Electronics">Electronics</option>
                                                                                <option value="Fashion">Fashion</option>
                                                                                <option value="Handy work">Handy work</option>
                                                                                <option value="Health and beauty">Health and beauty</option>
                                                                                <option value="Jobs">Jobs</option>
                                                                                <option value="Medical">Medical</option>
                                                                                <option value="Property">Property</option>
                                                                                <option value="Repair and construction">Repair and construction</option>
                                                                                <option value="Seeking work-cv">Seeking work-cv</option>
                                                                                <option value="Services">Services</option>
                                                                                <option value="Sport, art and outdoors">Sport, art and outdoors</option>
                                                                                <option value="Vehicles">Vehicles</option>
                                                                            </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" title="Category"><div class="filter-option"><div class="filter-option-inner">Category</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
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
                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Show More Options
                            </a>
                            <div class="form-group mb-0">
                                <button class="search-button">Search <i class="fa fa-search" aria-hidden="true"></i></button>
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
                                                        <a href="{{route('search_by_city', $featuredService->city)}}" class="change-view-btn"><i class="fa fa-home">{{$featuredService->city}}</i></a>
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