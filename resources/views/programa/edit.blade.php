@extends('layouts.dashboard')
@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading"> Editar Programa</div>
            <div class="panel-body">
                {!! Form::model(
                    $programa,
                [
                    'route' =>['programa.update',$programa],
                    'method' => 'PUT'
                ]
            )!!}
                @include('programa.partials.form')
                <button class="btn btn-primary center-block" type="submit">Actualizar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection