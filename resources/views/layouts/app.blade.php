
<!DOCTYPE html>
<html lang="en">



@include('layouts.frontend_partials.head')

<body>

	@include('layouts.frontend_partials.navbar')

		@yield('content')

	@include('layouts.frontend_partials.footer')


	<a id="page_scroller" href="#scroll-top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-chevron-up"></i></a>

</body>

</html>
