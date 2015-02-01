@extends('layouts.master')
@section('css')
	@include('layouts.css.css-global-mandatory')
	@include('layouts.css.css-theme-style')
	@include('layouts.css.css-login-page-level-style')
	<style>
		#email-resubmission label.error{
			color: red;
		}
	</style>
@stop
@section('contents')
<body class="page-header-fixed page-quick-sidebar-over-content">
	@include('layouts.banner')
	<div class="clearfix"> </div>
	<div class="page-container">
		@include('layouts.sidebar')
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1023px">
				<div class="row">
					<div class="col-md-6">
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Notifycation 
								</div>
							</div>	<!-- end portlet-title -->
							<div class="portlet-body form" style="display: block;">
								<form role="form" action="{{URL::action('HomeController@getMailResend')}}" id="email-resubmission">
									<div class="form-body">
										{{ $mailActiveContent }}
										@if ($resendForm)
										<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
											</span>
											<input class="form-control" type="text" name="email" placeholder="Email Address">
											<div class="clear"></div>
										</div>
									</div>
									<div class="form-actions right">
										<button class="btn red" type="submit">Resend Email</button>
									</div>
										@endif
								</form>
							</div> <!-- end portlet-body form -->
						</div> <!-- end portlet box red -->
					</div> <!-- end col-md-6 -->
				</div> <!-- end row -->
			</div> <!-- end page-content -->
		</div> <!-- end page-content-wraper -->
	</div> <!-- end page-container -->
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

		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		QuickSidebar.init(); // init quick sidebar
	});
</script>
@stop