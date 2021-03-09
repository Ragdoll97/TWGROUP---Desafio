Un usuario ha escrito un nuevo comentario en tu publicacion

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo caso de emergencia a las {{ $distressCall->created_at }}.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
        <li>Nombre: {{ $distressCall->user->name }}</li>
        <li>Teléfono: {{ $distressCall->user->email }}</li>
    </ul>
 
</body>
</html>