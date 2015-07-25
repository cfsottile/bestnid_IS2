@extends('layout.default')

@section('title', 'Confirmación del ganador')

@section('content')
<div class="row">
  <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">

        <h3 class='panel-title'>Datos de la oferta</h3>
        <br>
        <ul class="list-group">
          <li class="list-group-item">Motivo: {{ $offer->reason }}</li>
        </ul>

        <div class="pull-right">

        </div>



@endsection
