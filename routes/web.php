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
Route::resource('oferta','OfertaController');
Route::resource('inscripcion','InscripcionController');
Route::resource('cuenta','CuentaController');
Route::get('/pago/crear/{id}','PagoController@createPago')->name('pago.crear');;
Route::resource('pago','PagoController');

Route::get('/listaTipoPrograma','MateriaController@listaTipoPrograma');
Route::get('/listaGestionPrograma','InscripcionController@listaGestionPrograma');
Route::get('/listaMateria','InscripcionController@listaMateria');
Route::get('/listaGestionMateria','InscripcionController@listaGestionMateria');
Route::get('/listaEstudiantes','InscripcionController@listaEstudiantes');
Route::get('/listaDetallePago','PagoController@listaDetallePago');
Route::get('notas/create','InscripcionController@crearNotas');
Route::post('notas/regnotas',['as' => 'notas.regNotas', 'uses' => 'InscripcionController@registrarNotas']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
