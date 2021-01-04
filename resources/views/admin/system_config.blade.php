
@extends('layouts.admin')

@section('title')
System Config | 
@endsection


@section('content')


<div class="content-wrapper" style="min-height: 868px;">

    <br>

    <div class="container">
        @include('layouts.backend_partials.status')
    </div>


    <!-- Main content -->
    
    <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Website Settings
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <div class="card">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-md-6 col-sm-12">


                                    <form class="form-horizontal form-element" method="POST" action="{{route('system.config.store', $check_general_info == 0 ? $general_info->id : 0 )}} " enctype="multipart/form-data">
                                        {{ csrf_field() }}



                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Site Name</label>
                                                <input type="text" name="site_name" id="site_name" class="form-control" autofocus="" value="{{ $check_general_info == 0 ? $general_info->site_name : ''  }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Hot-line</label>
                                                <input type="text" name="hotline" id="hotline" class="form-control" value="{{ $check_general_info == 0 ? $general_info->hot_line : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Hot-line2</label>
                                                <input type="text" name="hotline2" id="hot_line_2" class="form-control" value="{{ $check_general_info == 0 ? $general_info->hot_line_2 : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Hot-line3</label>
                                                <input type="text" name="hotline3" id="hot_line_3" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->hot_line_3 : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Contact E-mail</label>
                                                <input type="text" name="support_email" id="site_email" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->support_email : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                         <div class="form-group">
                                            <label for="site_name" class="control-label">Address</label>
                                            <input type="text" name="address" id="site_address" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->address : ''}}">
                                        </div>
                                    </div>





                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="site_name" class="control-label">Facebook Handle</label>
                                            <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $check_general_info == 0 ? $general_info->facebook : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="site_name" class="control-label">Twitter Handle</label>
                                            <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $check_general_info == 0 ? $general_info->twitter : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="site_name" class="control-label">Linkedin Handle</label>
                                            <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ $check_general_info == 0 ? $general_info->linkedin : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="site_name" class="control-label">Instagram</label>
                                            <input type="url" name="instagram" id="instagram" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->instagram : ''}}">
                                        </div>
                                    </div>



































                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="register_section_1" class="control-label"> Register Section 1 Title </label>
                                            <input type="text" name="register_section_1_title" id="register_section_1_title" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->register_section_1_title : ''}}">
                                            <label for="register_section_1" class="control-label"> Register Section 1 Description </label>
                                            <textarea class="form-control" name="register_section_1"> {{ $check_general_info == 0 ? $general_info->register_section_1 : ''}} </textarea>
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="register_section_2" class="control-label"> Register Section 2 Title </label>
                                            <input type="text" name="register_section_2_title" id="register_section_2_title" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->register_section_2_title : ''}}">
                                            <label for="register_section_2" class="control-label"> Register Section 2 Description </label>
                                            <textarea class="form-control" name="register_section_2"> {{ $check_general_info == 0 ? $general_info->register_section_2 : ''}} </textarea>
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="register_section_3" class="control-label"> Register Section 3 Title </label>
                                            <input type="text" name="register_section_3_title" id="register_section_3_title" class="form-control" value=" {{ $check_general_info == 0 ? $general_info->register_section_3_title : ''}}">
                                            <label for="register_section_3" class="control-label"> Register Section 3 Description </label>
                                            <textarea class="form-control" name="register_section_3"> {{ $check_general_info == 0 ? $general_info->register_section_3 : ''}} </textarea>
                                        </div>
                                    </div>





















































                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="site_name" class="control-label">Logo</label>
                                            <input type="file" name="file" id="logo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-warning btn-sm"> Update Settings </button>
                                    </div>

                                </form>



                            </div>
                            <div class="col-md-6 col-sm-12">

                                <h4>Default Site Settings</h4>


                                <ul>
                                    <li>
                                        <b class="text-uppercase">Site Name: </b> {{ $check_general_info == 0 ? $general_info->site_name : ''  }}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Hotline: </b> {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Hotline2: </b> {{ $check_general_info == 0 ? $general_info->hot_line_2 : ''}}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Hotline3: </b> {{ $check_general_info == 0 ? $general_info->hot_line_3 : ''}}
                                        <br><br>
                                    </li>

                                    <li>
                                        <b class="text-uppercase">Site Email: </b> {{ $check_general_info == 0 ? $general_info->support_email : ''}}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Site Address: </b> {{ $check_general_info == 0 ? $general_info->address : ''}}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Facebook: </b> {{ $check_general_info == 0 ? $general_info->facebook : ''}}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Twitter: </b> {{ $check_general_info == 0 ? $general_info->twitter : ''}}
                                        <br><br>
                                    </li>
                                    <li>
                                        <b class="text-uppercase">Linkedin: </b> {{ $check_general_info == 0 ? $general_info->linkedin : ''}}
                                        <br><br>
                                    </li>

                                    <li>
                                        <b class="text-uppercase">Instagram: </b> {{ $check_general_info == 0 ? $general_info->instagram : ''}}
                                        <br><br>
                                    </li>

                                    <li>
                                        <b>Logo (logo size:207 X 57)</b><br>
                                        <p><img src="{{asset('images')}}/{{ $check_general_info == 0 ? $general_info->logo : ''}}" alt="" width="30%" style="float: left; margin-right: 20px;"></p>
                                    </li>
                                </ul>


                                <br>
                                <hr>

                                <div class="row"> <!-- Row start here -->

                                    <div class="col-md-6">
                                      <div class="box box-solid">
                                        <div class="box-header with-border">
                                          <i class="fa fa-text-width"></i>

                                          <h3 class="box-title"> register Section 1</h3>
                                      </div>
                                      <!-- /.box-header -->
                                      <div class="box-body">
                                          <dl>
                                            <dt> {{ $check_general_info == 0 ? Str::limit($general_info->register_section_1_title, 25) : ''}} </dt>
                                            <dd> {{ $check_general_info == 0 ? Str::limit($general_info->register_section_1, 80) : ''}}</dd>
                                        </dl>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>






                            <div class="col-md-6">
                              <div class="box box-solid">
                                <div class="box-header with-border">
                                  <i class="fa fa-text-width"></i>

                                  <h3 class="box-title"> register Section 2</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <dl>
                                    <dt> {{ $check_general_info == 0 ? Str::limit($general_info->register_section_2_title, 25) : ''}} </dt>
                                    <dd> {{ $check_general_info == 0 ? Str::limit($general_info->register_section_2, 80) : ''}}</dd>
                                </dl>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-md-6">
                      <div class="box box-solid">
                        <div class="box-header with-border">
                          <i class="fa fa-text-width"></i>

                          <h3 class="box-title"> register Section 3</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <dl>
                            <dt> {{ $check_general_info == 0 ? Str::limit($general_info->register_section_3_title, 25) : ''}} </dt>
                            <dd> {{ $check_general_info == 0 ? Str::limit($general_info->register_section_3, 80) : ''}} </dd>
                        </dl>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div> <!-- Row start end here -->




    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /.box -->



</div>
<!-- /.col-->
</section></div>







@endsection