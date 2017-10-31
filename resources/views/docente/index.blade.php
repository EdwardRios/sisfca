@extends('layouts.dashboard')
@section('content')
    {{--<div class="row">--}}
        {{--<div class="col-sm-8 col-md-offset-2">--}}
            {{--<h3>Docentes</h3>--}}
            {{--{!! Form::open(['route' => 'docente.index',--}}
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
            {{--<table class="table table-bordered table-hover">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Codigo</th>--}}
                    {{--<th>Nombre</th>--}}
                    {{--<th>Apellido</th>--}}
                    {{--<th>Carnet</th>--}}
                    {{--<th>Sexo</th>--}}
                    {{--<th>Grado</th>--}}
                    {{--<th colspan="2" class="text-center">Acciones</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody class="">--}}
                {{--@foreach($docentes as $docente)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $docente->codigo }}</td>--}}
                        {{--<td>{{ $docente->nombre}}</td>--}}
                        {{--<td>{{ $docente->apellido}}</td>--}}
                        {{--<td>{{ $docente->carnet}}</td>--}}
                        {{--<td>{{ $docente->sexo}}</td>--}}
                        {{--<td>{{ $docente->grado}}</td>--}}
                        {{--<td class="text-center">--}}
                            {{--<a href="{{ route('docente.show',['docente' => $docente->id])}}">--}}
                                {{--<button class="btn btn-primary btn-xs">--}}
                                    {{--Ver mas--}}
                                {{--</button>--}}
                            {{--</a>--}}
                        {{--</td>--}}
                        {{--<td class="text-center">--}}
                            {{--<a href="{{ route('docente.edit',['docente' => $docente->id])}}">--}}
                                {{--<button class="btn btn-info btn-xs">--}}
                                    {{--Editar--}}
                                {{--</button>--}}
                            {{--</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
            {{--{{ $docentes->links() }}--}}
        {{--</div>--}}
    {{--</div>--}}
    <h4>Lista Docente</h4>
    <div class="row">
        <div class="col-md-11">
            <table class="table table-bordered table-hover" id="docente-table">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carnet</th>
                    <th>Sexo</th>
                    <th>Grado</th>
                    <th>Acciones</th>

                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#docente-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/docenteTable') }}",
                "columns": [

                    {data: 'codigo', name: 'codigo'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'apellido', name: 'apellido'},
                    {data: 'carnet', name: 'carnet'},
                    {data: 'sexo', name: 'sexo'},
                    {data: 'grado', name: 'grado'},
                    {data: 'action', searchable:'false'},
                    {   data:'id',
                        targets: [0],
                        visible: false,
                        searchable: false
                    },
//                    {data: 'action2', searchable:'false'}
                ],
                "language": {
                    "url": "/plugins/datatables/Spanish.json"
                },
                "dom": '<"left"f><t>ip',
                "order": [[7,'desc']]

            });
        })
    </script>
@endsection
