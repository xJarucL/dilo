<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/email.css') }}">
</head>
<body>
    <center>
        <p>Hola,</p>
        <p>Recibimos una solicitud para restablecer tu contraseña. Haz clic en el siguiente enlace:</p>
        <p>
            <a href="{{ url('/reset-password?token=' . $token) }}" style="padding: 10px 20px; background: red; color: white; text-decoration: none;">Restablecer Contraseña</a>
        </p>
        <p>Si no solicitaste esto, ignora este mensaje.</p>
        <p>Saludos,<br>El equipo de Seguridad DILO.</p>
    </center>

</body>
</html>
