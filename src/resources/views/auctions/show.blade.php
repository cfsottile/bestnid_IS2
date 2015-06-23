@extends('layout.default')

@section('title', $auction->title)

@section('content')
    <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
    <div class="jumbotron">
      <div class="page-header">
        <h2>{{ $auction->title }}</h2>
      </div>
      <br>
      <div class="row">
        {{-- Auction INFO --}}
        <div class="col-lg-6">
          @if(!(Auth::guest()))
            @if(Auth::user()->is_admin == 1)
              <p>
                <b> Subastador </b> <br> {{ $auction->owner->name.' '.$auction->owner->last_name }}
              </p>
            @endif
          @endif
            <p>
                <b>Descripción </b> <br> {{ $auction->description }}
            </p>
            <p>
                <b>Fecha de cierre</b> <br> {{ substr($auction->end_date, 0, 10) }}
            </p>

        </div>
        {{-- Auction Image --}}
        <div class="col-lg-6">
          <img src='{{ $auction->pictureUrl() }}' class="img-thumbnail" height="350" width="350"/>
        </div>
      </div>

      <br>
      {{-- Comentarios --}}

      @foreach($auction->comments as $comment)

      <div class="panel panel-default">
        <div class="panel-heading">
          {{$comment->content}} <br> {{ substr($comment->created_at, 0, 10) }}
        </div>
        <div class="panel-body">
          @if(isset($comment->response))
            {{$comment->response}} <br> {{ substr($comment->response_date, 0, 10) }}
          @endif
        </div>
      </div>
      @endforeach

      {{-- Ofertas --}}

      @if(!(Auth::guest()))
        @if((Auth::user()->id == $auction->owner->id) || (Auth::user()->is_admin == 1))

          @if( count($auction->offers) > 0)
          <div class="well">
            <a id="toggler" data-toggle="collapse" class="active" data-target="#demo">
              Ofertas
            </a>
            <table class="table table-striped table-hover collapse" id="demo">
              <thead>
                <tr>
                  {{-- <th>#ID</th> --}}
                  <th>Usuario</th>
                  <th>Motivo</th>
                  {{-- <th>Monto</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($auction->offers as $offer)
                <tr>
                  {{-- <td>{{$offer->id}}</td> --}}
                  <td>{{$offer->owner->name}} {{$offer->owner->last_name}}</td>
                  <td>{{$offer->reason}}</td>
                  {{-- <td> X </td> --}}
                  @if(substr($auction->end_date, 0, 10) < Date("Y-m-d"))
                      <td>
                          <form class="" action="{{ route('auctions.postWinner', $auction->id) }}" method="post">
                              <input type="hidden" name="winner_id" value="{{ $offer->owner->id }}">
                              <input class="btn btn-primary btn-xs" type="submit" name="" value="Elegir">
                          </form>
                      </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif

      @endif
      @endif

    </div>
@overwrite
