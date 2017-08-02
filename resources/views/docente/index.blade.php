@extends('layouts.app')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Docentes</h1>
        <table class="table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carnet</th>
                    <th>Sexo</th>
                    <th>Grado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
            @foreach($docentes as $docente)
                <tr>
                    <td>{{ $docente->codigo }}</td>
                    <td>{{ $docente->nombre}}</td>
                    <td>{{ $docente->apellido}}</td>
                    <td>{{ $docente->carnet}}</td>
                    <td>{{ $docente->sexo}}</td>
                    <td>{{ $docente->grado}}</td>
                    <td>
                        <a href="{{ route('docente.show',['docente' => $docente->id])}}">Ver mas</a>
                    </td>
                    <td>
                        <a href="{{ route('docente.edit',['docente' => $docente->id])}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
