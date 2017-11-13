<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = ['monto_programa','descuento','materias_reprobadas',
                            'estudiante_id','programa_id','saldo','monto_pagado','certificado_nota','certificado_no_deudor']; //Pendiente

    public function programas()
    {
        return $this->BelongsTo(Programa::class,'programa_id');;
    }
    public function pagos(){
        return $this->BelongsTo(Pago::class,'cuenta_id');;
    }
    public function gestiones(){
        return $this->BelongsTo(Gestion::class,'gestion_id');;
    }
}
