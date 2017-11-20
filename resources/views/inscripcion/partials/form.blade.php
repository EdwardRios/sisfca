@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">{{ session('msj')}}</div>
@endif
<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('estudiante_id') ? 'has-error' : '' }}">
        {!! Form::label('estudiante_id','Estudiante') !!}
        {!! Form::select('estudiante_id',
            $estudiantes,
            null,
            [
                 'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione el estudiante...'
            ]
        ) !!}
        @if($errors->has('estudiante_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('estudiante_id') }}</strong>
                            </span>
        @endif
    </div>
    <div class="col-md-6 form-group {{ $errors->has('programa_id') ? 'has-error' : '' }}">
        {!! Form::label('programa_id','Programa') !!}
        {!! Form::select('programa_id',
            $programas,
            null,
            [
                 'required',
                'class' => 'form-control programa',
                'placeholder' => 'Elija el programa....'
            ]
        ) !!}
        @if($errors->has('programa_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('programa_id') }}</strong>
                            </span>
        @endif
    </div>
</div> {{--CB Gestion--}}
<div class="form-group {{ $errors->has('gestion_id') ? 'has-error' : '' }}">
    {!! Form::label('gestion_id','Grupo Gestion') !!}
    {!! Form::select('gestion_id',
        [null=>'Seleccione la gestion'],null,
        [
            'required',
            'class' => 'form-control gestion_id',
            //'placeholder' => 'Seleccione la gestion'
        ]
    )!!}
    @if($errors->has('gestion_id'))
        <span class="help-block">
            <strong>{{ $errors->first('gestion_id') }}
            </strong>
        </span>
    @endif
</div>
<p class="text-center">Materias a seleccionar</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">Nombre Materia</th>
            <th>Nivel</th>
            <th>Habilitar</th>
        </tr>
    </thead>
    <tbody class="tabla_materias">
        <tr>

        </tr>
    </tbody>
</table>





