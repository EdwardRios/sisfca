<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Estudiante;
use App\Http\Requests\InscripcionesRequest;
use App\Inscripcion;
use App\Materia;
use App\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('oferta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::fullLastName()->orderBy('id')->pluck('full_last_name','id');
        $programas = Programa::orderBy('id')->pluck('nombre','id');
//    $gestiones = Gestion::orderBy('id')->get();
        return view('inscripcion.create',compact('programas','estudiantes','gestiones'));
    }
    public function listaGestionPrograma(Request $request)
    {
        $grupos = DB::table('gestiones')
            ->join('ofertas','gestiones.id','=','ofertas.gestion_id')
            ->join('materias','materias.id','=','ofertas.materia_id')
            ->where('materias.programa_id', $request->programa_id)
            ->select('gestiones.id','gestiones.anho','gestiones.edicion','gestiones.version','gestiones.grupo')
            ->distinct()->get();
        return $grupos;
    }
    public function listaGestionMateria(Request $request)
    {
    $grupos = DB::table('gestiones')
        ->join('ofertas','gestiones.id','=','ofertas.gestion_id')
        ->join('materias','materias.id','=','ofertas.materia_id')
        ->where('ofertas.materia_id', $request->materia_id)
        ->select('gestiones.id','gestiones.anho','gestiones.edicion','gestiones.version','gestiones.grupo')
        ->get();

    return response()->json($grupos);
    }
    public function listaEstudiantes(Request $request)
    {
        $grupos = DB::table('estudiantes')
            ->join('inscripciones','estudiantes.id','=','inscripciones.estudiante_id')
            ->join('ofertas','ofertas.id','=','inscripciones.oferta_id')
            ->join('docentes','docentes.id','=','ofertas.docente_id')
            ->where('ofertas.gestion_id','=', $request->gestion_id)
            ->where('ofertas.materia_id','=', $request->materia_id)
            ->select('inscripciones.oferta_id', 'estudiantes.nombre',
                'estudiantes.apellido','estudiantes.registro',
                'inscripciones.nota','docentes.nombre as docente','inscripciones.estudiante_id','inscripciones.nota')
            ->get();

        return response()->json($grupos);
    }

    public function listaMateria(Request $request)
    {
        $materias = DB::table('materias')
        ->join('ofertas','materias.id','=','ofertas.materia_id')
        ->join('gestiones','gestiones.id','=','ofertas.gestion_id')
//        ->where([['materias.id_programa','=', $request->id],['ofertas.gestion_id','=',$request->gestionid],])
//        ->select('materias.nombre')
        ->where('materias.programa_id','=', $request->id)
        ->where('ofertas.gestion_id','=',$request->gestion_id)
            ->select('ofertas.id','materias.nombre','materias.nivel')
            ->get();
        return response()->json($materias);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $estudiante= $request->get('estudiante_id');
            $materiasOfertadas= $request->get('oferta_id'); //Obtiene el array de las ofertas_id
            $arrayCheck = $request->get('approved'); //Obtiene el array de las materias tickeadas
            $cantPrograma = DB::table('cuentas')
                            ->join('programas','programas.id','=','cuentas.programa_id')
                            ->where([['cuentas.estudiante_id','=',$request->get('estudiante_id')],
                                     ['programas.id','=',$request->get('programa_id')]])
                            ->count(); //Para obtener datos si tiene modulos inscritos
            $tipoPrograma = DB::table('programas')
                            ->where('id',$request->get('programa_id'))
                            ->value('tipo');
            foreach ($arrayCheck as $a){
                    $inscripcion = new Inscripcion();
                    $inscripcion->estudiante_id = $estudiante;
                    $inscripcion->oferta_id= $a;
                    $inscripcion->save();
            }
            //Crear cuenta del estudiante
            $getAccount = Cuenta::where([['estudiante_id','=',$estudiante],
                                         ['programa_id','=',$request->get('programa_id')],
                                         ['gestion_id','=',$request->get('gestion_id')]
                                        ])->first();
            if(is_null($getAccount)) { //No tiene modulos inscritos en este programa y gestion
                $account = new Cuenta();
                $account->estudiante_id = $estudiante;
                $account->programa_id = $request->get('programa_id');
                $account->gestion_id = $request->get('gestion_id');
                $account->descuento = 0 ;
                if ($tipoPrograma == 'Diplomado') {
                    $account->monto_programa = 8000;
                    $account->saldo = 8000;
                }
                elseif ($tipoPrograma == 'Maestria') {
                    $account->monto_programa = 21000;
                    $account->saldo = 21000;
                }
                elseif ($tipoPrograma == 'Especialidad') {
                    $account->monto_programa = 12000;
                    $account->saldo = 12000;
                }
                $account->save();
            }
            DB::commit();
            return back()->with('msj','Inscripcion registrado exitosamente');
        }catch (\exception $e){
            DB::rollback();
            return back()->with('msj','Error al registrar datos : Datos ingresados ya existen');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function crearNotas(){
        $programas= Programa::orderBy('id')->pluck('nombre','id');//
        $materias = Materia::orderBy('id')->pluck('nombre','id');//
        return view('notas/create',compact('materias','programas'));
    }

    public function registrarNotas(Request $request)
    {
        try{
            DB::beginTransaction();
            $arrayEstudiante= $request->get('estudianteid');
            $arrayOfertas= $request->get('ofertaid'); //Obtiene el array de las ofertas_id
            $arrayNotas = $request->get('notas'); //Obtiene el array de los estudiantes
            $materia_id = $request->get('materia_id'); //Obtengo id del modulo del form
            $gestion_id = $request->get('gestion_id');  //Obtenfo el id de la gestion
            $cont=0;
            foreach($arrayNotas as $nota){
                $inscripcion = Inscripcion::where([['oferta_id','=',$arrayOfertas[$cont]],
                                                   ['estudiante_id','=',$arrayEstudiante[$cont]]])->first();
                $inscripcion->nota = $nota;
                //Quitar descuento
                if ($nota < 64){
                    $programaId = DB::table('materias')
                                    ->where('id',$materia_id)
                                    ->value('programa_id'); //Obtener el programa de la materia
                    $cuentaEstudiante = Cuenta::where([['estudiante_id','=', $arrayEstudiante[$cont]],
                                                        ['programa_id','=',$programaId],
                                                        ['gestion_id','=',$gestion_id]
                                                        ])->first();
                    \Debugbar::info($cuentaEstudiante);
                    $saldo = Cuenta::where([['estudiante_id','=', $arrayEstudiante[$cont]],
                                            ['programa_id','=',$programaId],
                                            ['gestion_id','=',$gestion_id]])->value('saldo');
                    $matReprobada = DB::table('cuentas')
                                        ->where([['estudiante_id','=', $arrayEstudiante[$cont]],
                                                 ['programa_id','=',$programaId],
                                                  ['gestion_id','=',$gestion_id]])
                                        ->value('materias_reprobadas');
                    \Debugbar::info('Datos matreprobada:'.$matReprobada);
//                    dd($matReprobada);
                    $tipoPrograma = DB::table('programas')
                                    ->join('materias','materias.programa_id','=','programas.id')
                                    ->where('materias.id',$materia_id)
                                    ->value('tipo');
                    $descuento = DB::table('cuentas')->where([['estudiante_id','=', $arrayEstudiante[$cont]],
                                                              ['programa_id','=',$programaId],
                                                                ['gestion_id','=',$gestion_id]])
                                                                ->value('descuento');
                    $matReprobada = $matReprobada + 1;
                    if($matReprobada == 1 && $descuento > 0 ){
                        $nivelMateria = DB::table('materias')->where('id',$materia_id)->value('nivel');
                        \Debugbar::info($nivelMateria);
                        if ($tipoPrograma == 'Diplomado'){
                            $saldoDescuento = ((8000-((8000*$descuento)/100))/ 6 )* ($nivelMateria-1);
                            $saldoRestante = (8000/ 6 )* (7- $nivelMateria);
                            $saldo = $saldoDescuento + $saldoRestante;
                            $saldo = round($saldo,2);
                        }elseif ($tipoPrograma == 'Maestria'){
                            $saldoDescuento = ((8000-((8000*$descuento)/100))/ 18 )* ($nivelMateria-1);
                            $saldoRestante = (8000/18)* (19 - $nivelMateria);
                            $saldo = $saldoDescuento + $saldoRestante;
                            $saldo = round($saldo,2);
                        }elseif ($tipoPrograma == 'Especialidad'){
                            $saldo = (8000-((8000*$descuento)/100))/ (6 * ($nivelMateria-1));
                        }
                        $cuentaEstudiante->descuento=0;
                    }
//                    if($tipoPrograma == 'Diplomado') $saldo = $saldo + (1333.4 * $matReprobada);
//                    elseif ($tipoPrograma == 'Maestria') $saldo = $saldo + (1166.7 * $matReprobada);
//                    elseif ($tipoPrograma == 'Especialidad') $saldo = $saldo + (1000 * $matReprobada);
                    $cuentaEstudiante->materias_reprobadas = $matReprobada;
                    $cuentaEstudiante->saldo = $saldo;
                    $cuentaEstudiante->save();
                }
                //Aumentar materia reprobada
                //Realizar Ajuste
                $inscripcion->save();
                $cont=$cont+1;
            }
            DB::commit();
            return 'Hola';
//            return back()->with('msj','Registro Exitoso');
        }catch (\exception $e){
            DB::rollback();
            \Debugbar::error($e);
//            return back()->with('msj','Error al registrar datos : Datos ingresados ya existen');
            return 'Error';
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listaNota()
    {
        $programas = Programa::orderBy('id')->pluck('nombre','id');
        return view('notas.lista',compact('programas'));
    }
}
