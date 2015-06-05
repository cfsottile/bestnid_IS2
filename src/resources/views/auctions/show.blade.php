@extends('layout.default')

@section('title', $auction->name)

@section('content')

    <div class="jumbotron">
        <h1>{{ $auction->name }}</h1><br>
        <img src='{{ $auction->pictureUrl() }}' class="img-thumbnail"/><br><br>
        <p>
            <b>Subastador</b><br>
            {{ $auction->owner->name.' '.$auction->owner->last_name }}
        </p>

        <p>
            <b>Descripción</b><br>
            {{ $auction->description }}
        </p>
        <p>
            <b>Fecha de cierre</b><br>
            {{ substr($auction->end_date, 0, 10) }}
        </p>
    </div>
@overwrite
