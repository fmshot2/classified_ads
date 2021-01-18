
@extends('layouts.app')


@section('content')

<!-- Sub banner start -->
<div class="sub-banner" style="background-image:url({{asset('OurBackend/img/hometeacher.jpg')}})">
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










<div id="complaint_notification" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
  <div class="toast bg-success mt-2 p-2" style="border-radius: 6px; position: absolute; top: 0; right: 0;">
    <div class="toast-header">
      <i class="fa fa-check-circle"></i>
      <strong class="mr-auto text-white">Your complaint was sent successfully</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
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
                            <a href="{{route('search_by_city', $featuredService->city)}}" 
                              class="btn btn-outline-warning"><i class="fa fa-home">{{$featuredService->city}}</i></a>
                            @endforeach
                            @endif

                          </ul>
                        </div></span></h3>
                      </div>
                    </div>
                  </div>
                </div>      
              </div>

              <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
              <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
              <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
              </script>
              <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
              </script>

              <!----------HTML code starts here------->
              <div class="container">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">

                 <div class="owl-stage-outer">

                   <div class="owl-stage" style="transform: translate3d(-1527px, 0px, 0px); transition: all 0.25s ease 0s; width: 3334px;">
                    @if(isset($images_4_service))
                    @foreach($images_4_service as $key => $image)
                    <div class="owl-item" style="width: 128.906px; margin-right: 10px;"><div class="item">


                      <img class="d-block w-100" src="{{asset('images')}}/{{$image}}" alt="First slide">



                    </div></div> 
                    @endforeach
                    @endif
                  </div>
                </div>
                <div class="owl-nav disabled">

                </div>

              </div>
            </div>


            <style type="text/css">
              .owl-item {width: 128.906px; margin-right: 10px; background:powderblue; }
            </style>

            <script type="text/javascript">
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items:4, 
  // items change number for slider display on desktop
  
  loop:true,
  margin:10,
  autoplay:true,
  autoplayTimeout:1300,
  autoplayHoverPause:true
});
</script>


























<!-- Tabbing box start -->
<div class="tabbing tabbing-box tb-2 mb-40 col-sm-12">
  <ul class="nav nav-tabs" id="carTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Likes</a>
    </li>

    {{--<li class="nav-item">
      <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="true">Video</a>
    </li>--}}
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
               <a href="{{route('serviceDetail', $similarProduct->id)}}"><img alt="properties-small" src="{{asset('images')}}/{{$similarProduct->image[0]}}" class="img-fluid"></a>
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




