<?php

class HomeController extends BaseController {


    /* 
    ***     Route: '/'
    ***     Check if user is authorized or not
     */
    public function getIndex()
    {   
      return View::make('index');    
    }
    
    public function getContact()
    {   
      return View::make('frontEnd.contact');    
    }

    public function getAbout()
    {   
      return View::make('frontEnd.about');    
    }
}

?>