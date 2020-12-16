
@extends('layouts.app')


@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Services Detail</h1>
            <ul>
                <li><a href="index.html">Index</a></li>
                <li><span>/</span>Service Detail Page</li>
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
                                    <h3><span class="text-right">
                                        <div class="posts-by-category widget">
                                            <!--<h3 class="sidebar-title">Cities</h3>-->                       
                                            <ul class="list-unstyled list-cat">

                                              @if(isset($featuredServices2))
                                              @foreach($featuredServices2 as $featuredService)
                                              <a href="{{route('search_by_city', $featuredService->city)}}" class="btn btn-outline-warning"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                                              @endforeach
                                              @endif
                                              
                                          </ul>
                                      </div></span></h3>
                                      <!--<p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>-->
                                  </div>
                              </div>
                          </div>
                      </div>
                      @if(isset($userSer))
                      @foreach($userSer as $userSer1)

                      <div class="col-sm-3 card service-box">
                        <img class="card-img-top" src="http://localhost:8000/images/1607948139.jpeg" alt="service" style="min-width: 150px;">
                        <div class="card-body detail">
                            <div class="title">
                                <h4><a href="#" style="font-size: 15px;">{{$userser1->user->name}}, &nbsp; fishing</a></h4>
                            </div>
                            <div class="location">
                                <a href="properties-details.html" tabindex="-1">

                                </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>Lagos</span>
                            </div>
                            
                            <!--<a href="#" class="read-more">More...</a>-->
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @if(isset($userser3))
                    <div class="row">
                        @foreach($userser3 as $userser33)
                        <div class="col-lg-3 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="http://localhost:8000/serviceDetail/1" class="property-img">
                                        <div class="listing-badges">
                                            <span class="featured bg-warning">featured</span>
                                        </div>
                                        <div class="price-ratings-box">
                                            <p class="price">
                                                4 Yrs Experience
                                            </p>
                                            
                                        </div>
                                        <div class="listing-time opening">{{$userser33->user->name}}</div>
                                        <img class="d-block w-100" src="http://localhost:8000/images/1607874436.jpeg" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                                    </a>
                                </div>
                                <div class="detail">
                                    <span class="d-flex justify-content-around"><a class="title " href="properties-details.html">{{$userser33->name}}r</a>
                                        <a class="pull-right" href="properties-details.html">
                                            <i class="fa fa-map-marker text-warning"></i> {{$userser33->city}}
                                        </a></span>

                                        <ul class="facilities-list clearfix">
                                            <li>
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; 5 likes
                                            </li>
                                            <li class="" style="float: right;">
                                                <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="http://localhost:8000/serviceDetail/1">Verified</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
<!--<div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3, 2, 1" style="">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="http://localhost:8000/serviceDetail/1" class="property-img">
                            <div class="listing-badges">
                                <span class="featured bg-warning">featured</span>
                            </div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    4 Yrs Experience
                                </p>
                                
                                </div>
                                <div class="listing-time opening">femi</div>
                                <img class="d-block w-100" src="http://localhost:8000/images/1607874436.jpeg" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <span class="d-flex justify-content-around"><a class="title " href="properties-details.html">Home Lesson Teacher</a>
                                <a class="pull-right" href="properties-details.html">
                                    <i class="fa fa-map-marker text-warning"></i> Lagos
                                </a></span>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; 5 likes
                                    </li>
                                    <li class="" style="float: right;">
                                        <i class="fa fa-check-circle text-warning" aria-hidden="true"></i><a href="http://localhost:8000/serviceDetail/1">Verified</a>
                                        </li>
                            
                            </ul>
                        </div>
                   
                    </div>
                </div>
            -->
            @endif
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
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Likes</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="true">Video</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="true">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="true">Similar Properties</a>
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
            <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                <div class="property-details mb-40">
                    <h6 class="heading-2">This User has {{$service_likes}} likes</h6>
                    
                </div>
            </div>
            <div class="tab-pane fade " id="four" role="tabpanel" aria-labelledby="four-tab">
                <div class="inside-properties mb-50">
                    <h3 class="heading-2">
                        Property Video
                    </h3>
                    <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                    <iframe width="560" height="315" src="{{$serviceDetail->video_link}}" frameborder="0" allowfullscreen></iframe> 

                </div>
            </div>
            <div class="tab-pane fade " id="five" role="tabpanel" aria-labelledby="five-tab">
               <div class="properties-description mb-50">
                <h3 class="heading-2">
                    Address
                </h3>
                <p>{{$serviceDetail->city}}, &nbsp; {{$serviceDetail->state}}</p>
                
            </div>
        </div>
        <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="six-tab">
            <div class="properties-description mb-50">                              

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Heading -->
                    <h3 class="heading-2">Similar Services</h3>
                    <div class="my-properties">
                       <table class="table brd-none">
                           <thead>
                               <tr>
                                   <th>Service</th>
                                   <th>Name</th>
                                   <th class="hedin-div">Address</th>
                                   <th><span class="hedin-div">Likes</span></th>
                               </tr>
                           </thead>
                           <tbody>
                            @if(isset($similarProducts))
                            @foreach($similarProducts as $similarProduct)
                            <tr>
                               <td class="image">
                                   <a href="{{route('serviceDetail', $similarProduct->id)}}"><img alt="properties-small" src="{{asset('images')}}/{{$similarProduct->image}}" class="img-fluid"></a>
                               </td>
                               <td>
                                   <div class="inner">
                                       <h5><a href="{{route('serviceDetail', $similarProduct->id)}}">{{$similarProduct->name}}</a></h5>
                                       <figure class="hedin-div"><i class="fa fa-map-marker"></i> {{$similarProduct->state}}, &nbsp; {{$similarProduct->city}}</figure>
                                       <!--<div class="price-month">$ 27,000</div>-->
                                   </div>
                               </td>
                               <td class="hedin-div">  <figure class="hedin-div"><i class="fa fa-map-marker"></i> {{$similarProduct->state}}, &nbsp; {{$similarProduct->city}}</figure></td>
                               <td> <span class="hedin-div">{{$similarProduct->likes->count()}}</span></td>

                           </tr>
                           @endforeach
                           @endif
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>

</div>
</div>




@auth
<ul class="comments">
    <li>
        @if(isset($userMessages))
        @foreach($userMessages as $userMessage)
        <div class="comment">
            <div class="comment-author">
                <a href="#">
                    <!--<img src="img/avatar/avatar-1.jpg" alt="comments-user">-->
                    <i class="fa fa-user fa-2x"></i>
                </a>
            </div>
            <div class="comment-content">
                <div class="comment-meta">
                    <h3>
                        Maikel Alisa
                    </h3>
                    <div class="comment-meta">
                        <!--6:42 PM 6/28/2019<a href="#">Reply</a>-->
                    </div>
                </div>
                <p>{{$userMessage->description}}</p>
            </div>
        </div>
        @endforeach
        @else
        <p>There are no messages here yet</p>
        @endif
                            <!--<ul>
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-2.jpg" alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h3>
                                                    Karen Paran
                                                </h3>
                                                <div class="comment-meta">
                                                    6:42 PM 6/28/2019<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>-->
                        </li>
                        
                    </ul>

                    @endauth





















                    <!-- Contact 1 start -->
                    <div class="contact-1 mb-0">
                        <h3 class="heading mb-0">Contact Seller</h3>
                        <form id="myform" action="{{ route('user.message')}}" method="POST">
                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group name">
                                        <input type="hidden" id="service_id" name="service_id" value="{{$serviceDetail->id}}" class="form-control" placeholder="Name" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group name">
                                        <input type="hidden" id="service_user_id" name="service_user_id" value="{{$serviceDetail->user_id}}" class="form-control" placeholder="Name">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="buyer_name" class="form-control" placeholder=" Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group email">
                                        <input type="email" name="buyer_email" class="form-control" placeholder="Your Email">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group email"> 

                                        <input type="hidden" id="buyer_id" value="{{Auth::id()}}" name="buyer_id" class="form-control" placeholder="Email">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number">
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" id="description" name="description" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md btn-submit btn-warning">Send Message</button>
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
                                        <input type="hidden" name="serviceDetail_id" value={{$serviceDetail_id}} class="form-control">
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
                <div class="posts-by-category widget">
                    <h3 class="sidebar-title">Cities</h3>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="list-unstyled list-cat">

                      @if(isset($featuredServices2))
                      @foreach($featuredServices2 as $featuredService)
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