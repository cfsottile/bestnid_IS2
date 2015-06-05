<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('auctions.index')}}">Best<span style="color:#F33">nid</span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {{-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li> --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorias <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('auctions.index', 'query=2'.'&Category=true') }}">Automotores</a></li>
            <li><a href="{{ route('auctions.index', 'query=3'.'&Category=true') }}">Cocina</a></li>
            <li><a href="{{ route('auctions.index', 'query=1'.'&Category=true') }}">Electronica</a></li>
            <li><a href="{{ route('auctions.index', 'query=5'.'&Category=true') }}">Muebleria</a></li>
            <li><a href="{{ route('auctions.index', 'query=4'.'&Category=true') }}">Ropa</a></li>
            {{-- <li class="divider"></li> --}}
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" method="GET">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar..." name="query">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/register') }}">Registrate</a></li>
            <li><a href="{{ url('/login') }}">Logueate</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hola, {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
							</ul>
						</li>
					@endif
				</ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
