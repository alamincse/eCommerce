@extends( 'siteadmin.master' )
@section( 'content' )
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 well" style="margin-top:70px;">
				<h3 class="animated rollIn">
					<i style="color:#F15A23;" class="fa fa-shopping-cart fa-fw"></i><span style="color:#F15A23;">e</span>Commerce
					<span  class="pull-right">
						<a href="{{ URL::route( 'siteadmin' ) }}" class="btn btn-info">Login</a>
					</span><!-- .pull-right  -->
				</h3>

				<h4 class="page-header animated rubberBand">Lost your password ?</h4>

				{{--  when your email don't match --}}
				@if( Session::has( 'msg' ) )
					<div class="alert alert-danger">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p>{{ Session::get('msg') }}</p>
					</div><!-- .alert .alert-danger  -->
				@endif

				{{ Form::open( array( 'url' => 'siteadmin/forgot-password' ) ) }}
					<div class="form-group">
						{{ Form::label( 'email', 'E-mail Address', array('class' => 'animated bounceInLeft') ) }}
						<div class="input-group animated bounceInDown">
							<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							{{ Form::text( 'email', ( Input::old('email') ) ? 'value = "'.e(Input::old('email')).'"' : '',  array('placeholder' => 'E-mail Address', 'onfocus' => "if(this.placeholder == 'E-mail Address'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'E-mail Address'}", 'class' => 'form-control input-md') ) }}
						</div><!-- .input-group  -->

						<span style="color:red;">
							@if( $errors->has('email') )
								{{ $errors->first('email') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group animated bounceInDown">
						{{ Form::submit( 'Request', array( 'class' => 'btn btn-danger' ) ) }}
					</div><!-- .form-group  -->
				{{ Form::close() }}
			</div><!--  .col-lg-4 .col-lg-offset-4 .well -->
		</div><!-- .row  -->
	</div><!--  .container  -->
@stop