<?php

namespace App;

use App\Traits\DatesTranslator;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use DatesTranslator;
    protected $dates= ['fecha_inicio','fecha_fin'];
    protected $fillable = ['docente_id','gestion_id','materia_id','fecha_inicio','fecha_fin'];

    public function docente()
    {
        return $this->belongsTo(Docente::class,'docente_id');
    }

    public function gestion()
    {
        return $this->belongsTo(Gestion::class,'gestion_id');
    }
    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    public function setFechaFinAttribute($value)
    {
        $this->attributes['fecha_fin'] = Carbon::createFromFormat('d/m/Y', $value);
    }

}
