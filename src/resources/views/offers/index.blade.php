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
			         <a href="{{ route('auctions.show', [ 'id' => $of->auction_id] ) }}" class="btn btn-default btn-sm">Ver</a>
						  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#offerModal" data-offerid="{{$of->id}}">
			          Editar
			        </button>
			         <!-- <a href="" class="btn btn-default btn-xs">Editar</a> -->
<!-- 			         <a title="Cancelar Oferta" href="{{ route('offers.delete', [ 'id' => $of->id] ) }}" class="btn btn-danger btn-xs">Cancelar</a> -->
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
                  <input type="number" class="form-control" name="amount">
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
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					$('#offerid').val(offer);
				})
			})
			</script>
			@endif

@overwrite
