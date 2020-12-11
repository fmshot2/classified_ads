

<!-- TO DO List -->
<div class="box">
  <div class="box-header ui-sortable-handle" style="cursor: move;">
    <i class="fa fa-commenting"></i>

    <h3 class="box-title"> Read Message {{ $read_message->count() }}</h3>

    <div class="box-tools pull-right">

      {{ $read_message->links() }} 

    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
      <ul class="todo-list ui-sortable">
        @foreach($read_message as $read_messages)

        @empty($read_messages)
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
         <span class="text"> {{ Str::limit( $read_messages->description, 100) }}</span>
         <!-- Emphasis label -->
         <small class="label label-primary"><i class="fa fa-clock-o"></i>  {{ $read_messages->created_at->diffForHumans() }} </small>
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

<!-- /.box -->
