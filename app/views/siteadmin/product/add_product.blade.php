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
		  	<li class="active">Add New Product</li>
		</ul><!-- .breadcrumb  -->

		{{-- show logout msg --}}
		@if( Session::has( 'msg' ) )
			<div class="alert alert-success">
				<a href="" class="close" data-dismiss="alert">&times;</a>
				<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
			</div><!-- .alert .alert-success  -->
		@endif

		{{ Form::open( array('route' => 'saveproduct', 'files' => true) ) }}
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
		    		{{--<style>input[type="button"] {font-family: FontAwesome;}</style>
						<li class="pull-right"><input type="button" onClick="save()" class="btn btn-primary ttip" data-target="toggle" title="Add new product" value="C"></li>
						<script>
							function save() {
								var xmlhttp = new XMLHttpRequest();
								xmlhttp.open( "GET", "{{ URL::route('products') }}", false );
								xmlhttp.send(null);
								// document.body.innerHTML = xmlhttp.responseText;
								document.getElementById('add-product').innerHTML = xmlhttp.responseText;
							}
						</script>--}}
		    	</ul><!--  .nav .nav-tabs -->

				<div class="col-lg-5">
		    		<div class="tab-content"  style="padding-top: 15px;">
		    			<div class="tab-pane active" id="tab1">
							<div class="form-group">
								{{ Form::label( 'username', 'Product Image' ) }}
								<div class="thumbnail" style="width: 100px;height: 100px;">
									<div id="preview">
									<p><img src="public/assets/dist/img/adds.gif" name="user_img" alt="" class="img-polaroid prevImg"></p></div>
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
								{{ Form::text( 'name', ( Input::old('name') ) ? 'value = "'.e(Input::old('name')).'"' : '',  array('placeholder' => 'Product Name', 'onfocus' => "if(this.placeholder == 'Product Name'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Product Name'}", 'class' => 'form-control') ) }}

								<span style="color:red;">
									@if( $errors->has('name') )
										{{ $errors->first('name') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'desc', 'Product Description' ) }}
								{{ Form::textarea( 'desc', ( Input::old('desc') ) ? 'value = "'.e(Input::old('desc')).'"' : '',  array('placeholder' => 'Product Description', 'onfocus' => "if(this.placeholder == 'Product Description'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Product Description'}", 'class' => 'form-control ') ) }}

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
								{{ Form::text( 'model', ( Input::old('model') ) ? 'value = "'.e(Input::old('model')).'"' : '',  array('placeholder' => 'Model', 'onfocus' => "if(this.placeholder == 'Model'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Model'}", 'class' => 'form-control ') ) }}

								<span style="color:red;">
									@if( $errors->has('model') )
										{{ $errors->first('model') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'location', 'Location' ) }}
								{{ Form::text( 'location', ( Input::old('location') ) ? 'value = "'.e(Input::old('location')).'"' : '',  array('placeholder' => 'Location', 'onfocus' => "if(this.placeholder == 'Location'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Location'}", 'class' => 'form-control ') ) }}

								<span style="color:red;">
									@if( $errors->has('location') )
										{{ $errors->first('location') }}
									@endif
								</span>
							</div><!-- .form-group  -->


							<div class="form-group">
								{{ Form::label( 'phone', 'Phone No.' ) }}
								{{ Form::text( 'phone', ( Input::old('phone') ) ? 'value = "'.e(Input::old('phone')).'"' : '',  array('placeholder' => 'Phone No.', 'onfocus' => "if(this.placeholder == 'Phone No.'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Phone No.'}", 'class' => 'form-control ') ) }}

								<span style="color:red;">
									@if( $errors->has('phone') )
										{{ $errors->first('phone') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'price', 'Price' ) }}
								{{ Form::text( 'price', ( Input::old('price') ) ? 'value = "'.e(Input::old('price')).'"' : '',  array('placeholder' => 'Price', 'onfocus' => "if(this.placeholder == 'Price'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Price'}", 'class' => 'form-control ') ) }}

								<span style="color:red;">
									@if( $errors->has('price') )
										{{ $errors->first('price') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'n_price', 'New Price(Optional)' ) }}
								{{ Form::text( 'n_price', ( Input::old('n_price') ) ? 'value = "'.e(Input::old('n_price')).'"' : '',  array('placeholder' => 'New Price', 'onfocus' => "if(this.placeholder == 'New Price'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'New Price'}", 'class' => 'form-control ') ) }}

								<span style="color:red;">
									@if( $errors->has('n_price') )
										{{ $errors->first('n_price') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'quantity', 'Quantity' ) }}
								{{ Form::text( 'quantity', ( Input::old('quantity') ) ? 'value = "'.e(Input::old('quantity')).'"' : '',  array('placeholder' => 'Quantity', 'onfocus' => "if(this.placeholder == 'Quantity'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Quantity'}", 'class' => 'form-control ') ) }}

								<span style="color:red;">
									@if( $errors->has('quantity') )
										{{ $errors->first('quantity') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'stock', 'Stock' ) }}
								{{ Form::select( 'stock', array('In Stock' => 'In Stock', 'Out of Stock' => 'Out of Stock'), null, array('class' => 'form-control')  ) }}

								<span style="color:red;">
									@if( $errors->has('stock') )
										{{ $errors->first('stock') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'status', 'Status' ) }}
	    						{{ Form::select( 'status', array( 'Enable' => 'Enable', 'Disable' => 'Disable' ), null, array( 'class' => 'form-control' ) ) }}
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
	</div><!-- .col-lg-12  -->