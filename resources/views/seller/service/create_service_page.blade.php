
@extends('layouts.seller')

@section('title')
Create Service | 
@endsection

@section('content')

<br>
<hr>



<div class="content-wrapper" style="min-height: 868px;">

  @include('layouts.backend_partials.status')


  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="row clearfix">
          <form class="" method="POST" action="{{route('service.save')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
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
                    <div class="button"><a href="/doc/price.pdf" class="btn btn-outline pricing-btn button-theme">DOWNLOAD AD RATE CARD</a></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="submit-address">
                    <form action="https://www.efcontact.com/request-advert" method="post">
                                                <input type="hidden" name="_token" value="sD0H6dfDpN8uyCQdJRcRJ3l4YBNnl3I02TqUfXuQ">
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
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="body">


                  <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Gallery Image</h3>
                      <small class="text-danger">*required*</small>
                    </div>
                    <div class="body">
                      <input class="form-control" required name="file" type="file">
                      <span class="helper-text" data-error="wrong" data-success="right">Upload one or more images</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Select Category</label>
                    <small class="text-danger">*required*</small>
                    {{--<select name="category_id" required class="form-control show-tick">
                      <option value="">-- Please select --</option>
                      @foreach($category as $categories)
                      <option value=" {{ $categories->id }} "> {{ $categories->name }} </option>
                      @endforeach
                    </select>--}}
                  </div>



                </div>


                <div class="box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title"> Service Video</h3>
                  </div>
                  <div class="body">
                    <div class="form-group form-float">
                      <div class="form-line">
                        <input type="text" class="form-control" name="video_link">
                        <label class="form-label">Video</label>
                      </div>
                      <div class="help-info">Youtube Link</div>
                    </div>

                  </div>
                </div>



                <div class="box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title"> <!--Featured Image</h3-->
                    </div>
                    <div class="body">




                      <a href=" {{ route('seller.service.all') }}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="fa fa-arrow-left"></i>
                        <span>BACK</span>
                      </a>

                      <button type="submit" class="btn btn-primary btn-lg m-t-15 waves-effect">
                        <i class="fa fa-save"></i>
                        <span>Submit</span>
                      </button>

                    </div>
                  </div>

                </div>

              </div></form>

            </div>
            <!-- /.row -->
          </div></div></section>


        </div>



@endsection