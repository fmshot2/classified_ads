

<div class="box" >
  <div class="box-header">
            <h3 class="box-title">Sub Categories </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <div class="table-responsive">
        <table class="display table table-bordered data_table_main">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Slug </th>
                <th> Action </th>
              </tr>
            </thead>

              @foreach($subcategories as $key => $subcategory)

              <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
              <td> {{ $subcategory->name }} </td>
              <td> {{ $subcategory->slug }} </td>

              <td class="center">
                <button type="button" class="btn btn-default btn-outline btn-sm" onclick="editSubCategory({{ $subcategory->id }})"><i class="fa fa-pencil"></i></button>
                <a href="{{ route('admin.subcategory.delete',$subcategory->id) }} " class="btn btn-danger "><i class="fa fa-trash"></i></a>
              </td>

            </tr>

            @endforeach


          </tbody>
    </div>


  </table>



</div>
<!-- /.box-body -->
</div>


<!-- /.content -->
</div>

