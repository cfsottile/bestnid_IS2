@extends('layout.default')

@section('title', 'Mis ofertas')

@section('content')
	<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
	  <div class="page-header">
	    <h1>Mis ofertas</h1>
	  </div>	


<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Nombre de subasta</th>
      <th>Motivo</th>
      <th>Fecha de oferta</th>
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

<!-- 
	@foreach ($offers as $of)

		@if($of->auction->end_date < Date('Y/m/d H:i:s'))

 			<div class="panel-body">
				<div class="row">
			  	<div class='col-lg-11'>
						<p>
						Subasta: <a href="{{ route('auctions.show', [ 'id' => $of->auction_id] ) }}"> {{ $of->auction->title }} </a><br>
						Motivo: {{ $of->reason }} <br> 
						</p>
					</div>
				</div>
			</div> 
		@endif

	@endforeach

 -->  
@overwrite
