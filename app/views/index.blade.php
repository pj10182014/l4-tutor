@extends('layouts.master')
@section('contents')
	<p>hehehe I am in here </p>
	<a href="{{action('HomeController@getLogout')}}">logout</a>
@stop