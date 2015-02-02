@extends('layouts.master')
@section('css')
	@include('layouts.css.css-global-mandatory')
	@include('layouts.css.css-theme-style')
	@include('layouts.css.css-login-page-level-style')
	@yield('page-css')	
@stop

@section('contents')
<body class="page-header-fixed page-quick-sidebar-over-content">
	@include('layouts.banner')
	<div class="clearfix"> </div>
	<div class="page-container">
		@include('layouts.sidebar')
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1023px">
				@yield('notification')
			</div> <!-- end page-content -->
		</div> <!-- end page-content-wraper -->
	</div> <!-- end page-container -->
@stop

@section('js')
@include('layouts.js.js-core-plugin')
@include('layouts.js.js-login-page-level-plugin')
@include('layouts.js.js-page-level-plugin')
@include('layouts.js.js-page-level-script')
@yield('page-js')
@stop