@extends('layout.default')

@section('title', 'Registro')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">

					{{-- FORMULARIO --}}
					<form class="form-horizontal" role="form" method="POST" action="{{ route('postRegister') }}">
						<fieldset>
							<legend><h3>Formulario de Registro <small> (Todos los campos son requeridos)</small></h3></legend>
							@include('partials.notifications')
							{{-- <h3><small> (Todos los campos son requeridos)</small></h3> --}}
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group @if($errors->has('name')) has-error @endif">
								<label class="col-md-4 control-label">Nombres</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name') }}">
									@if($errors->has('name'))
										<p class="help-block">{{$errors->first('name')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El nombre puede contener, además de letras comunes, vocales con tildes, u con diéresis, apóstrofes.">?</button>
							</div>

							<div class="form-group @if($errors->has('last_name')) has-error @endif">
								<label class="col-md-4 control-label">Apellidos</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
									@if($errors->has('last_name'))
										<p class="help-block">{{$errors->first('last_name')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El apellido puede contener, además de letras comunes, vocales con tildes, u con diéresis, apóstrofes.">?</button>
							</div>

							<div class="form-group @if($errors->has('email')) has-error @endif">
								<label class="col-md-4 control-label">Direccion E-Mail</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
									@if($errors->has('email'))
										<p class="help-block">{{$errors->first('email')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El email debe ser real">?</button>
							</div>

							<div class="form-group @if($errors->has('password')) has-error @endif">
								<label class="col-md-4 control-label">Contraseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
									@if($errors->has('password'))
										<p class="help-block">{{$errors->first('password')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="La contraseña debe tener al menos 6 carácteres">?</button>
							</div>

							<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
								<label class="col-md-4 control-label">Confirme contraseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation">
									@if($errors->has('password_confirmation'))
										<p class="help-block">{{$errors->first('password_confirmation')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los campos contraseña y confirmar contraseña deben coincidir">?</button>
							</div>

							<div class="form-group @if($errors->has('dni')) has-error @endif">
								<label class="col-md-4 control-label">DNI</label>
								<div class="col-md-6">
									<input type="string" class="form-control" name="dni" value="{{ old('dni') }}">
									@if($errors->has('dni'))
										<p class="help-block">{{$errors->first('dni')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El dni debe tener 7 u 8 dígitos, debiendo excluirse los puntos. Ejemplo: 12345678">?</button>
							</div>

							<div class="form-group @if($errors->has('born_date')) has-error @endif">
								<label class="col-md-4 control-label">Fecha de Nacimiento:</label>
								<div class="col-md-6">
									<input type="date" class="form-control" name="born_date" value="{{ old('born_date') }}">
									@if($errors->has('born_date'))
										<p class="help-block">{{$errors->first('born_date')}}</p>
									@endif
								</div>
								{{-- <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="">?</button> --}}
							</div>

						  <div class="form-group @if($errors->has('phone')) has-error @endif">
								<label class="col-md-4 control-label">Teléfono:</label>
								<div class="col-md-6">
									<input type="string" class="form-control" name="phone" value="{{ old('phone') }}">
									@if($errors->has('phone'))
										<p class="help-block">{{$errors->first('phone')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Se debe ingresar código de país, código de ciudad y número particular. Ejemplo: +54 221 444 4444">?</button>
							</div>

							<div class="form-group @if($errors->has('cc_data')) has-error @endif">
								<label class="col-md-4 control-label">Tarjeta de Crédito:</label>
								<div class="col-md-6">
									<input type="string" class="form-control" name="cc_data" value="{{ old('cc_data') }}">
									@if($errors->has('cc_data'))
										<p class="help-block">{{$errors->first('cc_data')}}</p>
									@endif
								</div>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Se deben ingresar los 16 dígitos seguidos. Ejemplo: 0000111122223333">?</button>
							</div>

							<div class="form-group @if($errors->has('accept_terms')) has-error @endif">
								<label class="col-md-4 control-label"></label>
								<div class="col-md-6">
									<input type="checkbox" name="accept_terms" value="{{ Input::old('accept_terms') }}"> Acepto los
									<a href="#" onclick="terms();">términos y condiciones</a>
									@if($errors->has('accept_terms'))
										<p class="help-block">{{$errors->first('accept_terms')}}</p>
									@endif
								</div>
								{{-- <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="">?</button> --}}
							</div>

							<!-- is Admin, hay q meter esto en un lugar menos vulnerable, como en el controlador -->
							<input type="hidden" class="form-control" name="is_admin" value='0'>


							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<a href="{{ URL::previous() }}" class="btn btn-default">
										Atrás
									</a>
									<button type="submit" class="btn btn-primary">
										Registrarme
									</button>
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
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
function terms() {
	alert('1. Para participar en las subastas divulgadas en el PORTAL BestNid, el Usuario deberá proceder con su registro informando sus datos personales. Se deben completar todos los campos de forma clara y precisa. Siempre que sea necesario, el Usuario deberá actualizar su registro.\n2. Al registrarse, el Usuario indicará un LOGIN que lo identificará en el PORTAL y una CONTRASEÑA personal e intransferible, que no se podrá utilizar con otras finalidades no autorizadas.\n3. El Usuario se compromete a no divulgar su contraseña a terceros. El uso no autorizado de la contraseña es de total responsabilidad del Usuario, y el hecho deberá ser comunicado inmediatamente por correo electrónico a la Central de Atención del PORTAL.\n4. Para seguridad del Usuario, su contraseña y datos se transmitirán encriptados (Certificado de Seguridad SSL).\n5. Si el usuario no quiere que los demás le reconozcan, deberá escoger un LOGIN no identificable ni asociado a su nombre real.\n6. El Usuario registrado en el Portal autoriza que BestNid consulte Centrales de Riesgo y entidades competentes, para la verificación de sus datos.\n7. Si se verifica inconsistencia y/o problemas legales, judiciales o financieros asociados a los datos informados por el Usuario la Central de Atención contactará con este, por correo electrónico o teléfono.\n8. El usuario debe aceptar los términos del Contrato de Uso de Bestnid.\nç');
}
</script>
@endsection
