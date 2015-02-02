@extends('layouts.notification')
@section('page-css')
<style>
	#email-resubmission label.error{
		color: red;
	}
	.form-group{
		margin: 0;
	}
</style>
@stop
@section('notification')

<div class="row">
	<div class="col-md-6">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Notification 
				</div>
			</div>	<!-- end portlet-title -->
			<div class="portlet-body form" style="display: block;">
				<form role="form" action="{{URL::action('HomeController@getMailResend')}}" id="email-resubmission">
					<div class="form-body">
						{{ $loginInformation }}
					</div>
				</form>
			</div> <!-- end portlet-body form -->
		</div> <!-- end portlet box red -->
	</div> <!-- end col-md-6 -->
</div> <!-- end row -->

<?php
	if(Auth::check()){
		header("refresh:5; url=index.php");
	}
?>
@stop
@section('page-js')
<script>
$(document).ready(function(){
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
});
</script>
@stop

