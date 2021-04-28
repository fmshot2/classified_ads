
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
                    <form id="serviceForm" action="{{route('service.save')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <i class="fa fa-plus"></i>
                                    <h2 class="box-title"><strong>Create A Service</strong></h2>
                                    <small class="text-danger">* please fill all astericked fields</small>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <small class="text-danger">*</small>
                                                <select name="category_id" required class="form-control show-tick" id="categories">
                                                    <option value="">- Please select -</option>
                                                    @foreach($category as $categories)
                                                        <option id="category_id" value=" {{ $categories->id }} "> {{ $categories->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Service Name </label><small class="text-danger">*</small>
                                                <input readonly type="text" name="countdown" size="1" value="50" style="border: 0; padding: 0;margin-right: -25px"> chars left
                                                <input id='name' type="text" required name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter the name of the service you want to offer (e.g. Bag, Plumber, Phone, etc.)" onkeydown="limitText(this.form.name,this.form.countdown,50);" onkeyup='limitText(this.form.name,this.form.countdown,50);'>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Description</label><small class="text-danger">*</small>
                                                <textarea id='description' name="description" class="form-control summernote" placeholder="Tell us about your service." required>{{ old('description') }}</textarea>
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

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Location</label><small class="text-danger">*</small>
                                                <select class="form-control" required id="state"  name="state">
                                                    <option value="">- Select State -</option>
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
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="form-group file-upload" id="file-upload1">
                                        <label>Upload Image</label>
                                        <small class="text-danger">*</small> <br>
                                        <small class="text-info">Choose an image for your service (.jpg, .jpeg, .png).</small>
                                        <div class="image-box text-center">
                                              <p>Select an Image</p>
                                              <img src="" alt="">
                                          </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="thumbnail" class="form-control show-tick" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Sub Category <small class="text-info">(You can select multiple sub category)</small></label>
                                                <select name="sub_category[]" class="form-control show-tick" id="sub_categories" multiple>
                                                    <option value="">- Please select a category to populate this -</option>
                                                    @foreach($subcategory as $subcategories)
                                                        <option id="category_id" value=" {{ $subcategories->id }} "> {{ $subcategories->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-12" id="negotiableChBox">
                                            <div class="form-check">
                                                <input id="negotiable" class="form-check-input" type="checkbox" value="{{ old('negotiable') }}" name="negotiable">
                                                <label class="form-check-label" for="negotiable"> Is this service negotiable?</label>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input id="featured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="featuredCheckbox()">
                                                    <label class="form-check-label" for="featured"> Do you want this service featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label>
                                                </div>
                                                <p id="featuredText" class="text-info">This will attract a fee of &#8358;2000 which will be paid before the service is displayed.</p>
                                            </div>
                                        </div>
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
                                        <span> Back</span>
                                    </a>

                                    <button id="save_btn"  class="btn btn-warning btn-submit_service btn-lg m-t-15 waves-effect">
                                        <span>Next </span>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <form id="seekingworkForm" action="{{route('provider.seeking.work.create')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <i class="fa fa-plus"></i>
                                    <h2 class="box-title"><strong>Create Your CV's Page</strong></h2>
                                    <small class="text-danger">* please fill all astericked fields</small>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-label">Full Name </label><small class="text-danger">*</small>
                                            <input id='name' type="text" required name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Enter your fullname here (e.g. James Tapo)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone</label><small class="text-danger">*</small>
                                                <input id="phone" type="text" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Enter your phone number (e.g. 09023456789)" name="phone" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job Title</label><small class="text-danger">*</small>
                                                <input id='name' type="text" name="job_title" value="{{ old('job_title') }}" class="form-control" placeholder="What type of job are you looking for? (e.g. Accounting Finance)" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Your years of experience in this field?</label><small class="text-danger">*</small>
                                                <input type="number" name="job_experience" value="{{ old('job_experience') }}" min="0" value="0" class="form-control" placeholder="0" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Job Type</label><small class="text-danger">*</small>
                                                <select class="form-control" name="job_type" value="{{ old('job_type') }}" required>
                                                    <option value="Full Time" selected>Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Temporary">Temporary</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Internship">Internship</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Still Studying</label>
                                                <select class="form-control" name="still_studying" value="{{ old('still_studying') }}" required>
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label><small class="text-danger">*</small>
                                                <select class="form-control" name="gender" value="{{ old('gender') }}" required>
                                                    <option value="">- Select gender type -</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Age</label><small class="text-danger">*</small>
                                                <input type="number" name="age" class="form-control" min="0" value="{{ old('age') }}" placeholder="Enter your age (e.g. 24)" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Marital Status</label>
                                                <select class="form-control" name="marital_status" value="{{ old('marital_status') }}">
                                                    <option value="">- Select marital status -</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Employment Status</label><small class="text-danger">*</small>
                                                <select class="form-control" name="employment_status" value="{{ old('employment_status') }}">
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Self Employed">Self-employed</option>
                                                    <option value="Retired Pensioner">Retired/Pensioner</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Highest Qualification</label><small class="text-danger">*</small>
                                                <select class="form-control" name="highest_qualification" value="{{ old('highest_qualification') }}">
                                                    <option value="High School (S.S.C.E)" selected>High School (S.S.C.E)</option>
                                                    <option value="Degree">Degree</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="HND">HND</option>
                                                    <option value="OND">OND</option>
                                                    <option value="MBA/MSc">MBA/MSc</option>
                                                    <option value="MBBS">MBBS</option>
                                                    <option value="MPhil/PhD">MPhil/PhD</option>
                                                    <option value="N.C.E">N.C.E</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Expected Salary</label><small class="text-danger">*</small>
                                                <select class="form-control" name="expected_salary" value="{{ old('expected_salary') }}">
                                                    <option value="&#8358;50,000">Below	&#8358;50,000</option>
                                                    <option value="&#8358;50,000 - &#8358;75,000<">&#8358;50,000 - &#8358;75,000</option>
                                                    <option value="&#8358;75,000 - &#8358;100,000">&#8358;75,000 - &#8358;100,000</option>
                                                    <option value="&#8358;100,000 - 125,000">&#8358;100,000 - 125,000</option>
                                                    <option value="&#8358;125,000 - &#8358;150,000">&#8358;125,000 - &#8358;150,000</option>
                                                    <option value="&#8358;150,000 - &#8358;200,000">&#8358;150,000 - &#8358;200,000</option>
                                                    <option value="&#8358;200,000 - &#8358;300,000">&#8358;200,000 - &#8358;300,000</option>
                                                    <option value="&#8358;300,000 - &#8358;500,000">&#8358;300,000 - &#8358;500,000</option>
                                                    <option value="Above &#8358;500,000">Above &#8358;500,000</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Work Experience</label>
                                                <textarea id='workexperience' name="work_experience" class="form-control summernote" placeholder="Tell us about your work experience.">{{ old('work_experience') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Education</label><small class="text-danger">*</small>
                                                <textarea id='education' name="education" class="form-control summernote" placeholder="Tell us about your educational background.">{{ old('education') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Certifications</label>
                                                <textarea id='certifications' name="certifications" class="form-control summernote" placeholder="Tell us about your certifications.">{{ old('certifications') }}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Skills</label><small class="text-danger">*</small>
                                                <textarea id='skills' name="skills" class="form-control summernote" placeholder="Tell us about your skills.">{{ old('skills') }}</textarea>
                                            </div>
                                        </div>
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
                                        <small class="text-info">Choose a profile picture for your CV (.jpg, .jpeg, .png).</small>
                                        <div class="image-box text-center">
                                              <p>Select an Image</p>
                                              <img src="" alt="">
                                          </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="user_image" class="form-control show-tick" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <small class="text-danger">*</small>
                                        <select name="category_id" required class="form-control show-tick" id="sw_categories">
                                            <option value="1" selected>Job Applicant</option>
                                            @foreach($category as $categories)
                                                <option value="{{ $categories->id }}"> {{ $categories->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Sub Category <small class="text-info">(You can select multiple sub category)</small></label>
                                        <select name="sub_category[]" class="form-control show-tick" id="sw_sub_categories" multiple>
                                            <option value="">-- Please select a category to populate this --</option>
                                            @foreach($subcategory as $subcategories)
                                                <option id="category_id" value=" {{ $subcategories->id }} "> {{ $subcategories->name }} </option>
                                            @endforeach
                                        </select>
                                    </div> --}}



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Location</label><small class="text-danger">*</small>
                                                <select class="form-control" required id="user_state"  name="user_state">
                                                    <option value="">- Select State -</option>
                                                    @if(isset($states))
                                                        @foreach($states as $state)
                                                            <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Local Government</label><small class="text-danger">*</small>
                                                <select class="form-control" id="user_lga" name="user_lga" required>
                                                    <option disabled selected>- 👈 Select a State -</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input id="address" type="text"  value="{{ old('address') }}" class="form-control" name="address" placeholder="Enter your address here.">
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <input id="featured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="featuredCheckbox()">
                                            <label class="form-check-label" for="featured"> Do you want this service featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label> --}}

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input id="swfeatured" class="form-check-input" type="checkbox" value="1" name="is_featured" onclick="swfeaturedCheckbox()">
                                            <label class="form-check-label" for="swfeatured"> Do you want this CV featured?  <small class="infoLinkNote">(<a data-toggle="modal" data-target="#featuredInfoModal">How it works?</a>)</small></label>
                                        </div>
                                        <p id="swfeaturedText" class="text-info">This will attract a fee of &#8358;2000 which will be paid before the service is displayed.</p>
                                    </div>
                                </div>

                                <div class="body">
                                    <a href=" {{ route('seller.service.all') }}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                                        <i class="fa fa-arrow-left"></i>
                                        <span> Back</span>
                                    </a>

                                    <button type="submit" id="save_btn"  class="btn btn-warning btn-submit_service btn-lg m-t-15 waves-effect">
                                        <span>Create </span>
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

    document.getElementById('seekingworkForm').style.display = 'none'


    $('#state').on('change',function(){
        console.log('ddd');
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
            type:"GET",
                //url:"{{url('qqq')}}"+stateID,
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

    $('#user_state').on('change',function(){
        console.log('ddd');
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
            type:"GET",
                //url:"{{url('qqq')}}"+stateID,
                url: '/api/get-city-list/'+stateID,
                success:function(res){
                    if(res){
                    console.log(res);
                    console.log(stateID);
                    $("#user_lga").empty();
                    $.each(res,function(key,value){
                    $("#user_lga").append('<option value="'+value+'">'+value+'</option>');
                    });

                }else{
                    $("#user_lga").empty();
                }
                }
            });
        }else{
            $("#user_lga").empty();
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

        var swcheckBox = document.getElementById("swfeatured");
        var swtext = document.getElementById("swfeaturedText");
        swtext.style.display = "none";

        function swfeaturedCheckbox() {
            if (swcheckBox.checked == true){
                swtext.style.display = "block";
            } else {
                swtext.style.display = "none";
            }
        }

        function featuredCheckbox() {
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

            if (categoryID == 1) {
                document.getElementById('seekingworkForm').style.display = 'block'
                document.getElementById('serviceForm').style.display = 'none'
            }
            else {
                document.getElementById('seekingworkForm').style.display = 'none !important'
                document.getElementById('serviceForm').style.display = 'block !important'
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

            if(categoryID){
                $.ajax({
                    type:"GET",
                    url: '/api/get-category-list/'+categoryID,
                    success:function(res){
                        if(res){
                        var res = JSON.parse(res);
                            $("#sw_sub_categories ").empty();
                            $.each(res, function(key,value){
                            var chosen_value = value;
                                $("#sw_sub_categories").append(
                                    '<option value="'+chosen_value.id+'">'+chosen_value.name+'</option>'
                                );
                            });
                        }else{
                            $("#sw_sub_categories").empty();
                        }
                    }
                });
            }else{
                $("#sw_sub_categories").empty();
            }
        });

        $('#sw_categories').on('change',function(){
            var categoryID = $(this).val();

            if (categoryID == 1) {
                document.getElementById('seekingworkForm').style.display = 'block'
                document.getElementById('serviceForm').style.display = 'none'
            }
            else {
                document.getElementById('seekingworkForm').style.display = 'none'
                document.getElementById('serviceForm').style.display = 'block'
            }

            if(categoryID){
                $.ajax({
                    type:"GET",
                    url: '/api/get-category-list/'+categoryID,
                    success:function(res){
                        if(res){
                        var res = JSON.parse(res);
                            $("#sw_sub_categories ").empty();
                            $.each(res, function(key,value){
                            var chosen_value = value;
                                $("#sw_sub_categories").append(
                                    '<option value="'+chosen_value.id+'">'+chosen_value.name+'</option>'
                                );
                            });
                        }else{
                            $("#sw_sub_categories").empty();
                        }
                    }
                });
            }else{
                $("#sw_sub_categories").empty();
            }
        });
    </script>


    <script type="text/javascript">


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
