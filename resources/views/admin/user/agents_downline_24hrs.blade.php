
@extends('layouts.admin')

@section('title')
All Agents Downline |
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">

				<a href="{{ route('admin.all_ef_marketers') }}" class="btn btn-warning">Go Back</a>
				<p></p>

				<div class="box" >
					<div class="box-header">
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> role </th>
                                        <th> Applied for Approval?</th>
                                        <th> Date </th>
                                        <th> Activate/Deactivate</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($agent_downlines as $key => $downline)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td> {{ $downline->name }} </td>
                                            <td><span class="text-muted"> </i> {{ $downline->email }} </span> </td>
                                            @if ($downline->role == 'seller')
                                                <td> Service Provider </td>
                                            @elseif($downline->role == 'buyer')
                                                <td> Service Seeker </td>
                                            @endif
                                            <td> {{ $downline->created_at->format('d/m/Y') }} </span></td>
                                            <td>
                                                @if($downline->status == 1)
                                                <span><p id="active_text">Activated</p></span>
                                                @elseif($downline->status == 0)
                                                <span id="active_text2">Deactivated</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
				    </div>
				<!-- /.box-body -->
			</div>


			<!-- /.content -->
		</div>



	</div>

</div>
</section>


@endsection


