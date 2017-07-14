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
			  	<li>About Us</li>
			  	<li class="active">Our Plan</li>
			</ul><!-- .breadcrumb  -->
			
			{{ Form::open( array('route' => 'save-about', 'files' => true) ) }}
				<h3 class="page-header">
					<span>Customer Service Point.</span>
					<span class="pull-right" style="margin-top:-5px;">
						<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
						<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
							<a href="{{ URL::route('about') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a>
						</span>
			    	</span><!-- .pull-right  -->
				</h3><!-- .page-header  -->
				
				<div class="form-group">
					{{ Form::label( 'name', 'About Title' ) }}
					{{ Form::text( 'name', ( Input::old('name') ) ? 'value = "'.e(Input::old('name')).'"' : '',  array('placeholder' => 'About Title', 'onfocus' => "if(this.placeholder == 'About Title'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'About Title'}", 'class' => 'form-control') ) }}

					<span style="color:red;">
						@if( $errors->has('name') )
							{{ $errors->first('name') }}
						@endif
					</span>
				</div><!-- .form-group  -->

				<div class="form-group">
					{{ Form::label( 'desc', 'About Description' ) }}
					{{ Form::textarea( 'desc', ( Input::old('desc') ) ? 'value = "'.e(Input::old('desc')).'"' : '',  array('placeholder' => 'About Description', 'onfocus' => "if(this.placeholder == 'About Description'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'About Description'}", 'class' => 'form-control') ) }}

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