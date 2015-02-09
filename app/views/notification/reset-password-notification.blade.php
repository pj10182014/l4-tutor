@extends('layouts.notification')
@section('page-css')
<style>
	.form-group{
		margin: 0;
	}
</style>
@stop
@section('notification')

<div class="row">
	<div class="col-md-6">
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Password Reset
				</div>
			</div>	<!-- end portlet-title -->
			<div class="portlet-body form" style="display: block;">
				<form role="form" action="reset-password" id="email-resubmission" method ="POST">
					<div class="form-body">
						{{ $resetPasswordContent }}
						@if ($resendForm)
						<div class="form-group">
							<div class="input-icon">
								<i class="fa fa-envelope"></i>
								<input class="form-control" type="text" name="email" placeholder="Please enter your email">
							</div>
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
@stop
@section('page-js')
<script>
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	
});
</script>
@stop

