@if(session()->has('msj'))
    <div class="alert alert-danger" role="alert">{{ session('msj')}}</div>
@endif
<div class="row">
    <div class="col-md-12 form-group {{ $errors->has('programa_id') ? 'has-error' : '' }}">
        {!! Form::label('programa_id','Elija el programa') !!}
        {!! Form::select('programa_id',
            $programas,
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione el programa correspondiente....'
            ]
        ) !!}
        @if($errors->has('programa_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('programa_id') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-12 form-group {{ $errors->has('materia_id') ? 'has-error' : '' }}">
        {!! Form::label('materia_id','Modulo a ofertar') !!}
        {!! Form::select('materia_id',['-1'=> 'Seleccione un modulo'],null,
            [
                'required',
                'class' => 'form-control',

            ]
        ) !!}
        @if($errors->has('materia_id'))
            <span class="help-block">
            <strong>{{ $errors->first('materia_id') }}</strong>
        </span>
        @endif
    </div>
</div> {{--CB Gestion--}}
<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('gestion_id') ? 'has-error' : '' }}">
        <label for="gestion_id">Gestion ID</label>
        <select class="form-control" name="gestion_id" id="gestion_id">
            @foreach($gestiones as $ges)
                <option value="{{ $ges->id }}">
                    Año: {{$ges->anho}}&nbsp;&nbsp;
                    Edicion: {{ $ges->edicion}}&nbsp; &nbsp;
                    Version: {{ $ges->version }}&nbsp;&nbsp;
                    Grupo: {{$ges->grupo}}
                </option>
            @endforeach
        </select>
        @if($errors->has('gestion_id'))
            <span class="help-block">
            <strong>{{ $errors->first('gestion_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-6 form-group {{ $errors->has('docente_id') ? 'has-error' : '' }}">
        {!! Form::label('docente_id','Docente') !!}
        {!! Form::select('docente_id',
            $docentes,
            null,
            [
                'required',
                'class' => 'form-control',
            ]
        ) !!}
        @if($errors->has('docente_id'))
            <span class="help-block">
                                <strong>{{ $errors->first('docente_id') }}</strong>
                            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('','Periodo') !!}
        <div class="input-daterange input-group">
            <div class="{{ $errors->has('fecha_inicio') ? 'has-error' : '' }}">
                {!! Form::text('fecha_inicio',
                    date('d/m/Y'),
                    [
                        'required',
                        'class' => 'form-control',
                        'name'=> 'fecha_inicio',
                        'id'=>'fecha_inicio'
                    ]
                ) !!}
                @if($errors->has('fecha_inicio'))
                    <span class="help-block">
               <strong>{{ $errors->first('fecha_inicio') }}</strong>
           </span>
                @endif
            </div>
            <span id="id" class="input-group-addon">Hasta</span>
            <div class="{{ $errors->has('fecha_fin') ? 'has-error' : '' }}">
                {!! Form::text('fecha_fin',
                    date('d/m/Y'),
                    [
                        'required',
                        'class' => 'form-control',
                        'name'=> 'fecha_fin',
                        'id' => 'fecha_fin'
                    ]
                ) !!}
                @if($errors->has('fecha_fin'))
                    <span class="help-block">
               <strong>{{ $errors->first('fecha_fin') }}</strong>
           </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <table>
            <tr>
                <td><strong>Fecha Inicio: </strong></td>
                <td><span id="fechaInicio"></span></td>
            </tr>
            <tr>
                <td><strong>Fecha Fin: </strong></td>
                <td><span id="fechaFin"></span></td>
            </tr>
        </table>
    </div>
</div>

