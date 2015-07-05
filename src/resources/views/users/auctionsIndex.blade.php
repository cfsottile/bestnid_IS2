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
				<th>Opciones<th>
			</tr>
		</thead>
		<tbody>
			@foreach($auctions as $a)
			{{-- Para subastas en curso --}}
				@if(!$a->finished())
					<tr>
						<td><a href="{{ route('auctions.show', [ 'id' => $a->id] ) }}">{{$a->title}}</a></td>
						<td>{{$a->description}}</td>
						<td>{{$a->formatedCreatedAt()}}</td>
						<td>{{$a->formatedEndDate()}}</td>
						<td>
							<a href="{{ route('auctions.show', [ 'id' => $a->id] ) }}" class="btn btn-default btn-xs">Ver</a>
							<a href="" class="btn btn-default btn-xs">Editar</a>
						{{-- POR SI SE QUIERE BORRAR DESDE ACA
							@if ($a->isDeleteable())
								<form method="GET" action="{{ route('auctions.destroy', $a->id) }}" style="display:inline">
									<button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar subasta" data-message="Estás seguro? Será permanente">
										Eliminar
									</button>
								</form>
							@endif	--}}
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
						@if($a->finished())
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
		@include('partials.delete_confirmation')
@overwrite
