@extends('layouts.master')
@include('layouts.css.css-global-mandatory')
@include('layouts.css.css-theme-style')
@include('layouts.css.css-login-page-level-style')
@section('contents')
<body class="page-header-fixed page-quick-sidebar-over-content">
	@include('layouts.banner')
	<div class="clearfix"> </div>
	<div class="page-container">
		@include('layouts.sidebar')
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1023px">
				{{ $mailActiveContent }}
				<form action="{{URL::action('HomeController@getMailResend')}}" id="email-resubmission">
					<input type="text" name="email" type="email" placeholder="Email">
					<input type="submit">
				</form>
			</div>
		</div>
	</div>
@stop

@section('js')
@include('layouts.js.js-core-plugin')
@include('layouts.js.js-login-page-level-plugin')
@include('layouts.js.js-page-level-plugin')
@include('layouts.js.js-page-level-script')
<script>
	$(document).ready(function(){
		$("#email-resubmission").validate({
			rules: {
				email: {
					required: true,
					email: true
				}
			}
		});
	});
</script>
@stop