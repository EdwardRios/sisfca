<?php

use Illuminate\Database\Seeder;

class ProgramasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programas=[
            ['codigo'=>'1291','nombre'=>'Manejo de Frutales de Clima Templado','tipo'=>'Diplomado'],
            ['codigo'=>'1292','nombre'=>'Produccion Agricola','tipo'=>'Diplomado'],
            ['codigo'=>'1293','nombre'=>'Sistemas de informacion geografica y percepcion remota','tipo'=>'Diplomado'],
            ['codigo'=>'1294','nombre'=>'Gestion Territorial y Areas Protegidas','tipo'=>'Diplomado'],
            ['codigo'=>'1295','nombre'=>'Educacion Ambiental','tipo'=>'Diplomado'],
            ['codigo'=>'1281','nombre'=>'Evaluacion de impacto Ambiental','tipo'=>'Diplomado'],
            ['codigo'=>'1282','nombre'=>'Plantaciones Forestales','tipo'=>'Diplomado'],
            ['codigo'=>'1283','nombre'=>'Sistemas de informacion geografica y teledecteccion aplicada al medio ambiente','tipo'=>'Maestria'],
            ['codigo'=>'1284','nombre'=>'Proteccion integral de cultivos','tipo'=>'Maestria'],
            ['codigo'=>'1285','nombre'=>'Gestion de agua y suelo','tipo'=>'Maestria'],
            ['codigo'=>'1286','nombre'=>'Manejo de recursos naturales y medio ambiente','tipo'=>'Maestria'],
        ];
        foreach ($programas as $p){
           \App\Programa::create($p);
        }
    }
}
