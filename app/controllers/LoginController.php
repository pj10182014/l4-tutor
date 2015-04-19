<?php

class LoginController extends BaseController {


    /* 
    ***     Route: '/'
    ***     Check if user is authorized or not
     */
    public function getLoginPage()
    {   
		if(Auth::check()){
			return View::make('notification.login-notification', array('loginInformation' => 'you already login stupid, page will redirect in few seconds'));
		}else{
			return View::make('login');
		}
    }

    public function getRegistrationPage(){
    	return View::make('registration');
    }

    public function getForgetPasswordPage()
    {
      return View::make('forgetPassword');
    }

}

?>