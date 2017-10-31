@extends('layouts.dashboard')
@section('content')
    <div>
        <div class="col-md-8 col-md-offset-2">
            <h1><small>Estudiante creado el {{ $estudiante->created_at->format('d-m-Y')}}</small></h1>
            <ul>
                <li><strong>Registro Estudiante:</strong>{{ $estudiante->registro}}</li>
                <li><strong>Nombre:</strong> {{ $estudiante->nombre }}</li>
                <li><strong>Apellido:</strong>{{ $estudiante->apellido }}</li>
                <li><strong>Carnet:</strong> {{ $estudiante->carnet }}</li>
                <li><strong>fechanac:</strong> {{ $estudiante->fechanac }}</li>
                <li><strong>Sexo:</strong> {{ $estudiante->sexo }}</li>
                <li><strong>Grado:</strong> {{ $estudiante->grado }}</li>
                <li><strong>Telefono:</strong> {{ $estudiante->telefono }}</li>
                <li><strong>Email:</strong> {{ $estudiante->email }}</li>
                <li><strong>Domicilio:</strong> {{ $estudiante->domicilio }}</li>
            </ul>
        </div>
    </div>
@endsection