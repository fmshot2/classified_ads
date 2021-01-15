
@extends('layouts.app')

@section('title')
Home | 
@endsection

@section('content')

<div class="main">
    <div class="sub-banner" style="background-image:url({{asset('OurBackend/img/makeupartist.jfif')}})">
        <div class="container">
            <div class="page-name">
                <h1>Advertisement</h1>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><span>/</span>Advertise with us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="pricing-tables-3 content-area">
        <div class="container text-center">
            <p class="text-center">
                Experience rapid boost in exposure of your business and services by placing Banner adverts on <br>
                Nigeria’s leading property platform.
            </p>
            <h1>WHY Nigeria Yellow Page?</h1>
            <em><strong>"Your brand deserves the right audience"</strong></em>
            <p>
                With over half a million dedicated monthly visitors and 7 million monthly page-views,<br>
                your business, product &amp; services are placed right in front of dedicated audience of<br>
                Nigeria's most leading property platform.
            </p>
            <h2>BANNER AD SIZES</h2>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-2">
                        <div class="title">Home Page Banner</div>
                        <div class="content">
                            <p>
                                Location: On the homepage of the website, <br>visible to all site visitors.<br>
                                Dimensions: 720 X 90 pixels
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-2">
                        <div class="title">Search Result Banner</div>
                        <div class="content">
                            <p>
                                Location(Medium-Page): On the top of the property search result pages.<br>
                                Dimensions (Medium-Page): 720 X 90 pixels
                            </p>
                            <p>
                                Location(Square Size): On the right hand side of property search result pages.<br>
                                Dimensions (Square Size): 350 x 290 pixels
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-3 popular">
                        <div class="title">Property Page Banner</div>
                        <div class="content">
                            <p>
                                Location(Leaderboard): On the top of the property detail pages.<br>
                                Dimensions (Leaderboard): 720 X 115 pixels
                            </p>
                            <p>
                                Location(Square Size): On the right hand side of property detail pages.<br>
                                Dimensions (Square Size): 350 x 290 pixels
                            </p>
                            <p>
                                Location(Bottom-Page): On the bottom of the property detail pages.<br>
                                Dimensions (Bottom-Page): 720 X 90 pixels
                            </p>
                        </div>
                        <div class="button btn-outline-warning"><a href="/doc/price.pdf" class="btn btn-outline pricing-btn button-theme">DOWNLOAD AD RATE CARD</a></div>
                    </div>
                </div>





                <form method="POST">

                </form>






                <div class="col-md-12">
                    <div class="submit-address">
                       <form action="{{route('store_advert_form')}}" method="POST">
                        {{ csrf_field() }}
                        <h3 class="heading-2">Contact Us:</h3>
                        <a href="mailto:info@efcontact.com"><span>info@efcontact.com</span></a>
                        <a href="tel:0700-6258244">0700-6258244</a>,
                        <a href="tel:0807-9000286">0807-9000286</a><br>
                        <strong>Or fill the form below</strong>
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
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection
