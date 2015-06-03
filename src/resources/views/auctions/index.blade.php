@extends('layout.default')

@section('title', 'Subastas')

@section('content')

    <h1>Subastas</h1>
    @foreach ($auctions as $a)
        <p>
            <a href="{{ route('auctions.show', ['id' => $a->id ]) }}">{{ $a->name }}</a><br>
            {{ $a->description }}
        </p>
    @endforeach

@endsection
