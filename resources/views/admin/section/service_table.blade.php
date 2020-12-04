

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
        <th style="width: 40px"> Action </th>
      </tr>
      <tr>

       @foreach($category as $key => $categories)

       <td> {{ $key + 1 }} </td>

       <td> {{ $categories->name }} </td>

       <td> {{ $categories->created_at->diffForHumans() }} </td>


       <td>              
        <div class="btn-group">
          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" class="font-weight-bold"> Update </a></li>


<form action=" {{ route('admin.category.destroy',$categories->id) }}" method="POST" >
@csrf
@method('DELETE')
<li> <a href="" type="submit" class="font-weight-bold"> Delete </a> </li>
</form>
</ul>

          </ul>
        </div>
      </td>


    </tr>

    @endforeach


  </tbody></table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">


{{ $category->links() }} 



</div>
</div>
<!-- /.box -->

