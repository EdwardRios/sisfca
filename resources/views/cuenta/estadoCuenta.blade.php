@extends('layouts.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">Consultar estado de cuenta</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('estudiante_id','Estudiante') !!}
                            {!! Form::select('estudiante_id',
                                $estudiantes,
                                null,
                                [
                                 'required',
                                'class' => 'form-control',
                                'placeholder' => 'Seleccione el estudiante...'
                                ]
                                 ) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">{!! Form::label('programa_id','Programa') !!}
                {!! Form::select('programa_id',
                    [null=>'Seleccione programa'],
                    null,
                    [
                     'required',
                    'class' => 'form-control',

                    ]
                     ) !!}</div>
                {{--{!! Form::model(--}}

                {{--) !!}--}}

                {{--@include('estudiante.partials.form')--}}

                {{--{!! Form::close() !!}--}}
                <div class="row" style="display: none" id="datos-pagos">
                    <div class="col-md-6">
                        <p><strong>Monto a Pagar:  </strong><span id="monto-pagar"></span></p>
                        <p><strong>Monto Pagado:  </strong><span id="monto-pagado"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Saldo: </strong><span id="saldo"></span></p>
                        <p><strong>Materias Reprobadas: </strong> <span id="materias"></span></p>
                    </div>
                    <div class="col-md-12">
                        <p><strong>Descuento: </strong> <span id="descuento"></span> %</p>
                    </div>
                </div>
                <table class="table table-bordered" id="tabla-pago" style="display: none">
                    <thead>
                    <tr>
                        <th>Nro Deposito</th>
                        <th>Fecha Deposito</th>
                        <th>Monto</th>
                        <th>Glosa</th>
                    </tr>
                    </thead>
                    <tbody id="tablaPago">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#estudiante_id').select2({
                theme: 'bootstrap'
            });
            $(document).on('change','#estudiante_id',function(){
                var programaid=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                console.log(programaid);
                console.log(div);
                if (programaid!=''){
                    $('#datos-pagos').fadeOut(800);
                    document.getElementById("datos-pagos").style.display = "none"; //Oculta detalles de pagos del anterior postgraduante
                    $('#tabla-pago').fadeOut(800);
                    document.getElementById("tabla-pago").style.visibility = "hidden";
                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('/listaEstudiantePrograma')!!}',
                        data: {estudiante_id: programaid},
                        success: function(data){
                            console.log('felicidades');
                            console.log(data);
                            
                            op+='<option value="0" selected disabled>Elija un programa</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value=" '+data[i].id+' "> '+data[i].nombre + ' - Grupo: ' +
                                     data[i].grupo +
                                    '&nbsp;&nbsp;Edicion:'+ data[i].edicion +
                                    '&nbsp;&nbsp;Version: '+ data[i].version +
                                    '&nbsp;&nbsp;A&ntilde;o: '+data[i].anho  +
                                    '</option>';
                                console.log(data[i].id);
                            }
                            console.log(data.length + ' hola');
                            console.log('jeje');
                            $('.panel-body').find('#programa_id').html(" ");
                            $('.panel-body').find('#programa_id').append(op);

                        },
                        error: function(){
                            console.log('Error')
                        }
                    });
                }
            });
            $(document).on('change', '#programa_id', function () {
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
        })
    </script>
@endsection