@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading"> Nuevo Programa </div>
            <div class="panel-body">
                {!! Form::model(
                       $pago = new \App\Pago(),
                        [
                            'route' =>'pago.store'
                        ]
                 )!!}
                @include('pago.partials.form')
                <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
           $('#fecha_deposito').datepicker({
               startView: 1,
               language: "es"
           });
        });
    </script>
@endsection