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
                            'route' => 'estudiante.store',
                            'id' => 'form-student'
                        ]
                    ) !!}
                    @include('estudiante.partials.form')
                    <button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModalStudent">
                        Registrar Datos
                    </button>
                    {{--<button class="btn btn-primary center-block" >Registrar datos</button>--}}
                    @include('estudiante.partials.modalconfirm')
                    @include('layouts.modal')
                    {!! Form::close() !!}
                    {{--@include('layouts.modal')--}}
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
            $('#myModalNotas').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                console.log(modal);
               //modal.find('.modal-title').text('New message to ' + recipient)

                console.log(document.getElementById('nombre').value);
                modal.find('#text_nombre').text(document.getElementById('nombre').value.toLocaleUpperCase());
                modal.find('#text_apellido').text(document.getElementById('apellido').value.toLocaleUpperCase());
                modal.find('#text_fechanac').text(document.getElementById('fechanac').value.toLocaleUpperCase());

                modal.find('#text_registro').text(document.getElementById('registro').value.toLocaleUpperCase());
                modal.find('#text_carnet').text(document.getElementById('carnet').value.toLocaleUpperCase());
                modal.find('#text_sexo').text(document.getElementById('sexo').value.toLocaleUpperCase());
                modal.find('#text_email').text(document.getElementById('email').value.toLocaleUpperCase());
                modal.find('#text_domicilio').text(document.getElementById('domicilio').value.toLocaleUpperCase());
                modal.find('#text_telefono').text(document.getElementById('telefono').value.toLocaleUpperCase());
            })
            @if(Session::get('msj'))
                $('#myModal').modal('show');
            @endif
        });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreEstudiante', '#form-student'); !!}
@endsection