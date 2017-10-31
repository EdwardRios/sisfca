@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <p style="font-size: 20px">Ver estado cuenta Postgraduante</p>
            <table class="table table-bordered table-hover" id="account-table">
                <thead>
                <tr>
                    <th>Registro</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carnet</th>
                    <th>Opciones</th>

                </tr>
                </thead>
                {{--<tbody>--}}
                {{--@foreach($estudiante as $est)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $est->registro }}</td>--}}
                        {{--<td>{{ $est->nombre}}</td>--}}
                        {{--<td>{{ $est->apellido}}</td>--}}
                        {{--<td>{{ $est->carnet}}</td>--}}
                        {{--<td class="text-center">--}}
                            {{--<a href="{{ route('cuenta.show',['estudiante' => $est->id])}}">--}}
                                {{--<button class="btn btn-primary btn-sm">Ver Cuentas</button>--}}
                            {{--</a>--}}
                        {{--</td>--}}
                        {{--<td class="text-center">--}}
                            {{--<a href="{{ route('pago.crear',['estudiante' => $est->id])}}">--}}
                                {{--<button class="btn btn-info btn-sm">Registrar pago</button>--}}
                            {{--</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            </table>
            {{--{{ $estudiante->links() }}--}}
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#account-table').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/accountTable') }}",
                "columns": [
                    {data: 'registro', name: 'registro'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'apellido', name: 'apellido'},
                    {data: 'carnet', name: 'carnet'},
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
                "order": [[5,'desc']]
            });
        });
    </script>
@endsection
