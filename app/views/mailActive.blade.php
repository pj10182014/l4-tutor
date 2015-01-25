@extends('layouts.master')
@include('layouts.global-mandatory-css')
@include('layouts.theme-styles')
@include('layouts.login-css')
@section('contents')
<body class="page-header-fixed page-quick-sidebar-over-content">
	@include('layouts.banner')
	<div class="clearfix"> </div>
	<div class="page-container">
		@include('layouts.sidebar')
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1023px">
				{{ $mailActiveContent }}
				<form action="{{URL::action('HomeController@getMailResend')}}">
					<input type="text" name="email" placeholder="Email">
					<input type="submit">
				</form>
			</div>
		</div>
	</div>
@stop