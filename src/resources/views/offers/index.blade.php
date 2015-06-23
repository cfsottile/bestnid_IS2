@extends('layout.default')

@section('title', 'Mis ofertas')

@section('content')
	<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
	  <div class="page-header">
	    <h1>Mis ofertas</h1>
	  </div>	

	@foreach ($offers as $of)

	<p>
	Subasta: <a href="{{ route('auctions.show', [ 'id' => $of->auction_id] ) }}"> {{ $of->auction->title }} </a><br>

	Motivo: {{ $of->reason }} <br>
	</p>

	@endforeach

  
@overwrite
