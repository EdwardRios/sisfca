<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
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

}