<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['carnet','registro','nombre',
                            'apellido','sexo','fechanac',
                            'email','domicilio','id_carrera','ciciudad',
                            'fechaegresado','ppg'];
    
    public function infoEstudiante(){        
          return $this->belongsTo(Carrera::class,'id_carrera');;
    }



}
