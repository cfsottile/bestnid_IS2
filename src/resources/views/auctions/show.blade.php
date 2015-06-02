<html>
    <head>
        <title>BestNid - Subasta {{ $auction->name }}</title>
    </head>
    <body>
        <h1>{{ $auction->name }}</h1>
        <p>
            <img src='{{ $auction->picture }}'/><br>
            {{ $auction->description }}<br>
            Fecha de inicio: {{ $auction->created_at }}<br>
            Duración en días: {{ $auction->end_date }}
        </p>
    </body>
</html>
