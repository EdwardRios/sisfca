@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-success">
                <div class="panel-heading"> Nuevo Estudiante</div>
                <div class="panel-body">
                    {!! Form::model(
                        $estudiante = new \App\Estudiante(),
                        [
                            'route' => 'estudiante.store'
                        ]
                    ) !!}
                    @include('estudiante.partials.form')
                    <button class="btn btn-primary center-block" type="submit">Actualizar datos</button>
                    @include('layouts.modal')
                    {!! Form::close() !!}
                    @include('layouts.modal')
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
            $('input[type=text]').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
            @if(Session::get('msj'))
                $('#myModal').modal('show');
            @endif
        });
    </script>
@endsection