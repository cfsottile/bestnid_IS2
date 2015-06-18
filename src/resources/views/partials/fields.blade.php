	<div class="form-group @if($errors->has('name')) has-error @endif">
		<label class="col-md-4 control-label">Nombres</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="name" value="{{ old('name') }}">
			@if($errors->has('name'))
				<p class="help-block">{{$errors->first('name')}}</p>
			@endif
		</div>
		<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El nombre puede contener, además de letras comunes, vocales con tildes, u con diéresis, apóstrofes; minimo 3 letras">?</button>
	</div>

	<div class="form-group @if($errors->has('last_name')) has-error @endif">
		<label class="col-md-4 control-label">Apellidos</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
			@if($errors->has('last_name'))
				<p class="help-block">{{$errors->first('last_name')}}</p>
			@endif
		</div>
		<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="El apellido puede contener, además de letras comunes, vocales con tildes, u con diéresis, apóstrofes; minimo 3 letras">?</button>
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