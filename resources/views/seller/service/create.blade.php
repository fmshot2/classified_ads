
@extends('layouts.seller')

@section('title')
Create Service | 
@endsection

@section('content')

<br>
<hr>


<div class="container">

    <div class="row">
      <div class="col-xs-12">

        <div class="row clearfix">
          <form class="" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                <div class="box box-default">
                    <br>
                    <div class="box-header with-border">
                      <i class="fa fa-plus"></i>
                      <h2 class="box-title"><strong>Create Service </strong></h2>
                  </div>
                  <div class="body">

                    <div class="col-md-12">

                        <br>

                        <div class="form-group">
                            <label class="form-label">Service Title</label>
                            <input type="text" name="title" class="form-control" value="">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Min Price</label>
                            <input type="number" name="price" class="form-control">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Max Price</label>
                            <input type="number" name="price" class="form-control">

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
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
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
                          <h3 class="box-title"> Service Video</h3>
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

                <br>


                <div class="form-group">
                    <label class="form-label"> Upload Image </label>
                    <input class="form-control" name="gallaryimage[]" type="file" multiple>
                    <span class="helper-text" data-error="wrong" data-success="right">Upload min </span>
                </div>

                <br>

                <div class="form-group">
                    <label>Select Category</label>
                    <select name="category_id" class="form-control show-tick">
                        <option value="">-- Please select --</option>
                        @foreach($category as $categories)
                        <option value=" {{ $categories->id }} "> {{ $categories->name }} </option>
                        @endforeach
                    </select>
                </div>

                <br>

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
</div></div>


</section>





@endsection