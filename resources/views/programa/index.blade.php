@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4>Lista de Programas</h4>
            <table class="table table-bordered table-hover" id="program-table">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                {{--<tbody class="">--}}
                {{--@foreach($programas as $programa)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $programa->codigo }}</td>--}}
                        {{--<td>{{ $programa->tipo}}</td>--}}
                        {{--<td>{{ $programa->nombre}}</td>--}}
                        {{--<td>--}}
                            {{--<a href="{{ route('programa.show',['programa' => $programa->id])}}">Ver mas</a>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                            {{--<a href="{{ route('programa.edit',['programa' => $programa->id])}}">Editar</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#program-table').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/programTable') }}",
                "columns": [
                    {data: 'codigo', name: 'codigo'},
                    {data: 'tipo', name: 'tipo'},
                    {data: 'nombre', name: 'nombre'},
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
                "order": [[4,'desc']]
            });
        });
    </script>
@endsection