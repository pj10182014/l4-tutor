<div class="sidebar col-md-3 col-sm-3">
  <ul class="list-group margin-bottom-25 sidebar-menu">
    <li class="list-group-item clearfix"><a href="/login"><i class="fa fa-angle-right"></i> Login</a></li>
    <li class="list-group-item clearfix"><a href="/registration"><i class="fa fa-angle-right"></i> Register</a></li>
    <li class="list-group-item clearfix"><a href="/forget-password"><i class="fa fa-angle-right"></i> Restore Password</a></li>
    @if(Auth::check())
	    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> My account</a></li>
	    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Address book</a></li>
	    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Wish list</a></li>
	    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Returns</a></li>
	    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Newsletter</a></li>
    @endif
  </ul>
</div>