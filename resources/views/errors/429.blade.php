<!DOCTYPE html>
<html lang="es">
<x-nav />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 429</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/404.css') }}">
</head>
<body>
    <x-rain />
    <div class="error-wrapper">
        <div class="error-message">

            <h1 class="error-title">¡Ops!</h1>
            <p class="error-description">Has realizado demasiadas solicitudes en poco tiempo. Por favor, espera e <a href="{{ url('/panel') }}" class="back">inténtalo de nuevo más tarde.</a></p>
        </div>
        <div class="animation-container">
            <div class="error-images">
                <img src="{{ asset('img/429.gif') }}" alt="Logo" class="img" style="width: 300px; height: auto;">
            </div>
        </div>
    </div>
</body>
</html>
