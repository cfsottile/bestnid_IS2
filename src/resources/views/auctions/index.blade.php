
@extends('layout.default')

@section('title', 'Subastas')



@section('content')

  @include('partials.notifications')
  <div class="page-header">
    <h1>Subastas</h1>
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
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=name&category=true&direction=asc') }}" class="btn btn-primary btn-sm">nombre A-Z</a>
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=name&category=true&direction=desc') }}" class="btn btn-primary btn-sm"> nombre Z-A</a>
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&category=true&direction=asc') }}" class="btn btn-primary btn-sm">menos reciente</a>
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&category=true&direction=desc') }}" class="btn btn-primary btn-sm">más reciente</a>
            </div>
            <h3><small>Resultados para la categoria '{{ $query }}' </small></h3>
          @else
            {{-- resultados para busqueda con query (busqueda) --}}
            <div class="container-fluid pull-right">
              <span> Ordenar por:
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=name&direction=asc') }}" class="btn btn-primary btn-sm">nombre A-Z</a>
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=name&direction=desc') }}" class="btn btn-primary btn-sm"> nombre Z-A</a>
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&direction=asc') }}" class="btn btn-primary btn-sm">menos reciente</a>
                <a href="{{ route('auctions.index', 'query='.$query.'&orderCriteria=created_at&direction=desc') }}" class="btn btn-primary btn-sm">más reciente</a>
            </div>
            <h3><small>Resultados para '{{ $query }}' </small></h3>
          @endif
      @else
        {{-- Resultados sin query (sin categoria ni busqueda) --}}
          <div class="container">
            <div class="pull-right">
            <span> Ordenar por:
              <a href="{{ route('auctions.index', 'orderCriteria=name&direction=asc') }}" class="btn btn-primary btn-sm">nombre A-Z</a>
              <a href="{{ route('auctions.index', 'orderCriteria=name&direction=desc') }}" class="btn btn-primary btn-sm"> nombre Z-A</a>
              <a href="{{ route('auctions.index', 'orderCriteria=created_at&direction=asc') }}" class="btn btn-primary btn-sm">menos reciente</a>
              <a href="{{ route('auctions.index', 'orderCriteria=created_at&direction=desc') }}" class="btn btn-primary btn-sm">más reciente</a>
          </div>
        </div>
      @endif
      <br>


      <div class="container-fluid">
      <div class="row">
      @foreach ($auctions as $a)
          <div class="col-md-4 col-sm-6">

            <div class="thumbnail panel panel-default" style="height:420px; width:300px">
              {{-- <div class="panel-heading">
                <h5>Bids:-|             |Dias:-</h5>
              </div> --}}
              <div class="panel-body" style="height:300px">
                <a href="{{ route('auctions.show', ['id' => $a->id ]) }}">
                  <img src="{{ $a->pictureUrl() }}" alt="{{ $a->name }}"/>
                </a>
              </div>
              <div class="panel-footer" style="height:110px; overflow:auto" >
                <!-- POR AHORA DEJO ACA LA FECHA -->
                <h6> 
                  Faltan  
                  <?php
                  $datetime1 = new DateTime(substr($a->end_date, 0, 10));
                  $datetime2 = new DateTime("now");
                  $interval = $datetime2->diff($datetime1);
                  echo $interval->format('%a días');
                  //$a->contDaysEnd() 
                  ?>
                  para el cierre 
                </h6>
                <h2 class="panel-title"> {{ $a->name }} </h2>
                <!-- <h5> {{ $a->description }} </h5> -->
                <br>
                
              </div>
            </div>
          </div>

      @endforeach
      </div>
      </div>
  @endif
  </div>


@overwrite
  