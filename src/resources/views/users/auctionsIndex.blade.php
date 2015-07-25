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
				<th>#Ofertas</th>
				<th>#Comentarios</th>
				<th>Fecha y hora de inicio</th>
				<th>Fecha y hora de cierre</th>
				<th>Opciones<th>
			</tr>
		</thead>
		<tbody>
			@foreach($auctions as $a)

					<tr @if($a->finished()) class="info" title="Subasta finalizada" @endif>
						<td>{{$a->title}}</td>
						<td>{{count($a->offers)}}</td>
						<td>{{count($a->comments)}}</td>
						<td>{{$a->formatedCreatedAt()}}</td>
						<td>{{$a->formatedEndDate()}}</td>
						<td>
							<a href="{{ route('auctions.show', [ 'id' => $a->id] ) }}" class="btn btn-default btn-xs">Ver</a>
							@if (($a->isDeleteable()) && (!$a->finished())) {{-- una subasta se puede editar/borrar si no tiene ofertas y no terminó --}}
								<a href="{{ route('auctions.edit', $a->id) }}" class="btn btn-primary btn-xs">Editar</a>
								<form method="GET" action="{{ route('auctions.destroy', $a->id) }}" style="display:inline">
									<button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar subasta" data-message="Estás seguro? Será permanente">
										Eliminar
									</button>
								</form>
							@endif
						</td>
					</tr>

			@endforeach
		</tbody>
	</table>
	<br>
	<br>
		{{-- Para subastas finalizadas DEPRECADO POR EL MOMENTO --}}

		{{-- <div class="well">
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
		</div> --}}

		@include('partials.delete_confirmation')
@overwrite
