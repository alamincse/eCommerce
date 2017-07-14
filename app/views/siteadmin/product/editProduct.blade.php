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
			  	<li><a href="{{ URL::route( 'products' ) }}">Products</a></li>
			  	<li class="active">Edit Product</li>
			</ul><!-- .breadcrumb  -->

			{{-- show logout msg --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-success">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->
			@endif

			@foreach( $products as $product )
			{{ Form::open( array('route' => array( 'product-update', $product->id ), 'files' => true) ) }}
				<div class="tabbable">
					<ul class="nav nav-tabs">
			    		<li class="active"><a href="#tab1" data-toggle="tab">General</a></li>
			    		<li><a href="#tab2" data-toggle="tab">Data</a></li>
			    		<li><a href="#tab3" data-toggle="tab">Discount</a></li>
			    		<li class="pull-right">
							<button type="submit" class="btn btn-info ttip" data-toggle="tooltip" title="Save"><i class="fa fa-save"></i></button>
							<span class="btn btn-danger ttip" data-toggle="tooltip" title="Cancel">
							<a href="{{ URL::route('products') }}"><span style="color:white;"><i class="fa fa-reply"></i></span></a></span>
			    		</li><!-- .pull-right  -->
			    	</ul><!--  .nav .nav-tabs -->

					<div class="col-lg-5">

			    		<div class="tab-content"  style="padding-top: 15px;">
			    			<div class="tab-pane active" id="tab1">
								<div class="form-group">
									{{ Form::label( 'username', 'Product Image' ) }}
									<div class="thumbnail" style="width: 100px;height: 100px;">
										<div id="preview">
											<p>{{ HTML::image( $product->image, null, array( 'class' => 'img-polaroid prevImg' )  ) }}</p>
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
									{{ Form::label( 'name', 'Product Name' ) }}
									{{ Form::text( 'name', $product->name, array('class' => 'form-control') ) }}

									<span style="color:red;">
										@if( $errors->has('name') )
											{{ $errors->first('name') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'desc', 'Product Description' ) }}
									{{ Form::textarea( 'desc', $product->desc,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('desc') )
											{{ $errors->first('desc') }}
										@endif
									</span>
								</div><!-- .form-group  -->
							</div><!-- .tab-pane .active #tab1  -->

							<div class="tab-pane" id="tab2">
								<div class="form-group">
									{{ Form::label( 'model', 'Model' ) }}
									{{ Form::text( 'model', $product->model,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('model') )
											{{ $errors->first('model') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'location', 'Location' ) }}
									{{ Form::text( 'location', $product->location,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('location') )
											{{ $errors->first('location') }}
										@endif
									</span>
								</div><!-- .form-group  -->


								<div class="form-group">
									{{ Form::label( 'phone', 'Phone No.' ) }}
									{{ Form::text( 'phone', $product->phone,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('phone') )
											{{ $errors->first('phone') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'price', 'Price' ) }}
									{{ Form::text( 'price', $product->price,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('price') )
											{{ $errors->first('price') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'n_price', 'New Price(Optional)' ) }}
									
									@if( $product->n_price == 0.00 )
										{{ Form::text( 'n_price', '',  array('class' => 'form-control ') ) }}
									@else
										{{ Form::text( 'n_price', $product->n_price,  array('class' => 'form-control ') ) }}
									@endif

									<span style="color:red;">
										@if( $errors->has('n_price') )
											{{ $errors->first('n_price') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'quantity', 'Quantity' ) }}
									{{ Form::text( 'quantity', $product->quantity,  array('class' => 'form-control ') ) }}

									<span style="color:red;">
										@if( $errors->has('quantity') )
											{{ $errors->first('quantity') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'stock', 'Stock' ) }}
									{{ Form::select( 'stock', array( $product->stock => $product->stock, 'In Stock' => 'In Stock', 'Out of Stock' => 'Out of Stock' ), null, array( 'class' => 'form-control' ) ) }}

									<span style="color:red;">
										@if( $errors->has('stock') )
											{{ $errors->first('stock') }}
										@endif
									</span>
								</div><!-- .form-group  -->

								<div class="form-group">
									{{ Form::label( 'status', 'Status' ) }}
									{{ Form::select( 'status', array( $product->status => $product->status, 'Enable' => 'Enable', 'Disable' => 'Disable' ), null, array( 'class' => 'form-control' ) ) }}
									<span style="color:red;">
										@if( $errors->has('status') )
											{{ $errors->first('status') }}
										@endif
									</span>
								</div><!-- .form-group  -->
							</div><!--  .tab-pane .col-lg-5#tab2  -->

							<div class="tab-pane col-lg-5" id="tab3">
								Coming soon...
							</div><!-- .tab-pane .col-lg-5#tab3 -->
						</div><!--  .tab-content  -->
					</div><!--  .col-lg-5  -->
				</div><!-- .tabbable  -->
			{{ Form::token() }}
			{{ Form::close() }}
			@endforeach
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop