
@extends('layouts.admin')

@section('title')
Category | 
@endsection

@section('content')


<br>
<hr>

<div class="container">




    <!-- Content Header (Page header) -->
    <section class="content-header p-3 box">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category </a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


  @include('layouts.backend_partials.status')

<div class="box box-info mt-5">
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
      <button type="submit" class="btn btn-info pull-right"> Submit </button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>

</div>


@include('admin/section/category_table') 


@endsection