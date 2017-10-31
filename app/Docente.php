<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Docente extends Model
{
    protected $dates = ['fechanac'];
    protected $fillable =[
        'codigo',
        'carnet',
        'ciciudad',
        'nombre',
        'apellido',
        'fechanac',
        'sexo',
        'grado',
        'telefono',
        'email',
        'domicilio',
    ];

    public function materias()
    {
        return $this->belongsToMany('\App\Materia','ofertas')
                    ->withPivot('gestion_id','fecha_inicio','fecha_fin');
    }
    public function gestiones()
    {
        return $this->belongsToMany('\App\Gestion','ofertas')
            ->withPivot('materia_id','fecha_inicio','fecha_fin');
    }
    public function scopeNombre($query,$search)
    {
        $searchUp = strtoupper($search);
        if (trim($search)!=""){
            $query->where(DB::raw('upper(nombre)'),"LIKE","%".$searchUp."%")
                    ->orWhere(DB::raw('CAST(codigo AS text)'),"LIKE","%".$search."%")
                    ->orderBy('nombre')->paginate(10);
        }
    }
    public function setFechanacAttribute($value)
    {
        $this->attributes['fechanac'] = Carbon::createFromFormat('d/m/Y', $value);
    }


    public function scopeFullName($query)
    {
        $query->select(DB::raw("CONCAT(nombre ,' ', apellido) as full_name"),'id');
    }
}