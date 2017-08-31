@if(session()->has('msj'))
    <div class="alert alert-danger" role="alert">ERROR : {{ session('msj')}}</div>
@endif
<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('codigo') ? 'has-error' : '' }}">
        {!! Form::label('codigo','Codigo') !!}
        {!! Form::text('codigo', null,
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
    <div class="form-group col-md-6 {{ $errors->has('tipoPrograma') ? 'has-error' : '' }}">
        {!! Form::label('tipoPrograma','Tipo Programa') !!}
        {!! Form::select('tipoPrograma',
            [
                'Diplomado'=>'Diplomado',
                'Maestria'=>'Maestria',
                'Especialidad'=>'Especialidad',
            ]
            ,null,
            [
                'required',
                'class' => 'form-control tipoPrograma',
                'placeholder' => 'Seleccione el programa'
            ]
        )!!}
        @if($errors->has('tipoPrograma'))
            <span class="help-block">
            <strong>{{ $errors->first('tipo') }}
            </strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    {!! Form::label('programa_id','Nombre Programa') !!}
    {!! Form::select('programa_id',
        [null=>'Seleccione'],null,
        [
            'required',
            'class' => 'form-control nombrePrograma',
        ]
    )!!}
    @if($errors->has('programa_id'))
        <span class="help-block">
            <strong>{{ $errors->first('programa_id') }}
            </strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('nivel') ? 'has-error' : '' }}">
    {!! Form::label('nivel','Nivel Materia') !!}
    {!! Form::select('nivel',
        [
            null=>'Seleccione'
        ]
        ,null,
        [
            'required',
            'class' => 'form-control nivel',
        ]
    )!!}
    @if($errors->has('nivel'))
        <span class="help-block">
            <strong>{{ $errors->first('nivel') }}
            </strong>
        </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('nombre','Nombre') !!}
    {!! Form::text ( 'nombre',null,
        [
            'required',
            'pattern' => '[a-zA-ZñÑ() ]{3,150}',
            'class' => 'form-control'
        ]
    ) !!}
    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}
            </strong>
        </span>
    @endif
</div>



