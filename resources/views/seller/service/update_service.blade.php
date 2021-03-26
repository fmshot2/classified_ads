
@extends('layouts.seller')

@section('title', 'Update Service | ')

@section('content')

<div class="content-wrapper" style="min-height: 868px;">

  @include('layouts.backend_partials.status')


  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="row clearfix">

          <form class="" method="POST" action="{{route('service.update', $service->id )}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-plus"></i>

                  <h2 class="box-title"><strong>Update Details For {{$service->name}}</strong></h2>
                  <small class="text-danger">*Please Fill All Required Fields</small>
                </div>
                <div class="body">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Service Name* </label>
                      <input type="text"  name="name" class="form-control" value=" {{ $service->name }}">
                      <!-- <small class="text-danger">required*</small> -->
                    </div>
                  </div>




                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Description*</label>
                      <textarea name="description"  class="form-control"> {{ $service->description }}</textarea>
                    </div>
                    <!-- <small class="text-danger">required*</small> -->
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label"> Experience*(in years) </label>
                      <input type="text" name="experience" class="form-control" value=" {{$service->experience }} ">
                      <!-- <small class="text-danger">required*</small> -->
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Phone*</label>
                      <input type="number"  class="form-control" name="phone" value="{{$service->phone }}">
                      <!-- <small class="text-danger">required*</small>                     -->
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Min Price</label>
                      <input type="number" name="min_price" placeholder="e.g 2000 per hr" class="form-control" value="{{$service->min_price }}">
                    </div>
                  </div>

                 {{--  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Max Price</label>
                      <input type="number" name="max_price" class="form-control" value=" {{$service->max_price }}">

                    </div>
                  </div> --}}

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">State*</label>
                      <input type="text" class="form-control" name="state" autocomplete="" aria-autocomplete="" value=" {{ $service->state }}">
                      <!-- <small class="text-danger">required*</small> -->
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">City*</label>
                      <input type="text" class="form-control" name="city" value=" {{ $service->city }}">
                      <!-- <small class="text-danger">required*</small>                      -->
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Street Address*</label>
                      <input type="text" class="form-control" name="address" value=" {{ $service->address }}">
                      <!-- <small class="text-danger">required*</small> -->
                    </div>
                  </div>


                  <div class="form-group" style="visibility: hidden">
                    <label for=""></label>
                    <textarea name="nearby" class="form-control"></textarea>
                  </div>
                  <input type="hidden" class="form-control" name="phone" value=" {{ $service->phone == 'null' ? '080xxxx' : $service->phone }}">



                </div>
              </div>


            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="body">


                  {{-- <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Gallery Image</h3>
                    </div>
                    <div class="body">
                      <input class="form-control"  name="files[]" multiple type="file">
                      <span class="helper-text" data-error="wrong" data-success="right">Upload one or more images</span>
                      <small class="text-danger">required*</small>
                    </div>
                  </div> --}}



                  <div class="form-group">
                    <label>Select Category</label>
                    <select name="category_id"  class="form-control show-tick">
                      <option value=" ">-- Please select --</option>
                      @foreach($category as $categories)
                      <option value=" {{ $categories->id }} "> {{ $categories->name }} </option>
                      @endforeach
                    </select>
                    <small class="text-danger">required*</small>
                  </div>

                </div>

                <div class="form-group form-float">
                    <label for="">Video (Youtube)</label>
                    <div class="form-line">
                    <input type="text" class="form-control" name="video_link" value=" {{ $service->video_link }}">
                    </div>
                    <div class="help-info">Youtube Link</div>
                </div>



                <div class="box box-default">
                    <div class="body">
                      <a href=" {{ route('seller.service.all') }}" class="btn btn-warning btn-lg m-t-15 waves-effect">
                        <i class="fa fa-arrow-left"></i>
                        <span>BACK</span>
                      </a>

                      <button type="submit" class="btn btn-warning btn-lg m-t-15 waves-effect">
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

