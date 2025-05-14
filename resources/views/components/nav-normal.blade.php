<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/nav-normal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/texto_voz.js') }}"></script>
    <script src="{{ asset('js/buscador.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<nav class="navbar">

    <div class="logo-container">
        <img src="{{ asset('img/dilo_png.png') }}" alt="Logo" class="logo">
    </div>


    <div class="search-container">
        <input type="text" name="voz" id="voz" class="voz" placeholder="¿En qué piensas?...">
        <a href="#" class="voice" onclick="leerTexto_buscador()">
            <i class="fa-solid fa-volume-high"></i>
        </a>
    </div>

    <div class="search-container">
        <input type="text" id="search" placeholder="Buscar..." onkeyup="filtrarCartas()" />
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>


    <ul class="nav-links">
        <li><a href="{{ route('panel') }}" class="nav-item"><i class="fas fa-home"></i> Inicio</a></li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-item logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
        </li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>
<script>
function leerTexto_buscador() {
    let input = document.getElementById("voz"); // Obtiene el input
    let texto = input.value.trim(); // Obtiene el texto ingresado
    if (texto === "") return; // No hacer nada si está vacío

    let speech = new SpeechSynthesisUtterance();
    speech.text = texto;
    speech.lang = "es-ES"; // Español
    speech.rate = 1; // Velocidad normal
    speech.pitch = 1; // Tono normal
    window.speechSynthesis.speak(speech);
}
</script>
