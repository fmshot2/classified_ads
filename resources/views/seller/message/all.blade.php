@extends('layouts.seller')

@section('title')
All Message Table | 
@endsection

@section('content')

<br>
<hr>

<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Message </h3>
						<h6 class="box-subtitle"> Sorting is from the most recent. </h6>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> SL </th>
									<th> Name </th>
									<th> Email </th>
									<th> Subject </th>
									<th> Status </th>
									<th> Action </th>
								</tr>
							</thead>

							<tbody>

								@foreach($all_message as $key =>  $all_messages)


								<tr role="row" class="odd">
									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>

									<td> {{ $all_messages->buyer_name }} </td>
									<td> {{ $all_messages->buyer_email }} </td>
									<td> {{ $all_messages->description }} </td>
									<td> {{ $all_messages->status == 1 ? 'read' : 'unread' }} </td>

									<td class="center">
										<a href=" {{ route('seller.message.view',$all_messages->slug) }} " class="btn btn-warning "><i class="fa fa-eye"></i></a>
										<a href="{{ route('seller.message.reply',$all_messages->slug) }} " class="btn btn-warning "><i class="fa fa-reply"></i></a>
									</td>
								</tr>

								@endforeach

							</tbody>


						</table>


					</div>
					<!-- /.box-body -->
				</div>


				<!-- /.content -->
			</div>	



		</div>

	</div>
</section>

@endsection