
@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')

<div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/contactusbg.jpg')}})">
    <div class="container">
        <div class="page-name">
            <h1>Contact Us</h1>
            <ul>
                <li><a href="index.html">Index</a></li>
                <li><span>/</span>Contact Us</li>
            </ul>
        </div>
    </div>
</div>




<div class="contact-2 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1 class="mb-10">Contact us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="contact-info">
            <div class="row">
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-location"></i>
                    <p>Office Address</p>
                    <strong>20/F Green Road, Dhaka</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-technology-1"></i>
                    <p>Phone Number</p>
                    <strong>+55 417 634 7071</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-envelope"></i>
                    <p>Email Address</p>
                    <strong>info@themevessel.com</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-globe"></i>
                    <p>Web</p>
                    <strong>info@themevessel.com</strong>
                </div>
            </div>
        </div>

        <form action="{{route('saveContacts')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                	    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group number">
                                <input type="text" name="phone" class="form-control" placeholder="Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group message">
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" class="btn btn-md button-theme">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="opening-hours bg-light">
                        <h3>Opening Hours</h3>
                        <ul class="list-style-none">
                            <li><strong>Sunday</strong> <span class="text-red"> closed</span></li>
                            <li><strong>Monday</strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Tuesday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Wednesday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Thursday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Friday </strong> <span> 10 AM - 8 PM</span></li>
                            <li><strong>Saturday </strong> <span> 10 AM - 8 PM</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>






@endsection