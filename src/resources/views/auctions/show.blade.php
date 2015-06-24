@extends('layout.default')

@section('title', $auction->title)

@section('content')

    @include('partials.detailed_notifications')
    {{-- <div class="container-fluid pull-left">
        <a href="{{ URL::previous() }}" class="btn btn-default pull-left">Atrás</a>
    </div> --}}
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
                <b>Fecha de cierre</b> <br> {{ substr($auction->formatedEndDate(), 0, 10) }}
            </p>
            @if(!Auth::guest() && (Auth::user()->id == $auction->owner->id))
                <div >
                    <br>
                    <a href="{{ route('auctions.edit', $auction->id) }}" class="btn btn-default">Editar</a>
                    <a href="{{ route('auctions.destroy', $auction->id) }}" class="btn btn-default btn-danger">Eliminar</a>
                </div>
            @endif

        </div>
        {{-- Auction Image --}}
        <div class="col-lg-6">
          <img src='{{ $auction->pictureUrl() }}' class="img-thumbnail pull-right" height="350" width="350"/>
        </div>
      </div>

      <br>
      {{-- Comentarios --}}

      <!-- Button trigger modal -->
      @if(Auth::guest())
      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" href="{{route('login')}}">
        Hacer un comentario
      </a>
      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" href="{{route('login')}}">
        Ofertar
      </a>
      @else
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#commentModal">
          Hacer un comentario
        </button>
        @if((Auth::user()->hasOfferOn($auction)))
        <a class="btn btn-primary btn-sm" href='{{route('offers.create', ['auction_id' => $auction->id])}}'>
          Ofertar
        </a>
        @endif
      @endif
      <br>
      <br>

      @foreach($auction->comments as $comment)

      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-lg-10">
              >  {{$comment->content}} <br>
              <h6> {{$comment->formatedCreationDate()}} </h6>
            </div>
            <div class="col-lg-2">
              @if(!(Auth::guest()) && ((Auth::user()->is_admin == 1) || (Auth::user()->id = $comment->owner_id)) && ($comment->response == null))
                <a class="btn btn-danger btn-xs pull-right" type="submit" href="{{route("comments.delete",["id" => $comment->id]) }}">Eliminar</a>
                {{-- <a class="btn btn-default btn-xs pull-right" type="submit" href="{{route("comments.update",["id" => $comment->id]) }}">Editar</a> --}}
              @endif
            </div>
          </div>
        </div>
          @if(isset($comment->response))
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <a> {{$comment->response}} </a>
                  <h6>  {{$comment->formatedResponseDate()}} </h6>
                </div>
                {{-- PODRIA SERVIR SI QUEREMOS ELIMINAR SOLO LA RESPUESTA, O HACER ALGO CON LA RESPUESTA --}}
                {{-- <div class="col-lg-1">
                  @if((Auth::user()->is_admin == 1) || (Auth::user()->id = $auction->owner_id))
                    <a class="btn btn-danger btn-xs pull-right" type="submit">Eliminar</a>
                  @endif
                </div> --}}
              </div>

            </div>
          @else
            @if(!(Auth::guest()) && (Auth::user()->id == $auction->owner->id))
            <div class="panel-body">
              <div class="row">
                <div class='col-lg-11'>
                  <form role="form" method="POST" action='{{ route('comments.postresponse')}}'>
                    <div class="form-group">
                      <textarea name ='response' rows='2' class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="comment_id" value='{{$comment->id}}'>
                    </div>
                </div>
                <div class="col-lg-1">
                    <button class="btn btn-primary btn-xs pull-right" type="submit">Responder</button>
                  </form>
                </div>

              </div>
            </div>
            @endif
          @endif
      </div>
      @endforeach

      {{-- Ofertas --}}


      @if(!(Auth::guest()))
        @if(Auth::user()->hasOfferOn($auction))
          <div class="well">
            <span>
              <b>Tu oferta</b>: {{ $auction->userOffer(Auth::user())->reason }} - <b>Monto</b>: {{ $auction->userOffer(Auth::user())->amount }}
            </span>
          </div>
        @endif

        @if((Auth::user()->id == $auction->owner->id) || (Auth::user()->is_admin == 1))

          @if( count($auction->offers) > 0)
          <div class="well">
            <a id="toggler" data-toggle="collapse" class="active btn btn-primary btn-sm" data-target="#ofertas">
              Ofertas
            </a>
            <table class="table table-striped table-hover collapse" id="ofertas">
              <thead>
                <tr>
                  {{-- <th>#ID</th> --}}
                  {{-- <th>Usuario</th> --}}
                  <th>Motivo</th>
                  {{-- <th>Monto</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($auction->offers as $offer)
                <tr>
                  {{-- <td>{{$offer->id}}</td> --}}
                  {{-- <td>{{$offer->owner->name}} {{$offer->owner->last_name}}</td> --}}
                  <td>{{$offer->reason}}</td>
                  {{-- <td> X </td> --}}
                  @if((substr($auction->end_date, 0, 10) < Date("Y-m-d")) && (Auth::user()->id == $auction->owner->id))
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

      @if(!(Auth::guest()))
      <!-- Modal -->
      <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Escribe tu pregunta o comentario</h4>
            </div>
            <div class="modal-body">

              <form role="form" method="POST" action='{{ route('comments.poststore') }}'>
                <div class="form-group">
                  <label for="content" class="control-label">Mensaje <small>(maximo 511 carácteres)</small></label>
                  <textarea name ='content' id='textarea' rows='4' class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="owner_id" value='{{Auth::user()->id}}'>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="auction_id" value='{{$auction->id}}'>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Comentar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif


    </div>
@overwrite
