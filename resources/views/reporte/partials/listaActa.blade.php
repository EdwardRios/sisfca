<div class=" form-group {{ $errors->has('programa_id') ? 'has-error' : '' }}">
        {!! Form::label('programa_id','Elija el programa') !!}
        {!! Form::select('programa_id',
            $programa,
            null,
            [
                'required',
                'placeholder' => 'Seleccione',
                'class' => 'form-control',
            ]
        ) !!}
        @if($errors->has('programa_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('programa_id') }}</strong>
                            </span>
        @endif
</div>
<div class=" form-group {{ $errors->has('materia_id') ? 'has-error' : '' }}">
        {!! Form::label('materia_id','Seleccione la materia ') !!}
        {!! Form::select('materia_id',
            [null=>'Seleccione la materia'],
            null,
            [
                'required',
                'class' => 'form-control programa',
            ]
        ) !!}
        @if($errors->has('materia_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('materia_id') }}</strong>
                            </span>
        @endif
</div>
<div class=" form-group {{ $errors->has('docente_id') ? 'has-error' : '' }}">
     {!! Form::label('docente_id','Seleccione el docente') !!}
     {!! Form::select('docente_id',
         [null=>'Seleccione docente'],
         null,
         [
             'required',
             'class' => 'form-control programa',
         ]
     ) !!}
     @if($errors->has('docente_id'))
         <span class="help-block">
                                <strong>{{ $errors->first('docente_id') }}</strong>
                            </span>
     @endif
</div>
