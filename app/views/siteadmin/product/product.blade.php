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
			  	<li class="active">Products</li>
			</ul><!-- .breadcrumb  -->


			<ul class="list-unstyled list-inline page-header" style="padding-bottom: 15px;">
				<li><a href="{{ URL::route('products') }}">All({{ $total }})</a></li>
				<li><a href="{{ URL::route('online') }}">Online({{ $online }})</a></li>
				<li><a href="{{ URL::route('pending') }}">Pending({{ $hide }})</a></li>
				<li class="pull-right"><a href="{{ URL::route('addproduct') }}" class="btn btn-primary ttip" data-target="toggle" title="Add new product"><i class="fa fa-plus"></i></a></li>
				{{--<li class="pull-right"><button  onclick="save()" class="btn btn-primary ttip" data-target="toggle" title="Add new product"><i class="fa fa-plus"></button></li>
				<style>input[type="button"] {font-family: FontAwesome;}</style>
				<li class="pull-right"><input type="button" onClick="save()" class="btn btn-primary ttip" data-target="toggle" title="Add new product" value="&#xf0fe;"></li>
				<script>
					function save() {
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.open( "GET", "{{ URL::route('addproduct') }}", false );
						xmlhttp.send(null);
						// document.body.innerHTML = xmlhttp.responseText;
						document.getElementById('add-product').innerHTML = xmlhttp.responseText;
					}
				</script>--}}
			</ul><!-- .list-unstyled .list-inline .page-header  -->

			<div class="table-responsive">
				{{-- show msg after delete product --}}
				@if( Session::has( 'msg' ) )
					<div class="alert alert-success">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
					</div><!-- .alert .alert-success  -->
				@endif

				<table class="table table-striped table-bordered table-hover" id="table_id">
					<thead>
						<th class="col-lg-3">Product</th>
						<th>Name</th>
						<th>Model</th>
						<th>Stock</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Views</th>
						<th>Status</th>
						<th>Last Update</th>
						<th class="text-center">Action</th>
					</thead>
					<tbody>
					@foreach( $products as $product )
						<tr>
							<td><a href="{{ URL::route( 'product-edit', $product->id ) }}">{{ HTML::image( $product->image, 'Picture', array('class' => 'col-lg-6 col-md-5 col-sm-8 col-xs-12') ) }}</a></td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->model }}</td>
							<td>{{ $product->stock }}</td>
							<td>
								@if( $product->n_price <> 0.00 ) 
									${{ $product->n_price }} <br>
									<del style="color:#F15A23;">${{ $product->price }}</del>
								@else 
									${{ $product->price }} 
								@endif
							</td>
							<td class="text-center">@if( $product->quantity == null ) 1 @else {{ $product->quantity }} @endif</td>
							<td>No</td>
							<td>{{ $product->status }}</td>
							<td>{{ date('d-m-Y a', strtotime($product->updated_at)) }}</td>
							<td class="text-center">
								<a href="{{ URL::route( 'product-edit', $product->id ) }}" class="btn btn-info ttip" data-toggle="tooltip" title="Edit">
									<i class="fa fa-pencil"></i>
								</a>
								{{--<a href="{{ URL::route( 'delete', $product->id ) }}" class="btn btn-danger ttip" data-toggle="tooltip" title="Delete">
									<i class="fa fa-remove"></i>
								</a>--}}
								{{ Form::button(trans( '<i class="fa fa-remove"></i>' ), 
									array( 'onclick' =>  'showConfirmDeleteModal(
                                    "' . URL::route( 'delete', $product->id) . '")',
                                    'class' => 'btn btn-danger ttip',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Delete'
                                )) }}

							    {{-- Modal: Confirm delete --}}
							    <div class="modal fade" id="modal-confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete" aria-hidden="true">
							        <div class="modal-dialog">
							            <div class="modal-content">
							                <div class="modal-header alert alert-warning" role="alert">
						                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							                    <span>Warning!</span>
							                </div>{{-- .modal-header --}}

							                <div class="modal-body">
							                    <p><strong>{{ trans('Are you sure you want to delete this product ?') }}</strong>
							                    </p>
							                </div>{{--  modal-body --}}

							                <div class="modal-footer">
							                    {{ Form::open( array( 'route' => array( 'delete', $product->id ), 'id' => 'deleteForm', 'method' => 'post') ) }}
							                        {{ Form::button(trans( 'No' ), array(
							                            'data-dismiss' => 'modal',
							                            'class' => 'btn btn-warning',
							                        )) }}
							                        {{ Form::submit( trans( 'Yes' ), array(
							                            'class' => 'btn btn-primary',
							                        )) }}
							                    {{ Form::close() }}
							                </div><!--  .modal-footer -->
							            </div>{{-- .modal-content --}}
							        </div>{{-- .modal-dialog --}}
							    </div>{{-- .modal --}}

								<script>
							        function showConfirmDeleteModal(name, url) {
							            $('#deleteForm').prop('action', url);
							            $('#deletePageName').text(name);

							            $('#modal-confirmDelete').modal({
							                show: true
							            });
							        }
								</script>
							</td>
						</tr>
					@endforeach
					</tbody>

				</table><!-- .table .table-hover  -->
				
				<div class="col-lg-4 col-lg-offset-4">
				<span style="margin-left:120px;">{{$products->getCurrentPage()}}({{$products->getTo()}}) of {{$products->getTotal()}}</span>
				{{$products->links()}}
				</div>
			</div><!-- .table-responsive  -->
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop