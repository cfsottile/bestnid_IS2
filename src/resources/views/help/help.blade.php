@extends('layout.default')

@section('title', 'Ayuda')

@section('content')

  <a href="{{ URL::previous() }}" class="btn btn-default pull-right">Atrás</a>
  <div class="page-header">
    	@if (Auth::guest()) 
				<h2>Hola, ¿con qué necesitas ayuda?</h2>
			@else
				<h2>Hola, {{ Auth::user()->name }}, ¿con qué necesitas ayuda?</h2>
		  	@endif
  </div>

@overwrite