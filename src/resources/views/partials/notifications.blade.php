@if(Session::has('success'))
	<span>{{Session::get('success')}}</span>
@endif

@if( Session::has('error') || Session::has('errors') || (count($errors) > 0))
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<strong> Opa! </strong> Parece que hubo algunos errores.<br><br>

		<span class="sr-only">Error:</span>
		@if ( Session::has('errors'))
			<ul>
				@foreach (Session::get('errors') as $message)
					<li>{{$message}}</li>
				@endforeach
			</ul>
		@endif

		@if ( Session::has('error'))
			{{Session::get('error')}}
		@endif
		@if (count($errors) > 0)
			<ul>
		      @foreach ($errors->all() as $error)
		        <li>{{ $error }}</li>
		      @endforeach
			</ul>
		@endif
	</div>

@endif
