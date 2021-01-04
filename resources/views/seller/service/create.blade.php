
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
              <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-plus"></i>

                  <h2 class="box-title"><strong>Create A Service</strong></h2>
                  <small class="text-danger">*please fill all required fields</small>
                </div>
                <div class="body">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Service Name </label><small class="text-danger">*required*</small>
                      <input type="text" required name="name" class="form-control" value="">
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
                      <label class="form-label"> Experience (in years)</label><small class="text-danger">*required*</small>
                      <input type="number" required name="experience" placeholder="Insert a number" class="form-control" value="">
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Phone</label><small class="text-danger">*required*</small>
                      <input type="number" class="form-control" placeholder="numbers only" name="phone" value=" {{ Auth::user()->phone }}">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Min Price</label>
                      <input type="text" placeholder="e.g 2000 per hour" name="min_price" class="form-control">

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Max Price</label>
                      <input type="number" placeholder="e.g 2000 per hour" name="max_price" class="form-control">

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">State</label><small class="text-danger">*required*</small>
                      <input type="text" required class="form-control" name="state" autocomplete="" aria-autocomplete="" value="">

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">City</label><small class="text-danger">*required*</small>
                      <input type="text" required class="form-control" name="city">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Address</label><small class="text-danger">*required*</small>
                      <input type="text" required class="form-control" name="address">
                    </div>
                  </div>


                  <div class="form-group" style="visibility: hidden">
                    <label for=""></label>
                    <textarea name="nearby" class="form-control"></textarea>
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
                      <span class="helper-text" data-error="wrong" data-success="right">Upload image</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Select Category</label>
                    <small class="text-danger">*required*</small>
                    <select name="category_id" required class="form-control show-tick">
                      <option value="">-- Please select --</option>
                      @foreach($category as $categories)
                      <option value=" {{ $categories->id }} "> {{ $categories->name }} </option>
                      @endforeach
                    </select>
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
































































































































{{--

            <form action="{{route('service.save')}}" method="post" name="file" files="true" enctype="multipart/form-data" class="dropzone" id="image-upload">
                @csrf
                <div>
                <h3 class="text-center">Upload Multiple Images</h3>
            </div>    
            <button type="submit"> Upload Img</button>
            </form>


<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.svg"
        };
</script>

--}}




@endsection