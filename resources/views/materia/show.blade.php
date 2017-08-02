@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>Detalles Materia</h1>
                <table class="table table-bordered">
                    <tr>
                        <td>Codigo</td>
                        <td>{{ $materia->codigo}}</td>
                    </tr>
                    <tr>
                        <td>Nombre Materia</td>
                        <td>{{$materia->nombre}}</td>
                    </tr>
                    <tr>
                        <td>Codigo Programa</td>
                        <td>{{ $materia->id_programa }}</td>
                    </tr>

                </table>
                <div class="center-block" style="text-align:center">
                    <a href="{{ route('programa.index') }}">
                        <button type="button" class="btn btn-primary">
                            Volver
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection