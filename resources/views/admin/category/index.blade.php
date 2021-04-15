
@extends('layouts.admin')
@section('title', 'Categories | ')

@section('content')
    <div class="content-wrapper" style="min-height: 868px;">
        <div class="container">
            @include('layouts.backend_partials.status')
            @if(Auth::user()->role == 'superadmin')
            <div class="row" style="margin-top: 20px">
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                            <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('superadmin.category.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="control-label">Category Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name Here" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Category Image:</label>
                                        <input type="file" id="file" name="file" class="form-control">
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                                    </div>
                                    <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                        <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('superadmin.subcategory.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="maincategory" class="control-label">Parent Category:</label>
                                    <select class="form-control" name="maincategory" id="maincategory" required>
                                        <option disabled selected>- Select A Category -</option>
                                        @foreach($categoriesList as $key => $maincategory)
                                            <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Sub-Category Name:</label>
                                    <input type="text" class="form-control" name="name" id="subcategoryname" placeholder="Enter Sub Category Name" required>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right">Add Sub-Category</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                    </div>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->role == 'admin')
            <div class="row" style="margin-top: 20px">
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                            <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="control-label">Category Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name Here" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Category Image:</label>
                                        <input type="file" id="file" name="file" class="form-control">
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                                    </div>
                                    <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                        <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('admin.subcategory.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="maincategory" class="control-label">Parent Category:</label>
                                    <select class="form-control" name="maincategory" id="maincategory" required>
                                        <option disabled selected>- Select A Category -</option>
                                        @foreach($categoriesList as $key => $maincategory)
                                            <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Sub-Category Name:</label>
                                    <input type="text" class="form-control" name="name" id="subcategoryname" placeholder="Enter Sub Category Name" required>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right">Add Sub-Category</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                    </div>
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->role == 'cmo')
            <div class="row" style="margin-top: 20px">
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                            <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('cmo.category.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="control-label">Category Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name Here" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Category Image:</label>
                                        <input type="file" id="file" name="file" class="form-control">
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-warning pull-right"> Submit </button>
                                    </div>
                                    <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 20px">
                        <!-- form start -->
                            <form class="form-horizontal form-element" method="POST" action="{{route('cmo.subcategory.store')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="maincategory" class="control-label">Parent Category:</label>
                                    <select class="form-control" name="maincategory" id="maincategory" required>
                                        <option disabled selected>- Select A Category -</option>
                                        @foreach($categoriesList as $key => $maincategory)
                                            <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Sub-Category Name:</label>
                                    <input type="text" class="form-control" name="name" id="subcategoryname" placeholder="Enter Sub Category Name" required>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-warning pull-right">Add Sub-Category</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                    </div>
                    </div>
                </div>
            </div>
            @else
            @endif
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('admin/section/category_table')
                </div>
                <div class="col-md-6">
                    @include('admin/section/sub_category_table')
                </div>
            </div>
        </div>

        {{-- Edit Category Modal  --}}
        <div id="editCategoryModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Category</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form id="editCategoryForm" action="" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category Name: </label>
                                        <input type="text" name="name" id="editCategoryName" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category Image: </label>
                                        <input type="file" name="file" id="editCategoryImage" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pd-x-20">Edit Category</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->


        {{-- Edit Sub Category Modal  --}}
        <div id="editSubCategoryModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Sub Category</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form id="editSubCategoryForm" action="" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category Name: </label>
                                        <input type="text" name="name" id="editSubCategoryName" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Parent Category: </label>
                                        <select class="form-control" name="maincategory" id="editMainCategoryName" required>
                                            <option disabled selected>- Select A Category -</option>
                                            @foreach($categoriesList as $key => $maincategory)
                                                <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pd-x-20">Edit Category</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div>
@endsection

<script>

    function editCategory(id) {

        event.preventDefault();

        $.ajax({
            url: '/admin/dashboard/single/category/' + id,
            method: 'GET',
            success: function(result){
                console.log(result);
                $('#editCategoryName').val(result.name);
                var url = '/admin/dashboard/single/category/' + id;
                $('form#editCategoryForm').attr('action', url);
                $('#editCategoryModal').modal('show');
            }
        });

    }

    function editSubCategory(id) {

        event.preventDefault();
        $.ajax({
            url: '/admin/dashboard/single/subcategory/' + id,
            method: 'GET',
            success: function(result){
                console.log(result);
                $('#editSubCategoryName').val(result.name);
                $('#editMainCategoryName').val(result.category_id);
                var url = '/admin/dashboard/single/subcategory/' + id;
                $('form#editSubCategoryForm').attr('action', url);
                $('#editSubCategoryModal').modal('show');
            }
        });

    }
</script>
