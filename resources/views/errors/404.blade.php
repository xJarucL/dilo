<!DOCTYPE html>
<html lang="es">
<x-nav />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/404.css') }}">
</head>
<body>
    <x-rain />
    <div class="error-wrapper">
        <div class="error-message">

            <h1 class="error-title">¡Vaya!</h1>
            <p class="error-description">Parece que hemos perdido tu página. No te preocupes, puedes <a href="{{ url('/panel') }}" class="back">volver a la página principal.</a></p>
        </div>
        <div class="animation-container">
            <div class="error-images">
                <img src="{{ asset('img/4-.png') }}" alt="Logo" class="img">
                <img src="{{ asset('img/-0-.png') }}" alt="Logo" class="img">
                <img src="{{ asset('img/-4.png') }}" alt="Logo" class="img">
            </div>
        </div>
    </div>
</body>
</html>
