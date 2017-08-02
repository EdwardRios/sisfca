
@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading"> Nuevo Docente </div>
            <div class="panel-body">
                {!! Form::model(
                       $docente = new \App\Docente(),
                        [
                            'route' =>'docente.store'
                        ]
                 )!!}
                @include('docente.partials.form')
                <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection