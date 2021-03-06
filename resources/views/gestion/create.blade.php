
@extends('layouts.dashboard')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading"> Nueva Gestion</div>
            <div class="panel-body">
                {!! Form::model(
                       $docente = new \App\Gestion(),
                        [
                            'route' =>'gestion.store'
                        ]
                 )!!}
                @include('gestion.partials.form')
                <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection