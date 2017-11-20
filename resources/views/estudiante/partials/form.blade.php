<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('registro') ? 'has-error' : '' }}">
        {!! Form::label('registro','Registro') !!}
        {!! Form::number('registro',null,
            [
                'required',
                'class' => 'form-control',
                'min'=> '0',
                'placeholder'=> 'Ingrese el numero de registro...'
            ]
        ) !!}
        @if($errors->has('registro'))
            <span class="help-block">
            <strong>{{ $errors->first('registro') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-4 {{ $errors->has('carnet') ? 'has-error' : '' }}">
        {!! Form::label('carnet','Cedula de identidad') !!}
        {!! Form::number('carnet',null,
            [
                'required',
                'class' => 'form-control',
                'min'=> '0',
                'placeholder' => 'Ingrese el numero de carnet...'
            ]
        )!!}
        @if($errors->has('carnet'))
            <span class="help-block">
            <strong>{{ $errors->first('carnet') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-4 {{ $errors->has('ciciudad') ? 'has-error' : '' }}">
        {!! Form::label('ciciudad', 'Ciudad Carnet') !!}
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
                'class' => 'form-control',
                'placeholder' => 'Elija la ciudad de emision de carnet',
                'required'
            ]
        )!!}

        @if($errors->has('ciciudad'))
            <span class="help-block">
            <strong>{{ $errors->first('ciciudad') }}
            </strong>
        </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('nombre') ? 'has-error' : '' }}">
        {!! Form::label('nombre','Nombre') !!}
        {!! Form::text('nombre',null,
            [
                'required',
                'class' => 'form-control',
                'pattern' => '[a-zA-Z ]+',
                'title' => 'Solo se permiten letras',
                'placeholder' => 'Ingrese el nombre...'
            ]
        )!!}
        @if($errors->has('nombre'))
            <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-5 {{ $errors->has('apellido') ? 'has-error' : '' }}">
        {!! Form::label('apellido','Apellido') !!}
        {!! Form::text('apellido',null,
            [
                'required',
                'class' => 'form-control',
                'pattern' => '[a-zA-Z ]+',
                'title' => 'Solo se permiten letras',
                 'placeholder' => 'Ingrese el apellido...'
            ]
        )!!}
        @if($errors->has('apellido'))
            <span class="help-block">
            <strong>{{ $errors->first('apellido') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-3 {{ $errors->has('sexo') ? 'has-error' : '' }}">
        {!! Form::label('sexo','Sexo') !!}
        {!! Form::select('sexo',
            [
                'M'=>'Masculino',
                'F'=>'Femenino'
            ],null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione el genero'
            ]
        )!!}
        @if($errors->has('sexo'))
            <span class="help-block">
            <strong>{{ $errors->first('sexo') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('fechanac') ? 'has-error' : '' }}">
        {!! Form::label('fechanac','Fecha Nacimiento') !!}
        {!! Form::text('fechanac',
            ($estudiante->fechanac) ? $estudiante->fechanac->format('d/m/Y') : date('d/m/Y'),
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Elija fecha de nacimiento... ',
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
    <div class="form-group col-md-5 {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::label('email','Correo Electronico') !!}
        {!! Form::email('email',null,
            [
                'class' => 'form-control',
                'placeholder' => 'Ingrese su correo....'
            ]
        )!!}
        @if($errors->has('email'))
            <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-3 {{ $errors->has('telefono') ? 'has-error' : '' }}">
        {!! Form::label('telefono','Telefono') !!}
        {!! Form::number('telefono',null,
            [
                'min' => '0',
                'step' => '1',
                'class' => 'form-control',
                'placeholder' => 'Ingrese su telefono....'
            ]
        )!!}
        @if($errors->has('telefono'))
            <span class="help-block">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('domicilio') ? 'has-error' : '' }}">
    {!! Form::label('domicilio','Domicilio') !!}
    {!! Form::text('domicilio',null,
        [
            'class' => 'form-control',
            'placeholder' => 'Ingrese la direccion de domicilio....'
        ]
    )!!}
    @if($errors->has('domicilio'))
        <span class="help-block">
            <strong>{{ $errors->first('domicilio') }}</strong>
        </span>
    @endif
</div>

<div class="row">
    <div class="form-group col-md-3 {{ $errors->has('fechaegresado') ? 'has-error' : '' }}">
        {!! Form::label('fechaegresado','Fecha Egreso') !!}
        {!! Form::text('fechaegresado',
            ($estudiante->fechaegresado) ? $estudiante->fechaegresado->format('d/m/Y'): date('d/m/Y'),
            [
                'required',
                'class' => 'form-control',
                'pattern' => '^([0-2][0-9]|3[0-1])(\/)(0[1-9]|1[0-2])\2(\d{4})$',
                'title' => 'Ingrese la fecha con el formato dd/mm/yyyy'
            ]
        ) !!}
        @if($errors->has('fechaegresado'))
            <span class="help-block">
            <strong>{{ $errors->first('fechaegresado') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-4 {{ $errors->has('carrera_id') ? 'has-error' : '' }}">
        {!! Form::label('carrera_id', 'Carrera') !!}
        {!! Form::select('carrera_id',
            $carreras,
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione la carrera correspondiente...'
            ]
        ) !!}
        @if($errors->has('carrera_id'))
            <span class="help-block">
            <strong>{{ $errors->first('carrera_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-5 {{ $errors->has('ppg') ? 'has-error' : '' }}">
        {!! Form::label('ppg','PPG (Promedio Ponderado de Graduacion)') !!}
        {!! Form::number('ppg',null,
            [
                'required',
                'class' => 'form-control',
                'min' => '0',
                'max' => '100',
                'step' => '1',
                'placeholder' => 'Ingrese el PPG'
            ]
        )!!}
        @if($errors->has('ppg'))
            <span class="help-block">
            <strong>{{ $errors->first('ppg') }}</strong>
        </span>
        @endif
    </div>

</div>
