<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('anho') ? 'has-error' : '' }}">
        {!! Form::label('anho','Año') !!}
        {!! Form::number('anho',null,
            [
                'required',
                'class' => 'form-control',
                'min' => '2008',
                'max' => '2030'
            ]
        ) !!}
        @if($errors->has('anho'))
            <span class="help-block">
                                <strong>{{ $errors->first('anho') }}</strong>
                            </span>
        @endif
    </div>
    <div class="col-md-6 form-group {{ $errors->has('edicion') ? 'has-error' : '' }}">
        {!! Form::label('edicion','Edicion') !!}
        {!! Form::number('edicion',null,
            [
                'required',
                'min'=>'1',
                'max'=>'30',
                'class' => 'form-control'
            ]
        ) !!}
        @if($errors->has('edicion'))
            <span class="help-block">
            <strong>{{ $errors->first('edicion') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="row form-group">
    <div class="col-md-6">
        {!! Form::label('version', 'Version') !!}
        {!! Form::number('version',null,
            [
                'required',
                'class' => 'form-control',
                'min' => '1',
                'max' => '10'
            ]
        ) !!}

    </div>
    <div class="col-md-6">
        {!! Form::label('grupo','Grupo') !!}
        {!! Form::text('grupo',null,
            [
                'class'=> 'form-control',
            ]
        ) !!}
    </div>
</div>

