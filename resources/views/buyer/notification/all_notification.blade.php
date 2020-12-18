@extends('layouts.buyer')

@section('title')
All Notification | 
@endsection

@section('content')

<br>
<hr>


<div class="container">
	@include('layouts.backend_partials.status')
</div>

<div class="content-wrapper" style="min-height: 518px;">

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> Notification </h3>
						<h6 class="box-subtitle"> Sorting is from the most recent. </h6>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="display data_table_main">
							<thead>
								<tr>
									<th> SL </th>
									<th> Notification </th>
									<th> Date </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>

								<tr>

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

							</tbody>
						</table>
					</div>
				</div>


				<!-- /.content -->
			</div>	



		</div>

	</div>
</section>





@endsection