<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>Iniciar sesión</title>
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<body>
    <div class="image-container">
        <x-rain />
        <div class="row min-vh-100 position-relative">
            <div class="d-flex justify-content-center align-items-center position-relative z-index-1">
                <div>
                    <div class="text-center">
                        <img src="{{ asset('img/dilo_png.png') }}" alt="Logo" class="img">
                    </div>
                    <h1 class="text-center mb-4">Iniciar sesión</h1>
                    <hr>
                    <form action="{{ route('login.iniciar') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Correo" name="correo" required>
                            <label for="floatingInput">Correo electrónico</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="contrasena" required>
                            <label for="floatingPassword">Contraseña</label>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="g-recaptcha" data-sitekey="6LfT_fsqAAAAAJn4Sm2Vi4p1GDgaZekOPxrcjJMA"></div>

                        <input type="submit" value="Entrar" class="btn btn_entrar w-100">
                    </form>
                    <hr>
                    <h5 class="text-center">¿Aún no tienes una cuenta? <a href="{{ route('registrarse') }}">¡Regístrate!</a></h5>
                    <h5 class="text-center">¿No recuerdas tu contraseña? <a href="{{ route('recuperar_contraseña') }}">¡Recupérala!</a></h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
