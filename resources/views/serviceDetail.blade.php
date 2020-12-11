
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
                          
                        </div>
                      
                    </div>  <!-- main slider carousel nav controls -->
                 
                        <!-- main slider carousel items -->






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
                        <form id="myform" action="{{ route('user.message')}}" method="POST">
                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" id="service_id" name="service_id" value="{{$serviceDetail->id}}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        <input type="hidden" id="service_user_id" name="service_user_id" value="{{$serviceDetail->user_id}}" class="form-control" placeholder="Name">
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
                                        <input type="hidden" name="id" value={{$serviceDetail_id}} class="form-control">
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
                var service_user_id = $("#service_user_id").val();
                var description = $("#description").val();
                

                $.ajax({
                    url: "{{ route('user.message') }}",
                    type:'POST',
                    //data: $('#myform').serialize(),
                    data: {_token:_token, buyer_id:buyer_id, service_id:service_id, service_user_id:service_user_id, description:description},
                    success: function(data) {
                      printMsg(data);
                    }
                });
            }); 

            function printMsg (msg) {
                if((msg.success)){
                  console.log(msg.success);
                  //$('#alert-block').empty().append(msg.success);
                  //$('#alert-block2').empty().append(msg.success2);

                  $('.alert-block').empty().('display','block').append('<strong>'+msg.success+'</strong>');
              }
              else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
                });
                $('#alert-block').empty().append(msg.error);
              }

            }
        });
    </script>
<!--if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  //$('#alert-block').empty().append(msg.success);
                  //$('#alert-block2').empty().append(msg.success2);

                  $('.alert-block').empty().('display','block').append('<strong>'+msg.success+'</strong>');
              }
              -->