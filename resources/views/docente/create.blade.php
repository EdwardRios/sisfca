
@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-10 ">
            <div class="panel panel-success">
                <div class="panel-heading"> Nuevo Docente</div>
                <div class="panel-body">
                    {!! Form::model(
                           $docente = new \App\Docente(),
                            [
                                'route' =>'docente.store',
                                'id'=>'formulario',
                                'enctype' => 'multipart/form-data'
                            ]
                     )!!}
                    @include('docente.partials.form')
                    <div class="form-group">
                        {{ Form::label('curriculum','Curriculum Vitae (documento)')}}
                        {{ Form::file('curriculum',
                        [ 'aria-describedby' => 'descripcion',
                            'class' => 'form-control',
                            'accept' => 'application/pdf'
                        ]
                        )}}
                        <small id="descripcion" class="form-text text-muted">Solo archivos en formato PDF.</small>
                    </div>

                    <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                    @include('layouts.modal')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#fechanac').datepicker({
                startView: 2,
                language: "es"
            });
//            $(':input').keyup(function() {
//                this.value = this.value.toUpperCase();
//            });
//            $('#formulario').submit(function () {
//                $('#myModal').modal('toggle');
//            });
            @if(Session::get('msj'))
                $('#myModal').modal('show');
            @endif
        });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreDocente', '#formulario'); !!}
@endsection