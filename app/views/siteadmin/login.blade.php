@extends( 'siteadmin.master' )
@section( 'content' )
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 well" style="margin-top:70px;">
				<h3 class="animated rollIn"><i style="color:#F15A23;" class="fa fa-shopping-cart fa-fw"></i><span style="color:#F15A23;">e</span>Commerce</h3>
				<h4 class="page-header animated rubberBand">Administrator Login</h4>

				{{-- show logout msg --}}
				@if( Session::has( 'msg' ) )
					<div class="alert alert-success">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p>{{ Session::get('msg') }}</p>
					</div><!-- .alert .alert-danger  -->
				@endif

				{{ Form::open( array('url' => 'siteadmin/login', 'autocomplete' => 'off') ) }}
					<div class="form-group">
						{{ Form::label( 'username', 'E-mail Address', array('class' => 'animated bounceInRight') ) }}
						<div class="input-group animated bounceInDown">
							<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							{{ Form::text( 'username', ( Input::old('username') ) ? 'value = "'.e(Input::old('username')).'"' : '',  array('placeholder' => 'E-mail Address', 'onfocus' => "if(this.placeholder == 'E-mail Address'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'E-mail Address'}", 'class' => 'form-control input-md') ) }}
						</div><!-- .input-group  -->

						<span style="color:red;">
							@if( $errors->has('username') )
								{{ $errors->first('username') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::label( 'password', 'Password', array('class' => 'animated bounceInRight') ) }}
						<div class="input-group animated bounceIn">
							<div class="input-group-addon"><i class="fa fa-lock"></i></div>
							{{ Form::password( 'password', array('placeholder' => 'Password', 'onfocus' => "if(this.placeholder == 'Password'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Password'}", 'class' => 'form-control input-md') ) }}
						</div><!-- .input-group  -->

						<span style="color:red;">
							@if( $errors->has('password') )
								{{ $errors->first('password') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="checkbox animated bounceInLeft">
						<label>
							{{ Form::checkbox( 'remember', 'Remember' ) }} Remember me.
						</label>
					</div><!-- .checkbox  -->
				
					<div class="form-group animated fadeInDownBig">
						<a href="{{ URL::route('forgot-password') }}">Lost your password ?</a>	
					</div><!-- .form-group  -->

					<div class="form-group animated fadeInDownBig">
						{{ Form::submit('Login', array('class'=>'btn btn-info btn-md pull-right')) }}
					</div><!-- .form-group  -->
				{{ Form::token() }}
				{{ Form::close() }}
			</div><!--  .col-lg-4 .col-lg-offset-4 .well  -->
		</div><!-- .row  -->
	</div><!--  .container  -->
@stop