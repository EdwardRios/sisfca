<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/pdfStyles.css') }}" rel="stylesheet">
    <title>Certificado </title>
</head>
<body>
<br>
    <h3 class="center">CERTIFICADO DE NOTAS</h3>
    <p class="interline">
        En aplicaci&oacute;n de las normas y reglamentos de conformidad vigentes en la Universidad Aut&oacute;noma "Gabriel
        Ren&eacute; Moreno" seg&uacute;n,
        Resoluci&oacute;n I.C.U N° 003/2008, Resoluciones Vicerrectorales N° 010/2008 y 103/2008, certifica que el Univ. {{ $estudiante->nombre }} {{ $estudiante->apellido }}
        , Registro {{ $estudiante->registro }} y C.I. {{ $estudiante->carnet }} {{ $estudiante->ciciudad }} ,
        egresado de la carrera de {{ $estudiante->carreras->nombre }} , concluyo el programa de {{ $programa->tipo }} en
        {{ $programa->nombre }} con las siguientes notas:
    </p>
    <table class="center-table bordesjuntos">
        <thead>
            <tr>
                <th class="center">MODULO</th>
                <th>NOMBRE DEL MODULO</th>
                <th class="center">NOTA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $n)
            <tr >
                <td class="center">{{$n->codigo}}</td>
                <td>{{$n->nombre}}</td>
                <td class="center">{{$n->nota}}</td>
            </tr>
            @endforeach
            <tr class="interline">
                <td colspan="2"><strong>A) PROMEDIO CALIFICACI&Oacute;N MODULAR DE : {{ $promedios[3] }} (65%)</strong></td>
                <td class="center"> <strong> {{ $promedios[0] }}</strong></td>
            </tr>
        </tbody>
    </table>
    {{--<p>El diplomado tuvo una duracion de xHrs y se desarrollo del {{ $fechainicio }} al {{ $fechafin }}</p>--}}
    <br>
    <table class="center-table bordesjuntos">
        <tr>
            <td colspan="2"><strong>B) PROMEDIO GRAL. DE GRADUACION PPG DE :  {{ $promedios[4] }} (35%)</strong></td>
            <td class="center">  <strong>{{ $promedios[1] }}</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>C) PROMEDIO CALIFICACION FINAL: (A+B)</strong></td>
            <td class="center">  <strong>{{ $promedios[2] }}</strong></td>
        </tr>
    </table>
    <P>Una vez concluido el/la {{ $programa->tipo }} de "{{ $programa->nombre }}" obtuvo el promedio ponderado de
        {{ $promedios[2] }} ({{ strtolower($promedios[5])}}) puntos, en la escala de 1 a 100 como promedio final.
    </P>
    {{--<p>--}}
        {{--Los miembros de la Comision en señal de conformidad firmaron lo anteriormente mencionado. Un Acta Original y--}}
        {{--cuatro copias para un solo efecto.--}}
    {{--</p>--}}
    <p>
        Es dado a los {{ strtolower($fechaactual[0]) }} dias del mes de {{ strtolower($fechaactual[1])}} del a&ntilde;o {{ strtolower($fechaactual[2])}} en la ciudad de Santa Cruz de la Sierra
    </p>
    <br>
    <br>
    <br>
    <br>
    <div class="center">
        <p>Edgar Ponce Coila Ph.D</p>
        <p><strong>DIRECTOR UNIDAD POSTGRADO</strong></p>
        <p><strong>FACULTAD DE CIENCIAS AGRICOLAS</strong></p>
    </div>
     <p>    </p>
</body>
</html>