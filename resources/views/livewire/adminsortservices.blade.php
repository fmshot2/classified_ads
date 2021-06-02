<div>
	<div class="form-stretch">
		<div class="row">
			<div class="col-md-2">
				<h3 class="box-title"> Sort By Date </h3>
			</div>
			<!-- form start -->
			<form class="form-horizontal form-element"wire:submit.prevent="submit">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">From</label>
						<input type="date" wire:model="start_date" class="form-control">
						@error('start_date')
						<span class="error">
							<strong class="text-danger">{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">To</label>
						<input type="date" wire:model="end_date" class="form-control">
						@error('end_date')
						<span class="error">
							<strong class="text-danger">{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="col-md-2">
					<div class="">
						<button type="submit" class="btn btn-warning"> Submit </button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div>
	@foreach ($all_services as $all_service)
	<div>
		{{ $all_service->name }}
	</div>
	@endforeach
</div>


<!-- /.box-header -->
<div class="box-body">
	<div class="table-responsive">
		<table class="display table table-bordered data_table_main">
			<thead>
				<tr>
					<th> SL </th>
					<th> Image </th>
					<th> Title </th>
					<th> Phone </th>
					<th> State </th>
					<th> Status </th>
					<th> Featured </th>
					<th> Date </th>
					<th> Actions </th>
				</tr>
			</thead>

			
		</table>
	</div>
</div>

