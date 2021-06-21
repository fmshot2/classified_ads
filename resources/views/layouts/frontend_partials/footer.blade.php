<div class="footer-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 footer-cta-text">
          <h2><a href="{{ route('register') }}">Register Your Service Today!</a></h2>
          <span>Take advantage of our platform to showcase your skills, products and services to customers and clients.</span>
        </div>
        @auth
        <div class="col-lg-4 footer-cta-btn text-center">
            <a class="btn btn-success" href="{{ route('seller.dashboard') }}"><i class="fa fa-user-plus"></i> Post A Service</a>
        </div>
        @else
        <div class="col-lg-4 footer-cta-btn text-center">
            <a class="btn btn-success" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Register Now!</a>
        </div>
        @endauth
      </div>
    </div>
</div>

<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
           <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="contact-info">
                        @if ($general_info->address)
                            <li>
                                <strong style="color: rgb(190, 190, 190)"><i class="fa fa-map-marker"></i> Address:</strong> <br> <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31518.588844000613!2d7.492251300000006!3d9.07982880000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55e2e606f1c6452e!2sE.F.%20Network%20Ltd!5e0!3m2!1sen!2sng!4v1611820893949!5m2!1sen!2sng"> {{ $general_info->address ? $general_info->address : ''}} </a>
                            </li>
                        @endif
                        <li>
                            <strong style="color: rgb(190, 190, 190)"><i class="fa fa-envelope-open"></i> Email:</strong> <a href="mailto:{{ $general_info->support_email ? $general_info->support_email : ''}}"> {{ $general_info->support_email ? $general_info->support_email : ''}} </a>
                        </li>
                        <li style="margin-top: -15px">
                            <strong style="color: rgba(190, 190, 190, 0), 0.027), 0.027); opacity: 0"><i class="fa fa-envelope-open"></i> Email:</strong> <a href="mailto: {{ $general_info->contact_email ? $general_info->contact_email : ''}}"> {{ $general_info->contact_email ? $general_info->contact_email : ''}} </a>
                        </li>
                        <li>
                            <strong style="color: rgb(190, 190, 190)"><i class="fa fa-phone"></i> Phone:</strong> <a href="tel:  {{ $general_info->hot_line ? $general_info->hot_line : '' }}">  {{ substr($general_info->hot_line,0,4).'-'.substr($general_info->hot_line,4,3).'-'.substr($general_info->hot_line,7,5) }} </a>

                            {{-- <strong style="color: rgb(190, 190, 190)"><i class="fa fa-phone"></i> Phone:</strong> <a href="tel:  {{ $general_info->hot_line ? $general_info->hot_line : '' }}">  {{ $general_info->hot_line ? $general_info->hot_line : '' }} </a> --}}
                        </li>
                        {{-- <li>
                            Phone 2: <a href="tel: {{ $check_general_info == 0 ? $general_info->hot_line_2 : ''}}"> {{ $check_general_info == 0 ? $general_info->hot_line_2 : ''}} </a>
                        </li> --}}
                        <li>
                            <a href="https://wa.me/{{ $general_info->hot_line_3 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank"><i class="fa fa-whatsapp" style="color:#5af8ac; font-size: 17px"></i> WhatsApp Message</a>
                        </li>
                    </ul>
                    <ul class="social-list clearfix">
                        <li><a href=" {{ $general_info->facebook ? $general_info->facebook : ''}} " target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href=" {{ $general_info->twitter ? $general_info->twitter : ''}} " target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $general_info->linkedin ? $general_info->linkedin : ''}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
           <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Useful Links</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="links">
                        <li class="">
                            <a href="{{route('faq')}}" class="grey-text text-lighten-3">FAQs</a>
                        </li>

                        <li class=" ">
                            <a href="https://blog.efcontact.com" class="grey-text text-lighten-3">Our Blog</a>
                        </li>

                        <li class=" ">
                            <a href="{{route('contact')}}" class="grey-text text-lighten-3">Contact Us</a>
                        </li>

                        <li class="">
                            <a href="{{route('terms-of-use')}}" class="grey-text text-lighten-3">Terms of Use</a>
                        </li>

                        <li class=" ">
                            <a href="{{route('privacy-policy')}}" class="grey-text text-lighten-3">Privacy Policy</a>
                        </li>

                         <li class="">
                            <a href="{{route('advertisement')}}" class="grey-text text-lighten-3">Advertise With Us</a>
                        </li>

                        <li class="">
                            <a href="{{route('referralprogram')}}" class="grey-text text-lighten-3">Referral Program</a>
                        </li>

                       <!--  <li class="">
                            <a href="{{route('benefits-of-efcontact')}}" class="grey-text text-lighten-3">Agent Benefits</a>
                        </li> -->

                        <li class="">
                            <a href="{{route('government.officials')}}" class="grey-text text-lighten-3">National Assembly</a>
                        </li>

                        <li class="">
                            <a href="{{route('allcities')}}" class="grey-text text-lighten-3">Tourist Sites in Nigeria</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Advertisements</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="popular-posts">
                        @if ($advertisements)
                            @foreach($advertisements as $advertisement)
                                @if ($advertisement->advert_location == 4 && $loop->index != 3)
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <a class="title" href="{{ $advertisement->website_link ? $advertisement->website_link : '#' }}"  style="font-size: 14px;"><img class="media-object" src="{{ asset('uploads/sponsored/'.$advertisement->banner_img) }}" alt="{{ $advertisement->title }}" style="width: 250px; height: 65px"></a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>No advert here!</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="Subscribe-box">
                        <p>Subscribe to get the latest news, updates and promotional offers.</p>
                        {{-- <form action="{{route('subscribe')}}" method="POST"> --}}
                        <form id="subscribeForm" method="POST">
                            @csrf
                            <input type="email" required class="form-contact form-control" id="email" name="email" placeholder="Enter Your Email">
                            <button type="submit" name="submitNewsletter" id="subscribeFooterBtn" class="btn btn-block text-white bg-warning">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <p class="copy">© 2021 EFContact <a href="https://eftechnology.net">Powered by EF Network Ltd. </a><a href="{{route('terms-of-use')}}"> Terms</a> | <a href="{{route('privacy-policy')}}"> Privacy</a></p>
            </div>
        </div>
    </div>
