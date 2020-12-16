

@extends('layouts.seller')

@section('title')
View Notification | 
@endsection

@section('content')

<br>
<hr>

<div class="container">

<div class="row">
      <div class="col-md-12">
        <div class="box box-info dash-1">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title"> NOTIFICATION </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control"  value="admin@admin.com " disabled="">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" value=" Dark Purple" disabled="" >
                </div>
                <div>
                  <textarea class="textarea" disabled="" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ 'Will proper retouch as data will be hijacked from super admin dashboard' }} </textarea>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>


</div>

@endsection