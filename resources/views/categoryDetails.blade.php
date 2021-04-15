
@extends('layouts.app')


@section('content')

<div class="properties-details-page content-area-7">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="properties-details-section">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                        <!-- Heading properties start -->
                        <div class="heading-properties-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3>{{$one_category->name}}</h3>
                                        <p><i class=""></i></p>
                                    </div>
                                    <div class="pull-right">
                                        <h3><span class="text-right"></span></h3>
                                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>
                                    </div>
                                </div>


                                @foreach($categories as $category)



                                 <div class="slick-slide-item slick-carousel col-4">
                    <div class="property-box-5">
                        <div class="property-photo">
                            <img class="img-fluid" src="{{asset('img/properties/properties-1.jpg')}}" alt="{{ $category->name }}">
                            <div class="date-box bg-warning">{{$category->is_approved ? 'verified' : 'Not verified'}}</div>
                        </div>
                        <div class="detail">
                            <div class="heading">
                                <h3>
                                    <a href="properties-details.html">{{$category->user->name}}</a>
                                </h3>
                                <div class="location">
                                    <a href="properties-details.html">
                                     {{$category->name}}
                                    </a>
                                </div>
                            </div>
                            <div class="properties-listing">
                                <span>5 likes</span>
                                <span>   <i class="fa fa-map-marker"></i>&nbsp;{{$category->state}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                            </div>
                        </div>

                    </div>
                    <!-- Advanced search start -->
                    <div class="widget-2 sidebar advanced-search-2">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <form method="GET">
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="property-sdtatus" tabindex="-98">
                                    <option>Property Status</option>

                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Property Status"><div class="filter-option"><div class="filter-option-inner">Property Status</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="property-type" tabindex="-98">
                                    <option>Property Type</option>
                                  >
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Property Type"><div class="filter-option"><div class="filter-option-inner">Property Type</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="commercial" tabindex="-98">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Land</option>
                                    <option>Hotels</option>
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Commercial"><div class="filter-option"><div class="filter-option-inner">Commercial</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="location" tabindex="-98">
                                    <option>location</option>
                                    <option>New York</option>
                                    <option>Bangladesh</option>
                                    <option>India</option>
                                    <option>Canada</option>
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="location"><div class="filter-option"><div class="filter-option-inner">location</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="bedrooms" tabindex="-98">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Bedrooms"><div class="filter-option"><div class="filter-option-inner">Bedrooms</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="bathroom" tabindex="-98">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Bathroom"><div class="filter-option"><div class="filter-option-inner">Bathroom</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="balcony" tabindex="-98">
                                            <option>Balcony</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Balcony"><div class="filter-option"><div class="filter-option-inner">Balcony</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="garage" tabindex="-98">
                                            <option>Garage</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Garage"><div class="filter-option"><div class="filter-option-inner">Garage</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><span class="min-value">0 Sq ft</span> <span class="max-value">10000 Sq ft</span><input class="current-min" type="hidden" name="min_area" value="0"><input class="current-max" type="hidden" name="max_area" value="10000"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000" data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><span class="min-value">0 USD</span> <span class="max-value">150000 USD</span><input class="current-min" type="hidden" name="min_price" value="0"><input class="current-max" type="hidden" name="max_price" value="150000"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="sidebar widget advanced-search none-992">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <form method="GET">
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="property-sdtatus" tabindex="-98">
                                    <option>Property Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Property Status"><div class="filter-option"><div class="filter-option-inner">Property Status</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="property-type" tabindex="-98">
                                    <option>Property Type</option>
                                    <option>Apartments</option>
                                    <option>Houses</option>
                                    <option>Commercial</option>
                                    <option>Garages</option>
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Property Type"><div class="filter-option"><div class="filter-option-inner">Property Type</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="commercial" tabindex="-98">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Land</option>
                                    <option>Hotels</option>
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Commercial"><div class="filter-option"><div class="filter-option-inner">Commercial</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="form-group">
                                <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="location" tabindex="-98">
                                    <option>location</option>
                                    <option>New York</option>
                                    <option>Bangladesh</option>
                                    <option>India</option>
                                    <option>Canada</option>
                                </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="location"><div class="filter-option"><div class="filter-option-inner">location</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="bedrooms" tabindex="-98">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Bedrooms"><div class="filter-option"><div class="filter-option-inner">Bedrooms</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="bathroom" tabindex="-98">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Bathroom"><div class="filter-option"><div class="filter-option-inner">Bathroom</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="balcony" tabindex="-98">
                                            <option>Balcony</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Balcony"><div class="filter-option"><div class="filter-option-inner">Balcony</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="garage" tabindex="-98">
                                            <option>Garage</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Garage"><div class="filter-option"><div class="filter-option-inner">Garage</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><span class="min-value">0 Sq ft</span> <span class="max-value">10000 Sq ft</span><input class="current-min" type="hidden" name="min_area" value="0"><input class="current-max" type="hidden" name="max_area" value="10000"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000" data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><span class="min-value">0 USD</span> <span class="max-value">150000 USD</span><input class="current-min" type="hidden" name="min_price" value="0"><input class="current-max" type="hidden" name="max_price" value="150000"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Posts by category start -->
                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Category</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Single Family <span>(45)</span></a></li>
                            <li><a href="#">Apartment <span>(21)</span> </a></li>
                            <li><a href="#">Condo <span>(23)</span></a></li>
                            <li><a href="#">Multi Family <span>(19)</span></a></li>
                            <li><a href="#">Villa <span>(19)</span></a> </li>
                            <li><a href="#">Other <span>(22) </span></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
