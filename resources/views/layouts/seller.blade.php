
<!DOCTYPE html>
<html lang="en">


@include('layouts.seller_partials.head')

<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">

	@include('layouts.seller_partials.navbar')
	@include('layouts.seller_partials.sidebar')

	@yield('content')

	@include('layouts.seller_partials.footer')
	@include('layouts.seller_partials.script')
	
</body>

</html>
