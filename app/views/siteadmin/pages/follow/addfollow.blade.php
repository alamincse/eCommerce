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
			  	<li class="active">New Follow Us</li>
			</ul><!-- .breadcrumb  -->
			

			{{-- show msg after delete product --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-success">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->
			@endif
			
			{{ Form::open( array('route' => 'savefollow', 'files' => true) ) }}
				<ul class="nav">
					<li><h4>Follow with our social media.</h4></li>
					<li class="pull-right">
						<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
						<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
						<a href="{{ URL::route('follow') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a></span>
		    		</li><!-- .pull-right  -->
				</ul><br>

				<div class="form-group">
					{{ Form::text( 'name', ( Input::old('name') ) ? 'value = "'.e(Input::old('name')).'"' : '',  array('placeholder' => 'Follow Name', 'onfocus' => "if(this.placeholder == 'Follow Name'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Follow Name'}", 'class' => 'form-control') ) }}

					<span style="color:red;">
						@if( $errors->has('name') )
							{{ $errors->first('name') }}
						@endif
					</span>
				</div><!-- .form-group  -->

				<div class="form-group">
					{{ Form::textarea( 'desc', ( Input::old('desc') ) ? 'value = "'.e(Input::old('desc')).'"' : '',  array('placeholder' => 'Social Segment', 'onfocus' => "if(this.placeholder == 'Social Segment'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Social Segment'}", 'class' => 'form-control') ) }}

					<span style="color:red;">
						@if( $errors->has('desc') )
							{{ $errors->first('desc') }}
						@endif
					</span>
				</div><!-- .form-group  -->
			{{ Form::close() }}
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop