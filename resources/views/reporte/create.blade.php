@extends('layouts.dashboard')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading text-center">Certificado de Notas</div>
            <div class="panel-body">
                {!! Form::model(
                        null,
                    [
                        'route' =>'certificadoPDF',
                        'method' => 'POST',
                        'target' => '_blank'
                    ]
                )!!}
                @include('reporte.partials.form')
                <button class="btn btn-primary center-block form-control" type="submit">Generar Certificado de Notas</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#estudiante_id').select2({
                placeholder: "Seleccione",
                allowClear: true,
                theme: "bootstrap "
            });
            $(document).on('change','#estudiante_id',function(){
                var tipo=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var nivel=0;
                var noption=" ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaPrograma')!!}',
                    data: {'estudiante_id': tipo},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        op+='<option value="" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">' +
                                '&nbsp;'+data[i].nombre+' </option>';
                        }
                        console.log(op);
                        div.find('#programa_id').html(" ");
                        div.find('#programa_id').append(op);
                    },
                    error: function(){
                        console.log('Error')
                    }
                });
            });
            //Carga la lista de alumnos luego de elegir la gestion
            $(document).on('change','.gestion_id',function(){
                var gestionid=$(this).val();
                var idmateria= $('#materia_id').val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var doc=" ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaEstudiantes')!!}',
                    data: {materia_id: idmateria,gestion_id: gestionid},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        //op+='<option value="0" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<tr class="clickable-row"><td class="col-md-2">'+data[i].registro+'</td>' +
                                '<td id="nombre" class="col-md-6">'+data[i].nombre+' '+ data[i].apellido+'</td>' +
                                '<td class="hidden"><input type="hidden" name="ofertaid[]" value="'+data[i].oferta_id+'"></td>' +
                                '<td class="hidden"><input type="hidden" name="estudianteid[]" value="'+data[i].estudiante_id+'"></td>' +
                                '<td class="text-center col-sm-2">' +
                                '<input type="number"  name="notas[]" min="0" max="100" maxlength="3" class="col-sm-12" id="txtnota" required></td> ' +
                                '<td><p id="estado" class="text-center"></p></td>'+

                                '</tr>';
                        }
                        console.log(data.length);
                        if(data.length != 0) //si hay datos
                        {
                        doc+='<p class="text-center">Docente : ' +data[0].docente+'</p>';
                        }
                        console.log('jeje');
                        div.find('.tabla_materias').html(" ");
                        div.find('.tabla_materias').append(op);
                        div.find('#nombreDocente').html(" ");
                        div.find('#nombreDocente').append(doc);
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