</footer>


<div class="footer-nav-area mobile-footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
      <div class="suha-footer-nav h-100">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class=" {{ Request::is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li class=" {{ Request::is('chat') ? 'active' : '' }}"><a href="#liveChatModal" data-backdrop="static" data-toggle="modal"><i class="fa fa-comments-o"></i>Live Chat</a></li>

            @auth
                @if(Auth::user()->role == 'seller')
                    <li class=" {{ Request::is('service') ? 'active' : '' }}"><a href="{{ route('seller.service.create') }}" style=" font-weight: 700; border: 1px solid #CA8309; padding: 10px; border-radius: 500px"><i style="font-size: 18px;" class="fa fa-plus"></i>Post</a></li>
                @else
                    <li class=" {{ Request::is('service') ? 'active' : '' }}"><a href="{{ route('register') }}" style=" font-weight: 700; border: 1px solid #CA8309; padding: 10px; border-radius: 500px"><i style="font-size: 18px;" class="fa fa-plus"></i>Post</a></li>
                @endif
            @endauth

            @guest
                <li class=" {{ Request::is('service') ? 'active' : '' }}"><a href="{{ route('login') }}" style=" font-weight: 700; border: 1px solid #CA8309; padding: 10px; border-radius: 500px"><i style="font-size: 18px;" class="fa fa-plus"></i>Post</a></li>
            @endguest

            <li class=" {{ Request::is('frequently-asked-questions') ? 'active' : '' }}"><a href="/frequently-asked-questions"><i class="fa fa-question-circle-o"></i>FAQ</a></li>

            <li class=" {{ Request::is('settings') ? 'active' : '' }}">
                <a href="#" id="moreLinkBtn" data-target="#moreLinkModal" data-toggle="modal"><i class="fa fa-ellipsis-v"></i>More</a>
            </li>
        </ul>
      </div>
    </div>
  </div>

    <div id="liveChatModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title">YouTube Video</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> --}}
                <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="liveChatModalFrame" class="embed-responsive-item" src="https://tawk.to/chat/5ff49fb2c31c9117cb6bba8f/1er9ovkca" allowfullscreen></iframe>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close Chat</button>
                </div>
            </div>
        </div>
    </div>

    <div id="subscribeBox" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subscribe Now!</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                </div>
                <div class="modal-body">
                    <p>Subscribe to get the latest news, updates and promotional offers.</p>
                    <form id="subscribeForm" method="POST">
                        @csrf
                        <input type="email" required class="form-contact form-control" id="email" name="email" placeholder="Enter Your Email">
                        <button type="submit" name="submitNewsletter" id="subscribeFooterBtn" class="btn btn-block text-white bg-warning">
                            Subscribe
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="moreLinkModal" class="modal fade moreLinkModal">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 0 !important; padding: 0">
                <div class="modal-body" style="padding: 0">
                    <ul>
                        <li><a href="{{route('aboutus')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        {{-- <li><a href="{{route('allServices')}}">All Services</a></li> --}}
                        <li><a href="{{route('allCategories')}}">All Categories</a></li>
                        {{-- <li><a href="{{route('allSellers')}}">Service Providers</a></li> --}}
                        <li><a href="{{route('allcities')}}">Tourist Sites in Nigeria</a></li>
                        <li><a href="{{route('government.officials')}}">National Assembly</a></li>
                        {{-- <li><a href="{{route('benefits-of-efcontact')}}">Benefits of EFContact</a></li> --}}
                        <li><a href="{{route('referralprogram')}}">Referral Program</a></li>
                        <li><a href="{{route('advertisement')}}">Advertise With Us</a></li>
                        <li><a data-toggle="modal" data-target="#launchAgentModal" href="#">Become our Agent</a></li>
                        <li><a data-toggle="modal" data-target="#subscribeBox" href="#">Subscribe Now!</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{--
<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core-legacy.js"
        type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-service-legacy.js"
        type="text/javascript" charset="utf-8"></script> --}}


        

