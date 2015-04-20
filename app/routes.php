<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//print $password = Hash::make('password');
//print App::environment();
Route::controller('ajax','AjaxController');
Route::get("/login",array('uses'=>"LoginController@getLoginPage"));
Route::POST("/login",array('uses'=>"LoginController@postLogin"));
Route::get("/registration",array('uses'=>"LoginController@getRegistrationPage"));
Route::get("/forget-password",array('uses'=>"LoginController@getForgetPasswordPage"));
Route::controller('admin','AdminController');
Route::controller('course','CourseController');
Route::controller('tutor','TutorController');
Route::controller('dashboard','DashboardController');
Route::controller('/','HomeController');