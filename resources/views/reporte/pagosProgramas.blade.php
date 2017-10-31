@extends('layouts.dashboard')
@section('content')
<div class="panel panel-success">
    <div class="panel-heading text-center">Reporte de pagos</div>
    <div class="panel-body">
        {!! Form::model(
                        null,
                    [
                        'route' =>'procesarPagosProgramas', //Pendiente
                        'method' => 'POST'
                    ]
                )!!}
        <div class="form-group">
            {{ Form::label('programa','Elija el programa') }}
            {{ Form::select('programa',$programa,null,
            [
                'class' => 'form-control'
            ]
            ) }}
        </div>
        {{--Gestion--}}
        <div class="form-group">
            {{ Form::label('gestion','Elija la gestion correspondiente') }}
            {{ Form::select('gestion',[null=>'null'],null,
            [
                'class' => 'form-control'
            ]
            ) }}
        </div>
        {{ Form::submit('Generar Reporte',
            [
                'class' => 'btn btn-primary'
            ]

        ) }}
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#programa').select2({
                theme: "bootstrap"
            });
            $('#gestion').select2({
                theme: "bootstrap"

            });
        });
    </script>
@endsection

