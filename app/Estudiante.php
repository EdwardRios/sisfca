<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Estudiante extends Model
{
    protected $dates= ['fechanac','fechaegresado'];
    protected $fillable = ['carnet','registro','nombre',
                            'apellido','sexo','fechanac',
                            'email','domicilio','carrera_id','ciciudad',
                            'fechaegresado','ppg'];
    
    public function carreras(){
          return $this->belongsTo(Carrera::class,'carrera_id');;
    }
    public function scopeNombre($query,$search)
    {
        $searchUp = strtoupper($search);
        if (trim($search)!="") {
            $query->where(DB::raw('upper(nombre)'), "LIKE", "%" . $searchUp . "%")
                ->orWhere(DB::raw('CAST(registro AS text)'), "LIKE", "%" . $search . "%")
                ->orderBy('nombre');
        }
    }
    public function scopeFullName($query)
    {
        $query->select(DB::raw("CONCAT(nombre ,' ', apellido) as full_name"),'id');
    }
    public function setFechanacAttribute($value)
    {
        $this->attributes['fechanac'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    public function setFechaegresadoAttribute($value){
        $this->attributes['fechaegresado'] = Carbon::createFromFormat('d/m/Y', $value);
    }


}
