@extends('layouts.app')
@section('content')
    <h3 class="text-center">Editar Docente {{ $docente->name }}</h3>
    <div class="col-md-8 col-md-offset-2">
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#fechanac').datepicker({
                startView: 2,
                language: "es"
            });
        });
    </script>
@endsection