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
			  	<li class="active">About Us</li>
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
				<span>About Our eCommerce Business.</span>
				<span class="pull-right" style="margin-top:-5px;"><a href="{{ URL::route('add-about') }}" class="btn btn-primary ttip" data-target="toggle" title="Add About Plan"><i class="fa fa-plus"></i></a></span>
			</h3><!-- .page-header  -->
<div class="bootstrap-filestyle input-group">
<input class="form-control " type="text" disabled="">
<span class="group-span-filestyle input-group-btn" tabindex="0">
<label class="btn btn-default " for="product_image">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="buttonText">Choose file</span>
</label>
</span>
</div>
			@if( $abouts->count() > 0 )
				<table class="table">
					@foreach( $abouts as $about )
						<tr>
							<td>Name</td>
							<td>Description</td>
							<td>Action</td>
						</tr>
						<tr>
							<td><a href="{{ URL::route( 'edit-about', $about->id ) }}">{{ $about->name }}</a></td>
							<td>{{ $about->desc }}</td>
							<td><a href="{{ URL::route( 'edit-about', $about->id ) }}" class="btn btn-info ttip pull-right" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></td>
							<td class=" ">
<div class="btn-group dropdown">
<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
<span class="fa fa-cog"></span>
Options
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li>
<a href="http://icrm.webflow.gr/store/customer/update/8">
<i class="fa fa-edit" title="" data-toggle="tooltip" data-original-title="Update"></i>
Edit
</a>
</li>
<li>
<a onclick="return confirm('Are you sure you want to delete this record?')" href="http://icrm.webflow.gr/store/customer/delete/8">
<i class="fa fa-trash-o" title="" data-toggle="tooltip" data-original-title="Delete"></i>
Delete
</a>
</li>
<li>
<a href="http://icrm.webflow.gr/store/customer/view_details/8">
<i class="fa fa-eye" title="View Details"></i>
Details
</a>
</li>
</ul>
</div>
</td>
						</tr>
					@endforeach
				</table>
			@else
				<font style="color:chocolate;font-size:18px;">Oops! Nothing Found for our business plan!</font>
			@endif
		</div><!-- .col-lg-12  -->
	</div><!--  .main-content -->
@stop