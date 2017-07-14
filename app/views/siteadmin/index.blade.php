@extends( 'siteadmin.master' )

@section( 'content' )
	<div class="col-lg-12">
		@include( 'siteadmin.topnav' )	
	</div><!--  .col-lg-12 -->

	<div class="main-content" id="wrapper">
		<div class="col-lg-2 left-menu" id="sidebar-wrapper">
			@include( 'siteadmin.left-menu' )
		</div><!-- .col-lg-2  -->

		<div class="col-lg-12">
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">M</a>
			
			{{-- Delete msg show here --}}
			@if( Session::has( 'delete-msg' ) )
				<div class="alert alert-success">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p>{{ Session::get( 'delete-msg' ) }}</p>
				</div><!-- .alert .alert-success  -->
			@endif

			<ol class="breadcrumb animated bounceInLeft">
				<li><a href="{{ URL::route( 'dashboard' ) }}">{{ 'Dashboard' }}</a></li>
			  	<li class="active">Home</li>
			</ol><!-- .breadcrumb  -->

			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				<div class="row animated bounceInLeft" style="border: 1px solid #ccc;">
					<div class="col-lg-4 text-center">
						<h4 class="page-header">Pageview</h4>
						<p>120</p>
					</div><!--  .col-lg-4 -->

					<div class="col-lg-4 text-center">
						<h4 class="page-header">Order</h4>
						<p>5</p>
					</div><!-- .col-lg-3  -->

					<div class="col-lg-4  text-center">
						<h4 class="page-header">Sales</h4>
						<p>$159</p>
					</div><!-- .col-lg-4  -->
				</div><!--  .row  -->

				<div class="row" style="border: 1px solid #ccc;margin-top:15px;padding-left: 5px;">
					<h5 class="page-header"><i class="fa fa-shopping-cart fa-fw"></i>&nbsp;Orders</h5>
					<div class="row" style="color: #F15A23;">
						<div class="col-lg-4 animated bounceInDown">
							<p>Total</p>
						</div><!--  .col-lg-4 -->
						
						<div class="col-lg-4 animated rollIn">
							<p>5</p>	
						</div><!-- .col-lg-4  -->
					</div><!--  .row -->

					<div class="row" style="color: green;">
						<div class="col-lg-4 animated bounceInDown">
							<p>Completed</p>
						</div><!--  .col-lg-4 -->
						
						<div class="col-lg-4 animated rollIn">
							<p>0</p>	
						</div><!-- .col-lg-4  -->
					</div><!--  .row -->

					<div class="row" style="color: #125;">
						<div class="col-lg-4 animated zoomIn">
							<p>Pending</p>
						</div><!--  .col-lg-4 -->
						
						<div class="col-lg-4 animated zoomIn">
							<p>0</p>	
						</div><!-- .col-lg-4  -->
					</div><!--  .row -->

					<div class="row" style="color: #250;">
						<div class="col-lg-4 animated flip">
							<p>Processing</p>
						</div><!--  .col-lg-4 -->
						
						<div class="col-lg-4 animated flip">
							<p>0</p>	
						</div><!-- .col-lg-4  -->
					</div><!--  .row -->

					<div class="row" style="color: #A1500A">
						<div class="col-lg-4 animated wobble">
							<p>Cancelled</p>
						</div><!--  .col-lg-4 -->
						
						<div class="col-lg-4 animated wobble">
							<p>0</p>	
						</div><!-- .col-lg-4  -->
					</div><!--  .row -->

					<div class="row" style="color: #296">
						<div class="col-lg-4 animated swing">
							<p>On hold</p>
						</div><!--  .col-lg-4 -->
						
						<div class="col-lg-4 animated swing">
							<p>1</p>	
						</div><!-- .col-lg-4  -->
					</div><!--  .row -->
				</div><!--  .row  -->
			</div><!--  .col-lg-5  -->

			<div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2" style="border: 1px solid #ccc;">
				<p class="animated bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente molestiae dolore, sit sunt aspernatur quae soluta, quibusdam dignissimos suscipit quas consequatur ipsam aliquid, unde accusantium porro architecto deserunt optio, odio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente molestiae dolore, sit sunt aspernatur quae soluta, quibusdam dignissimos suscipit quas consequatur ipsam aliquid, unde accusantium porro architecto deserunt optio, odio.</p>
			</div><!--  .col-lg-5  -->
		</div><!-- .col-lg-10 -->
	</div><!-- .main-content  -->
@stop