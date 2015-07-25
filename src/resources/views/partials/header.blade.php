<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('auctions.index')}}" style="padding-top:2">
        <span>
         <img src='{{asset('images/logo/bestnid.png')}}' style="length:40px;width:40px"/>
         Best<span style="color:#F33">nid</span>
       </span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {{-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li> --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorías <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              @foreach (App\Models\Category::all() as $c)
                <li><a href="{{ route('auctions.index', 'query='.$c->name.'&category=true') }}">{{$c->name}}</a></li>
              @endforeach
            {{-- <li class="divider"></li> --}}
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" method="GET" action="{{ route('auctions.index')}}">
        <div class="form-group">
          <input type="text" class="form-control" style="width:400px;margin-left:190" placeholder="Buscar..." name="query">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
            <li><a href="{{ route('help') }}">Ayuda</a></li>
						<li><a href="{{ url('/register') }}">Registrate</a></li>
            <li><a href="{{ url('/login') }}">Logueate</a></li>
            <li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hola, {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('users.show') }}">Ver mis datos</a></li>
                <li><a href="{{ route('user.myauctions') }}"> <span class="glyphicon glyphicon-menu-right"></span> Ver mis subastas</a></li>
                <li><a href="{{ route('offers.index') }}"> <span class="glyphicon glyphicon-menu-right"></span> Ver mis ofertas</a></li>
                <li><a href="{{ route('users.edit') }}"> <span class="glyphicon glyphicon-menu-right"></span> Editar mi cuenta</a></li>
                @if (Auth::user()->is_admin == 1)
                <li class="divider"></li>
                <li><a href="{{ route('admin.index') }}">Panel de Administración</a></li>
                @endif
                <li class="divider"></li>
                <li><a href="{{ route('help') }}">Ayuda</a></li>
                <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>

							</ul>
            <li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </li>
						</li>
					@endif
				</ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<br>
