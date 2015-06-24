@extends('layout.default')

@section('title', 'Indice de subastas')

@section('content')

@include('partials.detailed_notifications')
{{-- <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a> --}}
<div class="page-header">
  <h1> Indice de subastas </h1>
</div>

<form role="form" method="POST" action="{{route('admin.auctions.postsuperindex')}}">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-4">
      <div class="form-group">
        <label class="col-md-3 control-label">Registradas entre: </label>
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
      <th>#ID dueño</th>
      <th>Nombre</th>
      <th>Fecha de inicio</th>
      <th>Fecha de cierre</th>
      <th>#Ofertas</th>
      <th>#Comentarios</th>
      <th>Opciones<th>
    </tr>
  </thead>
  <tbody>
    @foreach($auctions as $auction)

    <tr>
      <td>{{$auction->id}}</td>
      <td>{{$auction->owner_id}}</td>
      <td>{{$auction->title}}</td>
      <td>{{$auction->formatedCreatedAt()}}</td>
      <td>{{$auction->formatedEndDate()}}</td>
      <td>{{count($auction->offers)}}</td>
      <td>{{count($auction->comments)}}</td>
      <td>
         <a href="{{ route('auctions.show' , ['id' => $auction->id]) }}" class="btn btn-default btn-xs">Ver</a>
         {{-- <a href="{{ route('admin.users.edit' , ['id' => $auction->id]) }}" class="btn btn-default btn-xs">Editar</a> --}}
         <a href="{{ route('admin.auctions.delete' , ['id' => $auction->id]) }}" class="btn btn-danger btn-xs">Eliminar</a>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection
