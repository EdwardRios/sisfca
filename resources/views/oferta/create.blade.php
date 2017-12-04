@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-success">
                <div class="panel-heading"> Oferta Materia</div>
                <div class="panel-body">
                    {!! Form::model(
                           $docente = new \App\Oferta(),
                            [
                                'route' =>'oferta.store'
                            ]
                     )!!}
                    @include('oferta.partials.form')
                    <button class="btn btn-primary center-block form-control" type="submit">Registrar datos</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $('#programa_id').select2({
                id: '-1', // the value of the option
                text: 'Select an option',
                theme: "bootstrap"
            });
            $('#docente_id').select2({
                theme: 'bootstrap'
            });
            $('#materia_id').select2({
                theme: 'bootstrap'
            });
            $('#gestion_id').select2({
               theme : 'bootstrap'
            });
            $('#fecha_inicio').datepicker({
                startView: 1,
                format : "dd/mm/yyyy",
                language: "es"
            });
            $('#fecha_fin').datepicker({
                startView: 1,
                format : "dd/mm/yyyy",
                language: "es"
            });
            $('.input-daterange').datepicker({
                startView: 1,
                language: "es"
            });

            $('#fecha_inicio').datepicker()
                .on('changeDate', function (e) {
                    var fechaI = $('#fecha_inicio').val().split("/"); //Separa la fecha en un array
                    console.log(fechaI);
                    var di = new Date(fechaI);

//                    var dia=di.getDate();
//                    var mes=di.getMonth();
//                    var anho=di.getFullYear();
//                    console.log(mes);
                    $("#fechaInicio").text(fechaI[0]+ ' de ' + meses[fechaI[1]-1] + ' de '+ fechaI[2]);

                });
            $('#fecha_fin').datepicker()
                .on('changeDate', function (e) {
                    var fechaF = $('#fecha_fin').val().split("/");
//                    var df = new Date(fechaF);
//                    var diaF=df.getDate();
//                    var mesF=df.getMonth();
//                    var anhoF=df.getFullYear();
                    $("#fechaFin").text(fechaF[0]+ ' de ' + meses[fechaF[1]-1] + ' de '+ fechaF[2]);
                });
            $(document).on('change','#programa_id',function(){
                var programaid=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                console.log(programaid);
                console.log(div);
                if (programaid!=''){
                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('/listaProgramaMateria')!!}',
                        data: {programa_id: programaid},
                        success: function(data){
                            console.log('felicidades');
                            console.log(data);
                            document.getElementById('materia_id').disabled=false;
                            op+='<option value="0" selected disabled>Elija un modulo</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value=" '+data[i].id+' "> '+data[i].nombre +' </option>';
                                console.log(data[i].id);
                            }
                            console.log(data.length + 'hola');
                            console.log('jeje');
                            div.find('#materia_id').html(" ");
                            div.find('#materia_id').append(op);

                        },
                        error: function(){
                            console.log('Error')
                        }
                    });
                }
            });
        });
    </script>
@endsection