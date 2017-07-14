<header class="navbar navbar-default navbar-inverse navbar-fixed-top top-menu" role="banner">
	<a href="{{ URL::route( 'dashboard' ) }}" class="navbar-brand" title="A Virtual Shopping Center" style="color:#102;">
		<div class="animated bounceInRight"><span class="site-title">e</span>Commerce</div>
	</a>
	
	<div class="navbar-header">
		<button type="button" class="navbar-toggle res-btn" data-toggle="collapse" data-target="#collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!--  .navbar-toggle -->
	</div><!-- .navbar-header  -->

	<nav class="collapse navbar-collapse" id="collapse" role="navigation">
		<ul class="nav navbar-nav navbar-right u-img">
			<li class="img-thumbnail animated bounceIn">{{ HTML::image('assets/dist/img/alamin.jpg') }}</li>
			<li class="dropdown">
			    <a class="dropdown-toggle animated rollIn" data-toggle="dropdown" href="#" style="color:#269;">
	    	    	@if( $username )
			      		{{ $username->name }} 
			      		<span class="caret"></span>
			      	@endif
			    </a><!-- .dropdown-toggle  -->
			    <ul class="dropdown-menu" role="menu">
			    	<li>{{ HTML::link( 'siteadmins/logout', 'Logout', array('onclick' => 'return confirm("Are you sure, you want to logout in this area ?");') ) }}</li>
			    </ul><!-- .dropdown-menu  -->
		  </li><!-- .dropdown  -->
		</ul><!-- .nav navbar-nav .navbar-right -->
	</nav><!-- .collapse navbar-collapse #collapse  -->
</header><!-- .navbar navbar-default .navbar-inverse .navbar-fixed-top  -->