@auth

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
@endauth

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
      <img class="img-fluid" src="{{asset('images')}}/{{$serviceDetail->image[0]}}" alt="Agent" height="200" width="200">
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
                          <form></form>

                          {{--<form id="myform" action="{{ route('user.message')}}" method="POST">--}}
                            <form id="myform">
                              {{ csrf_field() }}

                              <input  type="hidden" id="service_id" name="service_id" value="{{$serviceDetail->id}}" class="form-control" placeholder="Name">
                              <input type="hidden" id="service_user_id" name="service_user_id" value="{{$serviceDetail->user_id}}" class="form-control" placeholder="Name">  
                              <input type="hidden" id="buyer_id" value="{{Auth::id()}}" name="buyer_id" class="text-dark form-control">          
                              <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" id="buyer_name" name="buyer_name" class="text-dark form-control" placeholder=" Your Name">
                                @if ($errors->has('buyer_name'))
                                <span >
                                  <strong class="text-danger">{{ $errors->first('buyer_name') }}</strong>
                                </span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" id="buyer_email" name="buyer_email" class="text-dark form-control" placeholder="Your Email">
                                @if ($errors->has('buyer_email'))
                                <span>
                                  <strong class="text-danger">{{ $errors->first('buyer_email') }}</strong>
                                </span>
                                @endif
                              </div>
                              <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="text-dark form-control" placeholder="Your Phone Number">
                                @if ($errors->has('phone'))
                                <span>
                                  <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                              @endif                            </div> 
                              <div class="form-group">
                                <label class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control text-dark" placeholder="Subject">
                                @if ($errors->has('subject'))
                                <span>
                                  <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif 
                              </div>

                              <div class="form-group message">
                                <textarea class="text-dark form-control" id="description" name="description" placeholder="Write message"></textarea>
                                @if ($errors->has('description'))
                                <span>
                                  <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                </span>
                                @endif 
                              </div>
                              @guest
                              <p>Only registered users can message sellers. <a href="{{route('login')}}"><strong>Login</strong></a> or <a href="{{route('register')}}"><strong>Register</strong></a> if you dont have an account.</p>
                              @endguest

                            </div>
                            @auth
                            <div class="col-lg-12 col-md-12">
                              <div class="send-btn">
                                <button type="submit" class="btn btn-md btn-submit2 btn-warning">Send Message</button>
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
                                {{--<button type="button" class="btn btn-danger btn-md">Report Seller <i class="fa fa-flag"></i> </button>--}}



                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#exampleModalCenter">
                                  Report Seller  <i class="fa fa-flag"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Report This Seller</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        @auth

                                        <form id="myform2">
                                          {{ csrf_field() }}
                                          <input  type="hidden" id="service_id_report" name="service_id_report" value="{{$serviceDetail->id}}" class="form-control">
                                          <input type="hidden" id="service_user_id_report" name="service_user_id_report" value="{{$serviceDetail->user_id}}" class="form-control">  
                                          <input type="hidden" id="buyer_id_report" value="{{Auth::id()}}" name="buyer_id_report" class="text-dark form-control">          
                                          <div class="form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="hidden"  value="{{Auth::user()->name}}" id="buyer_name_report" name="buyer_name_report" class="text-dark form-control" placeholder=" Your Name">
                                            @if ($errors->has('buyer_name_report'))
                                            <span >
                                              <strong class="text-danger">{{ $errors->first('buyer_name_report') }}</strong>
                                            </span>
                                            @endif
                                          </div>
                                          <div class="form-group">
                                            <input type="hidden" id="buyer_email_report" value="{{Auth::user()->email}}" name="buyer_email_report" class="text-dark form-control">
                                            @if ($errors->has('buyer_email_report'))
                                            <span>
                                              <strong class="text-danger">{{ $errors->first('buyer_email_report') }}</strong>
                                            </span>
                                            @endif
                                          </div>                        


                                          <div class="form-group message">
                                            <textarea class="text-dark form-control" id="description_report" name="description_report" placeholder="Write message"></textarea>
                                            @if ($errors->has('description_report'))
                                            <span>
                                              <strong class="text-danger">{{ $errors->first('description_report') }}</strong>
                                            </span>
                                            @endif 
                                          </div>
                                          @guest
                                          <p>Only registered users can message sellers. <a href="{{route('home')}}"><strong>Login</strong></a> or <a href="{{route('home')}}"><strong>Register</strong></a> if you dont have an account.</p>
                                          @endguest

                                        </div>
                                        @auth
                                        <div class="col-lg-12 col-md-12 mb-4">
                                          <div class="send-btn">
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                           <button id="" type="button" class="btn-submit3 btn btn-danger" data-dismiss="modal">Send Report</button>
                                         </div>
                                       </div>
                                       @endauth
                                     </div>

                                   </form>
                                   @endauth
                                   @guest
                                   <h6>Please log in as a buyer to report this seller </h6>
                                   @endguest

                                 </div>
                               </div>
                             </div>
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



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


            <script type="text/javascript">
              $(document).ready(function() {
                $(".btn-submit2").click(function(e){
                  e.preventDefault();

                  var _token = $("input[name='_token']").val();
                  var buyer_id = $("#buyer_id").val();
                  var buyer_name = $("#buyer_name").val();
                  var service_id = $("#service_id").val();
                  var subject = $("#subject").val();
                  var service_user_id = $("#service_user_id").val();
                  var phone = $("#phone").val();
                  var buyer_email = $("#buyer_email").val();
                  var description = $("#description").val();


                  $.ajax({
                    type:'POST',
                    {{--url: "{{ route('user.message2') }}",--}}
                    //data: $('#myform').serialize(),
                    url: '/buyer/createcomment2/',
                    data: {_token:_token, buyer_id:buyer_id, service_id:service_id, service_user_id:service_user_id, description:description, subject:subject, buyer_name, buyer_email, phone },
                    success: function(data) {
                      alert(data.success2);
                      //printMsg(data);
                    }
                  });
                }); 

                function printMsg (msg) {
                  if((msg.success)){
                    console.log(msg.success);
                  //$('#alert-block').empty().append(msg.success);
                  //$('#alert-block2').empty().append(msg.success2);

                 // $('.alert-block').empty().('display','block').append('<strong>'+msg.success+'</strong>');
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

        <script type="text/javascript">
          $(document).ready(function() {
           document.getElementById("complaint_notification").hidden = true;
           $(".btn-submit3").click(function(e){
            e.preventDefault();
            
            var _token = $("input[name='_token']").val();
            var buyer_id = $("#buyer_id_report").val();
            var buyer_name = $("#buyer_name_report").val();
            var service_id = $("#service_id_report").val();
            var service_user_id = $("#service_user_id_report").val();
            var buyer_email = $("#buyer_email_report").val();
            var description = $("#description_report").val();
            

            $.ajax({
              type:'POST',
              {{--url: "{{ route('user.message2') }}",--}}
                    //data: $('#myform').serialize(),
                    url: '/buyer/createcomplaint/',
                    data: {_token:_token, buyer_id:buyer_id, buyer_name:buyer_name, buyer_email:buyer_email, service_id:service_id, service_user_id:service_user_id,  description:description },
                    success: function(data) {
                      alert(data.success2);
                      document.getElementById("complaint_notification").hidden = false;
                      document.getElementById("complaint_notification").innerHTML = "Your complaint was sent successfully";
                       //printMsg(data);
                     }
                   });
          }); 

         });
       </script>
