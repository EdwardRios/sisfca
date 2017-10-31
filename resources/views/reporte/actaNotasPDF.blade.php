<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/pdfStyles.css')}}">
    <title>Acta de notas</title>
</head>
<body>
    <p class="center">
        UNIVERSIDAD AUT&Oacute;NOMA GABRIEL RENE MORENO <BR> FACULTAD DE CIENCIAS AGRICOLAS <BR>
        UNIDAD DE POSTGRADO <BR>ACTA DE NOTAS
    </p>
    <p>Programa: {{$materia->programas->codigo}} - {{$materia->programas->tipo}} en {{ $materia->programas->nombre }} </p>
    <p>Materia: {{$materia->codigo}} - {{ $materia->nombre }} </p>
    <p>Version: {{$oferta->gestion->version}}&nbsp;    &nbsp;Edicion: {{$oferta->gestion->edicion}}  &nbsp;         &nbsp;A&ntilde;o: {{$oferta->gestion->anho}} </p>
    <p>Docente: {{$oferta->docente->nombre}} {{$oferta->docente->apellido}}</p>
    <table class="center-table bordesjuntos">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Registro</th>
                <th>Nombre Completo</th>
                <th class="center">Nota</th>
                <th class="center">Nota Literal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $n)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$n->estudiantes->registro}}</td>
                    <td>{{$n->estudiantes->nombre}} {{$n->estudiantes->apellido}}</td>
                    <td class="center">{{$n->nota}}</td>
                    @if($n->nota == 0)
                        <td class="center"> CERO </td>
                    @else
                        <td class="center"> {{NumeroALetras::convertir($n->nota)}}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <p>Numero de Aprobados: {{ $aprobados }}</p>
    <p>Numero de Reprobados: {{ $reprobados }} </p>
    <p>Numero de Inasistentes: {{ $inasistentes}}</p>

    <p class="center">
        {{$oferta->docente->nombre}} {{$oferta->docente->apellido}}<br>
        FIRMA DOCENTE
    </p>
</body>
</html>