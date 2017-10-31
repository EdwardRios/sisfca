<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use DatesTranslator;
    protected $fillable = ['docente_id','gestion_id','materia_id','fecha_inicio','fecha_fin'];

    public function docente()
    {
        return $this->belongsTo(Docente::class,'docente_id');
    }

    public function gestion()
    {
        return $this->belongsTo(Gestion::class,'gestion_id');
    }


}
