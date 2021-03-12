
@extends('layouts.app')

@section('title', 'Advertise with us | ')

@section('content')
    <div class="main">
        <div class="sub-banner" style="background-image:url({{asset('OurBackend/img/makeupartist.jfif')}})">
            <div class="container">
                <div class="page-name">
                    <div class="sub-banner-text-content">
                        <h1>Advertisement</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><span>/</span>Advertise with us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-tables-3 content-area advertise-with-us-page">
            <div class="container text-center" style="background-color: #fff; padding-top: 30px">
                <p class="text-center">
                    Experience rapid boost in exposure of your business and services by placing Banner adverts on <br>
                    EFContact platform.
                </p>
                <h2>WHY EFContact?</h2>
                <em><strong>"Your brand deserves the right audience"</strong></em>
                <p>
                    With over half a million dedicated monthly visitors and 5-7 million monthly page-views,<br>
                    your business, product &amp; services are placed right in front of dedicated audience of<br>
                    EFContact platform.
                </p>
                <h2>BANNER AD SIZES</h2> <hr>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="pricing-3 popular">
                            <div class="title" style="font-weight: 600">Home Page Banner</div>
                            <div class="content text-left" style="padding: 20px">
                                <p>
                                    <strong>Location:</strong> On the homepage of the website, <br>visible to all site visitors.<br>
                                    <strong>Dimensions:</strong> 720 X 90 pixels
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="pricing-3 popular">
                            <div class="title" style="font-weight: 600">Search Result Banner</div>
                            <div class="content text-left" style="padding: 20px">
                                <p>
                                    <strong>Location(Medium-Page):</strong> On the top of the property search result pages.<br>
                                    <strong>Dimensions (Medium-Page):</strong> 720 X 90 pixels
                                </p>
                                <p>
                                    <strong>Location(Square Size):</strong> On the right hand side of property search result pages.<br>
                                    <strong>Dimensions (Square Size):</strong> 350 x 290 pixels
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="pricing-3 popular">
                            <div class="title" style="font-weight: 600">Property Page Banner</div>
                            <div class="content text-left">
                                <p>
                                    <strong>Location(Leaderboard):</strong> On the top of the property detail pages.<br>
                                    <strong>Dimensions (Leaderboard):</strong> 720 X 115 pixels
                                </p>
                                <p>
                                    <strong>Location(Square Size):</strong> On the right hand side of property detail pages.<br>
                                    <strong>Dimensions (Square Size):</strong> 350 x 290 pixels
                                </p>
                                <p>
                                    <strong>Location(Bottom-Page):</strong> On the bottom of the property detail pages.<br>
                                    <strong>Dimensions (Bottom-Page):</strong> 720 X 90 pixels
                                </p>
                            </div>
                            <div class="button btn-outline-warning" style="margin-top: 10px">
                                <a href="/doc/price.pdf" class="btn btn-outline pricing-btn button-theme">DOWNLOAD AD RATE CARD</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="submit-address advertise-with-us-page-form">
                            <form action="{{route('store_advert_form')}}" method="POST">
                                {{ csrf_field() }}
                                <h3 class="heading-2">Contact Us:</h3>
                                <a href="mailto:info@efcontact.com"><span>info@efcontact.com</span></a>
                                <a href="tel:0700-6258244">0700-6258244</a>,
                                <a href="tel:0807-9000286">0807-9000286</a><br>
                                <p><strong>Or fill the form below</strong></p>
                                <div class="search-contents-sidebar mb-30">
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
                                                <div class="col-lg-12 col-md-12 col-sm-12" style="" class="text-center">
                                                    <div class="form-group">
                                                        <select class="form-control" class="text-center" id="categories" name="category">
                                                            <option class="text-center" value="">-- Select Advert Type --</option>
                                                            <option class="text-center" value="Home page banner">Home page banner</option>
                                                            <option class="text-center" value="Propery page banner">Propery page banner</option>
                                                            <option class="text-center" value="Search result banner">Search result banner</option>
                                                            <option class="text-center" value="Email newsletter">Email newsletter</option>
                                                        </select>
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
