<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
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

                    <h1 class="text-center mb-4">Reestablecer contraseña</h1>
                    <hr>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Correo" name="email"  required>
                            <label for="floatingInput">Ingresa tu correo electrónico</label>
                        </div> -->

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="password" required>
                            <label for="floatingPassword">Nueva contraseña</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="password_confirmation" required>
                            <label for="floatingPassword">Confirmar nueva contraseña</label>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <input type="submit" value="Restablecer Contraseña" class="btn btn_entrar w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

