@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading"> Nuevo Programa</div>
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
        $('input[type=radio]').on("click",function () {
            if ($("#otro").is(":checked")){
                document.getElementById("glosatxt").style.display = "block";
                document.getElementById("glosatxt").required = true;
                document.getElementById("monto").disabled = false;
                document.getElementById("monto").value="";
            }else {
                document.getElementById("glosatxt").style.display= "none";
                document.getElementById("glosatxt").required = false;
                document.getElementById("monto").value = 50;
                document.getElementById("monto").disabled = true;
            }
        })
    </script>
@endsection