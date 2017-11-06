@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Lista de Notas</div>
                <div class="panel-body">
                    @include('notas.partials.flist')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#materia_id').select2({
                placeholder: "Seleccione una materia ",
                theme:"bootstrap",
                allowClear: true
            });
            $('#programa_id').select2({
                placeholder: "Seleccione una materia ",
                theme:"bootstrap",
                allowClear: true
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
                            op+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
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
            $(document).on('change','#materia_id',function(){
                var tipo=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var nivel=0;
                var noption=" ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaGestionMateria')!!}',
                    data: {'materia_id': tipo},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        op+='<option value="0" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">Grupo:'+data[i].grupo+' ' +
                                '&nbsp; Edicion:'+data[i].edicion+' ' +
                                '&nbsp; Version:'+data[i].version+' ' +
                                '&nbsp; Año: '+data[i].anho+' </option>';
                        }
                        console.log(op);
                        div.find('.gestion_id').html(" ");
                        div.find('.gestion_id').append(op);
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
                                '<td class="text-center col-sm-2 nota" id="nota">' +
                                ' '+ data[i].nota+' </td> ' +
//                                '<td><p id="estado" class="text-center"></p></td>'+
                                '</tr>';
                        }
                        console.log(data.length);
                        if(data.length != 0) //si hay datos
                        {
                            doc+='<p class="text-center">Docente : ' +data[0].docente+'</p>';
                        }
                        console.log('Materias loading....');
                        div.find('.tabla_materias').html(" ");
                        div.find('.tabla_materias').append(op);
                        div.find('#nombreDocente').html(" ");
                        div.find('#nombreDocente').append(doc);
                        //---------------------
                    },
                    error: function(){
                        console.log('Error')
                    }
                });
                //--------------
                console.log('inicio repro')

            });
            $('#tablaNotas').on('focus', '#txtnota', function(event) {
                var currentRow=$(this).closest("tr");
                currentRow.addClass('active').siblings().removeClass('active');
            });
            $("#txtnota").on("change paste keyup", function() {
                alert($(this).val());
            });
            $('#tablaNotas').on('load', '#txtnota', function(event) {
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
