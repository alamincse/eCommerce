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

				<div class="col-sm-4 col-md-6 slider">
					@include( 'public.home.slider' )
				</div><!-- .col-lg-8  -->

				<div class="col-sm-4 col-md-3 popular">
					<h3 class="page-header">Popular Product</h3>
					<ul class="nav">
						@foreach( $names as $name )
							<li><a href="">{{ $name->model }}</a></li>
						@endforeach
					</ul><!-- .nav  -->
				</div><!-- .col-md-3 .col-sm-4 .popular  -->
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->

		<div class="product-content">
			<div class="row">
				<div class="col-lg-12">
					@foreach( $products as $product )
						<div class="col-xs-7 col-sm-4 col-md-3 product-img">
							<a href="">{{ HTML::image( $product->image, null, array( 'class' => 'img-responsive' ) ) }}</a>
							<div class="title-price">
								<h5><a href="{{ URL::route( 'single-product',  $product->id ) }}">{{ $product->name }}</a></h5>
								<p>
									@if( $product->n_price <> 0.00 )
										<span class="price">
											${{ $product->n_price }}
											Ex: $<del>{{ $product->price }}</del>
										</span>
									@else
										<span class="price">${{ $product->price }}</span>
									@endif

									<span class="pull-right"><a href="" class="ttip" data-toggle="tooltip"  title="Add to cart" style="color:#F15A23;"><i class="fa fa-shopping-cart"></i></a></span>
								</p>
							</div>
						</div><!-- .col-lg-3  -->
					@endforeach
				</div><!-- col-lg-12  -->
			</div><!-- .row  -->

			<div class="row">
				<div class="col-lg-12 bottom-slider">
					@include( 'public.home.bottom-slider' )
				</div><!--  .col-lg-12 -->
			</div><!-- .row  -->
		</div><!-- .product-content  -->
	</div><!-- .container  -->
@stop