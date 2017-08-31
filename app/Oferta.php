<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = ['docente_id','gestion_id','materia_id','fecha_inicio','fecha_fin'];
}
