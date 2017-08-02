<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {     
    return view('home');
});

Route::get('ruta', function(){
    return 'Probando ruta';
});

Route::resource('carrera', 'CarrerasController' );
Route::resource('docente','DocenteController');
Route::resource('estudiante','EstudianteController');
Route::resource('programa','ProgramaController');
Route::resource('materia','MateriaController');
Route::resource('gestion','GestionController');
Route::get('/listaTipoPrograma','MateriaController@listaTipoPrograma');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
