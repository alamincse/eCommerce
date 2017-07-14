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
			  	<li class="active">Service</li>
			</ul><!-- .breadcrumb  -->

			
			
			{{ Form::open( array('route' => 'save-customer', 'files' => true) ) }}
				<h3 class="page-header">
					<span>Customer Service Point.</span>
					<span class="pull-right" style="margin-top:-5px;">
						<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
						<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
							<a href="{{ URL::route('customer-service') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a>
						</span>
			    	</span><!-- .pull-right  -->
				</h3><!-- .page-header  -->
				
				<div class="form-group">
					{{ Form::label( 'title', 'Customer Service Title' ) }}
					{{ Form::text( 'title', ( Input::old('title') ) ? 'value = "'.e(Input::old('title')).'"' : '',  array('placeholder' => 'Customer Service Title', 'onfocus' => "if(this.placeholder == 'Customer Service Title'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Customer Service Title'}", 'class' => 'form-control') ) }}

					<span style="color:red;">
						@if( $errors->has('title') )
							{{ $errors->first('title') }}
						@endif
					</span>
				</div><!-- .form-group  -->

				<div class="form-group">
					{{ Form::label( 'name', 'Customer Service Name' ) }}
					{{ Form::text( 'name', ( Input::old('name') ) ? 'value = "'.e(Input::old('name')).'"' : '',  array('placeholder' => 'Customer Service Name', 'onfocus' => "if(this.placeholder == 'Customer Service Name'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Customer Service Name'}", 'class' => 'form-control') ) }}

					<span style="color:red;">
						@if( $errors->has('name') )
							{{ $errors->first('name') }}
						@endif
					</span>
				</div><!-- .form-group  -->
			{{ Form::close() }}
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop