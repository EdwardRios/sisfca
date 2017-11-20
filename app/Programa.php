<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $fillable = ['codigo','tipo','nombre'];

    public function materias()
    {
        return $this->hasMany(Materia::class,'programa_id');
    }
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class,'programa_id');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre']= strtoupper($value);
    }
}
