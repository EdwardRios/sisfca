<div class="container">
    <p><strong>Registro: </strong> {{$estudiante->registro}}</p>
    <p><strong>Nombre: </strong> {{$estudiante->nombre}}&nbsp;{{$estudiante->apellido}}</p>
    <input type="hidden" value="{{$estudiante->id}}" id="estudiante_id">
</div>
<div class="row">
    <div class="form-group col-md-12 {{ $errors->has('cuenta') ? 'has-error' : '' }}">
        <label for="cuenta">Elija la cuenta del programa</label>
        <select class="form-control" name="cuenta" id="cuenta" required>
            <option value="" disabled selected>Seleccione programa</option>
            @foreach($cuenta as $c)
                <option value="{{ $c->programa_id }}" >
                    {{$c->programas->nombre}}
                </option>
            @endforeach
        </select>
        @if($errors->has('cuenta'))
            <span class="help-block">
            <strong>{{ $errors->first('cuenta') }}</strong>
        </span>
        @endif
    </div>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nro Deposito</th>
        <th>Fecha Deposito</th>
        <th>Monto</th>
        <th>Glosa</th>
    </tr>
    </thead>
    <tbody id="tablaPago">
    </tbody>
</table>
