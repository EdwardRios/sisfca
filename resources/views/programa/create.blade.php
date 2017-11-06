@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-success">
                <div class="panel-heading"> Nuevo Programa</div>
                <div class="panel-body">
                    {!! Form::model(
                           $programa = new \App\Programa(),
                            [
                                'route' =>'programa.store'
                            ]
                     )!!}
                    @include('programa.partials.form')
                    <button class="btn btn-primary center-block" type="submit">Registrar datos</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            $(':input').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
        });
    </script>
@endsection