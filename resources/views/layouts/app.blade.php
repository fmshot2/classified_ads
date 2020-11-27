
<!DOCTYPE html>
<html lang="en">


@include('layouts.frontend_partials.head')

<body>

	@include('layouts.frontend_partials.navbar')

		@yield('content')

	@include('layouts.frontend_partials.footer')

</body>

</html>
