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
			            <th>Column  1</th>
			            <th>Column 2</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Row 1 gfgf Data 1</td>
			            <td>Row 1 Data 2</td>
			        </tr>
			        <tr>
			            <td>Row 2 Data 1</td>
			            <td>Row 2 Data 2</td>
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