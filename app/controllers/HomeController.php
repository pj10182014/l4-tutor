<?php

class HomeController extends BaseController {

    public function getIndex()
    {   
        if(Auth::check()){
            return $this->getHome();        
        }else{
            return $this->getLogin();
        }
    }

   
    public function getLogin()
    {
        return View::make('login');
    }

    public function postLogin(){
    
        $remember = array_key_exists('remember',$_POST);

        if (Auth::attempt(array('user_name' => $_POST['username'], 'password' => $_POST['password'], 'activated' => 1),$remember))
        {
            return Redirect::intended('/');
        }
        return 'Error login.  Please check your username / password or make sure you have actived your account.  Thank you';
    }

    public function getHome()
    {
        return View::make('index');
    }

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

    public function getMailActive()
    {
        return View::make('mailActive');
    }

    public function getMailResend()
    {
        $email = Input::get('email');

        $user = User::where('email', '=', $email)->where('activated', '=', '0')->first();
        $user_actived = User::where('email', '=', $email)->where('activated', '=', '1')->first();
        $url_login = URL::action('HomeController@getLogin');

        if ($user_actived) {
            return 'You have already actived your account, please ' . "<a href='$url_login'>login</a>";
        }

        if($user){
            $url_activate = URL::action('HomeController@getActive');
            $url_activate .= "?code=".$user->code;
            $url_activate .= "&user=".$user->user_name;

            Mail::send('email.confirm', array('link' => $url_activate, 'username' => $user->user_name), function($m) use($user){
                    $m->to($user->email, $user->username)->subject('Activation Email');
            });

            return 'Email resent successfully please check your inbox / junkbox';
        }

        return 'Email not valid in the database.  Please ' . "<a href='$url_login'>register</a>" . ' or check for typo.  Thank you.';
    }

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
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@getLogin');
    }

}

?>