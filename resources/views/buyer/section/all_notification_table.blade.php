

<!-- Content Header (Page header) -->
@if (url()->current() == !route('buyer.dashboard') )
<section class="content-header p-3 box">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Message </a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
@endif

@include('layouts.backend_partials.status')

<div class="box">

  <div class="box-header with-border">
    <h3 class="box-title">  All Notification {{ $all_notification->count() }} </h3>

    @if (url()->current() == route('seller.notification.all') )
    <div class="box-tools">
      <form class="" method="GET" action="{{ route('admin.service.search') }}">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
    @endif 

  </div>
  <!-- /.box-header -->
  <div class="box-body ">
    <table class="table table-bordered">

      <tbody>

        <tr>
          <th> # </th>
          <th> Notification </th>
          <th> Date </th>
          <th> Action </th>
        </tr>

        <tr>
          @foreach($all_notification as $key => $all_notifications)

          <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
          <td> {{ Str::limit( $all_notifications->description, 100) }} </td>
          <td> {{ $all_notifications->created_at->diffForHumans() }} </td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <!-- View -->
                    <li>  <a href=" {{ route('seller.notification.view',$all_notifications->slug) }}" class="btn btn-block" style="margin-left: 8px;"> View </a> </li>
                </ul>

              </ul>
            </div>
          </td>

      </tr>

      @endforeach

    </tbody>
  </table>
</div>
<!-- /.box-body -->

@if (url()->current() == route('buyer.notification.all') )
<div class="box-footer clearfix">

  {{ $all_notification->links() }}

</div>
@endif

</div>


