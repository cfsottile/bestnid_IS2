@extends('layout.default')

@section('title', $auction->name)

@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
    <div class="jumbotron">
      <div class="page-header">
        <h2>{{ $auction->title }}</h2>
      </div>
      <br>
        <img src='{{ $auction->pictureUrl() }}' class="img-thumbnail" height="350" width="350"/><br><br>
<!--    <p>
            <b>Subastador</b><br>
            {{ $auction->owner->name.' '.$auction->owner->last_name }}
        </p> -->

        <p>
            <h4><b>Descripción</b><br>
            {{ $auction->description }}</h4>
        </p>
        <p>
            <h4><b>Fecha de cierre</b><br>
            {{ substr($auction->end_date, 0, 10) }}</h4>
        </p>
    </div>
@overwrite
