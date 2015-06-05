@if(Session::has('success'))
	<span>{{Session::get('success')}}</span>
@endif

@if( Session::has('error') || Session::has('errors') || (count($errors) > 0))
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<strong> Opa! </strong> Parece que hubo algunos errores.<br><br>
		@yield('details')
	</div>

@endif
