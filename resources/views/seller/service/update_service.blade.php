
@extends('layouts.seller')

@section('title', 'Update Service | ')

@section('content')

<style>
    .form-text{
        display: block
    }
</style>

<div class="content-wrapper" style="min-height: 868px;">

  @include('layouts.backend_partials.status')


  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="row clearfix">

          <form class="" method="POST" action="{{route('service.update', $service->slug )}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-pencil"></i>
                        <h2 class="box-title"><strong>Update {{$service->name}}</strong></h2>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="form-label">Service Name </label>
                        <input readonly type="text" name="countdown" size="1" value="50" style="border: 0; padding: 0;margin-right: -25px"> chars left
                        <input id='name' type="text" required name="name" value="{{ $service->name }}" class="form-control" placeholder="Enter the name of the service you want to offer (e.g. Hair Stylist)" onkeydown="limitText(this.form.name,this.form.countdown,50);" onkeyup='limitText(this.form.name,this.form.countdown,50);'>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea id='description' name="description" class="form-control summernote" placeholder="Tell us about your service.">{!! $service->description !!}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input id="phone" required type="number"  class="form-control" value="{{ $service->phone == 'null' ? '080xxxx' : $service->phone }}" placeholder="Enter your phone number (e.g. 09023456789)" name="phone">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" id="servicePriceRange">How much do you want to charge for this service?</label>
                            <input id="min_price" type="text" value="{{ $service->min_price }}" placeholder="Enter the amount you want on this service (e.g. 20000)" name="min_price" class="form-control">
                        </div>
                    </div>

                    {{-- <div class="col-md-12" id="negotiableChBox">
                        <div class="form-check">
                            <input id="negotiable" class="form-check-input" type="checkbox" value="{{ old('negotiable') }}" name="negotiable" {{ $service->is_featured == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="negotiable"> Is this service negotiable?</label>
                        </div>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <select class="form-control" id="state"  name="state">
                                <option value="">-- Select State --</option>
                                @if(isset($states))
                                    @foreach($states as $state)
                                        <option id="state" value="{{ $state->name }}" {{ trim($service->state) == trim($state->name) ? 'selected' : '' }}> {{ $state->name }}  </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Local Government</label>
                            <select class="form-control" id="city" name="city">
                                <option value="{{ $service->city }}" selected>{{ $service->city }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input id="address" type="text"  value="{{ $service->address }}" class="form-control" name="address" placeholder="Enter your address here.">
                        </div>
                    </div>

                    <div class="form-group" style="visibility: hidden">
                        <label for=""></label>
                        <textarea name="nearby" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="box box-default">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Select Category</label>
                            <small class="text-danger">*</small>
                            <select name="category_id" required class="form-control show-tick" id="categories">
                                <option value="">-- Please select --</option>
                                @foreach($category as $categories)
                                    <option id="category_id" value="{{ $categories->id }}" {{ $categories->id == $service->category_id ? 'selected' : '' }} {{ $categories->id == 1 ? 'disabled' : '' }}> {{ $categories->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sub Category <small class="text-info">(You can select multiple sub category)</small></label>
                            <select name="sub_category[]" class="form-control show-tick" id="sub_categories" multiple>
                                {{-- @foreach($subcategory as $subcategories)
                                    <option value="{{ $subcategories->id }}" {{ $service->category_id == $subcategories->category_id  ? 'selected' : '' }}> {{ $subcategories->name }} </option>
                                @endforeach --}}

                                @foreach($subcategories as $sub_category)
                                    @foreach($service->sub_categories as $subcategory)
                                        <option value="{{ $sub_category->id }}" {{ $sub_category->id == $subcategory->id  ? 'selected' : '' }}> {{ $sub_category->name }} </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input id="featured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="featuredCheckbbox()" {{ $service->is_featured == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured"> Do you want this service featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label>
                            </div>
                            <p id="featuredText" class="text-info">This will attract a fee of &#8358;2000 which will be paid before the service is displayed.</p>
                        </div>

                        <div class="form-group" id="youtubeLink">
                            <label for="" id="youtubeLink">Video (Youtube) <small>(Optional)</small></label>
                            <input type="text" class="form-control" name="video_link" value="{{ $service->video_link }}">
                            <div class="help-info">Youtube video Link</div>

                        </div>
                    </div>

                    <div class="body">
                        <a href=" {{ route('seller.service.all') }}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                            <i class="fa fa-arrow-left"></i>
                            <span> Back</span>
                        </a>

                        <button type="submit" id="save_btn" class="btn btn-warning btn-submit_service btn-lg m-t-15 waves-effect">
                            <span>Submit </span>
                            <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>

              </div>


            </form>

            </div>
            <!-- /.row -->
          </div>
        </div>


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
                                    @if ($service->images->count() != 1)
                                        <a href="{{ route('service.image.delete', ['id' => $image->id, 'service_id' => $service->id]) }}" style="display:block">Delete</a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p>You don't have other images yet!</p>
                        @endforelse
                    </div>

                    @if (Auth::User()->badgetype == 1 && $service->images->count() < 10)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 10 - $service->images->count() }} image{{ 10 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
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
                    @elseif (Auth::User()->badgetype == 2 && $service->images->count() < 8)
                        <p style="color: rgb(252, 85, 85); font-size: 16px"> {{ 8 - $service->images->count() }} image{{ 8 - $service->images->count() > 1 ? 's' : '' }} remaining.</p>
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
                    @elseif (Auth::User()->badgetype == 3 && $service->images->count() < 6)
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
                    @elseif (Auth::User()->badgetype == 4 && $service->images->count() < 4)
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
                    @else
                        <p style="font-size: 16px; text-align:center; margin: 20px 0"><a href="{{ route('seller.service.badges') }}" style="color: #cc8a19;" >Upgrade</a> your account with a badge to upload more images.</p>
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


    <script type="text/javascript">
        var checkBox = document.getElementById("featured");
        var text = document.getElementById("featuredText");
        text.style.display = "none";

        function featuredCheckbbox() {
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        $(document).ready(function() {
            var service_id
        });


        $('#categories').on('change',function(){
            var categoryID = $(this).val();

            if(categoryID){
                $.ajax({
                    type:"GET",
                    url: '/api/get-category-list/'+categoryID,
                    success:function(res){
                        if(res){
                        var res = JSON.parse(res);
                            $("#sub_categories ").empty();
                            $.each(res, function(key,value){
                            var chosen_value = value;
                                $("#sub_categories").append(
                                    '<option value="'+chosen_value.id+'">'+chosen_value.name+'</option>'
                                );
                            });
                        }else{
                            $("#sub_categories").empty();
                        }
                    }
                });
            }else{
                $("#sub_categories").empty();
            }
        });
    </script>

    <script type="text/javascript">
        $('#state').on('change',function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:"GET",
                    url: '/api/get-city-list/'+stateID,
                    success:function(res){
                        if(res){
                        console.log(res);
                        console.log(stateID);
                        $("#city").empty();
                        $.each(res,function(key,value){
                        $("#city").append('<option value="'+value+'">'+value+'</option>');
                        });

                    }else{
                        $("#city").empty();
                    }
                    }
                });
            }else{
                $("#city").empty();
            }

        });

        $(".image-box").click(function(event) {
            var previewImg = $(this).children("img");
            $(this)
            .siblings()
            .children("input")
            .trigger("click");

            $(this)
            .siblings()
            .children("input")
            .change(function() {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var urll = e.target.result;
                    $(previewImg).attr("src", urll);
                    previewImg.parent().css("background", "transparent");
                    previewImg.show();
                    previewImg.siblings("p").hide();
                };
                reader.readAsDataURL(this.files[0]);
            });
        });


        function limitText(limitField, limitCount, limitNum) {
          if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
          } else {
            limitCount.value = limitNum - limitField.value.length;

            if (limitCount.value == 0) {
                limitField.style.border = '1px solid red'
                limitCount.style.color = 'red'
            }else{
                limitField.style.border = '1px solid #d2d6de'
                limitCount.style.color = '#333333'
            }
          }
        }

    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script type="text/javascript">
        $('.summernote').summernote({
            height: 120,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endsection
