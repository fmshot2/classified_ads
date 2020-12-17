
<!DOCTYPE html>
<html lang="en">


@include('layouts.backend_partials.head')

<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">

	@include('layouts.backend_partials.navbar')
	@include('layouts.backend_partials.sidebar')

	@yield('content')

	@include('layouts.backend_partials.footer')
	@include('layouts.backend_partials.script')

</body>

</html>
