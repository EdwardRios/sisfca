<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

    protected $fillable = ['monto','fecha_deposito','nro_deposito','glosa','cuenta_id'];

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class,'cuenta_id');
    }
}
