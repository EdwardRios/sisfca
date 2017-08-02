<div class="form-group {{ $errors->has('codigo') ? 'has-error' : '' }}">
    {!! Form::label('codigo','Codigo') !!}
    {!! Form::number('codigo', null,
        [
            'required',
            'class' => 'form-control'
        ]
    ) !!}
    @if($errors->has('codigo'))
        <span class="help-block">
                                <strong>{{ $errors->first('codigo') }}</strong>
                            </span>
    @endif
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text('nombre',null,
        [
            'required',
            'class' => 'form-control'
        ]
    ) !!}
    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
    {!! Form::label('apellido','Apellido') !!}
    {!! Form::text('apellido',null,
        [
            'required',
            'class' => 'form-control'
        ]
    ) !!}
    @if($errors->has('apellido'))
        <span class="help-block">
            <strong>{{ $errors->first('apellido') }}</strong>
        </span>
    @endif
</div>
<div class="row form-group ">
    <div class="col-md-3 {{ $errors->has('carnet') ? 'has-error' : '' }}">
        {!! Form::label('carnet','Carnet') !!}
        {!! Form::text('carnet',null,
            [
                'required',
                'class' => 'form-control'
            ]
        ) !!}

        @if($errors->has('carnet'))
            <span class="help-block">
                                    <strong>{{ $errors->first('carnet') }}
                                </strong>
                                </span>
        @endif
    </div>
    <div class="col-md-3 {{ $errors->has('ciciudad') ? 'has-error' : '' }}">
        {!! Form::label('ciciudad','Carnet Ciudad') !!}
        {!! Form::select('ciciudad',
            [
                'Santa Cruz'=>'Santa Cruz',
                'Cochabamba'=>'Cochabamba',
                'Oruro'=>'Oruro',
                'Beni'=>'Beni',
                'Pando'=>'Pando',
                'La Paz'=>'La Paz',
                'Potosi'=>'Potosi',
                'Tarija'=>'Tarija',
                'Chuquisaca'=>'Chuquisaca',
            ],null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione ciudad'
            ]
        )!!}
        @if($errors->has('ciciudad'))
            <span class="help-block">
            <strong>{{ $errors->first('ciciudad') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-3 {{ $errors->has('sexo') ? 'has-error' : '' }}">
        {!! Form::label('sexo','Sexo') !!}
        {!! Form::select('sexo',
            [
                'M'=>'Masculino',
                'F'=>'Femenino'
            ],null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione genero'
            ]
        )!!}
        @if($errors->has('sexo'))
            <span class="help-block">
                                    <strong>{{ $errors->first('sexo') }}
                                </strong>
                                </span>
        @endif
    </div>
    <div class="col-md-3 {{ $errors->has('grado') ? 'has-error' : '' }}">
        {!! Form::label('grado','Grado') !!}
        {!! Form::select('grado',
            [
                'Diplomado'=>'Diplomado',
                'Especialidad'=>'Especialidad',
                'Maestria'=>'Maestria',
                'Doctorado'=>'Doctorado'
            ],null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione el grado'
            ]
        )!!}
        @if($errors->has('grado'))
            <span class="help-block">
                                    <strong>{{ $errors->first('grado') }}
                                </strong>
                                </span>
        @endif
    </div>
</div>
<div class="row form-group">
    <div class="col-md-3">
        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::number('telefono',null,
            [
                'class' => 'form-control'
            ]
        ) !!}

    </div>
    <div class="col-md-6">
        {!! Form::label('email','Correo Electronico') !!}
        {!! Form::email('email',null,
            [
                'class'=> 'form-control',
            ]
        ) !!}
    </div>
    <div class="col-md-3 {{ $errors->has('fechanac') ? 'has-error' : '' }}">
        {!! Form::label('fechanac','Fecha Nacimiento') !!}
        {!! Form::date( 'fechanac',
            ($docente->fechanac) ? $docente->fechanac : date('d-m-Y'),
            [
                'required',
                'class' => 'form-control'
            ]
        ) !!}
        @if($errors->has('fechanac'))
            <span class="help-block">
            <strong>{{ $errors->first('fechanac') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('domicilio','Domicilio') !!}
    {!! Form::text ( 'domicilio',null,
        [
            'class' => 'form-control'
        ]
    ) !!}
</div>


