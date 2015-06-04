@extends('layout.default')

@section('title', 'Subastas')

@section('content')

    <h1>Subastas</h1>
    @foreach ($auctions as $a)
        <p>
            <img src="{{ $a->pictureUrl() }}" height="24" width="24"/>
            <a href="{{ route('auctions.show', ['id' => $a->id ]) }}">{{ $a->name }}</a><br>
            {{ $a->description }}<br>
        </p>
    @endforeach

@overwrite
