{{--<div class="container">--}}
    {{--<p><strong>Nombre:</strong> {{ $estudiante->nombre }} {{ $estudiante->apellido }} </p>--}}
    {{--<p><strong>Registro:</strong> {{ $estudiante->registro }} </p>--}}

{{--</div>--}}
{{--@if(session()->has('msj'))--}}
    {{--<div class="alert alert-danger" role="alert">{{ session('msj')}}</div>--}}
{{--@endif--}}
{{--<div class="form-group">--}}
    {{--<label for="cuenta_id">Elija el programa</label>--}}
    {{--<select name="cuenta_id" id="cuenta_id" class="form-control" required>--}}
        {{--<option value="" selected disabled>Elija un programa</option>--}}
        {{--@foreach($cuentas as $c)--}}
            {{--<option value="{{ $c->id}}">{{$c->programas->nombre}}</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
{{--</div>--}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('estudiante_id','Estudiante') !!}
            {!! Form::select('estudiante_id',
                $estudiantes,
                null,
                [
                 'required',
                'class' => 'form-control',
                'placeholder' => 'Seleccione el estudiante...'
                ]
                 ) !!}
        </div>
    </div>
</div>
<div class="form-group">{!! Form::label('programa_id','Programa') !!}
    {!! Form::select('programa_id',
        [null=>'Seleccione programa'],
        null,
        [
         'required',
        'class' => 'form-control',
        ]
         ) !!}</div>

<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('nro_deposito','Numero Deposito') }}
        {{ Form::number('nro_deposito',null,['class' =>'form-control' , 'min'=>'0' , 'required'])}}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('fecha_deposito','Fecha Deposito') }}
        {{ Form::text('fecha_deposito',null,['class' =>'form-control','required' ])}}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('monto','Monto') }}
        {{ Form::number('monto',null,['class' =>'form-control','step'=>'0.01', 'min'=>'0','required'])}}
    </div>
    <div class="form-group">
        <div class="col-md-12"><p><strong>Glosa</strong></p></div>
        <div class="form-group col-md-4">
            {{ Form::radio('glosa','nota',null,
                ['id'=>'nota',
                  'required'
            ]) }}
            {{ Form::label('nota','Certificado de notas') }}
            &nbsp;
        </div>
        <div class="form-group col-md-4">
            {{ Form::radio('glosa','nodeudor',null,['id'=>'nodeudor']) }} {{ Form::label('nodeudor','Certificado No Deudor') }}
            &nbsp;
        </div>
        <div class="form-group col-md-4">
            {{ Form::radio('glosa','otro',null,['id'=>'otro']) }} {{ Form::label('otro','Otro') }}
        </div>
        <div class="form-group col-md-12">
            {{ Form::text('glosatxt',null,
                [   'id'=>'glosatxt',
                    'class' => 'form-control',
                     'style' => 'display:none',
                     'placeholder' => 'Escriba la glosa....'
                ])
            }}
        </div>
    </div>
</div>
