<body>
    <h3>¡Hola, {{ $auction->owner->name }}!</h3>
    <p>
        Elegiste al/la ganador/a de tu subasta <a href="{{route('auctions.show', $auction->id)}}">{{$auction->title}}</a>.
    </p>
    <h5>Datos del/la ganador/a:</h5>
    <p>
        Nombre: {{$auction->winner->name}} {{$auction->winner->last_name}}<br>
        Teléfono: {{$auction->winner->phone}}
    </p>
    <h5>Datos de la oferta:</h5>
    <p>
        Motivo: {{ $offer->reason }}<br>
        Monto: {{ $offer->amount }}
    </p>
    <p>
        Saludos, ¡esperamos que salga todo bien!
    </p>
</body>
