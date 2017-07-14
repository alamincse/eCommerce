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
			  	<li class="active">Slider</li>
			</ul><!-- .breadcrumb  -->
			
			<ul class="list-unstyled" style="padding-bottom: 40px;">
				<li class="pull-right"><a href="{{ URL::route('add-image') }}" class="btn btn-primary ttip" data-target="toggle" title="Add New Image"><i class="fa fa-plus"></i></a></li>
			</ul><!-- .list-unstyled .list-inline .page-header  -->


			<div class="table-responsive">
				{{-- show confirm msg after deleting item --}}
				@if( Session::has( 'msg' ) )
					<div class="alert alert-success">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
					</div><!-- .alert .alert-success  -->
				@endif

				<table class="table table-hover">
					<thead>
						<th class="col-lg-3">Image</th>
						<th>Name</th>
						<th>Size(width, height)</th>
						<th>Status</th>
						<th>Last Update</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach( $sliders as $slider )
							<tr>
								<td><a href="slider?id={{ $slider->id }}">{{ HTML::image( $slider->image, 'Picture', array('class' => 'col-lg-6 col-md-5 col-sm-8 col-xs-12') ) }}</a></td>
								<td>{{ $slider->name }}</td>
								<td>{{ $slider->width }} x {{ $slider->height }}</td>
								<td>{{ $slider->status }}</td>
								<td>{{ date('d-m-Y a', strtotime($slider->updated_at)) }}</td>
								<td class="text-center">
									<a href="{{ URL::route( 'sliderEdit', $slider->id ) }}" class="btn btn-info ttip" data-toggle="tooltip" title="Edit">
										<i class="fa fa-pencil"></i>
									</a>

									{{ Form::button(trans( '<i class="fa fa-remove"></i>' ), 
										array( 'onclick' =>  'showConfirmDeleteModal(
	                                    "' . URL::route( 'deleteImage', $slider->id) . '")',
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
								                    <p><strong>{{ trans('Are you sure you want to delete this Slider Image ?') }}</strong>
								                    </p>
								                </div>{{--  modal-body --}}
												
								                <div class="modal-footer">
								                    {{ Form::open( array( 'route' => array( 'deleteImage', $slider->id ), 'id' => 'deleteForm', 'method' => 'post') ) }}
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

