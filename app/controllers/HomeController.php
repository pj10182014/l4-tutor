<?php

class HomeController extends BaseController {

    public function getIndex()
    {
        return $this->getLogin();
    }

   
    public function getLogin()
    {
        return View::make('index');
    }

    public function postLogin(){
        
    }

}

?>