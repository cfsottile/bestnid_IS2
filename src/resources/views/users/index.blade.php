@extends('layout.default')

@section('title', 'Indice de usuarios registrados')

@section('content')

@include('partials.detailed_notifications')
{{-- <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a> --}}
<div class="page-header">
	<h1> Indice de usuarios registrados </h1>
</div>

<form role="form" method="POST" action="{{route('admin.users.postindex')}}">
	<div class="row">
		<div class="col-lg-offset-2 col-lg-4">
			<div class="form-group">
				<label class="col-md-3 control-label">Registrados entre: </label>
				<div class="col-md-9">
					<input type="date" class="form-control" name="date_start" value="{{ $report_data['date_start'] }}">
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group col-lg-6">
						<input type="date" class="form-control" name="date_end" value="{{ $report_data['date_end'] }}">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Buscar</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@if(isset($report_data))
	<div class="panel panel-info">
		<div class="panel-body">
			<p style="text-align: center"><b>Resultados de la busqueda:</b>
				Usuarios registrados entre las fechas
					<b>{{date('d/m/Y',strtotime($report_data['date_start']))}}</b>
					y
					<b>{{date('d/m/Y',strtotime($report_data['date_end']))}}</b>
			</p>
			<p style="text-align: center">
				Total de usuarios registrados entre las fechas especificadas: <b>{{count($users)}}</b>
			</p>
		</div>
	</div>
@endif

<table class="table table-striped table-hover ">
	<thead>
		<tr>
			<th>#ID</th>
			<th>Nombre y Apellido</th>
			<th>Email</th>
			<th>Registro</th>
			<th>DNI</th>
			<th>Opciones<th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}} {{$user->last_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->formatedCreatedAt()}}</td>
				<td>{{$user->dni}}</td>
				<td>
					<a href="{{ route('admin.users.show' , ['id' => $user->id]) }}" class="btn btn-default btn-xs">Ver</a>
					<a href="{{ route('admin.users.edit' , ['id' => $user->id]) }}" class="btn btn-primary btn-xs">Editar</a>
					<form method="GET" action="{{ route('admin.users.delete' , ['id' => $user->id]) }}" style="display:inline">
						<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar usuario" data-message="Estás seguro? Será permanente">
							Eliminar
						</button>
					</form>
					@if ($user->is_admin == 0)
						<a href="{{ route('admin.users.makeAdmin' , ['id' => $user->id]) }}" class="btn btn-info btn-xs">Dar Permisos de Administrador</a>
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@include('partials.delete_confirmation')

@endsection
