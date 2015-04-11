<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<head>

		<title>TUTOR</title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="This is a Metronic Frontend test" name="description"/>
		<meta content="Dingding Pan" name="author"/>

		<meta property="og:site_name" content="-CUSTOMER VALUE-">
		<meta property="og:title" content="-CUSTOMER VALUE-">
		<meta property="og:description" content="-CUSTOMER VALUE-">
		<meta property="og:type" content="website">
		<meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
		<meta property="og:url" content="-CUSTOMER VALUE-">

		@include('layouts.css.global.global')
		@yield('css')
		
		<!-- favicon icon -->
		<link rel="shortcut icon" href="assets/favicon.ico"/>

	</head>
		@include('layouts.banner')
		@yield('contents')

		@include('layouts.footer')
		@include('layouts.js.global.global')
		@yield('js')
		
	</body>
<!-- END BODY -->
</html>