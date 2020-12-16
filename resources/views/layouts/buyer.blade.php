
<!DOCTYPE html>
<html lang="en">


@include('layouts.buyer_partials.head')

<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">


	@include('layouts.buyer_partials.navbar')
	@include('layouts.buyer_partials.sidebar')

	@yield('content')

	@include('layouts.buyer_partials.footer')
	@include('layouts.buyer_partials.script')

</body>

</html>
