


@extends('layouts.app')

@section('title')
Home | 
@endsection

@section('content')


<div class="main">
    <div class="sub-banner" style="background-image:url({{asset('OurBackend/img/makeupartist.jfif')}})">
        <div class="container">
            <div class="page-name">
                <h1>Contact Us</h1>
                <ul>
                    <li><a href="https://efcontact.com">Home</a></li>
                    <li><span>/</span>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Faq start -->
    <div class="contact-2 content-area-5">
        <div class="container">
            <!-- Main title -->
            <div class="container">
                @include('layouts.frontend_partials.status')
            </div>

            <div class="main-title">
                <h1 class="mb-10">Contact us</h1>
            </div>
            <div class="contact-info">
                <div class="row">
                    <div class="col-md-4 col-sm-6 mrg-btn-50">
                        <i class="flaticon-location"></i>
                        <p>Office Address</p>
                        <strong>31, Pope John Paul II Street, Maitama, FCT, Abuja</strong>
                    </div>
                    <div class="col-md-4 col-sm-6 mrg-btn-50">
                        <i class="flaticon-technology-1"></i>
                        <p>Phone Number</p>
                        <strong>0700-6258244</strong>
                    </div>
                    <div class="col-md-4 col-sm-6 mrg-btn-50">
                        <i class="flaticon-envelope"></i>
                        <p>Email Address</p>
                        <strong>info@efcontact.com</strong>
                    </div>
                   {{-- <div class="col-md-3 col-sm-6 mrg-btn-50">
                        <i class="flaticon-globe"></i>
                        <p>Support</p>
                        <strong>info@maxwellochadefoundation.com</strong>
                    </div>--}}
                </div>
            </div>


            <form action="{{route('store_contact_form')}}" method="POST">

            </form>
            


            <form action="{{route('store_contact_form')}}" method="POST">
               

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">                                                                      <div class="col-md-6">
                            <div class="form-group name">
                                <input id="name" name="name" class="form-control"  required type="text" placeholder="Enter Full Name" style="color: black;">
                                @if ($errors->has('name'))
                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif 
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group email">
                                <input id="email" name="email" class="form-control required email" required type="email" placeholder="Email" style="color: black;">
                                @if ($errors->has('email'))
                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                        </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="subject" id="subject" required class="form-control" placeholder="Subject" style="color: black;">
                                @if ($errors->has('subject'))
                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group number">
                                <input id="phone" name="phone" required class="form-control" type="number" placeholder="Enter Phone" style="color: black;">
                                @if ($errors->has('phone'))
                                <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group message">
                            <textarea class="form-control" required name="message" id="message" placeholder="Write message" style="color: black;"></textarea>
                            @if ($errors->has('message'))
                            <span class="helper-text text-danger" data-error="wrong" data-success="right">
                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="send-btn text-center">
                            <button type="submit" class="btn btn-outline-warning">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="section">
    <div class="container-full">
        <div class="row">
            <div class="google-maps">
               <div class="mapouter"><div class="gmap_canvas"><iframe width="1380" height="381" id="gmap_canvas" src="https://maps.google.com/maps?q=11,%20pope%20john%20paul%20street%20maitama,%20abuja&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:381px;width:1380px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:381px;width:1380px;}</style></div></div>
               
           </div>
       </div>
   </div>
</div>


</div>


@endsection