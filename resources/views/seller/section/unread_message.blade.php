

<!-- TO DO List -->
<div class="box">
  <div class="box-header ui-sortable-handle" style="cursor: move;">
    <i class="fa fa-commenting"></i>

    <h3 class="box-title"> Recent Unread Message  </h3>

    @if (url()->current() == route('admin.message.unread') )
    <div class="box-tools pull-right">
      <ul class="pagination pagination-sm inline">
        <li><a href="#">«</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">»</a></li>
      </ul>
    </div>
    @endif

    <!-- /.box-header -->
    <div class="box-body">
      <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
      <ul class="todo-list ui-sortable">
        @foreach($unread_message as $unread_messages)

        @empty($unread_messages)
        <div class="box"> No Message Found </div>
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
         <span class="text"> {{ Str::limit( $unread_messages->description, 100) }}</span>
         <!-- Emphasis label -->
         <small class="label label-danger"><i class="fa fa-clock-o"></i>  {{ $unread_messages->created_at->diffForHumans() }} </small>
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
  <div class="box-footer clearfix no-border">
   <button type="button" class="btn btn-blue pull-right"><i class="fa fa-list"></i> See All</button>        
 </div>
</div>
<!-- /.box -->
