<?php

class HomeController extends BaseController {


    /* 
    ***     Route: '/'
    ***     Check if user is authorized or not
     */
    public function getIndex()
    {   
        if(Auth::check()){
            return $this->getHome(); 
        }else{
            return $this->getLogin();
        }
    }

   /*
   ***      Route: '/login'
   ***      login page
    */
    public function getLogin()
    {
        if(Auth::check()){
          return View::make('notification.login-notification', array('loginInformation' => 'you already login stupid, page will redirect in few seconds'));
        }else{
          return View::make('login');
        }
    }

    /*
    ***     Route: '/login'
    ***     post login page
     */
    public function postLogin(){
    
        $remember = array_key_exists('remember',$_POST);

        if (Auth::attempt(array('user_name' => $_POST['username'], 'password' => $_POST['password'], 'activated' => 1),$remember))
        {
            return Redirect::intended('/');
        }
        return View::make('notification.login-notification', array('loginInformation' => 'Login Error<br>Please check your username / password.<br>Make sure you have actived your account. <br>Thank you'));
    }

    /*
    ***     Route: '/'
    ***     homepage
     */
    public function getHome()
    {
        return View::make('index',Auth::user());
    }


    /*
    ***     Route: '/'
    ***     post register / sign up page
     */
    public function postSignup()
    {
        $user_name = Input::get('username');
        $email = Input::get('email');
        $password = Input::get('password');


        $code = str_random(60);
        $url_activate = URL::action('HomeController@getActive');
        $url_activate .= "?code=".$code;
        $url_activate .= "&user=".$user_name;
        
        $user = User::create(array(
                'user_name' => $user_name,
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
        return Redirect::action('HomeController@getAccountActive');
    }

    /*
    ***     Route: 'account-active'
    ***     after sign up, this page shows up to tell users to check the activation email or resend email
    ***     if email submit is actived 'account already actived message shows'
    ***     if email submit is not actived 'email will resend'
     */

    public function getAccountActive()
    {
      $accountActiveContent = 
      '<p>Please check your email inbox / junkbox for the activation email.</p>
      <p>Please enter your email again to resend the activation email.</p>
      <p>*Might Take a few minutes to receive the activation mail*</p>';

      return View::make('notification.account-active-mail-notification', array('accountActiveContent' => $accountActiveContent,'resendForm'=>true));
    }

		/*
		*** Route: 'resend'
		*** For users to send activation emails
		*** If landed on this page when user already actived and/or already logged in - message says 'already actived account'
		*** Else an email field will be provided to re-send email
		 */

    public function getResend(){
      $user = Auth::user();
      
      if($user)
      {        
        return View::make('notification.account-resend-mail-notification', array('accountActiveResendContent' => 'You have already actived your account, please ' . "<a href='/login'>login</a>",'resendForm'=>false));
      }
      else
      {
        return View::make('notification.account-resend-mail-notification', array('accountActiveResendContent' => "Please enter your email to resend you the active email.",'resendForm'=>true));
      }
    }

    /*
    *** Action for activation resend with 3 options:
    *** 1st resend successful
    *** 2nd account already actived please login
    *** 3rd email is not valid please register
     */

    public function postResend()
    {
      $email = Input::get('email');

      $user = User::where('email', '=', $email)->first();
      if($user)
      {
        if($user->activated != 1)
        {
          $url_activate = URL::action('HomeController@getActive');
          $url_activate .= "?code=".$user->code;
          $url_activate .= "&user=".$user->user_name;

          Mail::send('email.account-activation', array('link' => $url_activate, 'username' => $user->user_name), function($m) use($user)
          {
            $m->to($user->email, $user->username)->subject('Activation Email');
          });

          return View::make('notification.account-resend-mail-notification', array('accountActiveResendContent' => 'Email resent successfully please check your inbox / junkbox','resendForm'=>true));
        }
        else
        {
          return View::make('notification.account-resend-mail-notification', array('accountActiveResendContent' => 'You have already actived your account, please ' . "<a href='/login'>login</a>",'resendForm'=>false));
        }
      }
      else
      {
        return View::make('notification.account-resend-mail-notification', array('accountActiveResendContent' => 'Email not valid in the database.  Please ' . "<a href='login#register'>register</a>" . ' or check for typo.  Thank you.','resendForm'=>true));
      }
    }


    /*
    *** Route: 'active?code=NFAOtrmqIpQnr5ccpmifAq4TVu0t0DaOFThcmb0aCzY10hzkVLwNQwk7oLAU&user=et1103'
    *** activate link in email clicked with active this function
    *** 1st return if active is successful, redirect
    *** 2nd return if active link failed please re-enter email
    ***	3rd return if user cannot be found in database
     */
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

    /*
    *** Route: 'reset-password'
    *** In homepage after clicking where to reset the password an email can be entered
    *** A 6 random string password will be created and save into database and email to be sent to the user with the password
     */
    public function postResetPassword()
    {
    	$email = Input::get('email');
    	$user = User::where('email', '=', $email)->first();
    	$login_url = $_SERVER['HTTP_HOST'];

    	if ($user)
    	{
    		$random_password = str_random(6);
    		$user->password = Hash::make($random_password);
    		$user->save();

        Mail::send('email.reset-password', array('temp_password' => $random_password, 'username' => $user->user_name, 'login_url' => $login_url), function($m) use($user)
        {
          $m->to($user->email, $user->username)->subject('Reset Password Email');
        });

        return View::make('notification.reset-password-notification', array('resetPasswordContent' => 'A temporary password has been sent to your email '. $user->email . '<br>Please check inbox /junkbox', 'resendForm' => false));
    	}
      return View::make('notification.reset-password-notification', array('resetPasswordContent' => $email . ' cannot be found in the database.  Please enter a valid database.', 'resendForm' => true));
    }

    /*
    ***     Route: 'logout'
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@getLogin');
    }

}

?>