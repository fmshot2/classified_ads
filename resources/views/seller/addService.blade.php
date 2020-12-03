
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
                    <p>Lo</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="submit-address">
                    <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <h3 class="heading-2">Basic Information</h3>
                        <div class="search-contents-sidebar mb-30">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                       
                                        <input type="hidden" value="{{Auth::id()}}
" class="input-text" name="user_id">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Service Name</label>
                                        <input type="text" class="input-text" name="name" placeholder="What Service Are You Rendering?">
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Years Of Experience</label>
                                        <input type="text" class="input-text" name="experience" placeholder="How Long Have You Been Offering This Service?">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">

  <div class="form-group">
    <label for="exampleFormControlSelect1"> Choose Category </label>
    <select class="form-control" id="exampleFormControlSelect1" name="category">
      <option>Medical</option>
      <option>Building</option>
      <option>Beauty/Cosmetics</option>
      <option>Food</option>
      <option>Transportation</option>
    </select>
  </div>

                                </div>

                               

                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="form-group">
                                       <input type="file" class="input-text" onChange="previewFile(this)" name="file" class="form-control" />
                <img id="previewImg" alt="Service Image" style="max-width:130px; 
                margin-top:20px"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                     
                        
                        <h3 class="heading-2">Detailed Information</h3>
                        <div class="row mb-50">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label>Detailed Information</label>
                                    <textarea class="input-text" name="description" placeholder="Add More Info about your service"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="heading-2">Contact Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="input-text" name="address" placeholder="Address">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="submit"class="btn btn-md btn-warning mb-30" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];
    if(file)
    {
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewImg").attr("src",reader.result);
        }
            reader.readAsDataURL(file);     
    }
}
</script>

@endsection