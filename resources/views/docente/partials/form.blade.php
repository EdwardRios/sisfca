<div class="form-group {{ $errors->has('codigo') ? 'has-error' : '' }}">
    {!! Form::label('codigo','Codigo') !!}
    {!! Form::number('codigo', null,
        [
            'required',
            'class' => 'form-control',
            'min' => '1'
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
            'class' => 'form-control',
            'pattern' => '[a-zA-ZñÑ ]{3,60}',
            'title' => 'Ingrese solo letras. Min:3'
        ]
    ) !!}
    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
    {!! Form::label('apellido','Apellidos') !!}
    {!! Form::text('apellido',null,
        [
            'required',
            'pattern' => '[a-zA-ZñÑ ]{3,50}',
            'class' => 'form-control'
        ]
    ) !!}
    @if($errors->has('apellido'))
        <span class="help-block">
            <strong>{{ $errors->first('apellido') }}</strong>
        </span>
    @endif
</div>
<div class="row">
    <div class="col-md-3 form-group {{ $errors->has('carnet') ? 'has-error' : '' }}">
        {!! Form::label('carnet','Carnet') !!}
        {!! Form::text('carnet',null,
            [
                'required',
                'class' => 'form-control',
                'maxlength' => '9'

            ]
        ) !!}

        @if($errors->has('carnet'))
            <span class="help-block">
                                    <strong>{{ $errors->first('carnet') }}
                                </strong>
                                </span>
        @endif
    </div>
    <div class="col-md-3 form-group {{ $errors->has('ciciudad') ? 'has-error' : '' }}">
        {!! Form::label('ciciudad','Carnet Ciudad') !!}
        {!! Form::select('ciciudad',
            [
                'SC' => 'Santa Cruz',
                'CB'=>'Cochabamba',
                'OR'=>'Oruro',
                'BN'=>'Beni',
                'PA'=>'Pando',
                'LP'=>'La Paz',
                'PT'=>'Potosi',
                'TJ'=>'Tarija',
                'CH'=>'Chuquisaca',
                'E'=>'Extranjero'
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
    <div class="col-md-3 form-group {{ $errors->has('sexo') ? 'has-error' : '' }}">
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
    <div class="col-md-3 form-group {{ $errors->has('grado') ? 'has-error' : '' }}">
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
<div class="row">
    <div class="col-md-3 form-group">
        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::number('telefono',null,
            [
                'class' => 'form-control',
                'min' => '0'
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
        {!! Form::text( 'fechanac',
            ($docente->fechanac) ? $docente->fechanac->format('d/m/Y') : date('d/m/Y'),
            [
                'required',
                'class' => 'form-control',
                'pattern' => '^([0-2][0-9]|3[0-1])(\/)(0[1-9]|1[0-2])\2(\d{4})$',
                'title' => 'Ingrese la fecha con el formato dd/mm/yyyy'
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

