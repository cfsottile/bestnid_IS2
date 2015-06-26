@extends('layout.default')

@section('title', 'Mis ofertas')

@section('content')
	@include('partials.detailed_notifications')
	<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
	  <div class="page-header">
	    <h1>Mis subastas</h1>
	  </div>

	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Nombre de subasta</th>
	      <th>Descripción</th>
	      <th>Fecha y hora de inicio</th>
	      <th>Fecha y hora de cierre</th>
{{--	      <th>Opciones<th> --}}
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($auctions as $a)
	    {{-- Para subastas en curso --}}
		    @if($a->end_date < Date('Y/m/d H:i:s'))
			    <tr>
			      <td><a href="{{ route('auctions.show', [ 'id' => $a->id] ) }}">{{$a->title}}</a></td>
			      <td>{{$a->description}}</td>
			      <td>{{$a->formatedCreatedAt()}}</td>
			      <td>{{$a->formatedEndDate()}}</td>
			      <td>
{{--	      <a href="{{ route('auctions.show', [ 'id' => $a->id] ) }}" class="btn btn-default btn-sm">Ver</a>
						<a href="" class="btn btn-default btn-xs">Editar</a> --}}
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
        Subastas finalizadas
      </a>
      <table class="table table-striped table-hover collapse" id="ofertas">
        <thead>
        <tr>
	   	   <th>Nombre de subasta</th>
	   	   <th>Descripción</th>
	   	   <th>Fecha y hora de inicio</th>
	   	   <th>Fecha y hora de cierre</th>
	   	   <th>Ver<th>
				</tr>
        </thead>
        <tbody>
          @foreach($auctions as $a)
						@if($a->end_date > Date('Y/m/d H:i:s'))
						<tr>
							<td><a href="{{ route('auctions.show', [ 'id' => $a->id] ) }}">{{$a->title}}</a></td>
					    <td>{{$a->description}}</td>
					    <td>{{$a->formatedCreatedAt()}}</td>
					    <td>{{$a->formatedEndDate()}}</td>
	         	</tr>
          	@endif
          @endforeach
        </tbody>
      </table>
    </div>

@overwrite