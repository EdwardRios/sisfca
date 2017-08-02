
@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading"> Nueva Gestion</div>
            <div class="panel-body">
                {!! Form::model(
                       $docente = new \App\Oferta(),
                        [
                            'route' =>'oferta.store'
                        ]
                 )!!}
                @include('gestion.partials.form')
                <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection