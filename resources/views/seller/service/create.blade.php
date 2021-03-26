
@extends('layouts.seller')

@section('title', 'Create Service | ')

@section('content')

<style>
    .form-text{
        display: block
    }

    .file-upload .image-box {
        margin: 0 auto;
        margin-top: 1em;
        height: 15em;
        width: 100%;
        background: #d24d57;
        cursor: pointer;
        overflow: hidden;
    }

    .file-upload .image-box img {
        height: 100%;
        width: 100%;
        display: none;
    }

    .file-upload .image-box p {
        position: relative;
        top: 45%;
        color: #fff;
    }
</style>

<div class="content-wrapper" style="min-height: 868px;">
    @include('layouts.backend_partials.status')

    <section class="content-header">
        <h3 class="page-title">Create Service Page</h3>
        <p class="page-description">This is where you can create your service.</p>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div id="show_form" class="row clearfix">
                    <form action="{{route('service.save')}}" method="POST" class="" enctype="multipart/form-data" style="display: block;">@csrf
                        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <i class="fa fa-plus"></i>
                                    <h2 class="box-title"><strong>Create A Service</strong></h2>
                                    <small class="text-danger">* please fill all astericked fields</small>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="form-label">Service Name </label><small class="text-danger">*</small>
                                        <input readonly type="text" name="countdown" size="1" value="20" style="border: 0; padding: 0;margin-right: -25px"> chars left
                                        <input id='name' type="text" required name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter the name of the service you want to offer (e.g. Hair Stylist)" onkeydown="limitText(this.form.name,this.form.countdown,20);" onkeyup='limitText(this.form.name,this.form.countdown,20);'>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea id='description' name="description" class="form-control" placeholder="Tell us about your service.">{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Phone</label><small class="text-danger">*</small>
                                            <input id="phone" required type="number"  class="form-control" value="{{ old('phone') }}" placeholder="Enter your phone number (e.g. 09023456789)" name="phone" value=" {{ Auth::user()->phone }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" id="servicePriceRange">How much do you want to charge for this service?</label>
                                            <input id="min_price" type="text" value="{{ old('min_price') }}" placeholder="Enter the amount you want on this service (e.g. 20000)" name="min_price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="negotiableChBox">
                                        <div class="form-check">
                                            <input id="negotiable" class="form-check-input" type="checkbox" value="{{ old('negotiable') }}" name="negotiable">
                                            <label class="form-check-label" for="negotiable"> Is this service negotiable?</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Location</label><small class="text-danger">*</small>
                                            <select class="form-control" required id="state"  name="state">
                                                <option value="">-- Select State --</option>
                                                @if(isset($states))
                                                    @foreach($states as $state)
                                                        <option id="state" value="{{$state->name}}"> {{ $state->name }}  </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Local Government</label><small class="text-danger">*</small>
                                            <select class="form-control" id="city" name="city" required>
                                                <option disabled selected>- Select a State -</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input id="address" type="text"  value="{{ old('address') }}" class="form-control" name="address" placeholder="Enter your address here.">
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
                                <div class="box-body">
                                    <div class="form-group file-upload" id="file-upload1">
                                        <label>Upload Image</label>
                                        <small class="text-danger">*</small> <br>
                                        <small class="text-info">Choose a thumbnail for your service.</small>
                                        <div class="image-box text-center">
                                              <p>Select an Image</p>
                                              <img src="" alt="">
                                          </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="thumbnail" class="form-control show-tick" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <small class="text-danger">*</small>
                                        <select name="category_id" required class="form-control show-tick" id="categories">
                                            <option value="">-- Please select --</option>
                                            @foreach($category as $categories)
                                                <option id="category_id" value=" {{ $categories->id }} "> {{ $categories->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category <small class="text-info">(You can select multiple sub category)</small></label>
                                        <select name="sub_category[]" class="form-control show-tick" id="sub_categories" multiple>
                                            <option value="">-- Please select a category to populate this --</option>
                                            @foreach($subcategory as $subcategories)
                                                <option id="category_id" value=" {{ $subcategories->id }} "> {{ $subcategories->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-check">
                                            <input id="featured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="featuredCheckbbox()">
                                            <label class="form-check-label" for="featured"> Do you want this service featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label>
                                        </div>
                                        <p id="featuredText" class="text-info">This will attract a fee of &#8358;2000 which will be paid before the service is displayed.</p>
                                    </div>

                                    <div class="form-group" id="youtubeLink">
                                        <label for="" id="youtubeLink">Video (Youtube) <small>(Optional)</small></label>
                                        <input type="text" class="form-control" name="video_link">
                                        <div class="help-info">Youtube video Link</div>

                                    </div>
                                </div>

                                <div class="body">
                                    <a href=" {{ route('seller.service.all') }}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                                        <i class="fa fa-arrow-left"></i>
                                        <span> Bacj</span>
                                    </a>

                                    <button id="save_btn"  class="btn btn-warning btn-submit_service btn-lg m-t-15 waves-effect">
                                        <span>Next </span>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>

    </section>

    <div>
        <div id="featuredInfoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                        <h4 class="modal-title">How Featured Service Works</h4>
                    </div>
                    <div class="modal-body">
                        <p>You can take advantage of EFContacts Featured Service to get the attention of your potential customers/clients 😃. <br>
                            Providers who use the featured service will have their service displayed first on all important EFContact pages.
                            A featured service will be given search priority on EFContact. This means that featured services will get displayed first on a search result page.
                        </p>
                        <p><strong>Note:</strong> This will attract a fee of &#8358;2000 which will be paid before the service is display on our website and last for a period of one month.</p>
                        <p><strong>Take advantage of this to get the attention of your potential customers/clients 😃.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color: #cc8a19; color: #fff" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
    $('#state').on('change',function(){
        console.log('ddd');
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
            type:"GET",
                //url:"{{url('qqq')}}"+stateID,
                url: '../../api/get-city-list/'+stateID,
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

</script>

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

        if (categoryID == 1 || categoryID == 2) {
            document.getElementById("youtubeLink").style.display = 'none';
            document.getElementById("negotiableChBox").style.display = 'none';
            document.getElementById("servicePriceRange").innerText = 'Salary Range?';
        }
        else {
            document.getElementById("youtubeLink").style.display = 'block';
            document.getElementById("negotiableChBox").style.display = 'block';
            document.getElementById("servicePriceRange").innerText = 'How much do you want to charge for this service?';
        }

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
    //   Dropzone.options.dropzone =
    //   {
    //     maxFilesize: 12,
    //     renameFile: function (file) {
    //       var dt = new Date();
    //       var time = dt.getTime();
    //       return time + file.name;
    //     },
    //     acceptedFiles: ".jpeg,.jpg,.png,.gif",
    //     addRemoveLinks: true,
    //     timeout: 50000,
    //     removedfile: function (file) {
    //       var name = file.upload.filename;
    //       $.ajax({
    //         headers: {
    //           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         },
    //         type: 'POST',
    //         url: '{{ url("delete") }}',
    //         data: {filename: name},
    //         success: function (data) {
    //           console.log("File has been successfully removed!!");
    //         },
    //         error: function (e) {
    //           console.log(e);
    //         }
    //       });
    //       var fileRef;
    //       return (fileRef = file.previewElement) != null ?
    //       fileRef.parentNode.removeChild(file.previewElement) : void 0;
    //     },

    //     success: function (file, response) {
    //       console.log(response);
    //     },
    //     error: function (file, response) {
    //       return false;
    //     }
    //   };



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

  @endsection
