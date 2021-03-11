
@extends('layouts.seller')

@section('title', 'Create Service | ')

@section('content')

<style>
    .form-text{
        display: block
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
                                            <label class="form-label"> Experience (in years)</label>
                                            <input id='experience' type="number"  value="{{ old('experience') }}" name="experience" placeholder="How many years of experience do you have for this service? (e.g. 5)" class="form-control" value="">
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
                                            <label class="form-label">How much do you want to charge for this service?</label>
                                            <input id="min_price" type="text" value="{{ old('min_price') }}" placeholder="Enter the amount you want on this service (e.g. 20000)" name="min_price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input id="negotiable" class="form-check-input" type="checkbox" value="{{ old('negotiable') }}" name="negotiable">
                                            <label class="form-check-label" for="negotiable"> Negotiable</label>
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

                                    <div class="">
                                        <h3 class="box-title"> Service Video</h3>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="video_link">
                                            <label class="form-label">Video</label>
                                        </div>
                                        <div class="help-info">Youtube Link</div>

                                    </div>
                                </div>

                                <div class="body">
                                    <a href=" {{ route('seller.service.all') }}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                                        <i class="fa fa-arrow-left"></i>
                                        <span>BACK</span>
                                    </a>

                                    <button id="save_btn"  class="btn btn-primary btn-submit_service btn-lg m-t-15 waves-effect">
                                        <i class="fa fa-save"></i>
                                        <span>Submit</span>
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

</script>

    <script type="text/javascript">
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
      Dropzone.options.dropzone =
      {
        maxFilesize: 12,
        renameFile: function (file) {
          var dt = new Date();
          var time = dt.getTime();
          return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function (file) {
          var name = file.upload.filename;
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("delete") }}',
            data: {filename: name},
            success: function (data) {
              console.log("File has been successfully removed!!");
            },
            error: function (e) {
              console.log(e);
            }
          });
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function (file, response) {
          console.log(response);
        },
        error: function (file, response) {
          return false;
        }
      };



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
