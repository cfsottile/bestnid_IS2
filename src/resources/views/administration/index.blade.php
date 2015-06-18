@extends('layout.default')

@section('title', 'Panel de Administracion')

@section('content')

@include('partials.detailed_notifications')
<a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
<div class="page-header">
  <h1> Panel de Administración </h1>
</div>

<div class='container-fluid'>

  <div class="row">

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <a  href="{{ route('admin.users.index') }}">
        <img class="img-thumbnail" src="{{asset('images/administration/usuarios.jpg')}}"/>
      </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <a  href="{{ route('admin.auctions.superindex') }}">
        <img class="img-thumbnail" src="{{asset('images/administration/subastas.jpg')}}"/>
      </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <a href="#">
      <img class="img-thumbnail" src="{{asset('images/administration/categorias.jpg')}}"/>
    </a>
    </div>

  </div>

</div>

@endsection
