<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'codigo','nombre','nivel','programa_id'
    ];

    public function programas()
    {
        return $this->belongsTo(Programa::class,'programa_id');;
    }
    public function docentes()
    {
        return $this->belongsToMany('\App\Docente','ofertas')
            ->withPivot('gestion_id','fecha_inicio','fecha_fin');
    }
    public function gestiones()
    {
        return $this->belongsToMany('\App\Gestion','ofertas')
            ->withPivot('docente_id','fecha_inicio','fecha_fin');
    }
}
