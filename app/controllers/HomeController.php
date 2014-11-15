<?php

class HomeController extends BaseController {

    public function getIndex()
    {
        if (Auth::check())
        {
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
            
            echo $email = Auth::user()->email;
            return $this->getIndex();
        }
    }

    public function getHome()
    {
        echo $email = Auth::user()->user_name;
        return View::make('home');
    }

}

?>