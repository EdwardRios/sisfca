@extends('layouts.app')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <h3>Estudiantes </h3>
        {!! Form::open(['route' => 'cuenta.index',
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
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estudiante as $est)
                <tr>
                    <td>{{ $est->registro }}</td>
                    <td>{{ $est->nombre}}</td>
                    <td>{{ $est->apellido}}</td>
                    <td>{{ $est->carnet}}</td>
                    <td class="text-center">
                         <a href="{{ route('cuenta.show',['estudiante' => $est->id])}}">
                            <button class="btn btn-primary btn-sm">Ver Cuentas</button>
                         </a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('pago.crear',['estudiante' => $est->id])}}">
                            <button class="btn btn-info btn-sm">Registrar pago</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $estudiante->links() }}
    </div>
@endsection
