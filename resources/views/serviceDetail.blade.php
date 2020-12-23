
@extends('layouts.app')


@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="page-name">

            @if(isset($ww2))

            <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px; ">
              <div class="toast bg-warning" style="position: absolute; top: 0; right: 0; border-radius: 8px;">

                <div class="toast-body">
                 Hello, world! This is a toast message.
             </div>
         </div>
     </div>
     @endif


     <h1>Services Detail</h1>
     <ul>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><span>/</span>Service Detail Page</li>
    </ul>
</div>
</div>
</div>












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
        <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
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
            
        </div>
        
    <!-- Tabbing box start -->
    <div class="tabbing tabbing-box tb-2 mb-40 col-sm-12">
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
            <li class="nav-item">
                <a class="nav-link" id="seven-tab" data-toggle="tab" href="#seven" role="tab" aria-controls="six" aria-selected="true">Contact Details</a>
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
                        Service Video
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
                <p>{{$serviceDetail->streetAddress}} | {{$serviceDetail->city}} | &nbsp; {{$serviceDetail->state}}</p>
                
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

 <div class="tab-pane fade " id="seven" role="tabpanel" aria-labelledby="seven-tab">
     <div class="properties-description mb-50">
        <h3 class="heading-2">
            Phone
        </h3>

        @guest
        <p class="animate__animated animate__bounce">Please login to see this seller's phone number!</p>

        @endguest
        @auth
        <p class="animate__animated animate__bounce">{{$serviceDetail->phone}}</p>
        @endauth

    </div>
</div>

</div>
</div>





@if(Auth::user()->role == 'buyer')
<ul class="comments">
    <li>
        @if(isset($userMessages))
        @foreach($userMessages as $userMessage)
        <div class="comment">
            <div class="comment-author">
                <a href="#">
                    <i class="fa fa-user fa-2x"></i>
                </a>
            </div>
            <div class="comment-content">
                <div class="comment-meta">
                    <h3>
                        {{$userMessage->buyer_name}}
                    </h3>
                    <div class="comment-meta">
                    </div>
                </div>
                <p>{{$userMessage->description}}</p>
            </div>
        </div>
        @endforeach
        @endif

        @else
        <p>There are no messages here yet</p>
        @endif
                        </li>
                        
                    </ul>
                    @guest
                    <p>Please login as a buyer to see your previous conversation with this seller</p>
                    @endguest

                    @auth
                  
                    @endauth
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="contact-1 financing-calculator widget">
                        <h5 class="sidebar-title">Chat With Seller</h5>
                        <img class="img-fluid" src="{{asset('images')}}/{{$serviceDetail->image}}" alt="Agent" height="200" width="200">
                        <br>
                        <div class="pull-left">
                            Registered:  "{{$serviceDetail->created_at->diffForHumans()}}"
                        </div>
                        <!--<div class="pull-right">
                            <i class="fa fa-circle text-success"></i> Online
                        </div>-->
                        <br>
                        @guest
                        <a href="{{route('home')}}"><strong>Login</strong></a> to view contact seller
                        @endguest
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <form id="myform" action="{{ route('user.message')}}" method="POST">
                            {{ csrf_field() }}

                            <input  type="hidden" id="service_id" name="service_id" value="{{$serviceDetail->id}}" class="form-control" placeholder="Name">
                            <input type="hidden" id="service_user_id" name="service_user_id" value="{{$serviceDetail->user_id}}" class="form-control" placeholder="Name">  
                            <input type="hidden" id="buyer_id" value="{{Auth::id()}}" name="buyer_id" class="form-control">           
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="buyer_name" class="form-control" placeholder=" Your Name">
                                @if ($errors->has('buyer_name'))
                                <span >
                                    <strong class="text-danger">{{ $errors->first('buyer_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="buyer_email" class="form-control" placeholder="Your Email">
                                @if ($errors->has('buyer_email'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('buyer_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Your Phone Number">
                                @if ($errors->has('phone'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif                            </div> 
                            <div class="form-group">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                                @if ($errors->has('subject'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif 
                            </div>

                            <div class="form-group message">
                                <textarea class="form-control" id="description" name="description" placeholder="Write message"></textarea>
                                @if ($errors->has('description'))
                                <span>
                                    <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                </span>
                                @endif 
                            </div>
                            @guest
                            <p>Only registered users can message sellers. <a href="{{route('home')}}"><strong>Login</strong></a> or <a href="{{route('home')}}"><strong>Register</strong></a> if you dont have an account.</p>
                            @endguest

                        </div>
                        @auth
                        <div class="col-lg-12 col-md-12">
                            <div class="send-btn">
                                <button type="submit" class="btn btn-md btn-submit btn-warning">Send Message</button>
                            </div>
                        </div>
                        @endauth
                    </form>

                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Safety tips</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                            <li>* Do not pay in advance even for the delivery.</li>
                            <li>* Try to meet at a safe, public location.</li>
                            <li>* Check the item BEFORE you buy it.</li>
                            <li>* Pay only after collecting the item.</li>
                            <li>* You pay only the listed price without any hidden costs.</li>
                            <li>
                                <button type="button" class="btn btn-danger btn-md">Report Seller <i class="fa fa-flag"></i> </button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@auth
@if(Auth::user()->role == 'buyer')
<div class="container mb-5 mt-0">
    <h5>
        HAPPY WITH THE SERVICE RENDERED? THEN GIVE THIS SELLER A  <a href="{{route('admin2.like', $serviceDetail->id)}}"> <i class="fa fa-thumbs-up text-warning" style="font-size: 19px;"></i><span class="text-warning">   LIKE!</span>
        </a>
    </h5>
</div>
@endif 
@endauth

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
