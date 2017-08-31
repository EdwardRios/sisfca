@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading">Estados de Cuenta de {{$estudiante->nombre}}
                &nbsp;{{$estudiante->apellido}} </div>
            <div class="panel-body">
                @include('cuenta.partials.form')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
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
                    data: {estudiante_id: est,programa_id: programaid },
                    success: function (data) {
                        console.log('felicidades');
                        console.log(data);
//                    op += '<option value="0" selected disabled>Elija un programa</option>';
                        for (var i = 0; i < data.length; i++) {
                            op+='<tr><td>'+data[i].nro_deposito+'</td>' +
                                '<td>'+data[i].fecha_deposito+'</td>' +
                                '<td>'+data[i].monto+'</td>' +
                                '<td>'+data[i].glosa+'</td>' +
                                '</tr>';
                        }
                        console.log(op);
                        div.find('#tablaPago').html(" ");
                        div.find('#tablaPago').append(op);
                    },
                    error: function () {
                        console.log('Error')
                    }
                });
            });
        });
    </script>
@endsection