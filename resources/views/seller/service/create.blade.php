
@extends('layouts.seller')

@section('title')
 Create Service | 
@endsection

@section('content')

<div class="container">

    <div class="row">
      <div class="col-xs-12">

    <div class="row clearfix">
        <form action="https://www.efcontact.com/admin/properties" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="l8VkEBX7AC2q66LoHaHx1KYCZun5Lqk23geAZrRp">        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-plus"></i>

                  <h2 class="box-title"><strong>Create Service </strong></h2>
                </div>
                <div class="body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Service Title</label>
                            <input type="text" name="title" class="form-control" value="">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Bedroom</label>
                            <input type="number" class="form-control" name="bedroom">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Bathroom</label>
                            <input type="number" class="form-control" name="bathroom">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" name="state" autocomplete="" aria-autocomplete="" value="">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Garage</label>
                            <input type="number" name="garage" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Area</label>
                            <input type="number" class="form-control" name="area">

                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in">
                        <label for="featured">Featured</label>
                    </div>
                    </div>

                    <hr>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nearby</label>
                            <textarea name="nearby" class="form-control"></textarea>
                        </div>
                        </div>

                    <div class="form-group" style="visibility: hidden">
                        <label for=""></label>
                        <textarea name="nearby" class="form-control"></textarea>
                    </div>


                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Gallery Image</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="gallaryimage[]" type="file" multiple="">
                    <span class="helper-text" data-error="wrong" data-success="right">Upload one or more images</span>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="body">

                    <div class="form-group">
                        <label>Select Purpose</label>
                        <select name="purpose" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                            <option value="sale">Sale</option>
                            <option value="rent">Rent</option>
                        </select>
                    </div>

                        <div class="form-group">
                            <label>Furnishing</label>
                            <select class="form-control select2" style="width: 100%;" name="furnishing">
                                <option value="">-- Please select --</option>
                                <option value="Furnished">Furnished</option>
                                <option value="Self Furnished">Self Furnished</option>
                                <option value="Unfurnished">Unfurnished</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Property type</label>
                            <select name="type" class="form-control show-tick">
                                <option value="">-- Please select --</option>
                                <option value="Bungalow">Bungalow</option>
                                <option value="Duplex">Duplex</option>
                                <option value="Flat">Flat</option>
                                <option value="House">House</option>
                                <option value="Duplex">Duplex</option>
                                <option value="Garage">Garage</option>
                                <option value="Mini Flat">Mini Flat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Condition</label>
                            <select class="form-control select2" style="width: 100%;" name="item_condition">
                                <option value="">-- Please select --</option>&gt;
                                <option value="New Built">New Built</option>
                                <option value="Farly Used">Farly Used</option>
                                <option value="Old">Old</option>
                            </select>
                        </div>

                        <h5><strong>Features</strong></h5>

                        <div class="form-group demo-checkbox">
                                                            <input type="checkbox" id="features-2" name="features[]" class="filled-in chk-col-indigo" value="2">
                                <label for="features-2">baker</label>
                                                            <input type="checkbox" id="features-1" name="features[]" class="filled-in chk-col-indigo" value="1">
                                <label for="features-1">carpenter </label>
                                                            <input type="checkbox" id="features-3" name="features[]" class="filled-in chk-col-indigo" value="3">
                                <label for="features-3">shoe maker</label>
                                                    </div>
                    <h5><strong>Google Map</strong></h5>
                    <div class="clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Latitude</label>
                                <input type="text" name="location_latitude" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Longitude</label>
                                <input type="text" name="location_longitude" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>


            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Property Video</h3>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="video">
                            <label class="form-label">Video</label>
                        </div>
                        <div class="help-info">Youtube Link</div>
                    </div>

                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Floor Plan</h3>
                </div>
                <div class="body">
                    <div class="form-group">
                        <input type="file" name="floor_plan">
                    </div>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Featured Image</h3>
                </div>
                <div class="body">

                    <div class="form-group">
                        <input type="file" name="image">
                    </div>

                    
                    <a href="https://www.efcontact.com/admin/properties" class="btn btn-danger btn-lg m-t-15 waves-effect">
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
</div></div>


@endsection