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
        return View::make('index');
    }

    public function postLogin(){

        if (Auth::attempt(array('user_name' => $_POST['username'], 'password' => $_POST['password'])))
        {
            return Redirect::intended('/');
        }
    }

    public function getHome()
    {
        return View::make('home');
    }

    public function postSignup()
    {
        if ($_POST)
        {
            var_dump($_POST);
        }
        else
        {
            echo 'error';
        }
    }

}

?>