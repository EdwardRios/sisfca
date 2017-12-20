@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title">Datos Programa</div>
                </div>
                <div class="box-body">

                    <table class="table table-bordered">
                        <tr>
                            <td>Codigo</td>
                            <td colspan="6">{{ $programa->codigo}}</td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td colspan="6">{{$programa->tipo}}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td colspan="6">{{ $programa->nombre }}</td>
                        </tr>
                        <tr>
                            <td>Modulo</td>
                            @foreach($materia as $mat)
                                <td> {{ $mat->nombre }} - {{$mat->nivel}}°Modulo</td>
                            @endforeach
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
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title">Modulos ofertados</div>
                </div>
                <div class="box-body">
                    @foreach($datosPrograma as $datos)
                        <div class="box box-warning">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Modulo:</strong> {{$datos->modulo}}
                                    </div>

                                        <strong>Docente: </strong> {{$datos->docente}}&nbsp;{{$datos->apellido}}

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Grupo: </strong> {{ $datos->grupo }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Version: </strong> {{ $datos->version}}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Edicion: </strong> {{ $datos->edicion}}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>A&ntilde;o: </strong> {{ $datos->anho }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Fecha
                                            Inicio: </strong> {{ Carbon\Carbon::parse($datos->fecha_inicio)->format('d/m/Y') }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Fecha
                                            Fin: </strong> {{ Carbon\Carbon::parse($datos->fecha_fin)->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection