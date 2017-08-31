<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombre=[
            'Biologia',
            'Ciencias Ambientales',
            'Ingenieria Agricola',
            'Ingenieria Agronomica',
            'Ingenieria Forestal'
        ];
        foreach ($nombre as $n){
            $carrera = \App\Carrera::create([ 'nombre' => $n]);
        }
    }
}
