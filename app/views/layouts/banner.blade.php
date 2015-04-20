<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>info@keenthemes.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            @if(Auth::check())
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="/dashboard">{{Auth::user()->firstname." ".Auth::user()->lastname}}</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
            @else
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="/login">Log In</a></li>
                    <li><a href="/registration">Registration</a></li>
                </ul>
            </div>
            @endif
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
  <div class="container">
    <a class="site-logo" href="index.html"><img src="../../assets/frontend/layout/img/logos/logo-corp-blue.png" alt="Metronic FrontEnd"></a>

    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

    <!-- BEGIN NAVIGATION -->
    <div class="header-navigation pull-right font-transform-inherit">
      <ul>
        <li>
          <a class="dropdown-toggle" data-target="#" href="/">HOME</a>
        </li>
        <li>
          <a class="dropdown-toggle" data-target="#" href="/course">COURSE</a>
        </li>
        <li>
          <a class="dropdown-toggle" data-target="#" href="/tutor">TUTOR</a>  
        </li>
        <li>
          <a class="dropdown-toggle" data-target="#" href="/dashboard">DASHBOARD</a>
        </li>
        <li><a href="/contact">CONTACT</a></li>
        <li><a href="/about">ABOUT</a></li>
        <!-- BEGIN TOP SEARCH -->
        <li class="menu-search">
          <span class="sep"></span>
          <i class="fa fa-search search-btn"></i>
          <div class="search-box">
            <form action="#">
              <div class="input-group">
                <input type="text" placeholder="Search" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">Search</button>
                </span>
              </div>
            </form>
          </div> 
        </li>
        <!-- END TOP SEARCH -->
      </ul>
    </div>
    <!-- END NAVIGATION -->
  </div>
</div>
<!-- Header END -->  