@extends('layout.default')

@section('title', 'Indice de subastas')

@section('content')

@include('partials.detailed_notifications')
{{-- <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a> --}}
<div class="page-header">
  <h1> Indice de subastas </h1>
</div>

<form role="form" method="POST" action="{{route('admin.auctions.postadminindex')}}">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-4">
      <div class="form-group">
        <label class="col-md-3 control-label">Registradas entre: </label>
        <div class="col-md-9">
          <input type="date" class="form-control" name="date_start" value='{{$report_data['date_start']}}'>

        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="col-lg-6">
        <div class="form-group">
          <div class="input-group col-lg-6">

            <input type="date" class="form-control" name="date_end" value="{{$report_data['date_end']}}"/>
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
        Sbuastas registradas entre las fechas
          <b>{{date('d/m/Y',strtotime($report_data['date_start']))}}</b>
          y
          <b>{{date('d/m/Y',strtotime($report_data['date_end']))}}</b>
      </p>
      <p style="text-align: center">
        Total de subastas registradas entre las fechas especificadas: <b>{{count($auctions)}}</b>
      </p>      
    </div>
  </div>
@endif

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      {{-- <th>#ID</th> --}}
      {{-- <th>#ID dueño</th> --}}
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
      {{-- <td>{{$auction->id}}</td> --}}
      {{-- <td>{{$auction->owner_id}}</td> --}}
      <td>{{$auction->title}}</td>
      <td>{{$auction->formatedCreatedAt()}}</td>
      <td>{{$auction->formatedEndDate()}}</td>
      <td>{{count($auction->offers)}}</td>
      <td>{{count($auction->comments)}}</td>
      <td>
         <a href="{{ route('auctions.show' , ['id' => $auction->id]) }}" class="btn btn-default btn-xs">Ver</a>
         {{-- <a href="{{ route('admin.users.edit' , ['id' => $auction->id]) }}" class="btn btn-default btn-xs">Editar</a> --}}
         <form method="GET" action="{{ route('admin.auctions.delete' , ['id' => $auction->id]) }}" style="display:inline">
           <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar subasta" data-message="Estás seguro? Será permanente">
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
