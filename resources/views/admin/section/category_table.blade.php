


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Category Table</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tbody><tr>
        <th style="width: 10px">#</th>
        <th> Name</th>
        <th> Date </th>

        @if (url()->current() == route('admin.category.show') )
        <th style="width: 40px"> Action </th>
        @endif

      </tr>
      <tr>

       @foreach($category as $key => $categories)

       <td> {{ $key + 1 }} </td>

       <td> {{ $categories->name }} </td>

       <td> {{ $categories->created_at->diffForHumans() }} </td>

@if (url()->current() == route('admin.category.show')  )
       <td>              
        <div class="btn-group">
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <form method="post" class="delete_form" action="{{route('admin.category.delete',$categories->id)}}">
              @method('DELETE')
              @csrf
              <li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;">Delete</button> </li>
            </form>
          </ul>
        </ul>
      </div>
    </td>
@endif


  </tr>

  @endforeach


</tbody></table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">

@if (url()->current() == route('admin.category.show') )

  {{ $category->links() }} 

@endif


</div>
</div>
<!-- /.box -->

