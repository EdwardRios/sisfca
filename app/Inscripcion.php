<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    protected $fillable = ['oferta_id','estudiante_id','nota'];
    //Crear la vista de ver notas ,su logica y otros
    public function estudiantes()
    {
        return $this->belongsTo(Estudiante::class,'estudiante_id');
    }
}
