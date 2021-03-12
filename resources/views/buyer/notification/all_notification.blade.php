@extends('layouts.buyer')

@section('title')
All Notification |
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">
	<section class="content-header">
      <h1>
        General Notices      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('buyer.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">General Notices</li>
      </ol>
    </section>
	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

    <section class="content-header">
        <h3 class="page-title">General  Notice</h3>
        <p class="page-description">This Page Is To Notify You Of Updates And Changes From The EFContact Company.</p>
    </section>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> General  Notice</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<table class="display table table-bordered data_table_main">
							<thead>
								<tr>
									<th> # </th>
									<th> Notification </th>
									<th> Date </th>
									<th> Action </th>
								</tr>

								@foreach($all_notification as $key => $all_notifications)

									<td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
									<td> {{ Str::limit( $all_notifications->description, 100) }} </td>
									<td> {{ $all_notifications->created_at->diffForHumans() }} </td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<!-- View -->
												<li>  <a href=" {{ route('seller.notification.view',$all_notifications->slug) }}" class="btn btn-block" style="margin-left: 8px;"> View </a> </li>
											</ul>

										</ul>
									</div>
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


