@if(session()->has('msj'))
    <div class="alert alert-danger" role="alert">{{ session('msj')}}</div>
@endif
<div class="row">
    <div class="col-md-12 form-group {{ $errors->has('programa_id') ? 'has-error' : '' }}">
        {!! Form::label('programa_id','Elija el Programa') !!}
        {!! Form::select('programa_id',
            $programas,
            null,
            [
                 'required',
                'class' => 'form-control',
            ]
        ) !!}
        @if($errors->has('programa_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('programa_id') }}</strong>
                            </span>
        @endif
    </div>
        <div class="col-md-12 form-group {{ $errors->has('materia_id') ? 'has-error' : '' }}">
            {!! Form::label('materia_id','Materia') !!}
            {!! Form::select('materia_id',
                [ 'null' => 'seleccione'],
                null,
                [
                     'required',
                    'class' => 'form-control',
                ]
            ) !!}
            @if($errors->has('materia_id'))
                <span class="help-block">
                                <strong>{{ $errors->first('materia_id') }}</strong>
                            </span>
            @endif
        </div>
    {{--CB Gestion--}}
    <div class="col-md-12 form-group {{ $errors->has('gestion_id') ? 'has-error' : '' }}">
        {!! Form::label('gestion_id','Grupo Gestion') !!}
        {!! Form::select('gestion_id',
            [null=>'Seleccione'],null,
            [
                'required',
                'class' => 'form-control gestion_id',
            ]
        )!!}
        @if($errors->has('gestion_id'))
            <span class="help-block">
            <strong>{{ $errors->first('gestion_id') }}
            </strong>
        </span>
        @endif
    </div>
    <p class="text-center">Lista de Estudiantes</p>
    <p id="nombreDocente"></p>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="col-md-2">Registro</th>
                <th class="text-center col-md-6">Nombre</th>
                <th class="col-md-1">Nota</th>
                {{--<th class="col-md-3">Estado</th>--}}
            </tr>
            </thead>
            <tbody class="tabla_materias" id="tablaNotas">
            <tr>
                <td class="col-md-2"></td>
                <td class="col-md-6"></td>
                <td></td>
                {{--<td class="col-md-3"></td>--}}
            </tr>
            </tbody>
        </table>
    </div>
</div>

