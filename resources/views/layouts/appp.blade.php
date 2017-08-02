<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Sistema Cs. Agricolas </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
       @include('estudiante.partials.menu')
       <div class="container">
            @yield('content')
       </div>
       
</body>
</html>