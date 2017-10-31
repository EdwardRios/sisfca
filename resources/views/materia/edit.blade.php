@extends('layouts.dashboard')
@section('content')
    <div class="container"><h1 CLASS="text-center">Editar Docente {{ $docente->name }}</h1></div>
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