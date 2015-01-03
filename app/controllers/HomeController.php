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
        return 'Please activate your account first';
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

        $user = User::create(array(
                'user_name' => $user_name,
                'email'     => $email,
                'password'  => Hash::make($password),
                'code'      => $code,
                'activated' => 0
            ));

        if ($user->save())
        {
            Mail::send('email.confirm', array('link' => URL::action('HomeController@postSignup', $code), 'username' => $user_name), function($m) use($user){
                    $m->to($user->email, $user->username)->subject('Activation Email');
            });
        }
        return Redirect::action('HomeController@getLogin');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@getLogin');
    }

}

?>