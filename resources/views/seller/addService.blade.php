
@extends('layouts.app')

@section('title')
 Create Service | 
@endsection

@section('content')


<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Submit Service</h1>
            <ul>
                <li><span>/</span>Service Offer</li>
            </ul>
        </div>
    </div>
</div>




<div class="submit-property content-area">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="notification-box bg-warning">
                    <h3>Don't Have an Account?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor at tellus feugiat congue quis ut nunc. Semper ac dolor vitae accumsan.</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="submit-address">
                    <form method="GET">
                        <h3 class="heading-2">Basic Information</h3>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Property Title</label>
                                        <input type="text" class="input-text" name="your name" placeholder="John dae">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">

  <div class="form-group">
    <label for="exampleFormControlSelect1"> Status </label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option> For S</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Category Type</label>
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="apartment" tabindex="-98">
                                            <option>Apartment</option>
                                            <option>House</option>
                                            <option>Commercial</option>
                                            <option>Garage</option>
                                            <option>Lot</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Apartment"><div class="filter-option"><div class="filter-option-inner">Apartment</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Area/Location</label>
                                        <input type="text" class="input-text" name="your name" placeholder="SqFt">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Rooms</label>
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="1" tabindex="-98">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="1"><div class="filter-option"><div class="filter-option-inner">1</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Bathroom</label>
                                        <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="1" tabindex="-98">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="1"><div class="filter-option"><div class="filter-option-inner">1</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="heading-2">Property Gallery</h3>
                        <div id="myDropZone" class="dropzone dropzone-design mb-50 dz-clickable">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                        </div>
                        <h3 class="heading-2">Location</h3>
                        <div class="row mb-30">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="input-text" name="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="choose-citys" tabindex="-98">
                                        <option>Choose Citys</option>
                                        <option>New York</option>
                                        <option>Los Angeles</option>
                                        <option>Chicago</option>
                                        <option>Brooklyn</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Choose Citys"><div class="filter-option"><div class="filter-option-inner">Choose Citys</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="choose-state" tabindex="-98">
                                        <option>Choose State</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Colorado</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Choose State"><div class="filter-option"><div class="filter-option-inner">Choose State</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Detailed Information</h3>
                        <div class="row mb-50">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label>Detailed Information</label>
                                    <textarea class="input-text" name="message" placeholder="Detailed Information"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Building Age <span>(optional)</span></label>
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="years" tabindex="-98">
                                        <option>0-1 Years</option>
                                        <option>0-5 Years</option>
                                        <option>0-10 Years</option>
                                        <option>0-20 Years</option>
                                        <option>0-40 Years</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="0-1 Years"><div class="filter-option"><div class="filter-option-inner">0-1 Years</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bedrooms (optional)</label>
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="1" tabindex="-98">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="1"><div class="filter-option"><div class="filter-option-inner">1</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bathrooms (optional)</label>
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="1" tabindex="-98">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="1"><div class="filter-option"><div class="filter-option-inner">1</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Features (optional)</h3>
                        <div class="row mb-40">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Free Parking
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox2" type="checkbox">
                                            <label for="checkbox2">
                                                Air Condition
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox3" type="checkbox">
                                            <label for="checkbox3">
                                                Places to seat
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox4" type="checkbox">
                                            <label for="checkbox4">
                                                Swimming Pool
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox5" type="checkbox">
                                            <label for="checkbox5">
                                                Laundry Room
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox6" type="checkbox">
                                            <label for="checkbox6">
                                                Window Covering
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox7" type="checkbox">
                                            <label for="checkbox7">
                                                Central Heating
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-theme checkbox-circle">
                                            <input id="checkbox8" type="checkbox">
                                            <label for="checkbox8">
                                                Alarm
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading-2">Contact Details</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="input-text" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="input-text" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" class="input-text" name="phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="#" class="btn btn-md btn-warning mb-30"> Submit </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection