
@extends('layouts.admin')

@section('title', 'Sliders')

@section('content')
    <div class="content-wrapper" style="min-height: 868px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad" style="">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="box-body">
                                        <h3 class="box-title">Home Banner Slider <a data-toggle="modal" data-target="#addSlideModal" onclick="addSlide()" class="btn btn-sm btn-success">Add Slide</a></h3>

                                        <div class="table-responsive">
                                            <table class="display table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> SL </th>
                                                        <th> Slider </th>
                                                        <th> Title </th>
                                                        <th> Details </th>
                                                        <th> Link </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if (isset($sliders))
                                                        @foreach($sliders as $key => $slider)
                                                            <tr>
                                                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                                                <td>
                                                                    <img src="{{ asset('uploads/sliders') }}/{{ $slider->image }}"  alt="{{ $slider->title }}" width="60" class="img-responsive img-rounded">
                                                                </td>
                                                                <td> {{ $slider->title }} </td>
                                                                <td> {{ $slider->details }} </td>
                                                                <td> <a href="{{ $slider->links }}">{{ $slider->links }}</a> </td>

                                                                <td class="center">
                                                                    <a onclick="updateSlide({{$slider->id}})" class="btn btn-sm btn-info " style="margin-bottom: 5px"><i class="fa fa-pencil-square-o"></i></a>
                                                                    <a onclick="deleteSlide({{$slider->id}})" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <p>No Slide!</p>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>



                                <div class="col-md-5">
                                    <div class="box-body">
                                        <h3 class="box-title">Advert Slider <a data-toggle="modal" data-target="#addAdvertSlideModal" onclick="addAdvertSlide()" class="btn btn-sm btn-success">Add Slide</a></h3>

                                        <div class="table-responsive">
                                            <table class="display table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> SL </th>
                                                        <th> Slider </th>
                                                        <th> Link </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if (isset($AdvertSliders))
                                                        @foreach($AdvertSliders as $key => $adslider)
                                                            <tr>
                                                                <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                                                <td>
                                                                    <img src="{{ asset('uploads/sponsored') }}/{{ $adslider->image }}"  alt="{{ $adslider->title }}" width="60" class="img-responsive img-rounded">
                                                                </td>
                                                                <td> <a href="{{ $adslider->links }}">{{ $adslider->links }}</a> </td>

                                                                <td class="center">
                                                                    <a  onclick="updateAdvert({{$adslider->id}})" class="btn btn-sm btn-info "><i class="fa fa-pencil-square-o"></i></a>
                                                                    <a onclick="deleteAdvert({{$adslider->id}})" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <p>No Slide!</p>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>


        <div id="editSlideModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Slider</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form id="editSliderForm" action="" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""> Title <span class="tx-danger">*</span></label>
                                        <input type="text" name="title" id="editTitle" class="form-control" placeholder="Edit Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Details <span class="tx-danger">*</span></label>
                                        <input type="text" name="details" id="editDetails" class="form-control" placeholder="Edit Details">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Link <span class="tx-danger">*</span></label>
                                        <input type="text" name="link" id="editLinks" class="form-control" placeholder="Edit Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Slider Image</label>
                                        <input type="file" name="image" id="editImage" class="form-control" placeholder="Select Image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pd-x-20">Update Slider</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="addSlideModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Slider</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form id="editGuestForm" action="{{route('slider.create' )}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""> Title <span class="tx-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Details <span class="tx-danger">*</span></label>
                                        <input type="text" name="details" class="form-control" placeholder="Details">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Link <span class="tx-danger">*</span></label>
                                        <input type="text" name="link" class="form-control" placeholder="Edit Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Slider Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Select Image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success pd-x-20">Add Slide</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->




        <div id="editAdvertSlideModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Slider</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form id="editAdvertForm" action="" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seller_name">Seller Name <span class="tx-danger">*</span></label>
                                        <input type="text" name="seller_name" id="editAdvertSellerName" class="form-control" placeholder="Seller Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seller_id">Seller ID <span class="tx-danger">*</span></label>
                                        <input type="text" name="seller_id" id="editAdvertSellerID" class="form-control" placeholder="Seller ID">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Seller ID <span class="tx-danger">*</span></label>
                                        <input type="email" name="email" id="editAdvertEmail" class="form-control" placeholder="E-mail Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="tx-danger">*</span></label>
                                        <input type="number" name="phone" id="editAdvertPhone" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ref_no">Ref No. <span class="tx-danger">*</span></label>
                                        <input type="text" name="ref_no" id="editAdvertRefNo" class="form-control" placeholder="Ref No.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startDate">Start Date <span class="tx-danger">*</span></label>
                                        <input type="date" name="startDate" id="editAdvertStartDate" class="form-control" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endDate">End Date <span class="tx-danger">*</span></label>
                                        <input type="date" name="endDate" id="editAdvertEndDate" class="form-control" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Category <span class="tx-danger">*</span></label>
                                        <input type="text" name="category" id="editAdvertCategory" class="form-control" placeholder="Advert Category">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link">Link <span class="tx-danger">*</span></label>
                                        <input type="text" name="links" id="editAdvertLinks" class="form-control" placeholder="Ad Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Ad Image</label>
                                        <input type="file" name="image" id="editAdvertImage" class="form-control" placeholder="Select Image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pd-x-20">Update Advert</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="addAdvertSlideModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Slider</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form action="{{ route('admin.advert.save_slider' ) }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seller_name">Seller Name <span class="tx-danger">*</span></label>
                                        <input type="text" name="seller_name" class="form-control" placeholder="Seller Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seller_id">Seller ID <span class="tx-danger">*</span></label>
                                        <input type="text" name="seller_id" class="form-control" placeholder="Seller ID">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail Address <span class="tx-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="Seller ID">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="tx-danger">*</span></label>
                                        <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ref_no">Ref No. <span class="tx-danger">*</span></label>
                                        <input type="text" name="ref_no" class="form-control" placeholder="Ref No.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startDate">Start Date <span class="tx-danger">*</span></label>
                                        <input type="date" name="startDate" class="form-control" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endDate">End Date <span class="tx-danger">*</span></label>
                                        <input type="date" name="endDate" class="form-control" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Category <span class="tx-danger">*</span></label>
                                        <input type="text" name="category" class="form-control" placeholder="Advert Category">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="links">Link <span class="tx-danger">*</span></label>
                                        <input type="text" name="links" class="form-control" placeholder="Ad Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Slider Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Select Image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success pd-x-20">Add Advert Slide</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->


        <script>

            function updateSlide(id) {
                event.preventDefault();

                $.ajax({
                    url: '/admin/slider/' + id,
                    method: 'get',
                    success: function(result){
                        console.log(result);
                        $('#editTitle').val(result.title);
                        $('#editDetails').val(result.details);
                        $('#editLinks').val(result.links);
                        $('#editSlider_id').val(result.id);
                        var url = '/admin/update/slider/' + id;
                        $('form#editSliderForm').attr('action', url);
                        $('#editSlideModal').modal('show');
                    }
                });
            }

            function deleteSlide(id) {
                event.preventDefault();
                if (confirm("Are you sure?")) {

                    $.ajax({
                        url: 'delete/sliders/' + id,
                        method: 'get',
                        success: function(result){
                        alert('successfull')
                            window.location.assign(window.location.href);
                        }
                    });

                } else {

                    console.log('Delete process cancelled');

                }
            }


            function updateAdvert(id) {
                event.preventDefault();

                $.ajax({
                    url: '/admin/sponsored/slider/' + id,
                    method: 'get',
                    success: function(result){
                        console.log(result);
                        $('#editAdvertSellerName').val(result.seller_name);
                        $('#editAdvertSellerID').val(result.seller_id);
                        $('#editAdvertPhone').val(result.phone);
                        $('#editAdvertEmail').val(result.email);
                        $('#editAdvertRefNo').val(result.ref_no);
                        $('#editAdvertCategory').val(result.category);
                        $('#editAdvertStartDate').val(result.startDate);
                        $('#editAdvertEndDate').val(result.endDate);
                        $('#editAdvertLinks').val(result.links);
                        var url = '/admin/advert/update_slider/' + id;
                        $('form#editAdvertForm').attr('action', url);
                        $('#editAdvertSlideModal').modal('show');
                    }
                });
            }

            function deleteAdvert(id) {
                event.preventDefault();
                if (confirm("Are you sure?")) {

                    $.ajax({
                        url: '/admin/delete/sponsored/' + id,
                        method: 'get',
                        success: function(result){
                            alert('successfull')
                            window.location.assign(window.location.href);
                        }
                    });

                } else {

                    console.log('Delete process cancelled');

                }
            }
        </script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: 'textarea#basic-example',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        </script>
    <!-- /.content -->
    </div>
@endsection


