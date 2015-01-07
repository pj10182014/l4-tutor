@if(Session::has('global'))
	{{ Session::get('global') }}
@endif
<p>hehehe I am in here </p>
<a href="{{action('HomeController@getLogout')}}">logout</a>