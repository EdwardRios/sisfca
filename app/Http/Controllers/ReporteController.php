<?php

namespace App\Http\Controllers;
//require __DIR__ . '/vendor/autoload.php';
use App\Cuenta;
use PHPJasper\PHPJasper;
use App\Estudiante;
use App\Inscripcion;
use App\Materia;
use App\Oferta;
use App\Programa;
use App\User;
use Barryvdh\Debugbar\Middleware\Debugbar;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class ReporteController extends Controller
{

    public function crearCertificado()
    {
        $estudiante = Estudiante::fullName()->orderBy('id')->pluck('full_name','id');;
        return view('reporte.create',compact('estudiante'));
    }
    public function listaPrograma(Request $request){
        $programas = DB::table('programas')
                    ->join('cuentas','cuentas.programa_id','=','programas.id')
                    ->join('estudiantes','estudiantes.id','=','cuentas.estudiante_id')
                    ->where('estudiantes.id','=',$request->estudiante_id)
                    ->select('programas.id','programas.nombre')->get();
        return $programas;
    }

    public function listaProgramaMateria(Request $request)
    {
        $materias = DB::table('programas')
                    ->join('materias','programas.id','=','materias.programa_id')
                    ->where('programas.id','=',$request->programa_id)
                    ->select('materias.nombre','materias.id')->get();
        return $materias;
    }

    public function listaMateriaDocente(Request $request)
    {
        $docenteGestion= DB::table('ofertas')
                        ->join('materias','ofertas.materia_id','=','materias.id')
                        ->join('gestiones','ofertas.gestion_id','=','gestiones.id')
                        ->join('docentes','ofertas.docente_id','=','docentes.id')
                        ->where('ofertas.materia_id','=',$request->materia_id)
                        ->select('ofertas.id','docentes.nombre','docentes.apellido','gestiones.edicion','gestiones.version','gestiones.grupo',
                                    'gestiones.anho')->get();
        return $docenteGestion;
    }
    public function detallePDF(Request $request)
    {
        $estudiante = Estudiante::where('id',$request->estudiante_id)
                        ->select('nombre','apellido','carnet',
                                            'ciciudad','registro','carrera_id','ppg')->first();
        $programa= Programa::where('id',$request->programa_id)->first();
        $notas = DB::table('estudiantes')
                ->join('inscripciones','estudiantes.id','=','inscripciones.estudiante_id')
                ->join('ofertas','ofertas.id','=','inscripciones.oferta_id')
                ->join('materias','materias.id','=','ofertas.materia_id')
                ->where([['estudiantes.id','=',$request->estudiante_id],['materias.programa_id','=',$request->programa_id]])
                ->select('materias.codigo','materias.nombre','inscripciones.nota','ofertas.fecha_inicio','ofertas.fecha_fin')
                ->get();
        $fechaInicio = $notas->sortBy('fecha_inicio')->first()->fecha_inicio;//->fecha_inicio; //Obtengo la fecha de inicio del programa en base al primer modulo
        $fechaFin = $notas->sortByDesc('fecha_fin')->first()->fecha_fin; //Obtengo la fecha de inicio del programa en base al primer modulo
//
        $dateInicio = Date::createFromFormat('Y-m-d', $fechaInicio)->format('d \d\e F \d\e\l Y');
        $dateFin = Date::createFromFormat('Y-m-d', $fechaFin)->format('d \d\e F \d\e\l Y');

        $notaProA = $notas->sum('nota')/ $notas->count('nota');
        $notaA = (integer) round($notaProA);
        $notaB = $estudiante->ppg;
        $promedioA = (integer)round(($notaProA)*0.65);
        $promedioB=  (integer)round($estudiante->ppg * 0.35);
        $promedioTotal= $promedioA + $promedioB;
        $promedioLiteral= \NumeroALetras::convertir($promedioTotal);
        $fechaActual= Date::now();
        $dia= \NumeroALetras::convertir($fechaActual->day);
        $mes= $fechaActual->format('F');
        $anho= \NumeroALetras::convertir($fechaActual->year);
        $arrayFechaActual = [ $dia,$mes,$anho];
        $arrayPromedio = [ $promedioA,$promedioB,$promedioTotal , $notaA, $notaB, $promedioLiteral];
        $pdf = PDF::loadView('reporte.detallepdf', ['estudiante'=> $estudiante,
            'programa'=> $programa,
            'notas' => $notas,
            'promedios'=>$arrayPromedio,
            'fechainicio' => $dateInicio,
            'fechafin' => $dateFin,
            'fechaactual' => $arrayFechaActual
            ]);
        return $pdf->stream();
    }

    public function noDeudor(Request $request){
        $estudiante = Estudiante::fullName()->orderBy('id')->pluck('full_name','id');;
        return view('reporte.noDeudor',compact('estudiante'));
    }

    public function noDeudorPDF(Request $request)
    {
        $estudiante = Estudiante::where('id',$request->estudiante_id)
            ->select('nombre','apellido','carnet',
                'ciciudad','registro','carrera_id','ppg')->first(); //
        $programa= Programa::where('id',$request->programa_id)->first(); //ComboBox Programa obtener ID
        $gestion = DB::table('estudiantes')
            ->join('inscripciones','estudiantes.id','=','inscripciones.estudiante_id')
            ->join('ofertas','ofertas.id','=','inscripciones.oferta_id')
            ->join('materias','materias.id','=','ofertas.materia_id')
            ->join('gestiones','gestiones.id','=','ofertas.gestion_id')
            ->where([['estudiantes.id','=',$request->estudiante_id],['materias.programa_id','=',$request->programa_id]])
            ->select('gestiones.version','gestiones.anho','gestiones.edicion')
            ->first();//
        $dateNow= Date::now()->format('d \d\e F \d\e\l Y');
        $pdf = PDF::loadView('reporte.noDeudorPDF', ['estudiante'=> $estudiante,
            'programa'=> $programa,
            'gestion' => $gestion,
            'fecha' => $dateNow,
        ]);
        $monto_pagado = Cuenta::where([['estudiante_id', $request->estudiante_id],
                                    ['programa_id', $request->programa_id]])
                                    ->sum('monto_pagado');
        $monto_pagar = Cuenta::where([['estudiante_id', $request->estudiante_id],
                                    ['programa_id', $request->programa_id]])
                                    ->sum('saldo');

        if($monto_pagado >= $monto_pagar)
            return $pdf->stream();
        else
            return 'No se puede generar certificado tiene deudas pendientes , consulte con administracion';
    } //Generar PDF
    public function actaNotas(Request $request){
        $programa = Programa::pluck('nombre','id');
        return view('reporte.actaNotas',compact('programa'));
    }
    public function actaNotasPDF(Request $request)
    {
        $materia = Materia::where('id', $request->materia_id)->first();
        $oferta = Oferta::where('id',$request->docente_id)->first();
        $notas = Inscripcion::where('oferta_id',$request->docente_id)->get();
//        dd($notas);
        $aprobados = $notas->where('nota','>',63)->count('nota');
        $reprobados = $notas->where('nota','<',64)->count('nota');
        $inasistentes = $notas->where('nota','=',0)->count('nota');
        $dateNow= Date::now()->format('d \d\e F \d\e\l Y');
        $pdf = PDF::loadView('reporte.actaNotasPDF', [
            'notas'=> $notas,
            'materia' => $materia,
            'oferta' => $oferta,
            'fecha' => $dateNow,
            'aprobados' => $aprobados,
            'reprobados' => $reprobados,
            'inasistentes'=>$inasistentes
        ]);
        return $pdf->stream();
    }

    public function compilarJasperTest()
    {
        $input = base_path()  . '/vendor/geekcom/phpjasper/examples/hello_world.jrxml';
        //$output = __DIR__ . '/vendor/geekcom/phpjasper/examples';

//        dd($input);
        $jasper = new PHPJasper();
        $jasper->compile($input)->execute();
        return 'compilado';
    }

    public function procesarJasperTest()
    {
        $input =base_path() . '\public\reportes\test.jasper';
        $output = base_path()  . '\public\reportes';
        $options = [
            'format' => ['pdf'],
            'locale' => 'es',
            'params' => ['id_estudiante' => 1],
            'db_connection' => [
                'driver' => 'postgres',
                'username' => 'postgres',
                'password' => 'edward',
                'host' => 'localhost',
                'database' => 'dbagricolas',
                'port' => '5432'
            ]
        ];

        $jasper = new PHPJasper();

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
    }

    public function reportePagoPrograma()
    {
        $programa = Programa::pluck('nombre','id');
        return view('reporte.pagosProgramas',compact('programa'));
    }

    public function procesarPagoPrograma(Request $request)
    {
        $input =base_path() . '\public\reportes\pago_programa.jasper';
        $output = base_path()  . '\public\reportes';
        $options = [
            'format' => ['pdf'],
            'locale' => 'es',
            'params' => ['programa_id' => $request->programa],
            'db_connection' => [
                'driver' => 'postgres',
                'username' => 'postgres',
                'password' => 'edward',
                'host' => 'localhost',
                'database' => 'dbagricolas',
                'port' => '5432'
            ]
        ];

        $jasper = new PHPJasper();

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
        //dd($jasper);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($output.'\pago_programa.pdf','Reporte.pdf',$headers)->deleteFileAfterSend(true);
    }
}
