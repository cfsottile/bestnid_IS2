<html>
    <head>
        <title>Bestnid - @yield('title')</title>
        @section('styles')
            {{-- insert your styles here --}}
        @show
        @section('scripts')
            {{-- insert your scripts here --}}
        @show
    </head>
    <body>
        @section('header')
            @section('right_header')
            @show
            @section('left_header')
            @show
        @show

        @yield('content')

        @section('footer')

        @show
    </body>
</html>
