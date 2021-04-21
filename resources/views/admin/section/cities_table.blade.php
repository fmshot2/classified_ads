<div class="box" >
    <div class="box-body">
        <div class="table-responsive">
            <table class="display table table-bordered data_table_main">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Image </th>
                    <th> Name </th>
                    <th> Region </th>
                    <th> Description </th>
                    <th> Slug </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                    @forelse($cities as $key => $city)
                        <tr>
                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                            <td> <img style="width: 50px" class="img-fluid" src="{{ asset('cities_images/'.$city->thumb) }}" alt="{{ $city->name }}"> </td>
                            <td> {{ $city->name }} </td>
                            <td> {{ $city->region }} </td>
                            <td> {!! Str::limit($city->description, 40) !!} </td>
                            <td> {{ $city->slug }} </td>

                            <td class="center">
                                <a type="button" class="btn btn-default btn-outline btn-sm" href="{{ route('admin.city', $city->slug) }}"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.delete.city',$city->slug) }} " class="btn btn-danger "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>

