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

    public function getCourse()
    {   
      return View::make('frontEnd.course');    
    }

    public function getTutor()
    {   
      return View::make('frontEnd.tutor');    
    }

    public function getDashboard()
    {   
      return View::make('frontEnd.dashboard');    
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