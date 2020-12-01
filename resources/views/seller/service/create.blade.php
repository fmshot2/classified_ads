@extends('layouts.admin')

@section('title')
Create | 
@endsection



@section('content')



<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4"> Post Service </h3></div>
                        <div class="card-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <h2 class="font-weight-normal mb-2"> Basic Information</h2>



                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName"> Name </label>
                                            <input class="form-control" id="inputFirstName" name="name" type="text" placeholder="Enter Service Name">
                                            @if ($errors->has('name'))
                                            <span class="small text-danger">
                                                Please provide
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName"> Category </label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="category_id"  required>
                                              <option selected> Choose... </option>
                                              <option value="">A</option>
                                              <option value="">B</option>
                                              <option value="">C</option>
                                              <option value="">D</option>
                                              <option value="">E</option>
                                          </select>                                        
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                <label for="exampleFormControlTextarea1"> Description </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                              <div class="form-group">
                                <label for="exampleFormControlTextarea1"> Upload Image </label>
                                <input name="file" type="file" multiple />

                            </div>








                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="login.html">Create Account</a></div>
                        </form>

                    </div>

                    <div class="card-footer text-center">
                        <div class="small"> <a href="login.html">Have an account? Go to login</a> </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
</div>


@endsection