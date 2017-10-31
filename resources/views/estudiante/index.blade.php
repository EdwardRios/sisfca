@extends('layouts.dashboard')
@section('content')
    <div class="row">
    <div class="col-sm-12">
        {{--<h3>Estudiantes </h3>--}}
        {{--{!! Form::open(['route' => 'estudiante.index',--}}
                        {{--'method' => 'GET',--}}
                        {{--'class' => 'navbar-form navbar-left pull-left',--}}
                        {{--'role'=> 'search'--}}
                        {{--]) !!}--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::text('nombre',null,--}}
            {{--[--}}
                {{--'class' => 'form-control',--}}
                {{--'placeholder' => 'Ingrese el nombre a buscar'--}}
            {{--]--}}
            {{--) !!}--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-default">Buscar</button>--}}
        {{--{!! Form::close() !!}--}}
        {{--<table class="table table-bordered table-hover" >--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>Registro</th>--}}
                {{--<th>Nombre</th>--}}
                {{--<th>Apellido</th>--}}
                {{--<th>Carnet</th>--}}
                {{--<th>C.I. Ciudad</th>--}}
                {{--<th>Sexo</th>--}}
                {{--<th>Fecha Egresado</th>--}}
                {{--<th>PPG</th>--}}
                {{--<th colspan="2">Acciones</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($estudiante as $est)--}}
                {{--<tr>--}}
                    {{--<td>{{ $est->registro }}</td>--}}
                    {{--<td>{{ $est->nombre}}</td>--}}
                    {{--<td>{{ $est->apellido}}</td>--}}
                    {{--<td>{{ $est->carnet}}</td>--}}
                    {{--<td>{{ $est->ciciudad}}</td>--}}
                    {{--@if($est->sexo =='M')--}}
                        {{--<td>Masculino</td>--}}
                    {{--@else--}}
                        {{--<td>Femenino</td>--}}
                    {{--@endif--}}
                    {{--<td>{{ $est->fechanac}}</td>--}}
                    {{--<td>{{ $est->ppg}}</td>--}}
                    {{--<td>--}}
                        {{--<a href="{{ route('estudiante.show',['estudiante' => $est->id])}}">Ver mas</a>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<a href="{{ route('estudiante.edit',['estudiante' => $->id])}}">Editar</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
        {{--{{ $estudiante->links() }}--}}
        <table class="table table-bordered table-hover" id="student-table">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carnet</th>
                    <th>C.I. Emitido</th>
                    <th>Sexo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        </table>
    </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#student-table').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/studentTable') }}",
                "columns": [
                    {data: 'registro', name: 'registro'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'apellido', name: 'apellido'},
                    {data: 'carnet', name: 'carnet'},
                    {data: 'ciciudad', name: 'ciciudad'},
                    {data: 'sexo', name: 'sexo'},
                    {data: 'action', searchable:'false', orderable: false},
                    {   data:'id',
                        targets: [0],
                        visible: false,
                        searchable: false
                    },
                    ],
                "language": {
                    "url": "/plugins/datatables/Spanish.json"
                },
                "dom": '<"left"f><t>ip',
                "order": [[7,'desc']]
            });
        });
    </script>
@endsection
