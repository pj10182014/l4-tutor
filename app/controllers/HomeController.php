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
        return View::make('login');
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
        return 'Error login.  Please check your username / password or make sure you have actived your account.  Thank you';
    }

    /*
    ***     Route: '/'
    ***     homepage
     */
    public function getHome()
    {
        return View::make('index');
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
            Mail::send('email.confirm', array('link' => $url_activate, 'username' => $user_name), function($m) use($user){
                    $m->to($user->email, $user->username)->subject('Activation Email');
            });
        }
        return Redirect::action('HomeController@getMailActive');
    }

    /*
    ***     Route: 'mail-active'
    ***     after sign up, this page shows up to tell users to check the activation email or resend email
    ***     if email submit is actived 'account already actived message shows'
    ***     if email submit is not actived 'email will resend'
     */

    public function getMailActive()
    {
        $mailActiveContent = 
        '<p>Please check your email inbox / junkbox for the activation email.</p>
        <p>Please enter your email again to resend the activation email.</p>
        <p>*Might Take a few minutes to receive the activation mail*</p>';

        return View::make('mailActive', array('mailActiveContent' => $mailActiveContent));
    }

    public function getMailResend()
    {
        $email = Input::get('email');

        $user = User::where('email', '=', $email)->first();
        if($user){
            if($user->activated != 1){
                $url_activate = URL::action('HomeController@getActive');
                $url_activate .= "?code=".$user->code;
                $url_activate .= "&user=".$user->user_name;

                Mail::send('email.confirm', array('link' => $url_activate, 'username' => $user->user_name), function($m) use($user){
                        $m->to($user->email, $user->username)->subject('Activation Email');
                });

                return View::make('mailActive', array('mailActiveContent' => 'Email resent successfully please check your inbox / junkbox'));

            }else{
                return View::make('mailActive', array('mailActiveContent' => 'You have already actived your account, please ' . "<a href='/login'>login</a>"));
            }
        }else{
            return 'Email not valid in the database.  Please ' . "<a href='login#register'>register</a>" . ' or check for typo.  Thank you.';
        }

        
    }


    /*
    ***     Route: 'active?code=NFAOtrmqIpQnr5ccpmifAq4TVu0t0DaOFThcmb0aCzY10hzkVLwNQwk7oLAU&user=et1103'
    ***     activate link in email clicked with active this function
     */
    public function getActive()
    {
        $active_code = $_GET['code'];
        $user_name = $_GET['user'];      

        $user = User::where('user_name','=',$user_name)->first();
        if($user->code == $active_code){
            $user->code = '';
            $user->activated = 1;
            $user->save();

            Auth::login($user);
            
            return Redirect::intended('/')->with('global', 'account actived');
        }else{

        }
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