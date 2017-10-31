@extends('layouts.dashboard')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading text-center">Acta de notas</div>
            <div class="panel-body">
                {!! Form::model(
                        null,
                    [
                        'route' =>'actaNotasPDF',
                        'method' => 'POST',
                        'target' => '_blank'
                    ]
                )!!}
                @include('reporte.partials.listaActa')
                <button class="btn btn-primary center-block" type="submit">Generar Acta de Notas</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#programa_id').select2({
                placeholder: "Seleccione",
                allowClear: true,
                theme: "bootstrap",
                language: "es"
            });
            $('#materia_id').select2({
                placeholder: "Seleccione",
                allowClear: true,
                theme: "bootstrap",
            });
            $('#docente_id').select2({
                placeholder: "Seleccione",
                allowClear: true,
                theme: "bootstrap",
                minimumResultsForSearch: -1
            });
            $(document).on('change','#programa_id',function(){
                var tipo=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var nivel=0;
                var noption=" ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaProgramaMateria')!!}',
                    data: {'programa_id': tipo},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        op+='<option value="0" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">' +
                                '&nbsp;'+data[i].nombre+' </option>';
                        }
                        console.log(op);
                        div.find('#materia_id').html(" ");
                        div.find('#materia_id').append(op);
                    },
                    error: function(){
                        console.log('Error')
                    }
                });
            });
            //Carga la lista de docente luego de elegir la materia
            $(document).on('change','#materia_id',function(){
                var idmateria= $(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var doc=" ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaMateriaDocente')!!}',
                    data: {materia_id: idmateria},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        op+='<option value="0" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">' +
                                '&nbsp;'+data[i].nombre+ '&nbsp;'+data[i].apellido+' - Grupo: '+data[i].grupo+' &nbsp; A&ntilde;o: '+data[i].anho+' ' +
                                '&nbsp; Edicion: '+data[i].edicion+' &nbsp; Version: '+data[i].version +'</option>';
                        }
                        console.log(data.length);
                        if(data.length != 0) //si hay datos
                        {
                            doc+='<p class="text-center">Docente : ' +data[0].docente+'</p>';
                        }
                        console.log('jeje');
                        div.find('#docente_id').html(" ");
                        div.find('#docente_id').append(op);

                    },
                    error: function(){
                        console.log('Error')
                    }
                });
            });
            $('#tablaNotas').on('focus', '#txtnota', function(event) {
                var currentRow=$(this).closest("tr");
                currentRow.addClass('active').siblings().removeClass('active');
            });
            $("#txtnota").on("change paste keyup", function() {
                alert($(this).val());
            });
            $('#tablaNotas').on('input', '#txtnota', function(event) {
                var currentRow=$(this).closest("tr");
                var col1=currentRow.find("#txtnota").val();
                console.log(col1);
                if (col1<=100) {
                    if (col1 < 64                                                                                               ) {
                        currentRow.find("#estado").text("Reprobado");
                        currentRow.find("#estado").css('color', 'red');
                    } else {
                        currentRow.find("#estado").text("Aprobado");
                        currentRow.find("#estado").css('color', 'black');
                    }
                }else{
                    alert("No puede ingresar valores mayores a 100");
                    currentRow.find("#txtnota").val('');
                }
            });

        });
    </script>
@endsection
