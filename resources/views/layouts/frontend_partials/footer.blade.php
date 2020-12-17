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
                            Email: <a href="mailto:info@efcontact.com">info@efcontact.com</a>
                        </li>
                        <li>
                            Phone 1: <a href="tel:+"></a>
                        </li>
                        <li>
                            Phone 2: <a href="tel:+0807-9000286">0807-9000286</a>
                        </li>
                        <li>
                            Phone 3: <a href="tel:+080567654345">080567654345</a>
                        </li>
                    </ul>
                    <ul class="social-list clearfix">
                        <li><a href="https://www.facebook.com/maxwellochadefoundation" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/mochadefoundatn?s=09" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/maxwellochade_foundation?igshid=4xtbur0qkvfh" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/maxwellochadefoundation" target="_blank"><i class="fa fa-linkedin"></i></a></li>
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
                                <img class="media-object" src="{{asset('images')}}/{{$services->image}}" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    </h3><h6><a href="#">{{$services->name}}</a></h6>
                                
                                <p>{{$services->city}} | {{$services->state}}</p>
                            </div>
                        </div>
                        @endforeach
                        </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="Subscribe-box">
                        <p>Subscribe to get the latest services.</p>
                        <form action="#" method="GET">
                            <p>
                                <input type="text" class="form-contact" name="email" placeholder="Enter Address">
                            </p>
                            <p>
                                <button type="submit" name="submitNewsletter" class="btn btn-block text-white bg-warning">
                                    Subscribe
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <p class="copy">© 2020 Nigeria Yellow Page <a href="">Powered by EF Networks. </a><a href="{{route('terms-of-use')}}"> TERMS</a></p>
            </div>
        </div>
    </div>
</footer>