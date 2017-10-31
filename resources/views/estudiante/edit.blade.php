@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-success">
                <div class="panel-heading"> Editar Docente</div>
                <div class="panel-body">
                    {!! Form::model(
                        $estudiante,
                    [
                        'route' =>['estudiante.update',$estudiante],
                        'method' => 'PUT'
                    ]
                )!!}
                    @include('estudiante.partials.form')
                    <button class="btn btn-primary center-block" type="submit">Actualizar datos</button>
                    @include('layouts.modal')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#fechanac').datepicker({
                startView: 2,
                language: "es"
            });
            $('#fechaegresado').datepicker({
                startView: 2,
                language: "es"
            });
            $(':input').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
            @if(Session::get('msj'))
                $('#myModal').modal('show');
            @endif
        });
    </script>
@endsection