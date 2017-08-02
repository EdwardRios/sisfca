@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>Detalles Programa</h1>
                <table class="table table-bordered">
                    <tr>
                        <td>Codigo</td>
                        <td>{{ $programa->codigo}}</td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td>{{$programa->tipo}}</td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>{{ $programa->nombre }}</td>
                    </tr>
                    <tr>
                        <td>Materias</td>
                        <td>
                            @foreach($materia as $mat)
                                <p>{{ $mat->nombre }} - {{$mat->nivel}}  Modulo</p>
                            @endforeach
                        </td>
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