<div class="box" >
  <div class="box-header">
            <h3 class="box-title">Cities</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <div class="table-responsive">
        <table class="display table table-bordered data_table_main">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Region </th>
                <th> Title </th>
                <th> Description </th>
                <th> Slug </th>
                <th> Action </th>
              </tr>
            </thead>

              @forelse($cities as $key => $city)

              <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
              <td> {{ $city->name }} </td>
              <td> {{ $city->region }} </td>
              <td> {{ $city->body }} </td>
              <td> {{ $city->description }} </td>
              <td> {{ $city->slug }} </td>

              <td class="center">
                <a type="button" class="btn btn-default btn-outline btn-sm" href="{{ route('admin.city', $city->slug) }}"><i class="fa fa-pencil"></i></a>

                <a href="{{ route('admin.delete.city',$city->slug) }} " class="btn btn-danger "><i class="fa fa-trash"></i></a>
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

