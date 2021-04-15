
<div class="box">

    <div class="box-header">
        <h3 class="box-title"> All Service Table </h3>
        <code>  {{ url()->current() == route('seller.dashboard') ? 'showing 5 recent services ' : '' }} </code>

        <div class="box-tools">

        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
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

                        <td class="center">
                            <a href="{{ route('service.view', $all_services->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            </div>

        </div>
        <!-- /.box-body -->
    </div>


</div>

