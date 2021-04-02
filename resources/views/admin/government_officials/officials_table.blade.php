<div class="box" >
  {{-- <div class="box-header">
        <h3 class="box-title">All Officials</h3>
  </div> --}}
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
        <table class="display table table-bordered data_table_main">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Position </th>
                    <th> State </th>
                    <th> Region </th>
                    <th> Description </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @forelse($officials as $key => $official)
                    <tr>
                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                        <td> {{ $official->name }} </td>
                        <td> {{ $official->position }} </td>
                        <td> {{ $official->state }} </td>
                        <td> {{ $official->region }} </td>
                        <td> {!! Str::limit($official->description, 40) !!} </td>
                        <td class="center">
                            <a type="button" class="btn btn-default btn-outline btn-sm" href="{{ route('admin.city', $official->id) }}"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('admin.delete.official',$official->id) }} " class="btn btn-danger "><i class="fa fa-trash"></i></a>
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

