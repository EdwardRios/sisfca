@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading"> Oferta Materia</div>
            <div class="panel-body">
                {!! Form::model(
                       $docente = new \App\Oferta(),
                        [
                            'route' =>'oferta.store'
                        ]
                 )!!}
                @include('oferta.partials.form')
                <button class="btn btn-primary center-block form-control" type="submit">Registrar datos</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#docente_id').select2();
            $('#materia_id').select2();
            $('#fecha_inicio').datepicker({
                startView: 1,
                language: "es"
            });
            $('#fecha_fin').datepicker({
                startView: 1,
                language: "es"
            });
            $('.input-daterange').datepicker({
                startView: 1,
                language: "es"
            });
        });
    </script>
@endsection