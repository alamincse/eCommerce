@extends( 'public.master' )
@section( 'content' )
	@include( 'public.topnav' )	

	<div class="container main-content">
		<div class="row lead">
			<div class="col-md-4 pull-right">
				<form action="" class="form-inline pull-right">
					<div class="input-group">
	           			{{ Form::text( 'search', ( Input::old('search') ) ? 'value = "'.e(Input::old('search')).'"' : '',  array('placeholder' => 'What are you looking for...', 'onfocus' => "if(this.placeholder == 'What are you looking for...'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'What are you looking for...'}", 'class' => 'form-control') ) }}
	            		<div class="input-group-btn">
	                		<button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div><!-- .input-group-btn  -->
			        </div><!-- .input-group  -->
				</form><!-- .inline-form .pull-right -->
			</div><!-- .col-md-4 .pull-right  -->
		</div><!-- .row .lead -->

		<div class="row">
			<div class="col-md-12">
				<div class="col-sm-4 col-md-3 category">
					<h3 class="page-header">Categories</h3>
					<ul class="nav">
						@foreach( $names as $name )
							<li><a href="">{{ $name->model }}</a></li>
						@endforeach
					</ul><!-- .nav  -->
				</div><!-- .col-lg-4  -->
				

				<div class="col-md-9">
					<div class="row">
						@foreach( $products as $product )
							<div class="col-xs-7 col-sm-6 col-md-8 product-img">
								<a href="" class="thumbnail">{{ HTML::image( $product->image, null, array( 'class' => 'img-responsive' ) ) }}</a>
								<div class="title-price">
									<h5><a href="{{ URL::route( 'single-product',  $product->id ) }}">{{ $product->name }}</a></h5>
									<p>
										@if( $product->n_price <> 0.00 )
											<span class="price">
												${{ $product->n_price }}
												Ex: <del style="color:#F15A23;">${{ $product->price }}</del>
											</span>
										@else
											<span class="price">${{ $product->price }}</span>
										@endif

										<span class="pull-right"><a href="" class="ttip" data-toggle="tooltip"  title="Add to cart" style="color:#F15A23;"><i class="fa fa-shopping-cart"></i></a></span>
									</p>
								</div>

								<div class="product-desc">
									<p>{{ $product->desc }}</p>
								</div><!-- .product-desc  -->
							</div><!-- .col-lg-8  -->

							<div class="col-xs-12 col-sm-6 col-md-4">
								<h3><a style="color: #F15A23;" href="">{{ $product->name }}</a></h3>
								<div class="table-responsive">
									<table class="table table-hover table-bordered history">
										<tr>
											<td><a href="">Location</a></td>
											<td><span class="pull-right">{{ $product->location }}</span></td>
										</tr>
										<tr>
											<td><a href="">Model</a></td>
											<td><span class="pull-right">{{ $product->model }}</span></td>
										</tr>
										<tr>
											<td><a href="">Phone</a></td>
											<td><span class="pull-right">{{ $product->phone }}</span></td>
										</tr>
										<tr>
											<td><a href="">Quantity</a></td>
											<td><span class="badge pull-right">{{ $product->quantity }}</span</td>
										</tr>
										<tr>
											<td><a href="">Stock</a></td>
											<td><span class="pull-right">{{ $product->stock }}</span></td>
										</tr>
										<tr>
											<td><a href="">Price</a></td>
											<td><span class="pull-right">
												@if( $product->n_price <> 0.00 ) 
													${{ $product->n_price }} <br>
													Ex: <del style="color:#F15A23;">${{ $product->price }}</del>
												@else 
													${{ $product->price }} 
												@endif
											</span></td>
										</tr>
									</table><!-- .table .table-hover  -->
								</div><!-- .table-responsive  -->
							</div><!-- .col-md-4  -->
						@endforeach
					</div><!-- .row  -->
				</div><!-- .col-md-9  -->
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	</div><!-- .container  -->
@stop