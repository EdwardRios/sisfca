@extends('layouts.dashboard')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading"> Nuevo Estudiante </div>
            <div class="panel-body">
                {!! Form::model(
                    $estudiante = new \App\Pago(),
                    [
                        'route' => 'estudiante.store'
                    ]
                ) !!}

                    @include('estudiante.partials.form')

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
            $('#fechaegresado').datepicker({
                startView: 2,
                language: "es"
            });
        });
    </script>
@endsection