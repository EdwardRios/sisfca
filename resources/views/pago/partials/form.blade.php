<div class="container">
    <p><strong>Nombre:</strong> {{ $estudiante->nombre }} {{ $estudiante->apellido }} </p>
    <p><strong>Registro:</strong> {{ $estudiante->registro }} </p>

</div>
@if(session()->has('msj'))
    <div class="alert alert-danger" role="alert">{{ session('msj')}}</div>
@endif
<div class="form-group">
    <label for="cuenta_id">Elija el programa</label>
    <select name="cuenta_id" id="cuenta_id" class="form-control">
        <option value="" selected disabled>Elija un programa</option>
        @foreach($cuentas as $c)
        <option value="{{ $c->id}}">{{$c->programas->nombre}}</option>
        @endforeach
    </select>

</div>

<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('nro_deposito','Numero Deposito') }}
        {{ Form::number('nro_deposito',null,['class' =>'form-control' , 'min'=>'0' ])}}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('fecha_deposito','Fecha Deposito') }}
        {{ Form::text('fecha_deposito',null,['class' =>'form-control' ])}}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('monto','Monto') }}
        {{ Form::number('monto',null,['class' =>'form-control','step'=>'0.01', 'min'=>'0'])}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('glosa','Glosa') }}
    {{ Form::text('glosa',null,['class' => 'form-control']) }}
</div>