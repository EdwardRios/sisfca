<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'codigo','nombre','nivel','id_programa'
    ];

    public function programas()
    {
        return $this->belongsTo(Programa::class,'id_programa');;
    }
}
