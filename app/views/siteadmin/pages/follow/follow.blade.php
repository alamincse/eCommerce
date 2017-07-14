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
			  	<li class="active">Follow Us</li>
			</ul><!-- .breadcrumb  -->
			
			{{-- show msg when edit successfull --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-success">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->
			@endif

			

			<ul class="list-unstyled list-inline page-header" style="padding-bottom: 15px;">
				<li><h3>Social Connection</h3></li>
				<li class="pull-right"><a href="{{ URL::route('savefollow') }}" class="btn btn-primary ttip" data-target="toggle" title="Add Follow"><i class="fa fa-plus"></i></a></li>
			</ul><!-- .list-unstyled .list-inline .page-header  -->

			@if( $follows->count() > 0 )
				@foreach( $follows as $follow )
					<h2>{{ $follow->name }}</h2>
					<span class="pull-right">
					<a href="{{ URL::route( 'follow-edit', $follow->id ) }}" class="btn btn-info ttip" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></span>
					{{ $follow->desc }}
				@endforeach
			@else
				<font style="color:chocolate;font-size:18px">Oops! Nothing Found!</font>
			@endif
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop