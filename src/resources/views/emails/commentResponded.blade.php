<body>
    <h3>¡Hola, {{ $user->name }}!</h3>
    <p>
        Respondieron a tu comentario <i>"{{$comment->content}}"</i> en la subasta <a href="{{route('auctions.show', $auction->id)}}">{{$auction->title}}</a>.
    </p>
    <p>
        ¡Saludos!
    </p>
</body>
