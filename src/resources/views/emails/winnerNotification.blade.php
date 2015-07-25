<body>
    <h3>¡Hola, {{ $winner->name }}!</h3>
    <p>
        Tenemos el agrado de comunicarte que fuiste elegido/a ganador/a de
        la subasta <a href="{{route('auctions.show', $auction->id)}}">{{$auction->title}}</a>.
    </p>
    <h5>Los datos del/la subastador/a son:</h5>
    <p>
        Nombre: {{$auctionOwner->name}} {{$auctionOwner->last_name}}<br>
        Teléfono: {{$auctionOwner->phone}}
    </p>
    <p>
        Saludos, ¡esperamos que salga todo bien!
    </p>
</body>
