@extends('layout.default')

@section('title', 'Become a user!!! 😀')

@section('content')
    <div class="center-block">
        <p>Para realizar esta acción debes ser un usuario registrado.</p>
        <a class="btn btn-primary" href="{{ route('getRegister') }}">Registrame!</a>
        <a class="btn btn-default" href="{{ route('login') }}">Logueame!</a>
    </div>
@endsection
