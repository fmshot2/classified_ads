
@extends('layouts.admin')

@section('title', 'Sliders')

@section('content')
    <div class="content-wrapper" style="min-height: 868px;">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        @if ($errors->any())
                            <div class="alert alert-danger" style="border-radius: 0; background-color: #f15a58">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
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
                                <div class="col-md-12">
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
                                                                    <a onclick="updateSlide({{$slider->id}})" class="btn btn-sm btn-info "><i class="fa fa-pencil-square-o"></i></a>
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
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>



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
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""> Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""> Buttton Text <span class="text-danger">*</span></label>
                                        <input type="text" name="buttontext" class="form-control" placeholder="Get Started!" required>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Details <span class="text-danger">*</span></label>
                                        <input type="text" name="details" class="form-control" placeholder="Slider Details">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Button Location <span class="text-danger">*</span></label>
                                        <select name="buttonlocation" class="form-control" required>
                                            <option value="nobutton">No Button</option>
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                            <option value="center">Center</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Link <span class="text-danger">*</span></label>
                                        <input type="text" name="link" class="form-control" placeholder="Edit Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Slider Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Select Image"  required>
                                        @if ($errors->has('image'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
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
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""> Title</label>
                                        <input type="text" name="title" id="editTitle" class="form-control" placeholder="Edit Title">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""> Buttton Text </label>
                                        <input type="text" name="buttontext" class="form-control" id="editButtontext" placeholder="Get Started!">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Details</label>
                                        <input type="text" name="details" id="editDetails" class="form-control" placeholder="Edit Details">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Button Location</label>
                                        <select name="buttonlocation" id="editButtonLocation" class="form-control">
                                            <option value="nobutton">No Button</option>
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                            <option value="center">Center</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Link</label>
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
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" name="brand_name" id="editbrand_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website_link">Website Link</label>
                                        <input type="text" name="website_link" id="editwebsite_link" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" name="client_name" id="editclient_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_email">Client Email</label>
                                        <input type="email" name="client_email" id="editclient_email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_phone">Phone Number</label>
                                        <input type="number" name="client_phone" id="editclient_phone" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start_date" id="editstart_date" class="form-control" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="editend_date" class="form-control" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Advert Location</label>
                                        <select name="advert_location" id="editadvert_location" class="form-control" required>
                                            <option selected disabled>- Select a location -</option>
                                            @if ($advertlocations)
                                                @foreach ($advertlocations as $advertlocation)
                                                    <option value="{{ $advertlocation->id }}">{{ $advertlocation->title }}</option>
                                                @endforeach

                                            @else
                                                <p>No location</p>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ad_image">Ad Image</label>
                                        <input type="file" name="ad_image" id="editAdvertImage" class="form-control" placeholder="Select Image">
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
                        <h4 class="tx-17 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Advert</h4>
                    </div>
                    <div class="modal-body pd-20">
                        <form action="{{ route('advertisement.create' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name <span class="text-danger">*</span></label>
                                        <input type="text" name="brand_name" class="form-control" placeholder="Enter the brand name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website_link">Website Link</label>
                                        <input type="text" name="website_link" class="form-control" placeholder="Enter the brand website link" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_name">Client Name <span class="text-danger">*</span></label>
                                        <input type="text" name="client_name" class="form-control" placeholder="Enter client name">
                                    </div required>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_email">E-mail Address <span class="text-danger">*</span></label>
                                        <input type="email" name="client_email" class="form-control" placeholder="Enter client email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_phone">Phone Number <span class="text-danger">*</span></label>
                                        <input type="number" name="client_phone" class="form-control" placeholder="Client Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="client_address">Client Address</label>
                                        <input type="text" name="client_address" class="form-control" placeholder="The client physical address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start_date" class="form-control" placeholder="The AD start date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date <span class="text-danger">*</span></label>
                                        <input type="date" name="end_date" class="form-control" placeholder="AD end date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Advert Location <span class="text-danger">*</span></label>
                                        <select name="advert_location" class="form-control" required>
                                            <option selected disabled>- Select a location -</option>
                                            @if ($advertlocations)
                                                @foreach ($advertlocations as $advertlocation)
                                                    <option value="{{ $advertlocation->id }}">{{ $advertlocation->title }}</option>
                                                @endforeach

                                            @else
                                                <p>No location</p>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Slider Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Select Banner Image">
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
                        $('#editButtontext').val(result.buttontext);
                        $('#editButtonLocation').val(result.buttonlocation);
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
                        $('#editbrand_name').val(result.brand_name);
                        $('#editwebsite_link').val(result.website_link);
                        $('#editclient_email').val(result.client_email);
                        $('#editclient_name').val(result.client_name);
                        $('#editclient_phone').val(result.client_phone);
                        $('#editclient_address').val(result.client_address);
                        $('#editstart_date').val(result.start_date);
                        $('#editend_date').val(result.end_date);
                        $('#editadvert_location').val(result.advert_location);
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


