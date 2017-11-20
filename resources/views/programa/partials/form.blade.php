<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('codigo') ? 'has-error' : '' }}">
        {!! Form::label('codigo','Codigo') !!}
        {!! Form::number('codigo', null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Ingrese el codigo del programa'
            ]
        ) !!}
        @if($errors->has('codigo'))
            <span class="help-block">
                                <strong>{{ $errors->first('codigo') }}</strong>
                            </span>
        @endif
    </div>
    <div class="form-group col-md-6 {{ $errors->has('tipo') ? 'has-error' : '' }}">
        {!! Form::label('tipo','Tipo') !!}
        {!! Form::select('tipo',
            [
                'Diplomado'=>'Diplomado',
                'Especialidad'=>'Especialidad',
                'Maestria'=>'Maestria',
                'Doctorado'=>'Doctorado'
            ],null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione el nivel de programa'
            ]
        )!!}
        @if($errors->has('tipo'))
            <span class="help-block">
            <strong>{{ $errors->first('tipo') }}
            </strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text ( 'nombre',null,
        [
            'class' => 'form-control',
            'placeholder' => 'Ingrese el nombre del programa...'
        ]
    ) !!}
    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}
            </strong>
        </span>
    @endif
</div>



