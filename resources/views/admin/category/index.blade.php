
@extends('layouts.admin')

@section('title')
Category | 
@endsection


@section('content')


<div class="content-wrapper" style="min-height: 518px;">

<section class="content">

<div class="row">
  <div class="col-xs-12">


  @include('layouts.backend_partials.status')

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Category Form </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal form-element" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="box-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label"> Name </label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Enter Category Name Here" required>


                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file">
                </div>


        </div>
      </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-warning pull-right"> Submit </button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>


<br>
<hr>


@include('admin/section/category_table') 



</div>
</div>
</section>
</div>

@endsection