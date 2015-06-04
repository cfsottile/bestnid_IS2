<html>
    <head>
        <title>Bestnid - @yield('title')</title>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          @section('styles')
          <!-- insert your styles here -->
            <!-- Bootstrap -->
            <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
          @show
          @section('scripts')
            <!-- insert your scripts here -->
            <script src="{{ asset('js/jquery.min.js')}}"></script>
            <script src="{{ asset('js/bootstrap.js')}}"></script>

          @show
    </head>
    <body>
      <div class='container'>
        @section('header')

        @show

        @section('notifications')
          @include('partials.notifications')

        @endsection

        @yield('content')

        @section('footer')
          @include('partials.footer')

        @endsection
      </div>

    </body>
</html>
