
@extends('layouts.dashboard')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading"> Nuevo Materia </div>
            <div class="panel-body">
                {!! Form::model(
                       $materia = new \App\Materia(),
                        [
                            'route' =>'materia.store'
                        ]
                 )!!}
                @include('materia.partials.form')
                @include('layouts.modal')
                <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','.tipoPrograma',function(){
                var tipo=$(this).val();
                var div=$(this).parent().parent().parent(); //Obtengo el div o form contenedor
                var op=" ";
                var nivel=0;
                var noption=" ";
                console.log(tipo);
                console.log(div);
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('/listaTipoPrograma')!!}',
                    data: {'tipo': tipo},
                    success: function(data){
                        console.log('felicidades');
                        console.log(data);
                        op+='<option value="0" selected disabled>Elija un programa</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        console.log(op);
                        div.find('.nombrePrograma').html(" ");
                        div.find('.nombrePrograma').append(op);
                        //Cargar ComboBox Nivel
                        if(tipo=='Diplomado') nivel=6
                        else if(tipo=='Especialidad') nivel=12
                        else nivel=18
                        op=" ";
                        op+='<option value="0" selected disabled>Elija el nivel de la materia</option>';
                        for(var i=1;i<=nivel;i++){
                            op+='<option value="'+i+'">'+i+'° '+'Modulo'+'</option>';
                        }
                        console.log(op);
                        div.find('.nivel').html(" ");
                        div.find('.nivel').append(op);
                    },
                    error: function(){
                        console.log('Error')
                    }
                });
            });
            $(':input[type=text]').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
            @if(Session::get('msj'))
            $('#myModal').modal('show');
            @endif
        });
    </script>
@endsection