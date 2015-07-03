@extends('layout.default')

@section('title', 'Ofertar')

@section('content')

{{-- A implementar, llega el ID de la auction
{{dd($auction_id)}} --}}

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					{{-- FORMULARIO --}}
					<form class="form-horizontal" role="form" method="POST" action="{{ route('offers.store') }}">
						<fieldset>
	    				<legend>Ofertar en Subasta: {{$auction_title}}</legend>
							{{-- NOTIFICACIONES --}}
							@include('partials.notifications')

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group @if($errors->has('reason')) has-error @endif">
								<label class="col-md-4 control-label">Motivo</label>
								<div class="col-md-6">
									<textarea  rows='4' class="form-control" name="reason" value="{{ old('reason') }}"></textarea>
                  @if($errors->has('reason'))
        						<p class="help-block">{{$errors->first('reason')}}</p>
        					@endif
								</div>
							</div>

							<div class="form-group @if($errors->has('amount')) has-error @endif">
								<label class="col-md-4 control-label">Monto</label>
								<div class="col-md-6">
									<input type="double" class="form-control" name="amount">
                  @if($errors->has('amount'))
        						<p class="help-block">{{$errors->first('amount')}}</p>
        					@endif
								</div>
							</div>

              <input type='hidden' name='auction_id' value="{{$auction_id}}">
              <input type="hidden" name="owner_id" value="{{Auth::user()->id}}">


							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<a href="{{ URL::previous() }}" class="btn btn-default">Atrás</a>
									<button type="submit" class="btn btn-primary">Ofertar</button>

								</div>
							</div>
						</fieldset>
					</form>
					{{-- FIN DEL FORMULARIO --}}
				</div>
			</div>
		</div>
	</div>
</div>


@overwrite
