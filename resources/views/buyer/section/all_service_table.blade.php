

    <div class="box">

        <div class="box-header">
            <h3 class="box-title"> All Service Table </h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover">

                <tbody>

                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Experienced </th>
                        <th> Featured </th>
                        <th> Status </th>
                        <th> Date </th>
                        <th> Action </th>
                    </tr>

                    <tr>
                        @foreach($all_service as $key => $all_services)
                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                        <td> {{ $all_services->name }} </td>
                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $all_services->experience }} </span> </td>
                        <td> {{ $all_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
                        <td> {{ $all_services->status == 1 ? 'Active' : 'Pending' }} </td>
                        <td> {{ $all_services->created_at->diffForHumans() }} </span></td>

                        @if (url()->current() == route('admin.service.all') )
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">

                                    <!-- Edit -->
                                    <form method="post" class="update_form" action=" {{ route('admin.service.status',$all_services->id) }} ">
                                        @method('PATCH')
                                        @csrf
                                        <li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> {{ $all_services->status == 1 ? 'Deactivate' : 'Activate' }} </button> </li>
                                    </form>


                                    <!-- Delete -->
                                    <form method="post" class="delete_form" action=" {{ route('admin.service.destroy',$all_services->id) }} ">
                                        @method('DELETE')
                                        @csrf
                                        <li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Delete </button> </li>
                                    </form>

                                </ul>

                            </ul>
                        </div>
                    </td>
                    @endif

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

<div class="box-footer clearfix">

  {{ $all_service->links() }} 

</div>


</div>

