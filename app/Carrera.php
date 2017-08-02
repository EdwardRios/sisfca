<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = ['nombre'];
    public $timestamps = false;


    public function estudiante (){
        return $this->hasMany(Estudiante::class,'id_carrera');
    }     
}
