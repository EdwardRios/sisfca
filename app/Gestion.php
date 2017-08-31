<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestiones';
    protected $fillable = ['anho','edicion','version','grupo'];
    public function materias()
    {
        return $this->belongsToMany('\App\Materia','ofertas')
            ->withPivot('docente_id','fecha_inicio','fecha_fin');
    }
    public function docentes()
    {
        return $this->belongsToMany('\App\Docentes','ofertas')
            ->withPivot('materia_id','fecha_inicio','fecha_fin');
    }
}
