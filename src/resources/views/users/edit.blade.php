@extends('layout.default')

@section('title', 'Editar datos de cuenta')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">

					{{-- FORMULARIO --}}
					<form class="form-horizontal" role="form" method="PUT" action="{{ route('users.edit') }}">

						<fieldset>
							<legend><h3>Edicion de datos {{ $user->name }}</h3></legend>
							@include('partials.notifications')
							
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="form-group @if($errors->has('name')) has-error @endif">
									<label class="col-md-4 control-label">Nombres</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="name" value="{{ $user->name }}">
										@if($errors->has('name'))
											<p class="help-block">{{$errors->first('name')}}</p>
										@endif
									</div>
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El nombre puede contener, además de letras comunes, vocales con tildes, u con diéresis, apóstrofes.">?</button>
								</div>

								<div class="form-group @if($errors->has('last_name')) has-error @endif">
									<label class="col-md-4 control-label">Apellidos</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
										@if($errors->has('last_name'))
											<p class="help-block">{{$errors->first('last_name')}}</p>
										@endif
									</div>
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El apellido puede contener, además de letras comunes, vocales con tildes, u con diéresis, apóstrofes.">?</button>
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
										<input type="string" class="form-control" name="dni" value="{{ $user->dni }}">
										@if($errors->has('dni'))
											<p class="help-block">{{$errors->first('dni')}}</p>
										@endif
									</div>
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El dni debe tener 7 u 8 dígitos, debiendo excluirse los puntos. Ejemplo: 12345678">?</button>
								</div>

								<div class="form-group @if($errors->has('born_date')) has-error @endif">
									<label class="col-md-4 control-label">Fecha de Nacimiento:</label>
									<div class="col-md-6">
										<input type="date" class="form-control" name="born_date" value="{{ $user->born_date }}">
										@if($errors->has('born_date'))
											<p class="help-block">{{$errors->first('born_date')}}</p>
										@endif
									</div>
									{{-- <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="">?</button> --}}
								</div>

							  <div class="form-group @if($errors->has('phone')) has-error @endif">
									<label class="col-md-4 control-label">Teléfono:</label>
									<div class="col-md-6">
										<input type="string" class="form-control" name="phone" value="{{ $user->phone }}">
										@if($errors->has('phone'))
											<p class="help-block">{{$errors->first('phone')}}</p>
										@endif
									</div>
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Se debe ingresar código de país, código de ciudad y número particular. No se ingresa 15. Ejemplo: +54 221 444 4444">?</button>
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

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<a href="{{ URL::previous() }}" class="btn btn-default">
										Atrás
									</a>
									<button type="submit" class="btn btn-primary">
										Actualizar datos
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
	alert('1. Para participar en las subastas divulgadas en el PORTAL BestNid, el Usuario deberá proceder con su registro informando sus datos personales. Se deben completar todos los campos de forma clara y precisa. Siempre que sea necesario, el Usuario deberá actualizar su registro.\n2. Al registrarse, el Usuario indicará un LOGIN que lo identificará en el PORTAL y una CONTRASEÑA personal e intransferible, que no se podrá utilizar con otras finalidades no autorizadas.\n3. El Usuario se compromete a no divulgar su contraseña a terceros. El uso no autorizado de la contraseña es de total responsabilidad del Usuario, y el hecho deberá ser comunicado inmediatamente por correo electrónico a la Central de Atención del PORTAL.\n4. Para seguridad del Usuario, su contraseña y datos se transmitirán encriptados (Certificado de Seguridad SSL).\n5. Si el usuario no quiere que los demás le reconozcan, deberá escoger un LOGIN no identificable ni asociado a su nombre real.\n6. El Usuario registrado en el Portal autoriza que BestNid consulte Centrales de Riesgo y entidades competentes, para la verificación de sus datos.\n7. Si se verifica inconsistencia y/o problemas legales, judiciales o financieros asociados a los datos informados por el Usuario la Central de Atención contactará con este, por correo electrónico o teléfono.\n8. El usuario debe aceptar los términos del Contrato de Uso de Bestnid.\n9. El usuario podrá utilizar el PORTAL un día hábil después de la validación del registro y la aceptación de los términos. El hecho le será comunicado por correo electrónico.\n10. El PORTAL permite recibir ofertas por internet o presenciales, simultáneamente y en tiempo real.\n11. Las ofertas por web, fax y de viva voz tienen las mismas condiciones una vez confirmada la recepción y validada la identidad del ofertante.\n12. El usuario podrá hacer mas de una oferta al mismo bien, prevalecerá la mayor.\n13. El usuario podrá programar ofertas automáticas, de manera que, si otro participante supera una oferta, el sistema generará otra oferta añadida en un incremento fijo y predeterminado, hasta el límite máximo definido, con el objetivo de que el mismo tenga la certeza de que, hasta el valor estipulado para ofertas automáticas, la oferta venza. Las ofertas automáticas serán registradas en el sistema con fecha en que se la hizo la programación.\n14. Cada lote tiene la fecha y el horario previsto de cierre, en su página de descripción. Cerca del horario del cierre, en la página de ofertas FlashBid, el reloj indica el tiempo pendiente para cerrar. Si el sistema recibe alguna oferta dentro del intervalo de 3 (tres) minutos antes del cierre del lote, el cronómetro reinicia 3 minutos adicionales sucesivamente a cada lance efectuado en ese intervalo, para que todos los Usuarios interesados tengan la oportunidad de efectuar nuevas ofertas.\n15. El Usuario registrado autoriza a BestNid a consultar bases de datos para verificar la veracidad de sus datos, la moralidad crediticia del Usuario y sus antecedentes judiciales, en caso de ser posible realizarlo. De la misma manera autoriza a BestNid a reportar la información a las centrales de riesgo del sector financiero y real acerca de su comportamiento comercial del aceptante, la cual será actualizada periódicamente conforme con lo establecido por las leyes de la república de Argentina, las cuales el Usuario registrado declara conocer a cabalidad.');
}
</script>
@endsection
