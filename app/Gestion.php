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
        public function cuentas()
    {
        return $this->hasMany(Cuenta::class,'gestion_id');
    }

    public function getGrupoAttribute($value)
    {
        return strtoupper($value);
    }
    public function setGrupoAttribute($value)
    {
        $this->attributes['grupo'] = strtoupper($value);
    }
}
