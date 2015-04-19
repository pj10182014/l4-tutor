@extends('layouts.master')
@section('css')
	<!-- Page level plugin styles START -->
	{{ HTML::style('assets/global/plugins/fancybox/source/jquery.fancybox.css');}}
	{{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css');}}
	<!-- Page level plugin styles END -->
<style>
	.error-placeholder{
		background-color: yellow !important;
	}
</style>
@stop

@section('contents')
<body class="corporate">
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Login</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
        
          <!-- BEGIN SIDEBAR -->
          @include("layouts.sidebar")
          <!-- END SIDEBAR -->
          
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Login</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal form-without-legend" role="form">
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control" id="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control" id="password">
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-lg-8 col-md-offset-4 padding-left-0">
                      <input type="checkbox" name="remember" value="1"/> Remember me </label>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0">
                        <a href="/forget-password">Forget Password?</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p class="text-muted">or login using:</p>
                            <ul class="social-icons">
                                <li><a href="#" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                <li><a href="#" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                <li><a href="#" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                                <li><a href="#" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

                    <button type="button" class="btn btn-default">More details</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@stop

@section('js')
  <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
	{{ HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js');}}
	{{ HTML::script('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js');}}
	{{ HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js');}}
<script>
	$(document).ready(function() {

		Layout.init();
    Layout.initUniform();
    Layout.initTwitter();
    Layout.initFixHeaderWithPreHeader();

		//if url has #register #register-btn will auto click
		var pathname = window.location.href;
		var n = pathname.indexOf("#register");
		if(n > 0){
			$('#register-btn').click();
		}

		//Username Sign up input forcus out
		$("#username-signup").focusout(function() {
			var username = $('#username-signup').val();
			$.ajax({
				type: 'POST',
				url: "/ajax/validate-username",
				data: {username: username},
				dataType: "json",
				success: function( data ){
					if (data['exist'])
					{
						$('#username-signup').val('');
						$('#username-signup').attr('placeholder', 'User Exists');
						$('#username-signup').addClass('error-placeholder');	
					};
				}
			});  //end ajax
		});  //end username-signup focusout

		$("#username-signup").focusin(function() {
			$("#username-signup").removeClass('error-placeholder');
			$('#username-signup').attr('placeholder', 'Username');
		});  //end username-signup forcusin

	}); //end document ready
</script>
{{-- END PAGE LEVEL JAVASCRIPT --}}
@stop
