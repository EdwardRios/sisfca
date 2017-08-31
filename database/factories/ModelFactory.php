<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Docente::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->unique()->randomNumber(4),
        'carnet' => $faker->unique()->randomNumber(6),
        'ciciudad' => $faker->randomElement(
            $array = array ('Santa Cruz','Cochabamba','Oruro','Tarija','Chuquisaca','Beni'.'Potosi','Pando','La Paz')
        ),
        'nombre'=> $faker->firstName,
        'apellido'=> $faker->lastName,
        'fechanac' => $faker->date(),
        'sexo' => $faker->randomElement($array = array('M','F')),
        'grado' =>$faker->randomElement($array = array('Diplomado','Especialidad','Maestria','Doctorado')),
        'telefono' => $faker->numberBetween($min = 60000000, $max = 79999999),
        'email' =>$faker->email,
        'domicilio'=>$faker->address
    ];
});
//Seeder Estudiante
$factory->define(App\Estudiante::class, function (Faker\Generator $faker) {
    return [
        'carnet' => $faker->unique()->randomNumber(6),
        'registro' => $faker->unique()->randomNumber(8),
        'ciciudad' => $faker->randomElement(
        $array = array ('Santa Cruz','Cochabamba','Oruro','Tarija','Chuquisaca','Beni','Potosi','Pando','La Paz')
        ),
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'sexo'=> $faker->randomElement($array = array('M','F')),
        'fechanac' => $faker->date(),
        'telefono' => $faker->numberBetween(60000000,79999999),
        'email' => $faker->email,
        'domicilio'=> $faker->address,
        'fechaegresado' =>$faker->date(),
        'ppg'=>$faker->numberBetween(50,100),
        'carrera_id'=>$faker->numberBetween(1,5)
    ];
});