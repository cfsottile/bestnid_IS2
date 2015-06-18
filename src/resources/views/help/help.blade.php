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
		<h3>Gestión de usuarios</h3>
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
			
			<li>¿Cómo veo mis datos?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li>¿Cómo cambio mis datos?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li>¿Cómo elimino mi cuenta?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li>¿Cómo recupero mi contraseña si me la he olvidado?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>

			<li></li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
		</ul>
	</p>
	<br>
	<p>
		<h3>Subastas</h3>
		<ul>
			<li>¿Cómo hago para subastar?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>

			<li>¿Cómo edito una subasta?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li>¿Por qué no puedo editar mi subasta?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>

			<li>¿Cómo elimino mi subasta?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>

			<li>¿Por qué no puedo eliminar mi subasta?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>

			<li>¿Cómo hago un comentario?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li>¿Cómo respondo un comentario en mi subasta?</li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li></li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li></li>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</ul>
	</p>
	<br>
	<p>
		<h3>Ofertas</h3>
		<ul>
			<li></li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>

			<li></li>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<br><br>
			
			<li></li>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</ul>
	</p>	

</div>

@overwrite