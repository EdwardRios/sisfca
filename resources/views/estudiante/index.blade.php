@extends('layouts.app')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <h1>Estudiantes </h1>
        {!! Form::open(['route' => 'estudiante.index',
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
        <table class="table table-bordered table-hover" >
            <thead>
            <tr>
                <th>Registro</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Carnet</th>
                <th>C.I. Ciudad</th>
                <th>Sexo</th>
                <th>Fecha Egresado</th>
                <th>PPG</th>
                <th colspan="2">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estudiante as $est)
                <tr>
                    <td>{{ $est->registro }}</td>
                    <td>{{ $est->nombre}}</td>
                    <td>{{ $est->apellido}}</td>
                    <td>{{ $est->carnet}}</td>
                    <td>{{ $est->ciciudad}}</td>
                    @if($est->sexo =='M')
                        <td>Masculino</td>
                    @else
                        <td>Femenino</td>
                    @endif
                    <td>{{ $est->fechanac}}</td>
                    <td>{{ $est->ppg}}</td>
                    <td>
                        Hola{{--<a href="{{ route('estudiante.show',['estudiante' => $est->id])}}">Ver mas</a>--}}
                    </td>
                    <td>
                        Chau{{--<a href="{{ route('estudiante.edit',['estudiante' => $->id])}}">Editar</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $estudiante->links() }}
    </div>
@endsection
