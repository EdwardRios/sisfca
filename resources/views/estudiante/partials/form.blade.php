<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('registro') ? 'has-error' : '' }}">
        {!! Form::label('registro','Registro') !!}
        {!! Form::number('registro',null,
            [
                'required',
                'class' => 'form-control',
                'min'=> '0'
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
                'min'=> '0'
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
                'Santa Cruz' => 'Santa Cruz',
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
                'placeholder' => 'Seleccione genero'
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
            ($estudiante->fechanac) ? $estudiante->fechanac->format('d-m-Y') : date('d-m-Y'),
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
    <div class="form-group col-md-5 {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::label('email','Correo Electronico') !!}
        {!! Form::email('email',null,
            [
                'class' => 'form-control',
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
                'class' => 'form-control'
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
        ]
    )!!}
    @if($errors->has('domicilio'))
        <span class="help-block">
            <strong>{{ $errors->first('domicilio') }}</strong>
        </span>
    @endif
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('fechaegresado') ? 'has-error' : '' }}">
        {!! Form::label('fechaegresado','Fecha Egreso') !!}
        {!! Form::text('fechaegresado',
            ($estudiante->fechaegresado) ? $estudiante->fechaegresado->format('d-m-Y') : date('d-m-Y'),
            [
                'required',
                'class' => 'form-control'
            ]
        ) !!}
        @if($errors->has('fechaegresado'))
            <span class="help-block">
            <strong>{{ $errors->first('fechaegresado') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-5 {{ $errors->has('id_carrera') ? 'has-error' : '' }}">
        {!! Form::label('id_carrera', 'Carrera') !!}
        {!! Form::select('id_carrera',
            $carreras,
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione la carrera correspondiente...'
            ]
        ) !!}
        @if($errors->has('id_carrera'))
            <span class="help-block">
            <strong>{{ $errors->first('id_carrera') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-3 {{ $errors->has('ppg') ? 'has-error' : '' }}">
        {!! Form::label('ppg','PPG') !!}
        {!! Form::number('ppg',null,
            [
                'required',
                'class' => 'form-control',
                'min' => '0',
                'max' => '100',
                'step' => '1'
            ]
        )!!}
        @if($errors->has('ppg'))
            <span class="help-block">
            <strong>{{ $errors->first('ppg') }}</strong>
        </span>
        @endif
    </div>

</div>
<button class="btn btn-primary" type="submit">Guardar</button>