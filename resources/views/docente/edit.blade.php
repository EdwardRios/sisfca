@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading"> Editar Docente</div>
                <div class="panel-body">
                    {!! Form::model(
                        $docente,
                    [
                        'route' =>['docente.update',$docente],
                        'method' => 'PUT'
                    ]
                )!!}
                    @include('docente.partials.form')
                    <button class="btn btn-primary center-block" type="submit">Actualizar datos</button>
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
            $(':input').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });

        });
    </script>
@endsection