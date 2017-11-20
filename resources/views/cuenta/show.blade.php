@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Estados de Cuenta de {{$estudiante->nombre}}
                        &nbsp;{{$estudiante->apellido}} </div>
                    <div class="panel-body">
                    @include('cuenta.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('change', '#cuenta', function () {
                var programaid = $(this).val();
                var est = $('#estudiante_id').val();
                var div = $(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op = " ";
                var nivel = 0;
                var noption = " ";
                console.log(programaid);
                console.log(est);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaDetallePago')!!}',
                    data: {estudiante_id: est, cuentaid: programaid},
                    success: function (data) {
                        console.log('felicidades');
                        console.log(data);
//                    op += '<option value="0" selected disabled>Elija un programa</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<tr><td>' + data[i].nro_deposito + '</td>' +
                                '<td>' + data[i].fecha_deposito + '</td>' +
                                '<td>' + data[i].monto + '</td>' +
                                '<td>' + data[i].glosa + '</td>' +
                                '</tr>';
                        }
                        console.log(op);
                        div.find('#tablaPago').html(" ");
                        div.find('#tablaPago').append(op);
                        $('#datos-pagos').fadeIn(800);
                        document.getElementById("datos-pagos").style.display = "block";
                        $('#tabla-pago').fadeIn(800);
                        document.getElementById("tabla-pago").style.visibility = "visible";
                    },
                    error: function () {
                        console.log('Error')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/datosCuenta')!!}',
                    data: {cuenta: programaid},
                    success: function (data) {
                        console.log('felicidades');
                        console.log(data);
                        var1 = document.getElementById('monto-pagar');
                        var1.innerText = data[0].saldo;
                        var2 = document.getElementById('monto-pagado');
                        var2.innerText = data[0].monto_pagado;
                        var saldo = data[0].saldo - data[0].monto_pagado;
                        saldoHTML = document.getElementById('saldo');
                        saldoHTML.innerText = saldo;
                        var3 = document.getElementById('materias');
                        var3.innerText = data[0].materias_reprobadas;
                        var4 = document.getElementById('descuento');
                        var4.innerText = data[0].descuento;
                    },
                    error: function () {
                        console.log('Error')
                    }
                });
            });
        });
    </script>
@endsection