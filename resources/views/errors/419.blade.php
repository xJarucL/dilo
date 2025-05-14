<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 419 - Página expirada</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/404.css') }}">
</head>
<body>
    <x-rain />
    <div class="error-wrapper">
        <div class="error-message">
            <h1 class="error-title">¡Vaya!</h1>
            <p class="error-description">Parece que el tiempo de respuesta se agotó. No te preocupes, puedes <a href="{{ url('/panel') }}" class="back">volver al inicio.</a></p>
        </div>
        <div class="animation-container">
            <div class="error-images">
                <img src="{{ asset('img/time.gif') }}" alt="Logo" class="img" style="width: 300px; height: auto;">
            </div>
        </div>

    </div>
</body>
</html>
