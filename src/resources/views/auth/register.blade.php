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

							@include('partials.fields')

							<div class="form-group @if($errors->has('accept_terms')) has-error @endif">
								<label class="col-md-4 control-label"></label>
								<div class="col-md-6">
									<input type="checkbox" name="accept_terms"> Acepto los
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
		alert('1. Para participar en las subastas divulgadas en el PORTAL BestNid, el Usuario deberá proceder con su registro informando sus datos personales. Se deben completar todos los campos de forma clara y precisa. Siempre que sea necesario, el Usuario deberá actualizar su registro.\n2. Al registrarse, el Usuario indicará un LOGIN que lo identificará en el PORTAL y una CONTRASEÑA personal e intransferible, que no se podrá utilizar con otras finalidades no autorizadas.\n3. El Usuario se compromete a no divulgar su contraseña a terceros. El uso no autorizado de la contraseña es de total responsabilidad del Usuario, y el hecho deberá ser comunicado inmediatamente por correo electrónico a la Central de Atención del PORTAL.\n4. Para seguridad del Usuario, su contraseña y datos se transmitirán encriptados (Certificado de Seguridad SSL).\n5. Si el usuario no quiere que los demás le reconozcan, deberá escoger un LOGIN no identificable ni asociado a su nombre real.\n6. El Usuario registrado en el Portal autoriza que BestNid consulte Centrales de Riesgo y entidades competentes, para la verificación de sus datos.\n7. Si se verifica inconsistencia y/o problemas legales, judiciales o financieros asociados a los datos informados por el Usuario la Central de Atención contactará con este, por correo electrónico o teléfono.\n8. El usuario debe aceptar los términos del Contrato de Uso de Bestnid.\n9. El usuario podrá utilizar el PORTAL un día hábil después de la validación del registro y la aceptación de los términos. El hecho le será comunicado por correo electrónico.\n10. El PORTAL permite recibir ofertas por internet o presenciales, simultáneamente y en tiempo real.\n11. Las ofertas por web, fax y de viva voz tienen las mismas condiciones una vez confirmada la recepción y validada la identidad del ofertante.\n12. El usuario podrá hacer mas de una oferta al mismo bien, prevalecerá la mayor.\n13. El usuario podrá programar ofertas automáticas, de manera que, si otro participante supera una oferta, el sistema generará otra oferta añadida en un incremento fijo y predeterminado, hasta el límite máximo definido, con el objetivo de que el mismo tenga la certeza de que, hasta el valor estipulado para ofertas automáticas, la oferta venza. Las ofertas automáticas serán registradas en el sistema con fecha en que se la hizo la programación.\n14. Cada lote tiene la fecha y el horario previsto de cierre, en su página de descripción. Cerca del horario del cierre, en la página de ofertas FlashBid, el reloj indica el tiempo pendiente para cerrar. Si el sistema recibe alguna oferta dentro del intervalo de 3 (tres) minutos antes del cierre del lote, el cronómetro reinicia 3 minutos adicionales sucesivamente a cada lance efectuado en ese intervalo, para que todos los Usuarios interesados tengan la oportunidad de efectuar nuevas ofertas.\n15. El Usuario registrado autoriza a BestNid a consultar bases de datos para verificar la veracidad de sus datos, la moralidad crediticia del Usuario y sus antecedentes judiciales, en caso de ser posible realizarlo. De la misma manera autoriza a BestNid a reportar la información a las centrales de riesgo del sector financiero y real acerca de su comportamiento comercial del aceptante, la cual será actualizada periódicamente conforme con lo establecido por las leyes de la república de Argentina, las cuales el Usuario registrado declara conocer a cabalidad.');
}
</script>
@endsection
