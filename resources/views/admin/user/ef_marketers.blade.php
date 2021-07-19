@extends('layouts.admin')

@section('title')
All E.F Maketers |
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	<div class="container">
		@include('layouts.backend_partials.status')
	</div>

	<section class="content">

		<div class="row">
			<div class="col-xs-12">



				<div class="box" >
					<div class="box-header">
						<h3 class="box-title"> {{ url()->current() == route('admin.all_ef_marketers') ? 
        'All' : 'Sorted' }} E.F Marketers</h3>
					</div>
                    @if( url()->current() == route('admin.sort_ef_marketers_sales') )
                        <a class="btn btn-primary" href="{{route('admin.all_ef_marketers')}}"> Back To All E.F MArketers</a>
                    @endif

					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th>Total Sales</th>
                                        <th> reg date</th>
                                        <th> Downline </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($efmarketers as $key => $efmarketer)
                                        <tr>
                                            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                            <td> {{ $efmarketer->name }} </td>
                                            <td><span class="text-muted"> </i> {{ $efmarketer->email }} </span> </td>

                                            <td> {{ $efmarketer->ref ??  $efmarketer->referals->count() }} </td>

                                            <td> {{ $efmarketer->created_at->format('d/m/Y') }} </td>
                                            <td class="center">
                                                    <a href="{{route('efMarketerDownline', $efmarketer->slug)}}" 
                                                        class="btn btn-warning "><i class="fa fa-eye"></i>View Downlines</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
					</div>

        <div class="form-stretch">
           
            <div class="row">
                <div class="col-md-3">
                    <h3 class="box-title"> Sort By Date </h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal form-element" 
                action="{{ route('admin.sort_ef_marketers_sales') }}" method="POST">
                @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">From</label>
                            <input type="date" name="start_date" class="form-control">
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
                            <input type="date" name="end_date" class="form-control">
                            @error('end_date')
                            <span class="error">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="">
                            <button type="submit" class="btn btn-warning"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
					<!-- /.box-body -->
				</div>


				<!-- /.content -->
			</div>

		</div>


	</section>
</div>

@endsection


