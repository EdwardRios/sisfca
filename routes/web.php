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
    if (Auth::check()){
        return view('home');
    }else{
        return view('auth.login');
    }
});
Route::get('dash',function (){
   return view('login');
});

Route::resource('carrera', 'CarrerasController' );
//Rutas Docente
Route::resource('docente','DocenteController');
Route::get('/docenteTable', 'DocenteController@data');
Route::get('docentes/{archivo}', 'DocenteController@descargarCurriculum')->where('archivo', '^[^/]+$');
//Rutas Estudiante
Route::resource('estudiante','EstudianteController');
Route::get('/studentTable', 'EstudianteController@data');
Route::get('/compilar','ReporteController@compilarJasperTest');
Route::get('/procesar','ReporteController@procesarJasperTest');

Route::resource('programa','ProgramaController');
Route::get('/programTable','ProgramaController@programTable');
Route::resource('materia','MateriaController');
Route::resource('gestion','GestionController');
Route::resource('oferta','OfertaController');
Route::resource('inscripcion','InscripcionController');
//Cuenta y Descuentos
Route::resource('cuenta','CuentaController');
Route::get('/accountTable','CuentaController@studentAccountTable');
Route::get('/estadoCuenta','CuentaController@estadoCuenta')->name('estadoCuenta');
Route::get('/asignarDescuento','CuentaController@asignarDescuento')->name('asignarDescuento');
Route::post('/confirmarDescuento','CuentaController@confirmarDescuento')->name('confirmarDescuento');
Route::get('descuento/{archivo}', 'CuentaController@descargarArchivo')->where('archivo', '^[^/]+$');
Route::get('/listaEstudiantePrograma','CuentaController@listaEstudiantePrograma');

Route::resource('pago','PagoController');
Route::get('/nota/lista','InscripcionController@listaNota')->name('nota.lista');
////Route::get('/pago/crear/{id}','PagoController@createPago')->name('pago.crear');
Route::get('/pagoscrear','PagoController@createPago')->name('pagos.crear');
Route::get('/estudiante/student-data', 'EstudianteController@studentTable');
Route::get('/reporte/certificado','ReporteController@crearCertificado')->name('reporte.certificado');
Route::post('/reporte/certificadoPDF','ReporteController@detallePDF')->name('certificadoPDF');
Route::get('/reporte/noDeudor','ReporteController@noDeudor')->name('reporte.noDeudor');
Route::post('/reporte/noDeudorPDF','ReporteController@noDeudorPDF')->name('noDeudorPDF');
Route::get('/reporte/actaNotas','ReporteController@actaNotas')->name('reporte.actaNotas');
Route::post('/reporte/actaNotasPDF','ReporteController@actaNotasPDF')->name('actaNotasPDF');
Route::get('/reporte/pagosProgramas','ReporteController@reportePagoPrograma')->name('pagosProgramas');
Route::post('/reporte/pagosProgramasFile','ReporteController@procesarPagoPrograma')->name('procesarPagosProgramas');


Route::get('/listaPrograma','ReporteController@listaPrograma');
Route::get('/listaMateriaDocente','ReporteController@listaMateriaDocente');
Route::get('/listaProgramaMateria','ReporteController@listaProgramaMateria');
Route::get('/listaTipoPrograma','MateriaController@listaTipoPrograma');
Route::get('/listaGestionPrograma','InscripcionController@listaGestionPrograma');
Route::get('/listaMateria','InscripcionController@listaMateria');
Route::get('/datosCuenta','CuentaController@datosCuenta');
Route::get('/listaGestionMateria','InscripcionController@listaGestionMateria');
Route::get('/listaEstudiantes','InscripcionController@listaEstudiantes');
Route::get('/listaDetallePago','PagoController@listaDetallePago');
Route::get('notas/create','InscripcionController@crearNotas');
Route::post('notas/regnotas',['as' => 'notas.regNotas', 'uses' => 'InscripcionController@registrarNotas']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
