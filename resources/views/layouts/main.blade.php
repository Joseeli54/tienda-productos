<!DOCTYPE html>
<html>
<head>
    <title>Tienda Productos - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js') }}"></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos-propios.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white" style="-webkit-box-shadow: 3px 6px 5px 0px rgba(0,0,0,0.32);
                                                                  -moz-box-shadow: 3px 6px 5px 0px rgba(0,0,0,0.32);
                                                                  box-shadow: 3px 6px 5px 0px rgba(0,0,0,0.32);">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src=" {{asset('img/logo.png')}} "
        height="30"
        alt="Logo Tienda"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">

        @if (Auth::check())
            <form method="POST" action="{{ route('logout') }}">
            @csrf
                <input type="submit" name="logout" class="btn btn-danger px-md-3 me-md-2" value="Cerrar Sesión">
            </form>
        @else

            <a type="button" class="btn btn-secondary px-md-3 me-md-2" href="@php if(Auth::check()){ echo '/logout'; }else{ echo '/login'; } @endphp">
                  Login
            </a>
        @endif

        <a type="button" class="btn btn-primary me-3" href="/register">
          Sign up for free
        </a>
        <a class="btn btn-dark px-3" href="https://github.com/mdbootstrap/mdb-ui-kit" role="button"><i class="fa fa-github"></i
        ></a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
    @if (Auth::check())
        <div class="container-fluid my-md-4">
            <div class="col-md-12">
                <header class="menu-principal">
                    <nav>
                        <div class="container">
                            <div class="row text-center">
                                <div class="col"><a class="item-menu" href="/">Inicio</a></div>
                                <div class="col"><a class="item-menu" href="/">Productos</a></div>
                                <div class="col"><a class="item-menu" href="/">Almacenes</a></div>
                                <div class="col"><a class="item-menu" href="">Nosotros</a></div>
                                <div class="col"><a class="item-menu" href="">Contacto</a></div>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
        </div>
    @endif

    @section('contenido')
    @show

    <footer style="-webkit-box-shadow: 3px 6px 5px 0px rgba(0,0,0,0.32);
                  -moz-box-shadow: 3px 6px 5px 0px rgba(0,0,0,0.32);
                  box-shadow: 3px 6px 5px 0px rgba(0,0,0,0.32);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p id="texto-footer" class="mb-0">Tienda - Productos - Almacenes</p>
                </div>
            </div>
        </div>
    </footer>

</html>