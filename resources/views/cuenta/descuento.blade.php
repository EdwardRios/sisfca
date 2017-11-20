@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading"> Nuevo Programa</div>
                <div class="panel-body">
                    {!! Form::model(
                    null,
                    [
                    'route' =>'confirmarDescuento',
                    'method' => 'POST'
                    ]
                    )!!}
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
                    <div class="form-group">
                        <div class="col-md-12"><p><strong>Descuento</strong></p></div>
                        <div class="form-group col-md-3">
                            {{ Form::radio('descuento',15,null,['id'=>'quince']) }} {{ Form::label('quince','15%') }}&nbsp;
                        </div>
                        <div class="form-group col-md-3">
                            {{ Form::radio('descuento',50,null,['id'=>'cincuenta']) }} {{ Form::label('cincuenta','50%') }}
                            &nbsp;
                        </div>
                        <div class="form-group col-md-3">
                            {{ Form::radio('descuento',100,null,['id'=>'cien']) }} {{ Form::label('cien','100%') }}
                        </div>
                        <div class="form-group col-md-3">
                            {{ Form::radio('descuento','otro',null,['id'=>'otro']) }} {{ Form::label('otro','Otro') }}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::number('descuentotxt',null,
                                [   'id'=>'descuentotxt',
                                    'class' => 'form-control',
                                     'style' => 'display:none',
                                     'placeholder' => 'Escriba el descuento....',
                                     'min' => '1',
                                     'max' => '100',
                                ])
                            }}
                        </div>
                    </div>
                    @include('cuenta.partials.modaldescuento')
                    <button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModalDescuento">
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

            $('#estudiante_id').select2({
                theme: 'bootstrap'
            });
            $('input[type=radio]').on("click",function () {
                if ($("#otro").is(":checked")){
                    document.getElementById("descuentotxt").style.display = "block";
                    document.getElementById("descuentotxt").required = true;
//                    document.getElementById("monto").disabled = false;
//                    document.getElementById("monto").value="";
                }else {
                    document.getElementById("descuentotxt").style.display= "none";
                    document.getElementById("descuentotxt").required = false;
//                    document.getElementById("monto").value = 50;
//                    document.getElementById("monto").disabled = true;
                }
            });
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
            $('#myModalDescuento').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                console.log(modal);
                //modal.find('.modal-title').text('New message to ' + recipient)

                var estudiante_text = document.getElementById('estudiante_id');
                var option_user_selection = estudiante_id.options[ estudiante_id.selectedIndex ].text
                console.log(option_user_selection);

                modal.find('#text_nombre').text(estudiante_id.options[ estudiante_id.selectedIndex ].text.toLocaleUpperCase());
                modal.find('#text_programa').text(programa_id.options[ programa_id.selectedIndex ].text);
//                modal.find('#text_descuento').text(document.getElementById('nro_deposito').value.toLocaleUpperCase());
                var radio_text = $('input:radio:checked').next('label:first').text();
                console.log(radio_text)
                if(radio_text == 'Otro'){
                    modal.find('#text_descuento').text(document.getElementById('descuentotxt').value);
                }else{
                    modal.find('#text_descuento').text(radio_text);
                }
//                   .toLocaleUpperCase());
//                else    modal.find('#text_glosa').text($('input:radio:checked').next('label:first').text());
//                modal.find('#text_glosa').text(document.getElementById('glosa').value.toLocaleUpperCase());
            })
        })
    </script>
@endsection