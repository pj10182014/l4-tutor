@extends('layouts.master')
@section('css')
	<!-- Page level plugin styles START -->
	{{ HTML::style('assets/global/plugins/fancybox/source/jquery.fancybox.css');}}
	{{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css');}}
	<!-- Page level plugin styles END -->
@stop

@section('contents')
<!-- Body BEGIN -->
<body class="corporate">
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Registration</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          @include("layouts.sidebar")
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9 sub-container">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <div class="info-container">
                  </div>
                  <form id="register-form" class="form-horizontal" role="form">
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group">
                        <label for="username" class="col-lg-4 control-label">Username <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">First Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="firstname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Last Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="lastname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="email">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Your password</legend>
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="confirm-password">
                        </div>
                      </div>
                    </fieldset>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Create an account</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo quat.</p>

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
    
    $(".btn-primary").click(function(e){
      e.preventDefault();

      var username = $("input[name='username']").val();
      var firstname = $("input[name='firstname']").val();
      var lastname = $("input[name='lastname']").val();
      var email = $("input[name='email']").val();
      var password = $("input[name='password']").val();
      $.ajax({
        method: "POST",
        url: "/registration",
        dataType: "json",
        data: {username: username,
               firstname:firstname,
               lastname:lastname,
               email:email,
               password:password},
        success: function(data){
          switch(data['info']){
            case 'success':
              var info = "User create successful.";
              var details = "details";
              var link = "http://google.ca";
              break;
            case 'fail':
              var info = "User create fail.";
              break;
            case 'mail':
              var info = "Cannot send email.";
              break;
          }
          $('.sub-container').empty();
          $('.sub-container').append('<h3>'+info+'</h3>');
          $('.sub-container').append('<p>'+details+'</p>');
          $('.sub-container').append('<p>please click <a href='+link +'>here</a> to redirect</p>');
        }
      });
    });
  });
 </script>
 @stop