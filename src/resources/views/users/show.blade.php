@extends('layout.default')

@section('title', 'Datos de cuenta')

@section('content')
  @include('partials.detailed_notifications')
  {{-- <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a> --}}
  <div class="page-header">
    <h1> Datos de cuenta </h1>
  </div>
  <h1></h1>
  <div class="row">
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-body">
            <h3 class='panel-title'>Datos personales</h3>
            <br>
            <ul class="list-group">
              {{-- <li class="list-group-item">ID: {{ $user->id }}</li> --}}
              <li class="list-group-item">Nombre: {{ $user->name }}</li>
              <li class="list-group-item">Apellido: {{ $user->last_name }}</li>
              <li class="list-group-item">Fecha de Nacimiento: {{ $user->formatedBornDate() }}</li>
              <li class="list-group-item">Fecha de Registro: {{ $user->formatedCreatedAt() }}</li>
              <li class="list-group-item">Datos de tarjeta de credito: {{ $user->cc_data }}</li>
            </ul>
            @if( (Auth::user()->is_admin == 0) || (Auth::user()->id == $user->id) )
              {{-- <a href="{{ route('users.edit') }}" class="btn btn-primary btn-sm pull-right">Editar mis datos</a> --}}
              <form method="GET" action="{{ route('users.delete') }}" style="display:inline">
								<button class="btn btn-sm btn-danger pull-right" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar cuenta de usuario" data-message="Estás seguro? Será permanente">
									Eliminar cuenta
								</button>
							</form>
            @else
               {{-- <a href="{{ route('admin.users.edit' , ['id' => $user->id]) }}" class="btn btn-primary btn-sm pull-right">Editar datos de usuario</a> --}}
              <form method="GET" action="{{ route('admin.users.delete' , ['id' => $user->id]) }}" style="display:inline">
								<button class="btn btn-sm btn-danger pull-right" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Eliminar cuenta de usuario" data-message="Estás seguro? Será permanente">
									Eliminar cuenta
								</button>
							</form>
            @endif
            <br>
            <br>
            <h3 class='panel-title'>Datos de subastas</h3>
            <br>
            <ul class="list-group">
              <li class="list-group-item"><a href="{{ route('user.myauctions') }}">Subastas iniciadas</a> <span class="badge">{{count($user->auctions)}}</span> </li>
              <li class="list-group-item"><a href="{{ route('offers.index') }}">Subastas ofertadas</a> <span class="badge">{{count($user->offers)}}</span> </li>
              <li class="list-group-item">Subastas ganadas <span class="badge">0</span> </li>
              <li class="list-group-item">Comentarios hechos <span class="badge">{{count($user->comments)}}</span> </li>
            </ul>
        </div>
      </div>
    </div>
</div>

@include('partials.delete_confirmation')
@endsection
