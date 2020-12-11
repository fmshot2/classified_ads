



<!-- TO DO List -->
<div class="box">
  <div class="box-header ui-sortable-handle" style="cursor: move;">
    <i class="fa fa-commenting"></i>

    <h3 class="box-title"> All Message {{ $all_message->count() }}  </h3>

    <div class="box-tools pull-right">

      {{ $all_message->links() }} 

    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
      <ul class="todo-list ui-sortable">
        @foreach($all_message as $all_messages)

        @empty($all_messages)
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
         <span class="text"> {{ Str::limit( $all_messages->description, 100) }}</span>
         <!-- Emphasis label -->
         <small class="label label-success"><i class="fa fa-clock-o"></i>  {{ $all_messages->created_at->diffForHumans() }} </small>
         <!-- General tools such as edit or delete-->

         <div class="tools">

          <form method="post" class="form-inline" action="{{route('seller.message.delete',$all_messages->id)}}">
            @method('DELETE')
            @csrf
            <button type="button" class="btn btn-success"> <i class="fa fa-reply"> </i> </button>
            <button type="button" class="btn btn-success"> <i class="fa fa-eye"> </i> </button>
            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash-o"> </i> </button>
          </form>

        </div>


      </li>
      @endforeach
    </ul>

  </div>
  <!-- /.box-body -->

  <!-- /.box -->
