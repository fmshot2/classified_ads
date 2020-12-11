@if (session('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	{{ session('fail') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ session('success') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif






@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</div>
@endif