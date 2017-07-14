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

			<ul class="breadcrumb">
				<li><a href="{{ URL::route( 'dashboard' ) }}">{{ 'Dashboard' }}</a></li>
			  	<li><a href="{{ URL::route( 'customer-service' ) }}">Service</a></li>
			  	<li class="active">Edit Customer Service</li>
			</ul><!-- .breadcrumb  -->
			

			{{-- show error msg --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-danger">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-close"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->
			@endif
			
			@foreach( $abouts as $about )
				{{ Form::open( array('route' => array( 'update-about', $about->id ), 'files' => true) ) }}
					<ul class="nav page-header">
						<li><h4>Edit Our Business Plan.</h4></li>
						<li class="pull-right">
							<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
							<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
							<a href="{{ URL::route('about') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a></span>
			    		</li><!-- .pull-right  -->
					</ul><br>

					<div class="form-group">
						{{ Form::label( 'name', 'Customer Service Title' ) }}
						{{ Form::text( 'name', $about->name, array('class' => 'form-control') ) }}
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::label( 'desc', 'Customer Service Name' ) }}
						{{ Form::textarea( 'desc', $about->desc, array('class' => 'form-control') ) }}
					</div><!-- .form-group  -->
				{{ Form::close() }}
			@endforeach
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop