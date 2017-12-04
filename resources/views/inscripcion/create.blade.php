@extends('layouts.dashboard')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
            <div class="panel-heading">Inscripcion de Materias</div>
            <div class="panel-body">
                {!! Form::model(
                       $docente = new \App\Inscripcion(),
                        [
                            'route' =>'inscripcion.store'
                        ]
                 )!!}
                @include('inscripcion.partials.form')
                <button class="btn btn-primary center-block form-control" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','.programa',function(){
                var tipo=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var nivel=0;
                var noption=" ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaGestionPrograma')!!}',
                    data: {'programa_id': tipo},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        op+='<option value="0" selected disabled>Elija la gestion correspondiente....</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">Grupo:'+data[i].grupo+' ' +
                                '&nbsp; Edicion:'+data[i].edicion+' ' +
                                '&nbsp; Version:'+data[i].version+' ' +
                                '&nbsp; Año: '+data[i].anho+' </option>';
                        }
                        console.log(op);
                        div.find('.gestion_id').html(" ");
                        div.find('.gestion_id').append(op);
                        div.find('.tabla_materias').html(" ");
                        div.find('.tabla_materias').append(" ");
                    },
                    error: function(){
                        console.log('Error')
                    }
                });
            });
            $(document).on('change','.gestion_id',function(){
                var gestionid=$(this).val();
                var idmateria= $('.programa').val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                console.log(idmateria);
                console.log(gestionid);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaMateria')!!}',
                    data: {id: idmateria,gestion_id: gestionid},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        //op+='<option value="0" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<tr><td>'+data[i].nombre+'</td>' +
                                '<td>'+data[i].nivel+'</td>' +
                                '<td class="hidden"><input type="hidden" name="oferta_id[]" value="'+data[i].id+'"></td>' +
                                '<td class="text-center">' +
                                '<input name="approved[]" type="checkbox" value="'+data[i].id+'" checked></td> ' +
                                '</tr>';
                            console.log(data[i].id);
                        }
                        console.log('jeje');
                        div.find('.tabla_materias').html(" ");
                        div.find('.tabla_materias').append(op);

                    },
                    error: function(){
                        console.log('Error')
                    }
                });
            });
            $('#estudiante_id').select2({
                theme: "bootstrap"
            });
            $('#programa_id').select2({
               theme: "bootstrap",
//               placeholder: "Elija el programa",
            });
            $('#gestion_id').select2({
               theme:"bootstrap"
            });
        });
    </script>
@endsection
