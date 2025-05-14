<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/texto_voz.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">


</head>
<input type="checkbox" id="menu" class="nav">
<label for="menu" class="label-lav">
  <span></span>
  <span></span>
  <span></span>
</label>
<nav>
  <ul>
    <a href="{{ route('panel') }}"><li>Panel</li></a>
    <a href="{{ route('usuarios') }}"><li>Usuarios</li></a>
    <a href="{{ route('nueva_categoria') }}"><li>Ingresar categoría</li></a>
    <a href="{{ route('nueva_palabra') }}"><li>Ingresar palabra</li></a>
    <a href="{{ route('nueva_palabra_clave') }}"><li>Ingresar palabra clave</li></a>
    <a href="{{ route('nuevo_numero') }}"><li>Ingresar número</li></a>
    <a href="{{ route('nueva_letra') }}"><li>Ingresar letra</li></a>
    <a href="{{ route('nueva_vocal') }}"><li>Ingresar vocal</li></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <li>Cerrar sesión</li>
    </a>

  </ul>
</nav>
