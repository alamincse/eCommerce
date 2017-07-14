@section( 'content' )
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-2">
				<div class="alert alert-warning" role="alert">
					<h2 class="page-header"><span style="color:red;">e</span>Commerce</h2>
					<p>Oops! Don't access this page without login. Please {{ HTML::link('siteadmin', 'Login') }} for access this page.</p>
					<p>{{ 'Thank You.' }}</p>
				</div>
			</div>
		</div><!-- .row  -->
	</div><!-- .container  -->
@stop