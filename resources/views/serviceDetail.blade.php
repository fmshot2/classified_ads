
@extends('layouts.app')


@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Properties Detail</h1>
            <ul>
                <li><a href="index.html">Index</a></li>
                <li><span>/</span>Properties Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- Properties Details page start -->
<div class="properties-details-page content-area-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="properties-details-section">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                        <!-- Heading properties start -->
                        <div class="heading-properties-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3>{{$serviceDetail->name}}</h3>
                                        <p><i class="fa fa-map-marker"></i>{{$serviceDetail->state}}</p>
                                    </div>
                                    <div class="pull-right">
                                        <h3><span class="text-right">$420,00/Night</span></h3>
                                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="{{asset('images')}}/{{$serviceDetail->image}}" class="img-fluid" alt="slider-properties">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="img/properties/properties-2.jpg" class="img-fluid" alt="slider-properties">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="img/properties/properties-3.jpg" class="img-fluid" alt="slider-properties">
                            </div>
                            <div class="item carousel-item" data-slide-number="4">
                                <img src="img/properties/properties-4.jpg" class="img-fluid" alt="slider-properties">
                            </div>
                            <div class="item carousel-item" data-slide-number="5">
                                <img src="img/properties/properties-5.jpg" class="img-fluid" alt="slider-properties">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                    <img src="{{asset('images')}}/{{$serviceDetail->image}}" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                    <img src="img/properties/properties-2.jpg" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#propertiesDetailsSlider">
                                    <img src="img/properties/properties-3.jpg" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-3" data-slide-to="3" data-target="#propertiesDetailsSlider">
                                    <img src="img/properties/properties-4.jpg" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-4" data-slide-to="4" data-target="#propertiesDetailsSlider">
                                    <img src="img/properties/properties-5.jpg" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                        </ul>
                        <!-- main slider carousel items -->
                    </div>






                    <!--comments section-->



                    <!-- Advanced search start -->
                    <div class="widget-2 sidebar advanced-search-2">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <div class="m-border">
                             <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group email">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="form-control" placeholder="Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md button-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- Tabbing box start -->
                    <div class="tabbing tabbing-box tb-2 mb-40">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Similar Properties</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <div class="properties-description mb-50">
                                    <h3 class="heading-2">
                                        Description
                                    </h3>
                                    <p>{{$serviceDetail->description}}</p>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="floor-plans mb-50">
                                    <h3 class="heading-2">Floor Plans</h3>
                                    <table>
                                        <tbody><tr>
                                            <td><strong>Size</strong></td>
                                            <td><strong>Rooms</strong></td>
                                            <td><strong>Bathrooms</strong></td>
                                            <td><strong>Garage</strong></td>
                                        </tr>
                                        <tr>
                                            <td>1600</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <img src="img/floor-plans.png" alt="floor-plans" class="img-fluid">
                                </div>
                            </div>
                            <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                <div class="property-details mb-40">
                                    <h3 class="heading-2">Property Details</h3>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>Property Id:</strong>215
                                                </li>
                                                <li>
                                                    <strong>Price:</strong>$1240/ Month
                                                </li>
                                                <li>
                                                    <strong>Property Type:</strong>House
                                                </li>
                                                <li>
                                                    <strong>Bathrooms:</strong>3
                                                </li>
                                                <li>
                                                    <strong>Bathrooms:</strong>2
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>Property Lot Size:</strong>800 ft2
                                                </li>
                                                <li>
                                                    <strong>Land area:</strong>230 ft2
                                                </li>
                                                <li>
                                                    <strong>Year Built:</strong>2018
                                                </li>
                                                <li>
                                                    <strong>Available From:</strong>2018
                                                </li>
                                                <li>
                                                    <strong>Garages:</strong>2
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>Sold:</strong>Yes
                                                </li>
                                                <li>
                                                    <strong>City:</strong>Usa
                                                </li>
                                                <li>
                                                    <strong>Parking:</strong>Yes
                                                </li>
                                                <li>
                                                    <strong>Property Owner:</strong>Sohel Rana
                                                </li>
                                                <li>
                                                    <strong>Zip Code: </strong>2451
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                                <div class="inside-properties mb-50">
                                    <h3 class="heading-2">
                                        Property Video
                                    </h3>
                                    <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                                <div class="location mb-50">
                                    <div class="map">
                                        <h3 class="heading-2">Property Location</h3>
                                        <div id="contactMap" class="contact-map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
                                <div class="similar-properties mb-30">
                                    <h3 class="heading-2">Similar Properties</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="properties-details.html" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured">Featured</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price">
                                                                $178,000
                                                            </p>
                                                            <div class="ratings">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="listing-time opening">For Sale</div>
                                                        <img class="d-block w-100" src="img/properties/properties-1.jpg" alt="properties">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <h1 class="title">
                                                        <a href="properties-details.html">Modern Family Home</a>
                                                    </h1>
                                                    <div class="location">
                                                        <a href="properties-details.html">
                                                            <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City
                                                        </a>
                                                    </div>
                                                    <ul class="facilities-list clearfix">
                                                        <li>
                                                            <i class="flaticon-square"></i> 4800 sq ft
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-furniture"></i> 3 Beds
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-holidays"></i> 2 Baths
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-vehicle"></i> 1 Garage
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-window"></i> 3 Balcony
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-monitor"></i> TV
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="footer clearfix">
                                                    <div class="pull-left days">
                                                        <a><i class="fa fa-user"></i> Jhon Doe</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a><i class="flaticon-time"></i> 5 Days ago</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="properties-details.html" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured">Featured</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price">
                                                                $178,000
                                                            </p>
                                                            <div class="ratings">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="listing-time opening">For Rent</div>
                                                        <img class="d-block w-100" src="img/properties/properties-2.jpg" alt="properties">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <h1 class="title">
                                                        <a href="properties-details.html">Relaxing Apartment</a>
                                                    </h1>
                                                    <div class="location">
                                                        <a href="properties-details.html">
                                                            <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City
                                                        </a>
                                                    </div>
                                                    <ul class="facilities-list clearfix">
                                                        <li>
                                                            <i class="flaticon-square"></i> 4800 sq ft
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-furniture"></i> 3 Beds
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-holidays"></i> 2 Baths
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-vehicle"></i> 1 Garage
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-window"></i> 3 Balcony
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-monitor"></i> TV
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="footer clearfix">
                                                    <div class="pull-left days">
                                                        <a><i class="fa fa-user"></i> Jhon Doe</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a><i class="flaticon-time"></i> 5 Days ago</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <!-- Contact 1 start -->
                    <div class="contact-1 mtb-50">
                        <h3 class="heading">Contact Seller</h3>
                        <form id="myform" action="{{ route('createcomment')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        <input type="hidden" id="service_id" name="service_id" value="{{$serviceDetail->id}}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group email"> 

                                        <input type="hidden" id="buyer_id" value="{{Auth::id()}}" name="buyer_id" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                                             
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" id="description" name="description" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md button-theme btn-submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


