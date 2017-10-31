@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Detalles Docente</h1>
                    <table class="table table-bordered">
                        <tr>
                            <td>Codigo Docente</td>
                            <td>{{ $docente->codigo}}</td>
                        </tr>
                        <tr>
                            <td>Carnet</td>
                            <td>{{$docente->carnet}}</td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td>{{ $docente->nombre }}</td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td>{{ $docente->apellido }}</td>
                        </tr>
                        <tr>
                            <td>Fecha Nacimiento</td>
                            <td>{{ $docente->fechanac->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td>{{ $docente->sexo }}</td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td>{{ $docente->grado }}</td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td>{{ $docente->telefono }}</td>
                        </tr>
                        <tr>
                            <td>Correo Electronico</td>
                            <td>{{ $docente->email }}</td>
                        </tr>
                        <tr>
                            <td>Domicilio</td>
                            <td>{{ $docente->domicilio }}</td>
                        </tr>
                    </table>
                    <div class="center-block" style="text-align:center">
                        <a href="{{ route('docente.index') }}">
                            <button type="button" class="btn btn-primary">
                                Volver
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection