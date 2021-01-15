<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
           <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="contact-info">
                        <li>
                            Email: <a href="mailto: {{ $check_general_info == 0 ? $general_info->support_email : ''}}"> {{ $check_general_info == 0 ? $general_info->support_email : ''}} </a>
                        </li>
                        <li>
                            Phone 1: <a href="tel:  {{ $check_general_info == 0 ? $general_info->hot_line : '' }}">  {{ $check_general_info == 0 ? $general_info->hot_line : '' }} </a>
                        </li>
                        <li>
                            Phone 2: <a href="tel: {{ $check_general_info == 0 ? $general_info->hot_line_2 : ''}}"> {{ $check_general_info == 0 ? $general_info->hot_line_2 : ''}} </a>
                        </li>
                        <li>
                            Phone 3: <a href="tel: {{ $check_general_info == 0 ? $general_info->hot_line_3 : ''}}"> {{ $check_general_info == 0 ? $general_info->hot_line_3 : ''}}</a>
                        </li>
                    </ul>
                    <ul class="social-list clearfix">
                        <li><a href=" {{ $check_general_info == 0 ? $general_info->facebook : ''}} " target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href=" {{ $check_general_info == 0 ? $general_info->twitter : ''}} " target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $check_general_info == 0 ? $general_info->linkedin : ''}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
           <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Useful Links</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="links">
                        <li class=" ">
                            <a href="{{route('home')}}" class="grey-text text-lighten-3">Home</a>
                        </li>

                        <li class=" ">
                            <a href="{{route('seller.sellers')}}" class="grey-text text-lighten-3">Sellers</a>
                        </li>

                        <li class="">
                            <a href="{{route('allServices')}}" class="grey-text text-lighten-3">Services</a>
                        </li>

                        <li class=" ">
                            <a href="{{route('contact')}}" class="grey-text text-lighten-3">Contact Us</a>
                        </li>
                      
                        <li class="">
                            <a href="{{route('faq')}}" class="grey-text text-lighten-3">FAQs</a>
                        </li>
                         <li class="">
                            <a href="{{route('advertisement')}}" class="grey-text text-lighten-3">Advertise With Us</a>
                        </li>

                        <li class="">
                            <a href="{{route('event2')}}" class="grey-text text-lighten-3">Events</a>
                        </li>
                      
                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Recent Services</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="popular-posts">
                        @foreach($service as $services)
                                                <div class="media">
                            <div class="media-left">
                                <img class="media-object" src=" {{asset('images')}}/{{ $services->image[0]}} " alt="sub-properties">
                             
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    </h3><h6><a href="#">{{ Str::limit($services->name, 5)}}</a></h6>
                                
                                <p>{{ Str::limit($services->state, 5)}}</p>
                            </div>
                        </div>
                        @endforeach
                        </div>
                </div>
            </div>
 <form action="" method="POST">
                            
                        </form>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="Subscribe-box">
                        <p>Subscribe to get the latest services.</p>
                        <form action="{{route('subscribe')}}" method="POST">
                                {{ csrf_field() }}

                                <input type="email" required class="form-contact form-control" name="email" placeholder="Enter Your Email">
                                <button type="submit" name="submitNewsletter" class="btn btn-block text-white bg-warning">
                                    Subscribe
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <p class="copy">© 2020 EFContact <a href="https://www.efnetworks.com">Powered by EF Networks. </a><a href="{{route('terms-of-use')}}"> TERMS</a> | <a href="{{route('terms-of-use')}}"> POLICIES</a></p>
            </div>
        </div>
    </div>
</footer>