<div id="alert-block" class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div>



 /*   @if(isset($approvedService))


                    <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                        @foreach($approvedServices as $approvedService)

                    <div class="col-sm-3 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg" style="background-image: url({{asset('images')}}/{{$approvedService->image}})">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">{{$approvedService->user->name}},  {{$approvedService->name}}</a>
                                        </h3>
                                        <a href="properties-list-rightside.html d-flex" class="category-subtitle" style="float: left;"><i class="fa fa-map-marker"></i> {{$approvedService->state}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach

               
                     
                </div>
            </div>
      
        </div>
                      @endif


                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="sidebar widget advanced-search none-992">
                        <h3 class="sidebar-title">Advanced Search</h3>

                         <form action="{{route('searchOnServiceDetail')}}" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                    </div>
                                </div>
                             
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="state" class="form-control" placeholder="Enter Your State">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="hidden" name="id" value={{$serviceDetailId}} class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md button-theme">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                    <!-- Posts by category start -->
                   
                    <!-- Social media box start -->
                    <div class="social-media-box widget clearfix">
                        <h3 class="sidebar-title">Social Media</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="social-list">
                            <li>
                                <a href="#" class="facebook-bg">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="google-bg">
                                    <i class="fa fa-google"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin-bg">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="pinterest-bg">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Financing calculator start -->
                 
                    </div>




                    <div class="container">
    @if(isset($user111))
        <p> The Search results for your query <b> query</b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Service</th>
                <th>Phone</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user111 as $user)
            <a href="{{route('serviceDetail', $user->id)}}"><tr>
                <td>{{$user->user->name}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->user->phone}}</td>
                <td>
                    <a href="{{route('serviceDetail', $user->id)}}">view</a>
                </td>
                

            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


    @if(isset($user111))


<div class="row">
    @foreach($user111 as $user)

<div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="{{route('serviceDetail', $user->id)}}" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured bg-warning">featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                </div>
                                <div class="listing-time opening">For Rent</div>
                                <img class="d-block w-100" src="{{asset('images')}}/{{$user->image}}" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">{{$user->name}}</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>{{$user->city}}&nbsp;, {{$user->state}}
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square"></i>Experience:{{$user->experience}} Yrs
                                </li>
                                <div class="pull-right">
                                <li>
                                    <i class="flaticon-time"></i> 5 Upvotes
                                </li>
                                </div>
                                
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <a><i class="fa fa-user"></i> {{$user->user->name}}</a>
                            </div>
                            <div class="pull-right">
                                <ul class="facilities-list clearfix">
                                <li>
                                   <i class="fa fa-thumbs-up"></i>Upvote
                                </li>
                                <li>
                                    <i class="fa fa-thumbs-down"></i> Downvote
                                </li>
                                 </ul>
                            </div>
                        </div>
                    </div>
                </div> 
                        @endforeach
      
    </div>






    @endif





</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection





<script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var buyer_id = $("#buyer_id").val();
                var service_id = $("#service_id").val();
                var description = $("#description").val();
                

                $.ajax({
                    url: "{{ route('createcomment') }}",
                    type:'POST',
                    data: $('#myform').serialize(),
                    //data: {_token:_token, buyer_id:buyer_id, service_id:service_id, description:description},
                    success: function(data) {
                      printMsg(data);
                    }
                });
            }); 

            function printMsg (msg) {
              if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  $('#alert-block').empty().append(msg.success);
                  //$('#alert-block2').empty().append(msg.success2);

                  //$('.alert-block').empty().('display','block').append('<strong>'+msg.success+'</strong>');
              }else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
                });
                $('#alert-block').empty().append(msg.error);
              }

            }
        });
    </script>
