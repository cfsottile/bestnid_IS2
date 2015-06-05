@extends('layout.default')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					{{-- FORMULARIO --}}
					<form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
						<fieldset>
	    				<legend>Iniciar Sesión</legend>
							{{-- NOTIFICACIONES --}}
							@include('partials.detailed_notifications')

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-4 control-label">Usuario(E-mail)</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Contraseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							{{-- Funcion para recordar al usuario, para mas adelante --}}
							{{-- <div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Remember Me
										</label>
									</div>
								</div>
							</div> --}}
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<a href="{{ URL::previous() }}" class="btn btn-default">Atrás</a>
									<button type="submit" class="btn btn-primary">Iniciar Sesión</button>

									{{-- funcion para resetear la password, para mas adelante --}}
									{{-- <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a> --}}
								</div>
							</div>
						</fieldset>
					</form>
					{{-- FIN DEL FORMULARIO --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
