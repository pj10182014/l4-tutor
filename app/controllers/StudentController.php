<?php

class StudentController extends BaseController {

    public function getIndex()
    {
       return Auth::user()->email;
    }

}

?>