<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $fillable = ['codigo','tipo','nombre'];

    public function materias()
    {
        return $this->hasMany(Materia::class,'id_programa');
    }
}
