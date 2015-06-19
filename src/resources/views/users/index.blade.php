@extends('layout.default')

@section('title', 'Indice de usuarios registrados')

@section('content')

@include('partials.detailed_notifications')
<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
<div class="page-header">
  <h1> Indice de usuarios registrados </h1>
</div>

<form role="form" method="POST" action="{{route('admin.auctions.postsuperindex')}}">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-4">
      <div class="form-group">
        <label class="col-md-3 control-label">Registrados entre: </label>
        <div class="col-md-9">
          <input type="date" class="form-control" name="date_start" value="{{ old('date_start') }}">
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="col-lg-6">
        <div class="form-group">
          <div class="input-group col-lg-6">
            <input type="date" class="form-control" name="date_end" value="{{ old('date_end')}}">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Buscar</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

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
      <td>{{$user->created_at}}</td>
      <td>{{$user->dni}}</td>
      <td>
         <a href="{{ route('admin.users.show' , ['id' => $user->id]) }}" class="btn btn-default btn-xs">Ver</a>
         <a href="{{ route('admin.users.edit' , ['id' => $user->id]) }}" class="btn btn-default btn-xs">Editar</a>
         <a href="#" class="btn btn-default btn-xs">Dar Permisos de Administrador</a>
         <a title="Eliminar Usuario" href="{{ route('admin.users.delete' , ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Eliminar</a>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection
