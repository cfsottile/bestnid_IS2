@extends('layout.default')

@section('title', 'Subastas')

@section('content')

    <h1>Subastas</h1>
    <div class="container-fluid">
    <div class="row">
    @foreach ($auctions as $a)

        <div class="col-md-4">

          <div  class="thumbnail panel panel-danger" style="height:400px; width:300px">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $a->name }} </h3>
              <h5> {{ $a->description }} </h5>
            </div>
            <div class="panel-body">
              <a href="{{ route('auctions.show', ['id' => $a->id ]) }}">
                <img src="{{ $a->pictureUrl() }}" alt="{{ $a->name }}"/>
              </a>
            </div>
          </div>

            {{-- <a class=thumbnail style="height:400px; width:300px" href="{{ route('auctions.show', ['id' => $a->id ]) }}">
              <img src="{{ $a->pictureUrl() }}" alt="{{ $a->name }}"/>
              <h3>{{ $a->name }}</h3>
              <p> {{ $a->description }} </p>
            </a> --}}


        </div>

    @endforeach
    </div>
    </div>
  </div>


@endsection
