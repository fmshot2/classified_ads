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
                            <a type="button" data-toggle="modal" data-target="#official{{ $official->id }}InfoModal" class="btn btn-default btn-outline"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('admin.delete.official',$official->id) }} " class="btn btn-danger "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <div id="official{{ $official->id }}InfoModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #cc8a19; color: #fff">
                                    <h4 class="modal-title">Edit Official</h4>
                                </div>
                                <form action="{{ route('admin.government.update', ['id' => $official->id]) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Official Name: </label>
                                                    <input type="text" name="name" value="{{ $official->name }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Official Position: </label>
                                                    <input type="text" name="position" value="{{ $official->position }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">State: </label>
                                                    <select class="form-control" name="state">
                                                        <option>- Select State -</option>
                                                        @if(isset($states))
                                                            @foreach($states as $state)
                                                                <option value="{{ trim($state->name) }}" {{ trim($state->name) === trim($official->state) ? 'selected' : '' }}>{{ $state->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Region: </label>
                                                    <input type="text" name="region" value="{{ $official->region }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="file">Official Image:</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Description: </label>
                                                    <textarea name="description" value="{{ $official->description }}" class="form-control summernote">
                                                        {{ $official->description }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn" style="background-color: #cc8a19; color: #fff">Update Official</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
    </div>


  </table>



</div>
<!-- /.box-body -->
</div>


<!-- /.content -->
</div>

