<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>Registrarse</title>
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<body>
    <div class="image-container">
        <x-rain />
        <div class="row min-vh-100 position-relative">
            <div class="justify-content-center align-items-center position-relative z-index-1">
                <div class="form-container p-4">
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/dilo_png.png') }}" alt="Logo" class="img">
                    </div>
                    <h1 class="text-center mb-4">Ingresa tus datos para registrarte</h1>
                    <hr>
                    <form action="{{ route('registrar') }}" method="post" id="form">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Usuario" name="nom_usuario" autocomplete="off" required>
                                        <label for="floatingInputGroup1">Usuario</label>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="tel" name="tel" class="form-control" id="floatingInput" placeholder="Teléfono" autocomplete="off" required pattern="[0-9]{10}">
                                    <label for="floatingInput">Teléfono</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="contraseña1" placeholder="Contraseña" autocomplete="off" required>
                                    <label for="contraseña1">Contraseña</label>
                                </div>
                            </div>

                            <div class="col-md-4 p-2">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email1" placeholder="Correo" autocomplete="off" required>
                                    <label for="email1">Correo electrónico</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email2" placeholder="Confirmar correo" name="correo" autocomplete="off" required>
                                    <label for="email2">Confirmar correo electrónico</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="contraseña2" placeholder="Confirmar contraseña" name="contrasena" autocomplete="off" required>
                                    <label for="contraseña2">Confirmar contraseña</label>
                                </div>
                            </div>
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

                        <input type="hidden" name="fk_tipo_usuario" value="2">

                        <div class="text-center">
                            <input type="submit" value="Registrarme" class="btn btn_entrar" style="width:50%">
                            <p class="error" id="error-email">Los correos no coinciden.</p>
                            <p class="error" id="error-password">Las contraseñas no coinciden.</p>
                        </div>
                    </form>
                    <hr>
                    <h5 class="text-center">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>
</body>
