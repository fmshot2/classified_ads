
<!DOCTYPE html>
<html lang="en">


@include('layouts.backend_partials.head')

<body class="sb-nav-fixed">

	<div id="layoutSidenav">

		@include('layouts.backend_partials.navbar')
		@include('layouts.backend_partials.sidebar')


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">



		@yield('content')

</main>
</div>







		@include('layouts.backend_partials.footer')
		@include('layouts.backend_partials.script')

	</div>


</body>
</html>
