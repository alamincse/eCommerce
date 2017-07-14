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
			  	<li><a href="{{ URL::route( 'slider' ) }}">Slider</a></li>
			  	<li class="active">Add Image</li>
			</ul><!-- .breadcrumb  -->

			{{-- show logout msg --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-success">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->
			@endif

			@foreach( $sliders as $slider )
			{{ Form::open( array('route' => array( 'updatSlider', $slider->id ), 'files' => true) ) }}
				<div class="tabbable">
					<ul class="nav nav-tabs">
			    		<li class="active"><a href="#tab1" data-toggle="tab">General</a></li>
			    		<li><a href="#tab2" data-toggle="tab">Data</a></li>
			    		<li class="pull-right">
							<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
							<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
							<a href="{{ URL::route('slider') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a></span>
			    		</li><!-- .pull-right  -->
			    	</ul><!--  .nav .nav-tabs -->

					<div class="col-lg-5">
			    		<div class="tab-content" style="padding-top: 15px;">
			    			<div class="tab-pane active" id="tab1">
								<div class="form-group">
									{{ Form::label( 'image', 'Slider Image' ) }}
									<div class="thumbnail" style="width: 100px;height: 100px;">
										<div id="preview">
											<p>{{ HTML::image( $slider->image, null, array( 'class' => 'img-polaroid prevImg' )  ) }}</p>
										</div>
										{{ Form::file( 'image', array( 'id' => 'photoimg' ) ) }}
									</div><!-- .input-group  -->

									<span style="color:red;">
										@if( $errors->has('image') )
											{{ $errors->first('image') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
								{{$slider->name}}
									{{ Form::label( 'name', 'Slider Image Title' ) }}
									{{ Form::text( 'name', $slider->name, array('class' => 'form-control') ) }}

									<span style="color:red;">
										@if( $errors->has('name') )
											{{ $errors->first('name') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'desc', 'Slider Image Description' ) }}
									{{ Form::textarea( 'desc', $slider->desc, array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('desc') )
											{{ $errors->first('desc') }}
										@endif
									</span>
								</div><!-- .form-group  -->
							</div><!-- .tab-pane .active #tab1  -->

							<div class="tab-pane" id="tab2">
								<div class="form-group">
									{{ Form::label( 'width', 'Image Width' ) }}
									{{ Form::text( 'width', $slider->width,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('width') )
											{{ $errors->first('width') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'height', 'Image Height' ) }}
									{{ Form::text( 'height', $slider->height,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('height') )
											{{ $errors->first('height') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'status', 'Status' ) }}
            						{{ Form::select( 'status', array( $slider->status => $slider->status, 'Active' => 'Active', 'In Active' => 'In Active' ), null, array( 'class' => 'form-control' ) ) }}
									<span style="color:red;">
										@if( $errors->has('status') )
											{{ $errors->first('status') }}
										@endif
									</span>
								</div><!-- .form-group  -->
							</div><!--  .tab-pane .col-lg-5#tab2  -->
						</div><!--  .tab-content  -->
					</div><!--  .col-lg-5  -->
				</div><!-- .tabbable  -->
			{{ Form::token() }}
			{{ Form::close() }}
			@endforeach
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop