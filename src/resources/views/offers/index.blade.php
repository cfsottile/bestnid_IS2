@extends('layout.default')

@section('title', 'Mis ofertas')

@section('content')
	@include('partials.detailed_notifications')
	{{-- <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a> --}}
		<div class="page-header">
			<h1>Mis ofertas
			<div class="container-fluid pull-right">
				<small> Filtrar ofertas hechas por: </small>
				<a href="{{route('offers.index', ['filter' => '0']) }}" class="btn btn-default btn-xs"> En Curso </a>
				<a href="{{route('offers.index', ['filter' => '1']) }}" class="btn btn-primary btn-xs"> Finalizadas </a>
				<a href="{{route('offers.index', ['filter' => '2']) }}" class="btn btn-success btn-xs"> Ganadas </a>
				<a href="{{route('offers.index', ['filter' => '3']) }}" class="btn btn-danger btn-xs"> Perdidas </a>
				<a href="{{route('offers.index', ['filter' => '4']) }}" class="btn btn-default btn-xs"> Todo </a>
			</div>
		</h1>
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
					<tr
						@if($of->auction->finished())
							@if(isset($of->auction->winner_id))

								@if($of->auction->winner_id == Auth::user()->id)
									class="success" title="Subasta finalizada; eres el ganador! :D"
								@else
									class="danger" title="Subasta finalizada; esta vez no te eligieron :("
								@endif
							@else
								class="info" title="Subasta finalizada; están eligiendo ganador, todavía tenes chances! 0_0"
							@endif
						@else
							title="Subasta en curso; podrías ser el ganador! :)"
						@endif
					>
						<td>{{$of->auction->title}}</td>
						<td>{{$of->reason}}</td>
						<td>{{$of->amount}}</td>
						<td>{{$of->formatedCreationDate()}}</td>
						<td>
							@if(!$of->auction->finished())
							<a href="{{ route('auctions.show', [ 'id' => $of->auction_id] ) }}" class="btn btn-default btn-xs">Ver</a>
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#offerModal" data-offerid="{{$of->id}}" data-offeramount="{{$of->amount}}">
								Editar
							</button>
							<form method="GET" action="{{ route('offers.delete', [ 'id' => $of->id] ) }}" style="display:inline">
								<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Cancelar oferta" data-message="Estás seguro? Será permanente">
									Cancelar
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

	@if(count($offers)>0)

	<div class="modal fade" id="offerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Escribe tu monto nuevo</h4>
				</div>

				<div class="modal-body">
					<form role="form" method="POST" action='{{ route('offers.update') }}'>
					<div class="form-group">
						<input type="double" class="form-control" name="amount" id="offeramount">
						<label for="content" class="control-label">Monto <small>(minimo $1)</small></label>
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" name="id" id="offerid">
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Aceptar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(function($){
			$('#offerModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var offer = button.data('offerid') // Extract info from data-* attributes
				var amount = button.data('offeramount')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				$('#offerid').val(offer);
				$('#offeramount').val(amount);
			})
		})
	</script>
	@endif

	@include('partials.delete_confirmation')
@overwrite
