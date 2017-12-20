@extends('layouts.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading text-center">Preinscripcion Diplomado</div>
            <div class="panel-body">
                {!! Form::model(
                        null,
                    [
                        //'route' =>'certificadoPDF',
                        //'method' => 'POST',
                    ]
                )!!}
                @include('preinscripcion.partials.formEgresado')
                <button class="btn btn-primary center-block form-control" type="submit">Generar Preinscripcion</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection