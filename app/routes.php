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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/contact', function()
{
	return 'Contact page';
});

Route::get('/test-page', function()
{
	return 'Created Nov 4, 2014 testing push from server and if database.php is ignored';
});
