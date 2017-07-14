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
			  	<li class="active">Bottom Slider</li>
			</ul><!-- .breadcrumb  -->
			
			<ul class="list-unstyled" style="padding-bottom: 40px;">
				<li class="pull-right"><a href="{{ URL::route('add-bottom-image') }}" class="btn btn-primary ttip" data-target="toggle" title="Add New Image"><i class="fa fa-plus"></i></a></li>
			</ul><!-- .list-unstyled .list-inline .page-header  -->


			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th class="col-lg-3">Image</th>
						<th>Name</th>
						<th>Price</th>
						<th>Status</th>
						<th>Last Update</th>
						<th style="text-align:center;">Action</th>
					</thead>
					<tbody>
						@foreach( $sliders as $slider )
							<tr>
								<td><a href="slider?id={{ $slider->id }}">{{ HTML::image( $slider->image, 'Picture', array('class' => 'col-lg-6 col-md-5 col-sm-8 col-xs-12') ) }}</a></td>
								<td>{{ $slider->name }}</td>
								<td>{{ $slider->price }}</td>
								<td>{{ $slider->status }}</td>
								<td>{{ date('d-m-Y a', strtotime($slider->updated_at)) }}</td>
								<td class="text-center">
									<a href="" class="btn btn-info ttip" data-toggle="tooltip" title="Edit">
										<i class="fa fa-pencil"></i>
									</a>
									<a href="delete.php?id={{ $slider->id }}" class="btn btn-danger ttip" data-toggle="tooltip" title="Delete">
										<i class="fa fa-remove"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table><!-- .table .table-hover  -->
			</div><!-- .table-responsive  -->
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop