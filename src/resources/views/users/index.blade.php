@extends('layout.default')

@section('title', 'Indice de usuarios registrados')

@section('content')

@include('partials.detailed_notifications')
<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
<div class="page-header">
  <h1> Indice de usuarios registrados </h1>
</div>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#ID</th>
      <th>Nombre y Apellido</th>
      <th>Email</th>
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
