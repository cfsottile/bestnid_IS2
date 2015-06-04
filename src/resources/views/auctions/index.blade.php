@extends('layout.default')

@section('title', 'Subastas')

@section('content')

    <h1>Subastas</h1>

    @if(isset($query))
        <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=name') }}">Ordenar por nombre</a>
    @else
        <a href="{{ route('auctions.index', 'orderCriteria=name') }}">Ordenar por nombre</a>
    @endif
    
    <div class="container-fluid">
    <div class="row">
    @foreach ($auctions as $a)

        <div class="col-md-4">

          <div class="thumbnail panel panel-default" style="height:450px; width:300px">
            <div class="panel-heading">
              <h5>Bids:-|             |Dias:-</h5>
            </div>
            <div class="panel-body">
              <a href="{{ route('auctions.show', ['id' => $a->id ]) }}">
                <img src="{{ $a->pictureUrl() }}" alt="{{ $a->name }}"/>
              </a>
            </div>
            <div class="panel-footer">
              <h2 class="panel-title"> {{ $a->name }} </h2>
              <h5> {{ $a->description }} </h5>
            </div>
          </div>


        </div>

    @endforeach
    </div>
    </div>
  </div>


@overwrite
