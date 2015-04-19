<?php

class DashboardController extends BaseController {


    /* 
    ***     Route: '/'
    ***     Check if user is authorized or not
     */
    public function getIndex()
    {   
      return View::make('frontEnd.dashboard');    
    }

}

?>