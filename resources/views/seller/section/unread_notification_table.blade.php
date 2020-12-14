

<!-- TO DO List -->
<div class="box">
  <div class="box-header ui-sortable-handle" style="cursor: move;">
    <i class="fa fa-bell"></i>

    <h3 class="box-title"> {{ url()->current() == route('seller.notification.unread') ?  'Unread Notification' : 'Recent Unread Notification' }} {{ $unread_notification->count() }} </h3>

    @if (url()->current() == route('seller.notification.unread') )
    <div class="box-tools pull-right">

      {{ $unread_notification->links() }} 

    </div>
    @endif
  </div>

  <hr>

  <!-- /.box-header -->
  <div class="box-body">
    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
    <ul class="todo-list ui-sortable">
      @foreach($unread_notification as $unread_notifications)

      @empty($unread_notifications)
      <div class="box"> No Notification Found </div>
      @endempty

      <li>
        <!-- drag handle -->
        <span class="handle ui-sortable-handle">
          <i class="fa fa-ellipsis-v"></i>
          <i class="fa fa-ellipsis-v"></i>
        </span>
        <!-- checkbox -->
        <label class="control control-checkbox">
         <input type="checkbox">
         <span class="control_indicator"></span>
       </label>
       <!-- todo text -->
       <span class="text"> {{ Str::limit( $unread_notifications->description, 100) }}</span>
       <!-- Emphasis label -->
       <small class="label label-danger"><i class="fa fa-clock-o"></i>  {{ $unread_notifications->created_at->diffForHumans() }} </small>
       <!-- General tools such as edit or delete-->
       <div class="tools">
        <i class="fa fa-eye"></i>
        <i class="fa fa-trash-o"></i>
      </div>
    </li>
    @endforeach
  </ul>

</div>
<!-- /.box-body -->
@if (url()->current() == route('seller.dashboard') )
@if( $unread_notification->count() == !0)
<div class="box-footer clearfix no-border">
 <button type="button" class="btn btn-warning pull-right"><i class="fa fa-list"></i>   See All</button>        
</div>
@endif
@endif
</div>

<!-- /.box -->
