@extends('partials.notifications')

@section('details')

    <span class="sr-only">Error:</span>
    @if ( Session::has('errors'))
        <ul>
            @foreach (Session::get('errors') as $message)
                <li>{{$message}}</li>
            @endforeach
        </ul>
    @endif

    @if ( Session::has('error'))
        {{Session::get('error')}}
    @endif
    @if (count($errors) > 0)
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif

@endsection
