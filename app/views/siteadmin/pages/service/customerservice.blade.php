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
			
			{{-- show logout msg --}}
			@if( Session::has( 'msg' ) )
				<div class="alert alert-success" id="msg">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
				</div><!-- .alert .alert-success  -->

				{{--  automatic remove/invisible msg --}}
				<script>
					window.onload = function() {
						setTimeout(function() {
							// document.getElementById('msg').style.display = "none";
							$('#msg').hide('6000'); // 6 sec 
						}, 3000);
					}
				</script>
			@endif

			<h3 class="page-header">
				<span>Customer Service Point.</span>
				<span class="pull-right" style="margin-top:-5px;"><a href="{{ URL::route('add-customer') }}" class="btn btn-primary ttip" data-target="toggle" title="Add Customer Service"><i class="fa fa-plus"></i></a></span>
			</h3><!-- .page-header  -->

			@if( $services->count() > 0 )
				<table class="table">
					@foreach( $services as $service )
						<tr>
							<td><i class="fa fa-check-circle"></i>&nbsp;&nbsp;<a href="">{{ $service->title }}</a></td>
							<td><a href="{{ URL::route( 'edit-customer', $service->id ) }}" class="btn btn-info ttip pull-right" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></td>
						</tr>
					@endforeach
				</table>
			@else
				<font style="color:chocolate;font-size:18px;">Oops! Nothing Found for our customer service center!</font>
			@endif
			</div><!-- .table-responsive  -->
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop