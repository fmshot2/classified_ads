


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
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Option bar start -->
                <div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="title-name">List of Services Available</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad">
                        <div class="sorting-options"><li>
                                                        <i class="fa fa-map-compass" aria-hidden="true"></i><span> &nbsp; </span>                                   </li>
                                                    </div>
                    </div>
                </div>
                <!-- Property section start -->

                        @if(isset($categories))

                <div class="row property-section">
                           
                            @foreach($categories as $category)

            <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="{{route('serviceDetail', $category->id)}}" class="property-img">
                            <div class="listing-badges">
                                <span class="featured bg-warning">featured</span>
                            </div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    {{$category->experience}} Yrs Experience
                                </p>
                                </div>
                                <div class="listing-time opening">{{$category->user->name}}</div>
                                <img class="d-block w-100" src="{{asset('images')}}/{{$category->image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <span class="d-flex justify-content-around"><a class="title " href="properties-details.html">{{$category->name}}</a>
                                <!--<a class="pull-right" href="properties-details.html">
                                    <i class="fa fa-map-marker text-warning"></i> {{$category->state}}
                                </a>-->
                            </span>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$category->city}}, &nbsp; </span>
{{$category->state}}                                    </li>
                                    <!--<li class="" style="float: right;">
                                        <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="{{route('serviceDetail', $category->id)}}">Verified</a>
                                        </li>-->
                            </ul>
                              <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; 5 likes
                                    </li>
                                    <!--<li class="" style="float: right;">
                                        <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="{{route('serviceDetail', $category->id)}}">Verified</a>
                                        </li>-->
                            </ul>
                        </div>
                    </div>
                </div> 
                @endforeach
                          
                                    </div>
                                    @endif
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
                        </ul>
                    </nav>
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
                            <select class="form-control" id="state" name="state">
                                          
                               
                               <option value="1"> Select Category  </option> 
                               @if(isset($all_categories))
                               @foreach($all_categories as $all_category)
                               <option value="{{$all_category->name}}"> {{$all_category->name}}   </option> 
                               @endforeach
                               @endif                         

                           </select>
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
                                                <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/storage/property/depositphotos_14775483-stock-photo-african-american-mechanic-working-on.jpg" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/emeka-auto-mechanic">emeka auto-omechanic </a>
                                </h3>
                                                            </div>
                        </div>
                                                <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/storage/property/How-To-Start-A-Fashion-Design-Business-With-A-Difference-In-Nigeria.jpg" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/anita-tailor-world">anita tailor world</a>
                                </h3>
                                                            </div>
                        </div>
                                                <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/storage/property/young-african-carpenter-work-600w-1387001429.jpg" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="https://efcontact.com/services/shehu-carpentry%20">shehu carpentry </a>
                                </h3>
                                                            </div>
                        </div>
                                            </div>
                    <!-- Posts by category start -->
                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Cities</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                                                        <a href="https://efcontact.com/services/city/lugbe" class="change-view-btn"><i class="fa fa-home">lugbe</i></a>
                                                        <a href="https://efcontact.com/services/city/wuse" class="change-view-btn"><i class="fa fa-home">wuse</i></a>
                                                        <a href="https://efcontact.com/services/city/victoria-island" class="change-view-btn"><i class="fa fa-home">victoria island</i></a>
                                                        <a href="https://efcontact.com/services/city/ikeja" class="change-view-btn"><i class="fa fa-home">ikeja</i></a>
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
