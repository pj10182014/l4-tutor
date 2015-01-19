@extends('layouts.master')
@section('contents')
<body>
	{{ $mailActiveContent }}
	<form action="{{URL::action('HomeController@getMailResend')}}">
		<input type="text" name="email" placeholder="Email">
		<input type="submit">
	</form>
@stop