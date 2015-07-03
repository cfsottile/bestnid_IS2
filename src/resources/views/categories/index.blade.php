@extends('layout.default')

@section('title', 'Indice de categorias')

@section('content')


@include('partials.detailed_notifications')

<div class="page-header">
  <h1> Indice de subastas </h1>
</div>


  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>#Subastas</th>
        <th>Opciones<th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)

      <tr>
        <td>{{$category->name}}</td>
        <td>{{count($category->auctions)}}</td>
        <td>
           <a href="{{ route('admin.categories.edit' , ['id' => $category->id]) }}" class="btn btn-default btn-xs">Editar</a>
           <form method="GET" action="{{ route('admin.categories.delete' , ['id' => $category->id]) }}" style="display:inline">
             <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar categoria" data-message="Estás seguro? Será permanente">
               Eliminar
             </button>
           </form>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>


  @include('partials.delete_confirmation')



@endsection
