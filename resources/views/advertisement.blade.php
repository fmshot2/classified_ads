
@extends('layouts.app')

@section('title')
Home | 
@endsection

@section('content')

<div class="main">
    <div class="sub-banner">
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




                <div class="row">
                    <div class="col-lg-12">
                            <form action="{{route('store_contact_form')}}" method="post">
                            <div class="col-md-6">
                                <div class="form-group name">
                                    <input id="name" name="name" class="form-control" type="text" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group email">
                                    <input id="email" name="email" class="form-control required email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group subject">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group number">
                                    <input id="phone" name="phone" class="form-control" type="number" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group message">
                                    <textarea class="form-control" name="message" id="message" placeholder="Write message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="form-group">
                                <select class="form-control" id="advert_type" name="advert_type">
                                    <option value="">--Select an advert type--</option>
                                    <option value="Home page banner">Home page banner</option>
                                    <option value="Propery page banner">Propery page banner</option>
                                    <option value="Search result banner">Search result banner</option>
                                    <option value="Email newsletter">Email newsletter</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" class="btn btn-md btn-warning ">Send Message</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>



            <div class="col-md-12">
                <div class="submit-address">
                    <form action="https://efcontact.com/request-advert" method="post">
                        <input type="hidden" name="_token" value="EmXzxBylQxRDtXnW2ipXMwPjFVE2jo6ecWhQUW6D">
                        <h3 class="heading-2">Contact Us:</h3>
                        <a href="mailto:info@efcontact.com"><span>info@efcontact.com</span></a>
                        <a href="tel:0700-6258244">0700-6258244</a>,
                        <a href="tel:0807-9000286">0807-9000286</a><br>
                        <strong>Or fill the form below</strong>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="input-text" placeholder="your name" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" class="input-text" placeholder="your email" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="input-text" placeholder="your phone number" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Add Category</label>
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="category" tabindex="-98">
                                            <option value="Home page banner">Home page banner</option>
                                            <option value="Propery page banner">Propery page banner</option>
                                            <option value="Search result banner">Search result banner</option>
                                            <option value="Email newsletter">Email newsletter</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Home page banner"><div class="filter-option"><div class="filter-option-inner">Home page banner</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-md button-theme">Submit</button>
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