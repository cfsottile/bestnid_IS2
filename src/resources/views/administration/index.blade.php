@extends('layout.default')

@section('title', 'Panel de Administracion')

@section('content')

@include('partials.detailed_notifications')
<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
<div class="page-header">
  <h1> Panel de Administracion </h1>
</div>

<div class='container-fluid'>

  <div class="row">

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <a class="img-thumbnail" href="{{ route('admin.users.index') }}">

        Administracion de Usuarios
      </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <a class="img-thumbnail" href="{{ route('admin.auctions.superindex') }}">

        Administracion de Subastas
      </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <a class="img-thumbnail" href="#">

      Administracion de Categorias
    </a>
    </div>

  </div>

</div>

@endsection
