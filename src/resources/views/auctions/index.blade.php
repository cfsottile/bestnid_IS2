@extends('layout.default')

@section('title', 'Subastas')

@section('content')

    <h1>Subastas</h1>
    <div class="container-fluid">
    <div class="row">
    @foreach ($auctions as $a)

        <div class="col-md-4">

            <a class=thumbnail style="height:400px; width:300px" href="{{ route('auctions.show', ['id' => $a->id ]) }}">
              <img src="{{ $a->pictureUrl() }}" alt="{{ $a->name }}" height="250px" width="250px"/>
              <h3>{{ $a->name }}</h3>
              <p> {{ $a->description }} </p>
            </a>


        </div>

    @endforeach
    </div>
    </div>

@overwrite
