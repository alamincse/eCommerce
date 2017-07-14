@extends( 'siteadmin.master' )
@section( 'content' )
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 well" style="margin-top:30px;">
				<h2 class="page-header">Registration Form For Admin Panel Login.</h2>				
				{{ Form::open( array('url' => 'siteadmin') ) }}
					<div class="form-group">
						{{ Form::label( 'name', 'Your Name' ) }}
						{{ Form::text( 'name', ( Input::old('name') ) ? 'value = "'.e(Input::old('name')).'"' : '',  array('placeholder' => 'Your Name', 'onfocus' => "if(this.placeholder == 'Your Name'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Your Name'}", 'class' => 'form-control input-sm') ) }}
						<span style="color:red;">
							@if( $errors->has('name') )
								{{ $errors->first('name') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::label( 'un', 'Username' ) }}
						{{ Form::text( 'un', ( Input::old('un') ) ? 'value = "'.e(Input::old('un')).'"' : '',  array('placeholder' => 'Username', 'onfocus' => "if(this.placeholder == 'Username'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Username'}", 'class' => 'form-control input-sm') ) }}
						<span style="color:red;">
							@if( $errors->has('un') )
								{{ $errors->first('un') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::label( 'email', 'E-mail' ) }}
						{{ Form::text( 'email', ( Input::old('email') ) ? 'value = "'.e(Input::old('email')).'"' : '',  array('placeholder' => 'E-mail', 'onfocus' => "if(this.placeholder == 'E-mail'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'E-mail'}", 'class' => 'form-control input-sm') ) }}
						<span style="color:red;">
							@if( $errors->has('email') )
								{{ $errors->first('email') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::label( 'pw', 'Password' ) }}
						{{ Form::password( 'pw', array('placeholder' => 'Password', 'onfocus' => "if(this.placeholder == 'Password'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Password'}", 'class' => 'form-control input-sm') ) }}
						<span style="color:red;">
							@if( $errors->has('pw') )
								{{ $errors->first('pw') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::label( 'c-pw', 'Confirm Password' ) }}
						{{ Form::password( 'c-pw', array('placeholder' => 'Confirm Password', 'onfocus' => "if(this.placeholder == 'Confirm Password'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Confirm Password'}", 'class' => 'form-control input-sm') ) }}
						<span style="color:red;">
							@if( $errors->has('c-pw') )
								{{ $errors->first('c-pw') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{{ Form::submit('Register', array('class'=>'btn btn-success btn-md')) }}
					</div><!-- .form-group  -->
				{{ Form::token() }}
				{{ Form::close() }}
			</div><!-- .col-lg-4  -->
		</div><!-- .row  -->
	</div><!--  .container  -->
@stop