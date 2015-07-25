@extends('layout.default')

@section('title', 'Éxito')

@section('content')
<div class="jumbotron">
    <h3 class="text-center">{{ $message }}</h5>
    <img src="{{ asset('images') }}/exito.jpeg" class="img-thumbnail center-block"/>
</div>
@overwrite
