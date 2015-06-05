@extends('layout.default')

@section('title', 'Registro')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
				@include('partials.notifications')
					{{-- @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif --}}

					<form class="form-horizontal" role="form" method="POST" action="{{ route('postRegister') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								@if($errors->has('name'))
									<p class="help-block">{{$errors->first('name')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="El nombre puede contener cualquier carácter">?</button>
						</div>

						<div class="form-group @if($errors->has('email')) has-error @endif">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								@if($errors->has('email'))
									<p class="help-block">{{$errors->first('email')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="El email debe ser real">?</button>
						</div>

						<div class="form-group @if($errors->has('password')) has-error @endif">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
								@if($errors->has('password'))
									<p class="help-block">{{$errors->first('password')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="La contraseña debe tener al menos 6 carácteres">?</button>
						</div>

						<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
								@if($errors->has('password_confirmation'))
									<p class="help-block">{{$errors->first('password_confirmation')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Los campos contraseña y confirmar contraseña deben coincidir">?</button>
						</div>

						<div class="form-group @if($errors->has('dni')) has-error @endif">
							<label class="col-md-4 control-label">DNI</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="dni" value="{{ old('dni') }}">
								@if($errors->has('dni'))
									<p class="help-block">{{$errors->first('dni')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="El dni debe ser mayor que 999.999 y menor que 100.000.000">?</button>
						</div>

						<div class="form-group @if($errors->has('born_date')) has-error @endif">
							<label class="col-md-4 control-label">Born Date:</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="born_date" value="{{ old('born_date') }}">
								@if($errors->has('born_date'))
									<p class="help-block">{{$errors->first('born_date')}}</p>
								@endif
							</div>
							{{-- <button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">?</button> --}}
						</div>

					  <div class="form-group @if($errors->has('phone')) has-error @endif">
							<label class="col-md-4 control-label">Phone Number:</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
								@if($errors->has('phone'))
									<p class="help-block">{{$errors->first('phone')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Se debe ingresar toda la información perteniente. Ejemplo: +54 221 444 4444">?</button>
						</div>

						<div class="form-group @if($errors->has('cc_data')) has-error @endif">
							<label class="col-md-4 control-label">Credit Card Number:</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="cc_data" value="{{ old('cc_data') }}">
								@if($errors->has('cc_data'))
									<p class="help-block">{{$errors->first('cc_data')}}</p>
								@endif
							</div>
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Se debe utilizar un espacio como separador cada 4 dígitos. Ejemplo: 0000 0000 0000 0000">?</button>
						</div>

						<!-- is Admin, hay q meter esto en un lugar menos vulnerable, como en el controlador -->
						<input type="hidden" class="form-control" name="is_admin" value='0'>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
