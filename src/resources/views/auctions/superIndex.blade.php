@extends('layout.default')

@section('title', 'Indice de subastas')

@section('content')

@include('partials.detailed_notifications')
<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
<div class="page-header">
  <h1> Indice de subastas </h1>
</div>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#ID</th>
      <th>#ID dueño</th>
      <th>Nombre</th>
      <th>Fecha de cierre</th>
      <th>Opciones<th>
    </tr>
  </thead>
  <tbody>
    @foreach($auctions as $auction)

    <tr>
      <td>{{$auction->id}}</td>
      <td>{{$auction->owner_id}}</td>
      <td>{{$auction->name}}</td>
      <td>{{$auction->end_date}}</td>
      <td>
         <a href="{{ route('auctions.show' , ['id' => $auction->id]) }}" class="btn btn-default btn-xs">Ver</a>
         {{-- <a href="{{ route('admin.users.edit' , ['id' => $auction->id]) }}" class="btn btn-default btn-xs">Editar</a>
         <a title="Eliminar Usuario" href="{{ route('admin.users.delete' , ['id' => $auction->id]) }}" class="btn btn-danger btn-xs">Eliminar</a> --}}
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection
