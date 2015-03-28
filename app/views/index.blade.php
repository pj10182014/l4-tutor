@extends('layouts.master')
@section('css')
	{{-- BEGIN THEME STYLES --}}
	{{ HTML::style('assets/global/css/components.css');}}
	{{ HTML::style('assets/assets/global/css/plugins.css');}}
	{{-- END THEME STYLES --}}
	@include('layouts.css.css-login-page-level-style')
@stop
@section('contents')
	<body class='corporate'>
@stop

@section('js')
@stop
