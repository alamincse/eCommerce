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
			  	<li class="active">Pending</li>
			</ul><!-- .breadcrumb  -->


			<ul class="list-unstyled list-inline page-header" style="padding-bottom: 15px;">
				<li><a href="{{ URL::route('products') }}">All({{ $total }})</a></li>
				<li><a href="{{ URL::route('online') }}">Online({{ $online }})</a></li>
				<li><a href="{{ URL::route('pending') }}">Pending({{ $hide }})</a></li>
				<li class="pull-right"><a href="{{ URL::route('addproduct') }}" class="btn btn-primary ttip" data-target="toggle" title="Add new product"><i class="fa fa-plus"></i></a></li>
			</ul><!-- .list-unstyled .list-inline .page-header  -->

			<div class="table-responsive">
				<table class="table table-hover">
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
					
					@foreach( $pending as $pendings )
						<tr>
							<td><a href="{{ URL::route( 'product-edit', $pendings->id ) }}">{{ HTML::image( $pendings->image, 'Picture', array('class' => 'col-lg-6	 col-md-5 col-sm-8 col-xs-12') ) }}</a></td>
							<td>{{ $pendings->name }}</td>
							<td>{{ $pendings->model }}</td>
							<td>{{ $pendings->stock }}</td>
							<td>
								@if( $pendings->n_price <> 0.00 ) 
									${{ $pendings->n_price }} <br>
									$<del style="color:#F15A23;">{{ $pendings->price }}</del>
								@else 
									${{ $pendings->price }} 
								@endif
							</td>
							<td class="text-center">@if( $pendings->quantity == null ) 1 @else {{ $pendings->quantity }} @endif</td>
							<td>No</td>
							<td>{{ $pendings->status }}</td>
							<td>{{ date('d-m-Y a', strtotime($pendings->updated_at)) }}</td>

							<td class="text-center">
								<a href="{{ URL::route( 'product-edit', $pendings->id ) }}" class="btn btn-info ttip" data-toggle="tooltip" title="Edit">
									<i class="fa fa-pencil"></i>
								</a>
								{{ Form::button(trans( '<i class="fa fa-remove"></i>' ), 
										array( 'onclick' =>  'showConfirmDeleteModal(
	                                    "' . URL::route( 'onlineDelete', $pendings->id) . '")',
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
							                    {{ Form::open( array( 'route' => array( 'pendingDelete', $pendings->id ), 'id' => 'deleteForm', 'method' => 'post') ) }}
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
			</div><!-- .table-responsive  -->
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop