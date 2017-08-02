@extends('layouts.app')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading"> Nuevo Estudiante </div>
            <div class="panel-body">
                {!! Form::model(
                    $estudiante = new \App\Estudiante(),
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