
@extends('layout.default')

@section('title', 'Subastas')



@section('content')

  @include('partials.detailed_notifications')

  <div class="page-header">
    <h1>Subastas</h1>
  </div>

  <div class="container-fluid pull-left">
    <a href="{{route('auctions.create')}}" class="btn btn-primary">Iniciar subasta</a>
  </div>

  @if ($auctions->count() == 0)
    <h3><small>No se encontraron resultados para '{{ $query }}' </small></h3>
  @else
    @if(isset($query))
    {{-- resultados con query (cateogria o busqueda) --}}
        @if(isset($category))
          {{-- resutados para busqueda con query (categoria) --}}
          <div class="container-fluid pull-right">
            <span> Ordenar por:
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=title&category=true&direction=asc') }}" class="btn btn-sm btn-default">nombre A-Z</a>
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=title&category=true&direction=desc') }}" class="btn btn-sm btn-default"> nombre Z-A</a>
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&category=true&direction=asc') }}" class="btn btn-sm btn-default">menos reciente</a>
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&category=true&direction=desc') }}" class="btn btn-sm btn-default">más reciente</a>
          </div>
          <h3><small>Resultados para la categoria '{{ $query }}' </small></h3>
        @else
          {{-- resultados para busqueda con query (busqueda) --}}
          <div class="container-fluid pull-right">
            <span> Ordenar por:
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=title&direction=asc') }}" class="btn btn-sm btn-default">nombre A-Z</a>
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=title&direction=desc') }}" class="btn btn-sm btn-default"> nombre Z-A</a>
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&direction=asc') }}" class="btn btn-sm btn-default">menos reciente</a>
              <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&direction=desc') }}" class="btn btn-sm btn-default">más reciente</a>
          </div>
          <h3><small>Resultados para '{{ $query }}' </small></h3>
        @endif
    @else
      {{-- Resultados sin query (sin categoria ni busqueda) --}}
        <div class="container">
          <div class="pull-right">
          <span> Ordenar por:
            <a href="{{ route('auctions.index', 'orderCriteria=title&direction=asc') }}" class="btn btn-sm btn-default">nombre A-Z</a>
            <a href="{{ route('auctions.index', 'orderCriteria=title&direction=desc') }}" class="btn btn-sm btn-default"> nombre Z-A</a>
            <a href="{{ route('auctions.index', 'orderCriteria=created_at&direction=asc') }}" class="btn btn-sm btn-default">menos reciente</a>
            <a href="{{ route('auctions.index', 'orderCriteria=created_at&direction=desc') }}" class="btn btn-sm btn-default">más reciente</a>
          </div>
        </div>
    @endif
    <br>


    <div class="container-fluid">
      <div class="row">
        @foreach ($auctions as $a)
          <div class="col-md-4 col-sm-6">
            <div class="thumbnail panel panel-default" style="height:440px; width:300px">
              <div class="panel-heading">
                <h6>
                Dias restantes: {{$a->remainingDays()}}
                </h6>
              </div>
              <div class="panel-body" style="height:300px">
                <a href="{{ route('auctions.show', ['id' => $a->id ]) }}">
                <img src="{{ $a->pictureUrl() }}" alt="{{ $a->title }}"/>
                </a>
              </div>
              <div class="panel-footer" style="height:0=150px; overflow:auto" >
                <h2 class="panel-title"> {{ $a->title }} </h2>
                <br>
              </div>
            </div>
          </div>
        @endforeach
        </div>
    </div>
  @endif

@overwrite
