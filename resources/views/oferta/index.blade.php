@extends('layouts.app')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Gestion</h1>
        <table class="table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Edicion</th>
                    <th>Version</th>
                    <th>Grupo</th>

                </tr>
            </thead>
            <tbody>
            @foreach($gestion as $ges)
                <tr>
                    <td>{{ $ges->anho}}</td>
                    <td>{{ $ges->edicion}}</td>
                    <td>{{ $ges->version}}</td>
                    <td>{{ $ges->grupo}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
