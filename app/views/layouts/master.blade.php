<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<head>

		<title>Metronic Frontend Test</title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="This is a Metronic Frontend test" name="description"/>
		<meta content="Dingding Pan" name="author"/>

		@yield('css')
		<!-- favicon icon -->
		<link rel="shortcut icon" href="assets/favicon.ico"/>
		<style>.global{color: #FF0000;}</style>

	</head>

		@if(Session::has('global'))
			<p class='global'>{{ Session::get('global') }}</p>
		@endif
		@yield('contents')

		@include('layouts.footer')
		@yield('js')
		
	</body>
<!-- END BODY -->
</html>