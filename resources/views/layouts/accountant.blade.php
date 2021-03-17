
<!DOCTYPE html>
<html lang="en">
<meta name="_token" content="{{csrf_token()}}"/>



@include('layouts.accountant_partials.head')

<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">

	@include('layouts.accountant_partials.navbar')
	@include('layouts.accountant_partials.sidebar')

	@yield('content')

	@include('layouts.accountant_partials.footer')
    @include('layouts.accountant_partials.script')

</body>

</html>
