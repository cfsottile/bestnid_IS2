@extends('layout.default')

@section('title', $auction->name)

@section('content')

    <h1>{{ $auction->name }}</h1>
    <p>
        <a href="">Ofertar</a><br><br>
        <img src='{{ $auction->picture }}'/><br>
        {{ $auction->description }}<br>
        Fecha de cierre: {{ $auction->end_date }}<br>
    </p>

@show
