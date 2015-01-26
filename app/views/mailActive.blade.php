@extends('layouts.master')
@section('css')
	@include('layouts.css.css-global-mandatory')
	@include('layouts.css.css-theme-style')
	@include('layouts.css.css-login-page-level-style')
@stop
@section('contents')
>>>>>>> 66f518485e378a6d13d784f3ccc5434c869c5ec3
<body class="page-header-fixed page-quick-sidebar-over-content">
	@include('layouts.banner')
	<div class="clearfix"> </div>
	<div class="page-container">
		@include('layouts.sidebar')
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1023px">
				{{ $mailActiveContent }}
				<!-- <div class="row">
					<div class="col-md-6">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Notifycation 
							</div>
						</div>	
						<div class="portlet-body form" style="display: block;">
							<form role="form" action="{{URL::action('HomeController@getMailResend')}}" id="email-resubmission">
								<div class="form-body">
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
										</span>
										<input class="form-control" type="text" name="email" placeholder="Email Address">
									</div>
								</div>
								<div class="form-actions right">
									<button class="btn blue" type="submit">Resend Email</button>
								</div>
							</form>
						</div>
					</div>
				
					</div>						
				</div> -->




				<div class="row">
					<div class="col-md-6">
						<div class="portlet box blue">
							<div class="portlet-title">
							<div class="caption">
							<i class="fa fa-gift"></i>
							Default Form
							</div>
							<div class="tools">
							<a class="collapse" href=""> </a>
							<a class="config" data-toggle="modal" href="#portlet-config"> </a>
							<a class="reload" href=""> </a>
							<a class="remove" href=""> </a>
							</div>
							</div>
							<div class="portlet-body form">
							<form role="form">
							<div class="form-body">
							<div class="form-group">
							<label>Email Address</label>
							<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
							</span>
							<input class="form-control" type="text" placeholder="Email Address">
							</div>
							</div>
							</div>
							<div class="form-actions">
							<button class="btn blue" type="submit">Submit</button>
							<button class="btn default" type="button">Cancel</button>
							</div>
							</form>
							</div>
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>

