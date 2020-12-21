


@extends('layouts.app')

@section('title')
 Home | 
@endsection

@section('content')


<div class="main">
        <div class="sub-banner">
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
        <div class="main-title">
            <h1 class="mb-10">Contact us</h1>
        </div>
        <div class="contact-info">
            <div class="row">
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-location"></i>
                    <p>Office Address</p>
                    <strong>No 8, Huambo Crescent, Off Harper Street, by Bolton White Hotel, Wuse Zone 7, Abuja, Federal Capital Territory, Nigeria</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-technology-1"></i>
                    <p>Phone Number</p>
                    <strong>0700-6258244</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-envelope"></i>
                    <p>Email Address</p>
                    <strong>info@efcontact.com</strong>
                </div>
                <div class="col-md-3 col-sm-6 mrg-btn-50">
                    <i class="flaticon-globe"></i>
                    <p>Support</p>
                    <strong>info@maxwellochadefoundation.com</strong>
                </div>
            </div>
        </div>


                    <form action="{{route('store_contact_form')}}" method="POST">

        </form>
   


 <form action="{{route('store_contact_form')}}" method="POST">
             

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
                                <button type="submit" class="btn btn-md button-theme">Send Message</button>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.1567821423455!2d7.456060914074049!3d9.049459893506649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b3fbb08d1bb%3A0xe909771c68fd53e0!2s8%20Huambo%20Cres%2C%20Wuse%2C%20Abuja!5e0!3m2!1sen!2sng!4v1592210747149!5m2!1sen!2sng" height="400" width="1720"></iframe>
                
            </div>
        </div>
    </div>
</div>


    </div>


@endsection