

<div class="box" >
  <div class="box-header">
            <h3 class="box-title"> Category </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <table class="display table table-bordered data_table_main">
      <thead>
        <tr>
          <th> # </th>
          <th> Name </th>
          <th> Slug </th>
          <th> Action </th>
        </tr>
      </thead>

        @foreach($category as $key => $categories)

        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
        <td> {{ $categories->name }} </td>
        <td> {{ $categories->slug }} </td>

        <td class="center">
          <a href="{{ route('admin.category.delete',$categories->id) }} " class="btn btn-danger "><i class="fa fa-trash"></i></a>
        </td>

      </tr>

      @endforeach


    </tbody>


  </table>



</div>
<!-- /.box-body -->
</div>


<!-- /.content -->
</div>  

