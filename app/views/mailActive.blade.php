<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.2.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Form Stuff - Form Controls</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
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

