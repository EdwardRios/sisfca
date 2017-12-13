@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Registro de Notas</div>
                <div class="panel-body">
                    {!! Form::model(
                           $inscripcion = new \App\Inscripcion(),
                            [
                                'route' => 'notas.regNotas',
                                'method' => 'POST'
                            ]
                     )!!}
                    @include('notas.partials.form')
                    @include('notas.partials.modalNotas')
                    <button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModalNotas">
                        Registrar Datos
                    </button>
                    {{--<button class="btn btn-primary center-block form-control" type="submit">Registrar datos</button>--}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#materia_id').select2({
//                placeholder: "Seleccione el programa ",
                allowClear: true,
                theme: 'bootstrap'
            });
            $('#programa_id').select2({
//                placeholder: "Seleccione la materia ",
                allowClear: true,
                theme: 'bootstrap'
            });
            //Event Change Programa
            $(document).on('change', '#programa_id', function () {
                var tipo = $(this).val();
                var div = $(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op = " ";
                var nivel = 0;
                var noption = " ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaProgramaMateria')!!}',
                    data: {'programa_id': tipo},
                    success: function (data) {
                        console.log('felicidades');
                        console.log(data);
                        op += '<option value="0" selected disabled>Elija una materia</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nombre+ ' </option>';
                        }
                        console.log(op);
                        div.find('#materia_id').html(" ");
                        div.find('#materia_id').append(op);
                    },
                    error: function () {
                        console.log('Error')
                    }
                });
            });
            //Elegir Mateeria
            $(document).on('change', '#materia_id', function () {
                var tipo = $(this).val();
                var div = $(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op = " ";
                var nivel = 0;
                var noption = " ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaGestionMateria')!!}',
                    data: {'materia_id': tipo},
                    success: function (data) {
                        console.log('felicidades');
                        console.log(data);
                        op += '<option value="0" selected disabled>Elija un programa</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '"> Grupo: ' + data[i].grupo + ' ' +
                                '&nbsp; Edicion: ' + data[i].edicion + ' ' +
                                '&nbsp; Version: ' + data[i].version + ' ' +
                                '&nbsp; Año: ' + data[i].anho + ' </option>';
                        }
                        console.log(op);
                        div.find('.gestion_id').html(" ");
                        div.find('.gestion_id').append(op);
                    },
                    error: function () {
                        console.log('Error')
                    }
                });
            });
            //Carga la lista de alumnos luego de elegir la gestion
            $(document).on('change', '.gestion_id', function () {
                var gestionid = $(this).val();
                var idmateria = $('#materia_id').val();
                var div = $(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op = " ";
                var doc = " ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaEstudiantes')!!}',
                    data: {materia_id: idmateria, gestion_id: gestionid},
                    success: function (data) {
                        console.log('felicidades');
                        console.log(data);
                        //op+='<option value="0" selected disabled>Elija un programa</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<tr class="clickable-row">' +
                                '<td class="col-md-2">' + data[i].registro + '</td>' +
                                '<td id="nombre" class="col-md-6">' + data[i].nombre + ' ' + data[i].apellido + '</td>' +
                                '<td class="hidden"><input type="hidden" name="ofertaid[]" value="' + data[i].oferta_id + '"></td>' +
                                '<td class="hidden"><input type="hidden" name="estudianteid[]" value="' + data[i].estudiante_id + '"></td>' +
                                '<td class="text-center col-sm-2">' +
                                '<input type="number"  name="notas[]" min="0" max="100" maxlength="3" class="col-sm-12" id="txtnota" required></td> ' +
                                '<td><p id="estado" class="text-center"></p></td>' +

                                '</tr>';
                        }
                        console.log(data.length);
                        if (data.length != 0) //si hay datos
                        {
                            doc += '<p class="text-center">Docente : ' + data[0].docente + '</p>';
                        }
                        console.log('jeje');
                        div.find('.tabla_materias').html(" ");
                        div.find('.tabla_materias').append(op);
                        div.find('#nombreDocente').html(" ");
                        div.find('#nombreDocente').append(doc);
                    },
                    error: function () {
                        console.log('Error')
                    }
                });
            });
            $('#tablaNotas').on('focus', '#txtnota', function (event) {
                var currentRow = $(this).closest("tr");
                currentRow.addClass('active').siblings().removeClass('active');
            });
            $("#txtnota").on("change paste keyup", function () {
                alert($(this).val());
            });
            $('#tablaNotas').on('input', '#txtnota', function (event) {
                var currentRow = $(this).closest("tr");
                var col1 = currentRow.find("#txtnota").val();
                if (col1 <= 100) {
                    if (col1 < 64) {
                        currentRow.find("#estado").text("Reprobado");
                        currentRow.find("#estado").css('color', 'red');
                    } else {
                        currentRow.find("#estado").text("Aprobado");
                        currentRow.find("#estado").css('color', 'black');
                    }
                } else {
                    alert("No puede ingresar valores mayores a 100");
                    currentRow.find("#txtnota").val('');
                }
            });
            $('#myModalNotas').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                console.log(modal);
                //modal.find('.modal-title').text('New message to ' + recipient)

//                console.log(document.getElementById('nombre').value);
                var tablaNotas = document.getElementById('tableNotes');

                var nrofila= tablaNotas.rows.length; //Obtener longitud de la tabla
                var col = tablaNotas.getElementsByTagName('tr');
                var tdhtml="";
                console.log(col.length);
                console.log(nrofila);
                var tableModal=document.getElementById("tableModal")

                for (var i=1;i<col.length;i++){ //Comienza en uno para ignorar el tr cabezera
                    var row = tableModal.insertRow(1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerHTML = tablaNotas.rows[i].cells[0].innerHTML;
                    cell2.innerHTML = tablaNotas.rows[i].cells[1].innerHTML;
                    cell3.innerHTML = tablaNotas.rows[i].cells[4].children[0].value;
                    cell4.innerHTML = tablaNotas.rows[i].cells[5].children[0].innerText;
                    console.log(col[i].innerText);
                }
                var programa = document.getElementById('programa_id');
                var materia = document.getElementById('materia_id');
                var gestion = document.getElementById('gestion_id');



                modal.find('#text_programa').text(programa.options[programa.selectedIndex].text.toLocaleUpperCase());
                modal.find('#text_modulo').text(materia.options[materia.selectedIndex].text.toLocaleUpperCase());
                modal.find('#text_gestion').text(gestion.options[gestion.selectedIndex].text.toLocaleUpperCase());
//
//                modal.find('#text_registro').text(document.getElementById('registro').value.toLocaleUpperCase());
//                modal.find('#text_carnet').text(document.getElementById('carnet').value.toLocaleUpperCase());
//                modal.find('#text_sexo').text(document.getElementById('sexo').value.toLocaleUpperCase());
//                modal.find('#text_email').text(document.getElementById('email').value.toLocaleUpperCase());
//                modal.find('#text_domicilio').text(document.getElementById('domicilio').value.toLocaleUpperCase());
//                modal.find('#text_telefono').text(document.getElementById('telefono').value.toLocaleUpperCase());
            })
            $('#myModalNotas').on('hidden.bs.modal', function (e) {
                var tablaNotas = document.getElementById('tableNotes');
                var nrofila= tablaNotas.rows.length;
                console.log(nrofila)
                for (var i=1;i<nrofila;i++){ //Comienza en uno para ignorar el tr cabezera
                    document.getElementById("tableModal").deleteRow(1);
                }
            })
        });
    </script>
@endsection