<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
 <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
 <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
 <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

 <script src="{{ asset('js/app.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="{{ asset('js/slick.min.js') }}"></script>





 <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('js/rangeslider.js') }}"></script>
<script src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/leaflet-providers.js') }}"></script>
<script src="{{ asset('js/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.filterizr.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.js') }}"></script>
<script src="{{ asset('js/maps.js') }}"></script>
<script src="{{ asset('glide/glide.min.js') }}"></script>
<script src="{{ asset('lightbox/lightbox-plus-jquery.min.js') }}"></script>
{{-- <script src="{{ asset('js/efScript.js') }}"></script> --}}
<script src="{{ asset('toastr/toastr.min.js') }}"></script>






<script>

    $(document).ready(function(){
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#liveChatModalFrame").attr('src');

        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#myModal").on('hide.bs.modal', function(){
            $("#liveChatModalFrame").attr('src', url);
        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#myModal").on('show.bs.modal', function(){
            $("#liveChatModalFrame").attr('src', url);
        });

        $("#moreLinkBtn").on('click', function(){
            $('#moreLinkModal').modal('toggle');
        });

        var glide = new Glide('.glide', {
            type: 'carousel',
            perView: 3,
            gap: 5,
            focusAt: 'center',
            autoplay: 2000,
            hoverpause: true,
            animationDuration: 3000,
            breakpoints: {
                800: {
                perView: 4
                },
                480: {
                perView: 3
                }
            }
        })

        glide.mount()

    });
</script>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    if (document.documentElement.clientWidth > 900) {
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5ff49fb2c31c9117cb6bba8f/1er9ovkca';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    }

</script>
<!--End of Tawk.to Script-->

    <script src="{{ asset('js/ibiScripts.js') }}"></script>

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
      <script src="js/bootstrap-dropdownhover.min.js"></script>
      {{-- <canvas width="1280" height="960" style="position: absolute; top: 0px; left: 0px; width: 640px; height: 480px; background-color: rgb(245, 248, 250);"></canvas> --}}

      <style type="text/css">
          #mapContainer {
            width: 100% !important;
          }
      </style>

       @if(Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        </script>
    @endif


    <script>
        $(document).ready(function() {
            $("#subscribeFooterBtn").click(function(e){
                e.preventDefault();

                $("#subscribeFooterBtn").text('Please wait, subscribing!!!')
                $("#subscribeFooterBtn").css({"opacity": "0.5", "cursor":"default"});

                var _token = $("input[name='_token']").val();
                var email = $("#email").val();

                $.ajax({
                    url: '/subscribe',
                    method:'POST',
                    data: {_token:_token, email },
                    success: function(data) {
                        $("#email").val('')
                        $("#subscribeFooterBtn").css({"opacity": "1", "cursor":"pointer"});
                        $("#subscribeFooterBtn").text('Subscribe')

                        toastr.success('You are successfully subscribed to our mailing list!')
                    },
                    error: function(error){
                        toastr.error('Subscription Failed! Try again.')
                        $("#subscribeFooterBtn").text('Subscribe')
                        console.log(error)
                    }
                });
            });
        })
    </script>
