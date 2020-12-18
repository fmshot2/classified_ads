<div class="content-wrapper" style="min-height: 735px;">


	<!-- Main content -->


	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				@include('layouts.backend_partials.status')

				<div class="box">
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modaldemo1"><i class="menu-item-icon icon ion-ios-plus-outline tx-20"></i> Active Service Table </button>
					<div class="box-header">
						<h3 class="box-title">Property List</h3>
						<h6 class="box-subtitle">Sorting is from the most recent.</h6>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example_wrapper" class="dataTables_wrapper no-footer"><div class="dt-buttons"><a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Copy</span></a><a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example" href="#"><span>CSV</span></a><a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Excel</span></a><a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example" href="#"><span>PDF</span></a><a class="dt-button buttons-print" tabindex="0" aria-controls="example" href="#"><span>Print</span></a></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div><table id="example" class="table table-bordered table-hover display nowrap margin-top-10 dataTable no-footer" role="grid" aria-describedby="example_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="SL.: activate to sort column descending" style="width: 48px;">SL.</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 81px;">Image</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 213px;">Title</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="State: activate to sort column ascending" style="width: 71px;">State</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending" style="width: 125px;">City</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 107px;"><i class="fa fa-comments p-t-10"></i>Messages</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 56px;"><i class="fa fa-star p-t-10"></i>Likes</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 56px;"><i class="fa fa-star p-t-10"></i>Status</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 82px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($active_service as $key => $active_services)

								<tr role="row" class="odd">
	<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
	<td>
										<a href="https://efcontact.com/admin/properties/milean-ventures">
										</a>
									</td>
						<td> {{ $active_services->name }} </td>
									<td> {{ $active_services->state }} </td>
						<td> {{ $active_services->city }} </td>
						<td> Messagees count here</td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $active_services->experience }} </span> </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> 2 likes </span> </td>
						<td> {{ $active_services->status == 1 ? 'Active' : 'Pending' }} </td>
								>
								</tr>
							@endforeach
							</tbody>

							</table><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a><span><a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="example" data-dt-idx="2" tabindex="0" id="example_next">Next</a></div></div>



						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->



			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
		<!-- BASIC MODAL -->
		<div id="modaldemo1" class="modal fade">
			<div class="modal-dialog modal-dialog-vertical-center" role="document">
				<div class="modal-content bd-0 tx-14">
					<div class="modal-header pd-y-20 pd-x-25">
						<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Service </h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body pd-25">
						<form action="https://efcontact.com/seller/properties" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="fdyJKorCaMWjl45evbVDuFCM1RcH0vhkwOftNfAf">
							<input type="hidden" name="_method" value="POST">              <div class="col-md-12">
								<div class="form-group">
									<label for=""> Title </label>
									<input type="text" name="title" class="form-control" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Price</label>
									<input name="price" type="number" class="form-control" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>State</label>
									<select class="form-control select2" style="width: 100%;" name="state">
										<option value="" disabled="" selected="">Choose Region</option>
										<option value="Abia">Abia</option>
										<option value="Adamawa ">Adamawa </option>
										<option value="Akwa Ibom ">Akwa Ibom </option>
										<option value="Anambra">Anambra</option>
										<option value="Bauchi">Bauchi</option>
										<option value="Bayelsa">Bayelsa</option>
										<option value="Benue ">Benue </option>
										<option value="Borno ">Borno </option>
										<option value="Cross River ">Cross River </option>
										<option value="Delta ">Delta </option>
										<option value="Ebonyi">Ebonyi</option>
										<option value="Edo ">Edo </option>
										<option value="Ekiti ">Ekiti </option>
										<option value="Enugu">Enugu</option>
										<option value="FCT">FCT</option>
										<option value="Gombe">Gombe</option>
										<option value="Imo">Imo</option>
										<option value="Jigawa ">Jigawa </option>
										<option value="Kaduna ">Kaduna </option>
										<option value="Kano ">Kano </option>
										<option value="Katsina ">Katsina </option>
										<option value="Kebbi ">Kebbi </option>
										<option value="Kogi ">Kogi </option>
										<option value="Kwara ">Kwara </option>
										<option value="Lagos ">Lagos </option>
										<option value="Nasarawa ">Nasarawa </option>
										<option value="Niger ">Niger </option>
										<option value="Ogun ">Ogun </option>
										<option value="Ondo ">Ondo </option>
										<option value="Osun ">Osun </option>
										<option value="Oyo ">Oyo </option>
										<option value="Plateau ">Plateau </option>
										<option value="Rivers ">Rivers </option>
										<option value="Sokoto ">Sokoto </option>
										<option value="Taraba ">Taraba </option>
										<option value="Yobe ">Yobe </option>
										<option value="Zamfara ">Zamfara </option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Category</label>
									<select class="form-control select2" style="width: 100%;" name="category_id">
										<option value="" disabled="" selected="">Category</option>
										<option value="16">Agriculture and food</option>
										<option value="19">Animals and pets</option>
										<option value="20">Babies and kids</option>
										<option value="2">Business</option>
										<option value="17">Commercial equipment and tools</option>
										<option value="4">Electronics</option>
										<option value="15">Electronics</option>
										<option value="12">Fashion</option>
										<option value="1">Handy work</option>
										<option value="11">Health and beauty</option>
										<option value="21">Jobs</option>
										<option value="6">Medical</option>
										<option value="3">Property</option>
										<option value="18">Repair and construction</option>
										<option value="14">Seeking work-cv</option>
										<option value="22">Services</option>
										<option value="13">Sport, art and outdoors</option>
										<option value="5">Vehicles</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>SubCategory</label>
									<select class="form-control select2" style="width: 100%;" name="sub_category_id">
										<option value="" disabled="" selected="">SubCategory</option>
										<option value="16">Anti Poison</option>
										<option value="9">Asthmatic Drugs</option>
										<option value="5">Baker</option>
										<option value="2">Barber</option>
										<option value="7">Caterer </option>
										<option value="6">Cobbler </option>
										<option value="10">Cough Syrup</option>
										<option value="11">Cream &amp; Ointments</option>
										<option value="13">Deworming Drugs</option>
										<option value="8">Hair dresser</option>
										<option value="3">Mechanic</option>
										<option value="12">Multi-Vitamins</option>
										<option value="4">Plumber</option>
										<option value="14">Sex Enhancement</option>
										<option value="15">Surgicals</option>
										<option value="1">Tailor</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">City</label>
									<input type="text" name="city" class="form-control" required="" placeholder="City e.g Ikeja">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Address</label>
									<input type="text" name="address" class="form-control" required="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="demo-checkbox">
											<input type="checkbox" id="basic_checkbox_1" name="featured" checked="checked">
											<label for="basic_checkbox_1" title="do you want to feature this property?"> Featured</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Select Features</label>
									<select class="form-control select2" style="width: 100%;" name="features[]" multiple="">
										<option value="" disabled="" selected="">Choose Features</option>
										<option value="2">baker</option>
										<option value="1">carpenter </option>
										<option value="3">shoe maker</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Youtube Link</label>
									<input type="url" name="video" class="form-control">
								</div>
							</div>
							<div class="col-md-3" style="visibility: hidden">
								<div class="form-group">
									<label for="">Youtube Link</label>
									<input type="url" name="video" class="form-control">
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
									<label for="">Description</label>
									<textarea type="text" name="description" class="form-control" required=""></textarea>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image</label>
									<input type="file" name="image" class="form-control" required="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image2</label>
									<input type="file" name="image2" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image3</label>
									<input type="file" name="image3" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image4</label>
									<input type="file" name="image4" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image5</label>
									<input type="file" name="image5" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image6</label>
									<input type="file" name="image6" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image7</label>
									<input type="file" name="image7" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Image8</label>
									<input type="file" name="image8" class="form-control">
								</div>
							</div>


							<div class="modal-footer">
								<button type="submit" class="btn btn-primary pd-x-20">SAVE <i class="fa fa-plus" aria-hidden="true"></i></button>
								<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close <i class="fa fa-ban" aria-hidden="true"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- modal-dialog -->

		</div><!-- modal -->

		<!-- /.content -->
	</div>
































	<!-- Content Header (Page header) -->
	@if (url()->current() == route('admin.service.active') )
	<section class="content-header p-3 box">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Service </a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	@endif

	@include('layouts.backend_partials.status')

	<div class="box">

		<div class="box-header with-border">
			<h3 class="box-title"> Active Service Table</h3>

			@if (url()->current() == route('admin.service.active') )
			<div class="box-tools">
				<form class="" method="GET" action="{{ route('admin.service.search') }}">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

						<div class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
			@endif

		</div>
		<!-- /.box-header -->
		<div class="box-body ">
			<table class="table table-bordered">

				<tbody>

					<tr>
						<th> # </th>
						<th> Name </th>
						<th> Experienced </th>
						<th> is_featured </th>
						<th> Status </th>
						<th> Date </th>
						@if (url()->current() == route('admin.service.active') )
						<th> Action </th>
						@endif
					</tr>

					<tr>
						@foreach($active_service as $key => $active_services)
						<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
						<td> {{ $active_services->name }} </td>
						<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $active_services->experience }} </span> </td>
						<td> {{ $active_services->is_featured == 1 ? 'Yes' : 'No' }} </td>
						<td> {{ $active_services->status == 1 ? 'Active' : 'Pending' }} </td>
						<td> {{ $active_services->created_at->diffForHumans() }} </td>


						@if (url()->current() == route('admin.service.active') )
						<td>

							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">



									<!-- Edit -->
									<form method="post" class="update_form" action=" {{ route('admin.service.status',$active_services->id) }} ">
										@method('PATCH')
										@csrf
										<li>  <button class="btn btn-block" type="submit" style="margin-left: 8px;"> Deactivate </button> </li>
									</form>


									<!-- Delete -->
									<form method="post" class="delete_form" action=" {{ route('admin.service.destroy',$active_services->id) }} ">
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

	@if (url()->current() == route('admin.service.active') )
	<div class="box-footer clearfix">

		{{ $active_service->links() }} 

	</div>
	@endif

</div>

