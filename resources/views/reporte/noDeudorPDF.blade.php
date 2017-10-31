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
    <h2 class="center">CERTIFICADO DE NO DEUDOR</h2>
    <p>
        La Unidad de Postgrado de la Facultad de Ciencias Agricolas de la Universidad Autonoma Gabrial Rene Moreno
    </p>
    <p>CERTIFICA: </p>
    <p>
        Que, revisados los registros de pagos existentes en la Unidad de Postgrado de Ciencias Agricolas
        se ha evidenciado que el sr/sra:
    </p>
    <p class="center"> <span class="upperLetters">{{$estudiante->nombre}} {{ $estudiante->apellido }} </span>
        <br> C.I. {{$estudiante->carnet}} {{$estudiante->ciciudad}} </p>

    <p>Del programa Academico:</p>
    <table class="center-table bordesjuntos">
        <tbody>
            <tr>
                <td class="center" >{{$programa->codigo}}</td>
                <td class="center">{{$programa->tipo}} en
                    <span style="text-transform: uppercase">{{ $programa->nombre}}</span></td>
                <td class="center">Version: {{$gestion->version}},Edicion: {{$gestion->edicion}}</td>
            </tr>
        </tbody>
    </table>
    <p style="padding-top: 10px">
        <strong>"NO TIENE DEUDA ECONOMICA PENDIENTE" </strong>, habiendo cancelado el total del precio, del mencionado programa,
        de acuerdo al compromiso adquirido con la Unidad de Postgrado de Facultad de Cs. Agricolas.
    </p>
    <p>Es todo cuanto se certifica en honor a la verdad, para los fines consiguientes del interesado.</p>
    <br>
    <br>
    <br>
    <br>
    <div class="center">
        <p>Edgar Ponce Coila Ph.D.</p>
        <p><strong>DIRECTOR UNIDAD POSTGRADO</strong></p>
        <p><strong>FACULTAD DE CIENCIAS AGRICOLAS</strong></p>
    </div>
    <br><br><br>
    <p class="center">Santa Cruz de la Sierra, {{$fecha}}</p>
</body>
</html>