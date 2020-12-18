
@extends('layouts.admin')

@section('title')
System Config | 
@endsection


@section('content')




<div class="content-wrapper" style="min-height: 868px;">


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
                            <form action="https://www.efcontact.com/admin/settings" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="fvVpEsz60rqXksj6vT5dpVZRJJsMW9OQohL8gPf0">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Site Name</label>
                                    <input type="text" name="site_name" id="site_name" class="form-control" autofocus="" value="Nigeria Yellow Page">
                                                                    </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Hot-line</label>
                                    <input type="text" name="hotline" id="hotline" class="form-control" value="0700-6258244">
                                                                    </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Hot-line2</label>
                                    <input type="text" name="hotline2" id="hotline" class="form-control" value="0807-9000286">
                                                                    </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Hot-line3</label>
                                    <input type="text" name="hotline3" id="hotline" class="form-control" value="080567654345">
                                                                    </div>
                            </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Contact E-mail</label>
                                    <input type="text" name="site_email" id="site_email" class="form-control" value="info@efcontact.com">
                                                                    </div>
                                </div>
                                <div class="col-lg-12">
                                     <div class="form-group">
                                        <label for="site_name" class="control-label">Address</label>
                                        <input type="text" name="site_address" id="site_address" class="form-control" value="No 8, Huambo Crescent, Off Harper Street, by Bolton White Hotel, Wuse Zone 7, Abuja, Federal Capital Territory, Nigeria">
                                                                            </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Facebook Handle</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control" value="https://www.facebook.com/maxwellochadefoundation">
                                                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Twitter Handle</label>
                                    <input type="url" name="twitter" id="twitter" class="form-control" value="https://twitter.com/mochadefoundatn?s=09">
                                                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Linkedin Handle</label>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control" value="https://www.linkedin.com/company/maxwellochadefoundation">
                                                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Instagram</label>
                                    <input type="url" name="instagram" id="instagram" class="form-control" value="https://instagram.com/maxwellochade_foundation?igshid=4xtbur0qkvfh">
                                                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-sm">Update Settings</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h4>Default Site Settings</h4>
                            <ul>
                                <li>
                                    <b class="text-uppercase">Site Name: </b> Nigeria Yellow Page
                                    <br><br>
                                </li>
                                <li>
                                        <b class="text-uppercase">Hotline: </b> 0700-6258244
                                        <br><br>
                                    </li>
                                <li>
                                    <b class="text-uppercase">Hotline2: </b> 0807-9000286
                                    <br><br>
                                </li>
                                <li>
                                    <b class="text-uppercase">Hotline3: </b> 080567654345
                                    <br><br>
                                </li>

                                <li>
                                    <b class="text-uppercase">Site Email: </b> info@efcontact.com
                                    <br><br>
                                </li>
                                 <li>
                                        <b class="text-uppercase">Site Address: </b> No 8, Huambo Crescent, Off Harper Street, by Bolton White Hotel, Wuse Zone 7, Abuja, Federal Capital Territory, Nigeria
                                        <br><br>
                                    </li>
                                <li>
                                    <b class="text-uppercase">Facebook: </b> https://www.facebook.com/maxwellochadefoundation
                                    <br><br>
                                </li>
                                <li>
                                    <b class="text-uppercase">Twitter: </b> https://twitter.com/mochadefoundatn?s=09
                                    <br><br>
                                </li>
                                <li>
                                    <b class="text-uppercase">Linkedin: </b> https://www.linkedin.com/company/maxwellochadefoundation
                                    <br><br>
                                </li>

                                <li>
                                    <b class="text-uppercase">Instagram: </b> https://instagram.com/maxwellochade_foundation?igshid=4xtbur0qkvfh
                                    <br><br>
                                </li>

                                <li>
                                    <b>Logo (logo size:207 X 57)</b><br>
                                <p><img src="https://www.efcontact.com/img/logos/logo.png" alt="" width="30%" style="float: left; margin-right: 20px;"></p>
                                </li>


                            </ul>
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