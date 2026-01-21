<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Página de Contacto</h1>
    <!-- El uso de blade nos permite poder hacer uso de algunas directivas como a continuación podemos apreciar en la siguiente línea de código -->
    <h2>{{$nombre}}</h2>
    <h2>{{$carrera}}</h2>
    <a href="{{route('vista_inicio')}}">Ir a la vista de inicio</a><br>
    <a href="{{route('contact')}}">Ir a la vista de contacto</a>
</body>
</html>