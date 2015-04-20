<?php

class LoginController extends BaseController {


    /* 
    ***     Route: '/'
    ***     Check if user is authorized or not
     */
    public function getLoginPage()
    {   
		if(Auth::check()){
			return View::make('login');
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

    public function postLogin(){
        $remember = array_key_exists('remember',$_POST);

        if (Auth::attempt(array('user_name' => $_POST['username'], 'password' => $_POST['password'], 'activated' => 1),$remember))
        {
            return Redirect::intended('/');
        }
        // return View::make('notification.login-notification', array('loginInformation' => 'Login Error<br>Please check your username / password.<br>Make sure you have actived your account. <br>Thank you'));
        return "Check password";
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::intended('/');
    }

}

?>