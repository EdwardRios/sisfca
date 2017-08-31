@extends('layouts.app')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <h3>Docentes</h3>
        {!! Form::open(['route' => 'docente.index',
                        'method' => 'GET',
                        'class' => 'navbar-form navbar-left pull-left',
                        'role'=> 'search'
                        ]) !!}
        <div class="form-group">
            {!! Form::text('nombre',null,
            [
                'class' => 'form-control',
                'placeholder' => 'Ingrese el nombre a buscar'
            ]
            ) !!}
        </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Carnet</th>
                <th>Sexo</th>
                <th>Grado</th>
                <th colspan="2" class="text-center">Acciones</th>
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
                    <td class="text-center">
                        <a href="{{ route('docente.show',['docente' => $docente->id])}}">
                            <button class="btn btn-primary btn-xs">
                                Ver mas
                            </button></a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('docente.edit',['docente' => $docente->id])}}"><button class="btn btn-info btn-xs">
                                Editar
                            </button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $docentes->links() }}
    </div>
@endsection
