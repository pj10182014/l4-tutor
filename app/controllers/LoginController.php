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

    public function postLogin(){
        $remember = array_key_exists('remember',$_POST);

        if (Auth::attempt(array('user_name' => $_POST['username'], 'password' => $_POST['password'], 'activated' => 1),$remember))
        {
            return Redirect::intended('/');
        }
        // return View::make('notification.login-notification', array('loginInformation' => 'Login Error<br>Please check your username / password.<br>Make sure you have actived your account. <br>Thank you'));
        return "Check password";
    }

    public function getRegistrationPage(){
    	return View::make('registration');
    }

    public function postRegister(){
        $user_name = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $code = str_random(60);
        $url_activate = URL::action('LoginController@getActive');
        $url_activate .= "?code=".$code;
        $url_activate .= "&user=".$user_name;
        
        $user = User::create(array(
                'user_name' => $user_name,
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'email'     => $email,
                'password'  => Hash::make($password),
                'code'      => $code,
                'activated' => 0
            ));

        if ($user->save())
        {
            Mail::send('email.account-activation', array('link' => $url_activate, 'username' => $user_name), function($m) use($user){
                    $m->to($user->email, $user->username)->subject('Activation Email');
            });
        }
        // return Redirect::action('AdminController@getAccountActive');
        echo "register successful";
    }

    public function getActive()
    {
        $active_code = $_GET['code'];
        $user_name = $_GET['user'];      

        $user = User::where('user_name','=',$user_name)->first();
        if ($user)
        {
            if($user->code == $active_code)
            {
                $user->code = '';
                $user->activated = 1;
                $user->save();

                Auth::login($user);

                return Redirect::intended('/')->with('global', 'Account actived! Please Enjoy!');
            }
            else
            {
                return View::make('notification.account-active-mail-notification', array('accountActiveContent' => 'Active Code Failed, Please enter email below to send a new activation email', 'resendForm'=>true));
            }
        }
                else
        {
            return View::make('notification.account-active-mail-notification', array('accountActiveContent' => 'User cannot be found in the database.  Please ' . "<a href='login#register'>register</a>" . ' or check for typo.  Thank you.', 'resendForm'=>false));
        }
    }

    public function getForgetPasswordPage()
    {
      return View::make('forgetPassword');
    }



    public function getLogout()
    {
        Auth::logout();
        return Redirect::intended('/');
    }

}

?>