{{-- Previous imaging system --}}

         {{--  <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Your Images</h3>
              <button class="btn btn-toolbar" onclick="showDropzone()">Add More Images</button>
            </div>
            <div class="body">


             @if(isset($images_4_service))

             <table class="table">
              <thead>

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($images_4_service as $key => $image)

                <tr>
                  <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>

  <form class="" method="GET" action="{{route('service.updateImage', $image )}}" enctype="multipart/form-data">
            {{ csrf_field() }}
                              <td>
                                <img src="{{asset('uploads/services')}}/{{$image->image_path}}" alt="service image" width="60" class="img-responsive img-rounded">

                            </td>
                  <td><button type="submit" class="btn-danger">Delete</button></td>
                  </form>
                </tr>
                @endforeach

              </tbody>
            </table>
            @endif

          </div>
        </div> --}}

        {{-- End Previous imaging system --}}


 <div class="box box-default">
                <div class="box-header">
                    <h2 class="box-title" style="font-weight: 700">Service Images</h2>
                    <p class="text-danger" style="font-weight: 2700">Drag and drop more images here to describe your service!</p>
                </div>
                <div class="box-body">
                        @forelse ($service->images as $image)
                            <div style="display: inline-flex; flex-wrap: wrap">
                                <div>
                                    <img src="{{ asset('uploads/services/'.$image->image_path) }}" alt="" style="display: block;width:100px;">
                                    <a href="{{ route('service.image.delete', ['id' => $image->id]) }}" style="display:block">Delete</a>
                                </div>
                            </div>
                        @empty
                            <p>You don't have other images yet!</p>
                        @endforelse
                    </div>

                    @if (Auth::User()->badgetype == 1 && $service->images->count() < 8)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 8 - $service->images->count() }} image{{ 8 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <p> {{ 8 - $service->images->count() }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @elseif (Auth::User()->badgetype == 2 && $service->images->count() < 6)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 6 - $service->images->count() }} image{{ 6 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @elseif (Auth::User()->badgetype == 3 && $service->images->count() < 4)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 4 - $service->images->count() }} image{{ 4 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @elseif (Auth::User()->badgetype == 4 && $service->images->count() < 2)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 2 - $service->images->count() }} image{{ 2 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
                        <form action="{{ route('service.images.store', ['id' => $service->id]) }}" method="POST" class="dropzone" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-default dz-message">
                                Click here to add your images <br>
                                <small style="color: rgb(182, 66, 66) !important">When you are done click the upload button down below!</small>
                            </div>
                        </form>
                        <br>
                        <center>
                            <button id="submit-all" class="btn btn-success" style="height: 40px;"> Click to upload</button>
                            <a href="{{ route('serviceDetail', ['slug' => $service->slug]) }}" class="btn btn-danger show-page-vs-btn" style="height: 40px; line-height: 29px;" target="_blank"> View Service</a>
                        </center>
                    @else
                        <p style="font-size: 16px; text-align:center; margin: 20px 0"><a href="{{ route('seller.service.badges') }}" style="color: #cc8a19;" >Upgrade</a> your account with a badge to upload images</p>
                    @endif

                </div>

      </section>


    </div>
  {{--   <script type="text/javascript">
      function showDropzone() {
        do
      }
    </script> --}}

    <script>
      function deleteImage(image) {
        alert(image);
        event.preventDefault();
        if (confirm("Are you sure?")) {

          $.ajax({
            url: 'delete/image/' + id,
            method: 'get',
            success: function(result){
              alert('successfull')
              window.location.assign(window.location.href);
            }
          });

        } else {

          console.log('Delete process cancelled');

        }

      }
    </script>

@endsection


@section('extra-scripts')
    @if (Auth::User()->badgetype == 1 && $service->images->count() != 8)
        <input hidden id="badge_type_1" type="number" value="{{  8 - $service->images->count() }}">
        <input hidden id="user_1_image_remaining" type="number" value="{{ (8 - $service->images->count()) > 1 ? 's' : '' }}">
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFiles: document.getElementById('badge_type_1').value,
                maxFilesize: 10,
                parallelUploads: 7,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                autoProcessQueue: false,
                init: function() {
                    var dpzMultipleFiles = this;
                    var submitButton = document.querySelector("#submit-all");
                    submitButton.addEventListener("click", function () {
                        dpzMultipleFiles.processQueue();
                    });

                    this.on("queuecomplete", function () {
                        location.reload();
                    });
                    this.on("maxfilesexceeded", function(file){
                        toastr.error("You can't upload more than " + document.getElementById('badge_type_1').value + " file"+document.getElementById('user_1_image_remaining').value+".");
                    });
                },
                success: function(file, response)
                {
                    file.previewElement.id = response.success;
                    var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                    file.previewElement.querySelector("img").alt = response.success;
                    olddatadzname.innerHTML = response.success;
                },
                error: function(file, response)
                {
                    if($.type(response) === "string")
                        var message = response; //dropzone sends it's own error messages in string
                    else
                        var message = response.message;
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                }
            };
        </script>

    @elseif (Auth::User()->badgetype == 2 && $service->images->count() != 6)
        <input hidden id="badge_type_2" type="number" value="{{ 6 - $service->images->count() }}">
        <input hidden id="user_2_image_remaining" type="number" value="{{ (6 - $service->images->count()) > 1 ? 's' : '' }}">
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFiles: document.getElementById('badge_type_2').value,
                maxFilesize: 10,
                parallelUploads: 5,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                autoProcessQueue: false,
                init: function() {
                    var dpzMultipleFiles = this;
                    var submitButton = document.querySelector("#submit-all");
                    submitButton.addEventListener("click", function () {
                        dpzMultipleFiles.processQueue();
                    });

                    this.on("queuecomplete", function () {
                        location.reload();
                    });
                    this.on("maxfilesexceeded", function(file){
                        toastr.error("You can't upload more than " + document.getElementById('badge_type_2').value + " file"+document.getElementById('user_2_image_remaining').value+".");
                    });
                },
                success: function(file, response)
                {
                    file.previewElement.id = response.success;
                    var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                    file.previewElement.querySelector("img").alt = response.success;
                    olddatadzname.innerHTML = response.success;
                },
                error: function(file, response)
                {
                    if($.type(response) === "string")
                        var message = response; //dropzone sends it's own error messages in string
                    else
                        var message = response.message;
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                }
            };
        </script>
    @elseif (Auth::User()->badgetype == 3 && $service->images->count() != 4)
        <input hidden id="badge_type_3" type="number" value="{{  4 - $service->images->count() }}">
        <input hidden id="user_3_image_remaining" type="text" value="{{ (4 - $service->images->count()) > 1 ? 's' : '' }}">
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFiles: document.getElementById('badge_type_3').value,
                maxFilesize: 10,
                parallelUploads: 3,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                autoProcessQueue: false,
                init: function() {
                    var dpzMultipleFiles = this;
                    var submitButton = document.querySelector("#submit-all");
                    submitButton.addEventListener("click", function () {
                        dpzMultipleFiles.processQueue();
                    });

                    this.on("queuecomplete", function () {
                        location.reload();
                    });
                    this.on("maxfilesexceeded", function(file){
                        toastr.error("You can't upload more than " + document.getElementById('badge_type_3').value + " file"+ document.getElementById('user_3_image_remaining').value + ".");
                    });
                },
                success: function(file, response)
                {
                    file.previewElement.id = response.success;
                    var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                    file.previewElement.querySelector("img").alt = response.success;
                    olddatadzname.innerHTML = response.success;
                },
                error: function(file, response)
                {
                    if($.type(response) === "string")
                        var message = response; //dropzone sends it's own error messages in string
                    else
                        var message = response.message;
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                }
            };
        </script>
    @elseif (Auth::User()->badgetype == 4 && $service->images->count() != 2)
        <input hidden id="badge_type_4" type="number" value="{{  2 - $service->images->count() }}">
        <input hidden id="user_4_image_remaining" type="number" value="{{ (2 - $service->images->count()) > 1 ? 's' : '' }}">
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFiles: document.getElementById('badge_type_4').value,
                maxFilesize: 10,
                parallelUploads: 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                autoProcessQueue: false,
                init: function() {
                    var dpzMultipleFiles = this;
                    var submitButton = document.querySelector("#submit-all");
                    submitButton.addEventListener("click", function () {
                        dpzMultipleFiles.processQueue();
                    });

                    this.on("queuecomplete", function () {
                        location.reload();
                    });
                    this.on("maxfilesexceeded", function(file){
                        toastr.error("You can't upload more than " + document.getElementById('badge_type_4').value + " file"+ document.getElementById('user_4_image_remaining').value +".");
                    });
                },
                success: function(file, response)
                {
                    file.previewElement.id = response.success;
                    var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
                    file.previewElement.querySelector("img").alt = response.success;
                    olddatadzname.innerHTML = response.success;
                },
                error: function(file, response)
                {
                    if($.type(response) === "string")
                        var message = response; //dropzone sends it's own error messages in string
                    else
                        var message = response.message;
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                }
            };
        </script>
    @endif
@endsection
