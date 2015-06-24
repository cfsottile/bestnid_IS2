@extends('layout.default')

@section('title', 'Mis ofertas')

@section('content')
	@include('partials.detailed_notifications')
	<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
	  <div class="page-header">
	    <h1>Mis ofertas</h1>
	  </div>

	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Nombre de subasta</th>
	      <th>Motivo</th>
	      <th>Monto</th>
	      <th>Fecha y hora de oferta</th>
	      <th>Opciones<th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($offers as $of)
	    {{-- Para subastas en curso --}}
		    @if($of->auction->end_date < Date('Y/m/d H:i:s'))
			    <tr>
			      <td>{{$of->auction->title}}</td>
			      <td>{{$of->reason}}</td>
			      <td>{{$of->amount}}</td>
			      <td>{{$of->formatedCreationDate()}}</td>
			      <td>
			         <a href="{{ route('auctions.show', [ 'id' => $of->auction_id] ) }}" class="btn btn-default btn-xs">Ver</a>
			         <a href="" class="btn btn-default btn-xs">Editar</a>
			         <a title="Eliminar Oferta" href="" class="btn btn-danger btn-xs">Eliminar</a>
			      </td>
			    </tr>
			  @endif
	    @endforeach
	  </tbody>
	</table>
	<br>
	<br>
		{{-- Para subastas finalizadas --}}

    <div class="well">
      <a id="toggler" data-toggle="collapse" class="active btn btn-primary btn-sm" data-target="#ofertas">
        Ofertas finalizadas
      </a>
      <table class="table table-striped table-hover collapse" id="ofertas">
        <thead>
          <tr>
            <th>Nombre de subasta</th>
            <th>Motivo</th>
            <th>Monto</th>
	      		<th>Fecha y hora de oferta</th>
          </tr>
        </thead>
        <tbody>
          @foreach($offers as $of)
						@if($of->auction->end_date > Date('Y/m/d H:i:s'))
          	<tr>
				      <td>{{$of->auction->title}}</td>
				      <td>{{$of->reason}}</td>
				      <td>{{$of->amount}}</td>
				      <td>{{$of->formatedCreationDate()}}</td>
          	</tr>
          	@endif
          @endforeach
        </tbody>
      </table>
    </div>

@overwrite
