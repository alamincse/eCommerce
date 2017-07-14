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
			  	<li><a href="{{ URL::route( 'follow' ) }}">Follow Us</a></li>
			  	<li class="active">Edit Follow Us</li>
			</ul><!-- .breadcrumb  -->
			

			{{-- show erros msg when any update field is empty --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-danger">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-close"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->
			@endif
			
			@foreach( $follows as $follow )
				{{ Form::open( array('route' => array( 'updatefollow', $follow->id ), 'files' => true) ) }}
					<ul class="nav">
						<li><h4>Edit Follow with our social media.</h4></li>
						<li class="pull-right">
							<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
							<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
							<a href="{{ URL::route('follow') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a></span>
			    		</li><!-- .pull-right  -->
					</ul><br>

					<div class="form-group">
						{{ Form::text( 'name', $follow->name, array('class' => 'form-control') ) }}

						<span style="color:red;">
							@if( $errors->has('name') )
								{{ $errors->first('name') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::textarea( 'desc', $follow->desc, array('class' => 'form-control') ) }}

						<span style="color:red;">
							@if( $errors->has('desc') )
								{{ $errors->first('desc') }}
							@endif
						</span>
					</div><!-- .form-group  -->
				{{ Form::close() }}
			@endforeach
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop