<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for ($i=0;$i<=30;$i++){
            $id= \DB::table('cuentas')->insertGetId(array(
            'monto_programa' => 8000,
            'descuento' => 0,
            'materias_reprobadas'=>0,
            'monto_pagado' => 1500,
            'saldo' => $faker->numberBetween(300, 500),
            'programa_id' => 12,
            'estudiante_id'=> $faker->numberBetween(30, 120),
            'certificado_nota' =>0,
            'certificado_no_deudor'=>0
            ));
            for ($j=1;$j<=3;$j++){
                \DB::table('pagos')->insert(array(
                'cuenta_id' => $id,
                'nro_deposito' => $faker->numberBetween(100000,252222),
                'fecha_deposito' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
                'monto' => $faker->numberBetween(100,300),
                'glosa' => 'Pago diplomado'  //Ver el tema de la fecha
                ));
            }

        }
    }
}
