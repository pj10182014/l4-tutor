@extends('layouts.master')
@section('contents')
<body>
<p>Please check your email inbox / junkbox for the activation email.</p>
<p>Please enter your email again to resend the activation email.</p>
<p>*Might Take a few minutes to receive the activation mail*</p>
<form action="{{URL::action('HomeController@getMailResend')}}">
	<input type="text" name="email" placeholder="Email">
	<input type="submit">
	@if($errors->has('email'))
		<p style="color:#FF0000;">{{ $errors->first('email') }}</p>
	@endif
</form>
@stop