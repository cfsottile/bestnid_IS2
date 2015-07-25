<body>
    <h3>¡Hola, {{ $auction->owner->name }}!</h3>
    <p>
        Hicieron un nuevo comentario en tu subasta <a href="{{route('auctions.show', $auction->id)}}">{{$auction->title}}</a>:
    </p>
    <p>
        <i>
            "{{ $commentContent }}"
        </i>
    </p>
    <p>
        ¡Saludos!
    </p>
</body>
