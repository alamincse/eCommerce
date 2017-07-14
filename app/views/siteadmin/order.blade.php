@extends( 'siteadmin.master' )
@section( 'content' )
	@include( 'siteadmin.topnav' )
	
	<div class="main-content" id="wrapper">
		<div class="col-lg-2 left-menu" id="sidebar-wrapper">
			@include( 'siteadmin.left-menu' )
		</div><!-- .col-lg-2  -->

		<div class="col-lg-12">
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">M</a>
			<ol class="breadcrumb">
				<li><a href="{{ URL::route( 'dashboard' ) }}">{{ 'Dashboard' }}</a></li>
			  	<li class="active">Order</li>
			</ol><!-- .breadcrumb  -->
			

			Coming soon...
		</div><!-- .left-menu  -->
	</div><!--  .main-content -->
@stop