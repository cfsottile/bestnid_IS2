@extends('layout.default')

@section('title', 'Ayuda')

@section('content')

<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
<div class="page-header">
	@if (Auth::guest()) 
		<h2>Hola, ¿con qué necesitas ayuda?</h2>
	@else
		<h2>Hola, {{ Auth::user()->name }}, ¿con qué necesitas ayuda?</h2>
	@endif
</div>
<div>
	<br>
	<p>
		<h3>Descripción</h3>
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;Esta es una página de subastas un tanto particular. ¿Por qué? 
		En una subasta normal gana el ultimo y mejor postor. Bueno, acá no es así.
		<br>Para empezar, el subastador elegirá al postor, no por su dinero, sino por 
		su motivo. Si, escucho (leyó) bien. El dueño de la subasta no podrá ver el 
		monto de la oferta, solo su motivo. Y solo después del cierre de la subasta elegirá
		al ganador, y en ese momento, podrá ver el monto ofrecido.
	</p>
	<br>
	<p>
		<a id="toggler" data-toggle="collapse" class="active" data-target="#users">
        <h3>Sección de usuarios</h3>
      	</a>
		<div class="table table-striped table-hover collapse" id="users">
			<ul>
				<li>¿Qué necesito para registrarme?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Para poder registrarte es obligatorio ingresar 
				tu nombre/s y apellido/s, tu numero de documento, tu fecha de nacimiento,
				una contraseña y teléfono.<br>
				Como dato opcional se ingresa el numero de tarjeta 
				de crédito. A la hora de ofertar, será necesario ingresarlo. De lo contrario 
				no podrá hacer ofertas, si subastar.
				<br><br>
				
				<li>¿Cómo inicio sesión?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Solo necesitas tu correo electrónico,
				con el que te registraste y la contraseña.
				<br><br>
				
				<li>¿Cómo veo o cambio mis datos?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;En la barra superior de la página, en su extremo derecho,
				si ha iniciado sesión, al hacer clic donde dice "Hola, -su nombre-" tiene un listado
				de opciones. Allí se encuentra.
				<br><br>
				
				<li>¿Cómo elimino mi cuenta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp; En donde puede ver sus datos, allí se encuentra
				la opción para deshabilitar su cuenta.
				<br><br>
				
	<!-- 			<li>¿Cómo recupero mi contraseña si me la he olvidado?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Al intertar iniciar sesión, debajo de donde ingresa
				la contraseña está disponible la opción de poder recuperarla.
				<br><br>
	 -->
			</ul>
		</div>
	</p>
	<br>
	<p>
		<a id="toggler" data-toggle="collapse" class="active" data-target="#auctions">
		<h3>Sección de subastas</h3>
		</a>
		<div class="table table-striped table-hover collapse" id="auctions">
			<ul>
				<li>¿Cómo hago para subastar un objeto?</li>
				&nbsp;&nbsp;&nbsp;&nbsp; La opción se encuentra en la vista de las
				subastas, Iniciar Subasta. Necesita una imagen del mismo, agregarle una 
				descripción al mismo y un tiempo entre 15 a 30 días.
				<br><br>

				<li>¿Cómo edito o elimino mi subasta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Solo puedes editar o eliminar tus subastas. 
				Tienes que ir a tu subasta,
				y allí, debajo de los datos de su subasta, está la opción de editar o eliminar.
				<br><br>

				<li>¿Por qué no puedo editar o eliminar mi subasta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp; Si no puedes es porque la subasta tiene ofertas. 
				Entonces no es posible hacer cambios sobre ella, ni eliminarla.
				<br><br>

				<li>¿Cómo hago un comentario en una subasta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp; Debajo de los datos de la subasta está el
				botón para comentar.
				<br><br>
				
				<li>¿Cómo respondo un comentario en mi subasta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Debajo del comentario, hay un campo para completar
				donde irá tu respuesta ante el comentario.
				<br><br>
				
				<li>¿Puedo eliminar mis comentarios?</li>
				&nbsp;&nbsp;&nbsp;&nbsp; Si, mientras no hayan respondido.
				<br><br>
			</ul>
		</div>
	</p>
	<br>
	<p>
		<a id="toggler" data-toggle="collapse" class="active" data-target="#offers">
		<h3>Ofertas</h3>
		</a>
		<div class="table table-striped table-hover collapse" id="offers">
			<ul>
				<li>¿Cómo oferto en una subasta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Si quieres obtener un artículo subastado
				tiene que ir a la pagina de la subasta, y allí mismo estará
				la opción para ofertar por la misma. Puedes editar el monto de tu
				ofertar, y se te notificará por mail si has ganado al finalizar
				la subasta.
				<br><br>

				<li>¿Cómo edito o elimino mi oferta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Si quieres modificar tu oferta debes ir
				al panel de ofertas. LLegás desde ver mi datos - Subastas ofertadas.
				Allí podrás editar o eliminar tu oferta. 
				<br><br>
				
				<li>¿Por qué no puedo editar o eliminar mi oferta?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Una vez que la subasta ha finalizado, 
				no es posible editar ni eliminar la oferta.
				<br><br>

				<li>¿Cómo se si gane una subasta o no?</li>
				&nbsp;&nbsp;&nbsp;&nbsp;Cuando la subasta haya finalizado, el dueño
				de la subasta eligirá a un ganador. Ahí se notificará que has ganado,
				caso contrario, no fuiste elegido.
				
				<br><br>
			</ul>
		</div>
	</p>	

</div>

@overwrite