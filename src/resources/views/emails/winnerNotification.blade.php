<body>
    <p>
        <h3>¡Hola, {{ $winner->name }}!</h3>
        Tenemos el agrado de comunicarte que fuiste elegido ganador de
        la subasta <a href="{{route('auctions.show', $auction->id)}}">{{$auction->title}}</a>.
    </p>
    <p>
        <h3>Los datos del subastador son:</h3>
        Nombre: {{$auctionOwner->name}} {{$auctionOwner->last_name}}<br>
        Teléfono: {{$auctionOwner->phone}}
    </p>
</body>
