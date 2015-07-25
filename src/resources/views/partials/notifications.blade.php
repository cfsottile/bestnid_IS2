@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		<span class="glyphicon glyphicon-ok-sign"></span>
		<strong> Esa! </strong> Todo ha salido bien.<br><br>
		<span>{{Session::get('success')}}</span>
	</div>
@endif

@if( Session::has('error') || Session::has('errors') || (count($errors) > 0))
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<strong> Opa! </strong> Parece que hubo algunos errores.<br><br>
		@yield('details')
	</div>

@endif
