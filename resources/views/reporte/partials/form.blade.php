 <div class=" form-group {{ $errors->has('estudiante_id') ? 'has-error' : '' }}">
        {!! Form::label('estudiante_id','Estudiante') !!}
        {!! Form::select('estudiante_id',
            $estudiante,
            null,
            [
                'required',
                'placeholder' => 'Seleccione',
                'class' => 'form-control',
            ]
        ) !!}
        @if($errors->has('estudiante_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('estudiante_id') }}</strong>
                            </span>
        @endif
    </div>
    <div class=" form-group {{ $errors->has('programa_id') ? 'has-error' : '' }}">
        {!! Form::label('programa_id','Programa') !!}
        {!! Form::select('programa_id',
            [null=>'Seleccione el programa'],
            null,
            [
                'required',
                'class' => 'form-control programa',
            ]
        ) !!}
        @if($errors->has('programa_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('programa_id') }}</strong>
                            </span>
        @endif
    </div>
