
@extends('layouts.seller')

@section('title')
Create Service | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

  @include('layouts.backend_partials.status')

  <section class="content">


  <div class="row">
    <div class="col-xs-12">

      <div class="row clearfix">
        <form class="" method="POST" action="{{route('service.save')}}" enctype="multipart/form-data">
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
                    <label class="form-label">Service Name </label>
                    <input type="text" name="name" class="form-control" value="">

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
                    <label class="form-label"> Experience </label>
                    <input type="text" name="experience" class="form-control" value="">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" value=" {{ Auth::user()->phone }}">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">Min Price</label>
                    <input type="number" name="min_price" class="form-control">

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">Max Price</label>
                    <input type="number" name="max_price" class="form-control">

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
                        <input type="text" class="form-control" name="video_link">
                        <label class="form-label">Video</label>
                      </div>
                      <div class="help-info">Youtube Link</div>
                    </div>

                  </div>
                </div>

                <br>


                <div class="form-group">
                  <label class="form-label"> Upload Image </label>
                  <input class="form-control" name="file" type="file" >
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



    <form class="dropzone needsclick" id="demo-upload" action="" enctype="multipart/form-data">
    @csrf
      <div class="dz-message needsclick">    
        Drop files here or click to upload.<br>
        <span class="note needsclick">(This is just a demo dropzone. Selected 
        files are <strong>not</strong> actually uploaded.)</span>
      </div>
    </form>



      </div>
      <!-- /.row -->
    </div></div>




  <div id="dropzone">
    <form class="dropzone needsclick" id="demo-upload" action="" enctype="multipart/form-data">
    @csrf
      <div class="dz-message needsclick">    
        Drop files here or click to upload.<br>
        <span class="note needsclick">(This is just a demo dropzone. Selected 
        files are <strong>not</strong> actually uploaded.)</span>
      </div>
    </form>
  </div>









  <script type="text/javascript">
    

    var dropzone = new Dropzone('#demo-upload', {
  previewTemplate: document.querySelector('#preview-template').innerHTML,
  parallelUploads: 2,
  thumbnailHeight: 120,
  thumbnailWidth: 120,
  maxFilesize: 3,
  filesizeBase: 1000,
  thumbnail: function(file, dataUrl) {
    if (file.previewElement) {
      file.previewElement.classList.remove("dz-file-preview");
      var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
      for (var i = 0; i < images.length; i++) {
        var thumbnailElement = images[i];
        thumbnailElement.alt = file.name;
        thumbnailElement.src = dataUrl;
      }
      setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
    }
  }

});


// Now fake the file upload, since GitHub does not handle file uploads
// and returns a 404

var minSteps = 6,
    maxSteps = 60,
    timeBetweenSteps = 100,
    bytesPerStep = 100000;

dropzone.uploadFiles = function(files) {
  var self = this;

  for (var i = 0; i < files.length; i++) {

    var file = files[i];
    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

    for (var step = 0; step < totalSteps; step++) {
      var duration = timeBetweenSteps * (step + 1);
      setTimeout(function(file, totalSteps, step) {
        return function() {
          file.upload = {
            progress: 100 * (step + 1) / totalSteps,
            total: file.size,
            bytesSent: (step + 1) * file.size / totalSteps
          };

          self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
          if (file.upload.progress == 100) {
            file.status = Dropzone.SUCCESS;
            self.emit("success", file, 'success', null);
            self.emit("complete", file);
            self.processQueue();
            //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
          }
        };
      }(file, totalSteps, step), duration);
    }
  }
}




  </script>



</section>

  @endsection