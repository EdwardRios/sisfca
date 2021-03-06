@extends('layouts.dashboard')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Programa</h1>
        <table class="table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="">
            @foreach($programas as $programa)
                <tr>
                    <td>{{ $programa->codigo }}</td>
                    <td>{{ $programa->tipo}}</td>
                    <td>{{ $programa->nombre}}</td>
                    <td>
                        <a href="{{ route('programa.show',['programa' => $programa->id])}}">Ver mas</a>
                    </td>
                    <td>
                        <a href="{{ route('programa.edit',['programa' => $programa->id])}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
