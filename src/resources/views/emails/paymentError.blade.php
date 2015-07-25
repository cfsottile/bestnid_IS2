<body>
    <p>
        <h3>¡Malas noticias, {{ $user->name }}!</h3>
        Fuiste seleccionado/a como ganador/a en la subasta <a href="{{route('auctions.show', $auction->id)}}">{{$auction->title}}</a>,
        pero hubo un error cuando quisimos efectuar el pago. Regularizá tu situación con el banco lo antes posible, quizá tenés
        suerte y el/la subastador/a te da otra chance y vuelve a intentar seleccionarte más tarde.
    </p>
    <p>
        Saludos, ¡esperamos que salga todo bien!
    </p>
</body>
