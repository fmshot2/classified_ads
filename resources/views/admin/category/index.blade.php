@extends('layouts.admin')

@section('title')
Category List | 
@endsection

@section('content')

<div class="container">

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th>Task</th>
          <th>Progress</th>
          <th>Deadline</th>
          <th style="width: 40px">Label</th>
        </tr>
        <tr>
          <td>1.</td>
          <td>Update software</td>
          <td>
            <div class="progress progress-xs">
              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
            </div>
          </td>
          <td>May 15, 2017</td>
          <td><span class="badge bg-danger">55%</span></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Clean database</td>
          <td>
            <div class="progress progress-xs">
              <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
            </div>
          </td>
          <td>May 15, 2017</td>
          <td><span class="badge bg-warning">70%</span></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Cron job running</td>
          <td>
            <div class="progress progress-xs progress-striped active">
              <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
            </div>
          </td>
          <td>May 15, 2017</td>
          <td><span class="badge bg-primary">30%</span></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Fix and squish bugs</td>
          <td>
            <div class="progress progress-xs progress-striped active">
              <div class="progress-bar progress-bar-success" style="width: 90%"></div>
            </div>
          </td>
          <td>May 15, 2017</td>
          <td><span class="badge bg-success">90%</span></td>
        </tr>
      </tbody></table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm pull-right">
        <li><a href="#">Previous</a></li>
        <li><a href="#" class="current">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">Next</a></li>
      </ul>
    </div>
  </div>
  <!-- /.box -->
</div>

@endsection