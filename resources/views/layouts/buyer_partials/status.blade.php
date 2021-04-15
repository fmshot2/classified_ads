
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</div>
@endif



@if (session('status'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-check"></i> Alert!</h4>
	{{ session('status') }}
</div>
@endif


@if (session('fail'))
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	{{ session('fail') }}
</div>
@endif
