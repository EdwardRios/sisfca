@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading"> Registrar nuevo pago </div>
                <div class="panel-body">
                    {!! Form::model(
                           $pago = new \App\Pago(),
                            [
                                'route' =>'pago.store'
                            ]
                     )!!}
                    @include('pago.partials.form')
                    @include('pago.partials.modal')
                    <button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModalPago">
                        Registrar Datos
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
           $('#fecha_deposito').datepicker({
               startView: 1,
               language: "es"
           });
           $('#estudiante_id').select2({
               theme: 'bootstrap'
           });
            $('#myModalPago').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                console.log(modal);
                //modal.find('.modal-title').text('New message to ' + recipient)
                console.log(document.getElementById('estudiante_id').value);
                var estudiante_text = document.getElementById('estudiante_id');
                var option_user_selection = estudiante_id.options[ estudiante_id.selectedIndex ].text
                console.log(option_user_selection);

                modal.find('#text_nombre').text(estudiante_id.options[ estudiante_id.selectedIndex ].text.toLocaleUpperCase());
                modal.find('#text_programa').text(programa_id.options[ programa_id.selectedIndex ].text);
                modal.find('#text_nrodeposito').text(document.getElementById('nro_deposito').value.toLocaleUpperCase());
                modal.find('#text_fechadeposito').text(document.getElementById('fecha_deposito').value.toLocaleUpperCase());
                modal.find('#text_monto').text(document.getElementById('monto').value.toLocaleUpperCase());
                var radio_text = $('input:radio:checked').next('label:first').text();
                if(radio_text == 'Otro')
                    modal.find('#text_glosa').text(document.getElementById('glosatxt').value.toLocaleUpperCase());
                 else    modal.find('#text_glosa').text($('input:radio:checked').next('label:first').text());
//                modal.find('#text_glosa').text(document.getElementById('glosa').value.toLocaleUpperCase());
            })
            $(document).on('change','#estudiante_id',function(){
                var programaid=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                console.log(programaid);
                console.log(div);
                if (programaid!=''){
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
        });
        $('input[type=radio]').on("click",function () {
            if ($("#otro").is(":checked")){
                document.getElementById("glosatxt").style.display = "block";
                document.getElementById("glosatxt").required = true;
                document.getElementById("monto").disabled = false;
                document.getElementById("monto").value="";
            }else {
                document.getElementById("glosatxt").style.display= "none";
                document.getElementById("glosatxt").required = false;
                document.getElementById("monto").value = 50;
                document.getElementById("monto").disabled = true;
            }
        });
    </script>
@endsection