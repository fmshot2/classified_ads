


@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="main">
        <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/contactusbg.jpg')}})">
            <div class="container">
                <div class="page-name">
                    <div class="sub-banner-text-content">
                        <h1>Contact Us</h1>
                        <ul>
                            <li><a href="https://efcontact.com">Home</a></li>
                            <li><span>/</span>Contact Us</li>
                        </ul>
                    </div>
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
                            <strong>
                                <a href="tel: {{ $check_general_info == 0 ? $general_info->hot_line : '' }} ">
                                    +234 {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                </a> <br>
                                <a href="https://wa.me/{{ $check_general_info == 0 ? $general_info->hot_line : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services." target="_blank">
                                    <i class="fa fa-whatsapp" style="font-size: 15px"></i> +234 {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                </a>
                            </strong>
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

                <form action="{{route('store_contact_form')}}" method="POST" style="background-color: #fff; padding: 15px">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
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
                                        @endif
                                    </div>
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

                            <div class="row">
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
                    </div>
                </form>
            </div>
        </div>

        <div class="section">
            <div class="container-full">
                <div class="row">
                    <div class="col-12">
                        <div class="google-maps">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31518.588844000613!2d7.492251300000006!3d9.07982880000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55e2e606f1c6452e!2sE.F.%20Network%20Ltd!5e0!3m2!1sen!2sng!4v1611820893949!5m2!1sen!2sng" frameborder="0" style="border:0; width: 100%; height: 381px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
