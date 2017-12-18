@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title"><p><strong>Datos docente</strong></p></div>
                </div>
                <div class="box-body">
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
                        <tr>
                            <td>Curriculum Vitae</td>
                            <td><a href="{{ asset('docentes').'/'.$docente->curriculum}}"><div class="btn btn-success">Ver Curriculum Vitae</div></a></td>
                        </tr>
                    </table>
                        <a href="{{ route('docente.index') }}">
                            <button type="button" class="btn btn-primary">
                                Volver a la lista
                            </button>
                        </a>


                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title"><p><strong>Modulos dictados</strong></p></div>
                </div>
                <div class="box-body">
                    @foreach($materiasDocente as $mat)
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <p><strong>Modulo:&nbsp;</strong>{{$mat->nombre}}</p>
                                </div>
                            </div>
                            <div class="box-body">
                                    <div class="col-md-3"><strong>Grupo:&nbsp;</strong>{{$mat->grupo}}</div>
                                    <div class="col-md-3"><strong>Version:&nbsp;</strong>{{$mat->version}}</div>
                                    <div class="col-md-3"><strong>Edicion:&nbsp;</strong>{{$mat->edicion}}</div>
                                    <div class="col-md-3"><strong>A&ntilde;o:&nbsp;</strong>{{$mat->anho}}</div>

                            </div>
                            <div class="box-footer">
                                <div class="col-md-6"><strong>Fecha Inicio:&nbsp;</strong>{{ Carbon\Carbon::parse($mat->fecha_inicio)->format('d/m/Y')}}</div>
                                <div class="col-md-6"><strong>Fecha Fin:&nbsp;</strong>{{ Carbon\Carbon::parse($mat->fecha_fin)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection