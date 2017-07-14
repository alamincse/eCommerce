@extends( 'siteadmin.master' )
@section( 'content' )
	<div class="main-content">
		<div class="col-lg-12">
			@include( 'siteadmin.topnav' )	
		</div><!--  .col-lg-12 -->

		<div class="main-content" id="wrapper">
		<div class="col-lg-2 left-menu" id="sidebar-wrapper">
			@include( 'siteadmin.left-menu' )
		</div><!-- .col-lg-2  -->

		<div class="col-lg-12">
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">M</a>
			<ol class="breadcrumb">
				<li><a href="{{ URL::route( 'dashboard' ) }}">{{ 'Dashboard' }}</a></li>
			  	<li class="active">{{ 'Profile' }}</li>
			  	{{--<li class="active">{{ URL::route('profile', 'test') }}</li> --}}
			</ol><!-- .breadcrumb  -->
			
			<h2 class="page-header">Admin Information</h2>
			<div class="tabbable rc-cmt">
			    <ul class="nav nav-tabs">
		    		<li class="active"><a href="#tab1" data-toggle="tab">All Info</a></li>
		    		<li><a href="#tab2" data-toggle="tab">Change Password</a></li>
		    		{{--<li><a href="#tab3" data-toggle="tab">Change E-mail</a></li>--}}
		    		<li><a href="#tab4" data-toggle="tab">Profile Picture</a></li>
		    	</ul><!--  .nav nav-tabs -->

		    	<div class="tab-content">
		    		{{--  when pw is changed then show this msg --}}
		    		@if( Session::has( 'msg' ) )
			    		<div class="alert alert-success">
							<a href="" class="close" data-dismiss="alert">&times;</a>
							<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
						</div><!-- .alert .alert-success  -->
					@endif

					{{-- show this msg when current pw is't match --}}
					@if( Session::has( 'erro' ) )
			    		<div class="alert alert-danger">
							<a href="" class="close" data-dismiss="alert">&times;</a>
							<p>{{ Session::get('erro') }}</p>
						</div><!-- .alert .alert-danger  -->
					@endif

		    		<div class="tab-pane active" id="tab1">
		    			<table class="table table-bordered">
							@if( $username )
								<tr>
									<td>Name</td>
									<td>{{ $username->name }}</td>
								</tr>
								<tr>
									<td>Username</td>
									<td>{{ $username->username }}</td>
								</tr>
								<tr>
									<td>E-mail</td>
									<td>{{ $username->email }}</td>
								</tr>
								<tr>
									<td>Password</td>
									<td>*****</td>
								</tr>
								<tr>
									<td>Active Date</td>
									<td>{{ $username->created_at }}</td>
								</tr>
							@endif
						</table>
		    		</div><!-- .tab-pane  -->
		    
		    		<div class="tab-pane col-lg-5" id="tab2">
		    			<h4 class="lead">You Can Change Your Password.</h4>
		    			{{ Form::open( array('url' => 'siteadmins/profile') ) }}
							<div class="form-group">
								{{ Form::label( 'password', 'Current Password' ) }}
								{{ Form::password( 'pw', array('placeholder' => 'Current Password', 'onfocus' => "if(this.placeholder == 'Current Password'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Current Password'}", 'class' => 'form-control input-sm') ) }}
								<span style="color:red;">
									@if( $errors->has('pw') )
										{{ $errors->first('pw') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'password', 'New Password' ) }}
								{{ Form::password( 'n-pw', array('placeholder' => 'New Password', 'onfocus' => "if(this.placeholder == 'New Password'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'New Password'}", 'class' => 'form-control input-sm') ) }}
								<span style="color:red;">
									@if( $errors->has('n-pw') )
										{{ $errors->first('n-pw') }}
									@endif
								</span>
							</div><!-- .form-group  -->
							
							<div class="form-group">
								{{ Form::label( 'password', 'New Password Again' ) }}
								{{ Form::password( 'n-pwa', array('placeholder' => 'New Password Again', 'onfocus' => "if(this.placeholder == 'New Password Again'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'New Password Again'}", 'class' => 'form-control input-sm') ) }}
								<span style="color:red;">
									@if( $errors->has('n-pwa') )
										{{ $errors->first('n-pwa') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::submit('Change', array('class'=>'btn btn-success btn-md')) }}
							</div><!-- .form-group  -->
						{{ Form::token() }}
						{{ Form::close() }}
		    		</div><!-- .tab-pane  -->

					{{--<div class="tab-pane col-lg-5" id="tab3">
		    			<h3>You Can Change Your E-mail.</h3>
		    			{{ Form::open( array( 'url' => URL::route( 'changeemail' ) ) ) }}
							<div class="form-group">
								{{ Form::label( 'email', 'Current Email' ) }}
								{{ Form::text( 'c_email', ( Input::old('c_email') ) ? 'value = "'.e(Input::old('c_email')).'"' : '',  array('placeholder' => 'Current Email', 'onfocus' => "if(this.placeholder == 'Current Email'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Current Email'}", 'class' => 'form-control input-sm') ) }}
								<span style="color:red;">
									@if( $errors->has('c_email') )
										{{ $errors->first('c_email') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::label( 'email', 'New Email' ) }}
								{{ Form::text( 'n_email', ( Input::old('n_email') ) ? 'value = "'.e(Input::old('n_email')).'"' : '',  array('placeholder' => 'New Email', 'onfocus' => "if(this.placeholder == 'New Email'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'New Email'}", 'class' => 'form-control input-sm') ) }}
								<span style="color:red;">
									@if( $errors->has('n_email') )
										{{ $errors->first('n_email') }}
									@endif
								</span>
							</div><!-- .form-group  -->

							<div class="form-group">
								{{ Form::submit('Change', array('class'=>'btn btn-success btn-md')) }}
							</div><!-- .form-group  -->
						{{ Form::token() }}
						{{ Form::close() }}
		    		</div><!-- .tab-pane  --> --}}

		    		<div class="tab-pane" id="tab4">
		    			picture coming soon...
		    		</div><!-- .tab-pane  -->
		    	</div><!--  .tab-content -->
		    </div><!-- .tabbable  -->
		</div><!-- .col-lg-10 -->
	</div><!-- .main-content  -->
@stop