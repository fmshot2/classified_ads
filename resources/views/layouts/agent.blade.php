
<!DOCTYPE html>
<html lang="en">
<meta name="_token" content="{{csrf_token()}}"/>



@include('layouts.agent_partials.head')

<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">

	@include('layouts.agent_partials.navbar')
	@include('layouts.agent_partials.sidebar')

	@yield('content')

	@include('layouts.agent_partials.footer')
    @include('layouts.agent_partials.script')

</body>

</html>
