<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Estudiante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DebugBar;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CuentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cuenta.index');
    }
    
    public function studentAccountTable()
    {
        $builder = Estudiante::select('id','registro','nombre','apellido','carnet');
//        return Datatables::of(Estudiante::query()->select('nombre','apellido'))->make(true);
        return DataTables::of($builder)
            ->addColumn('action',function ($estudiante){
                return '<a href= " '.route('cuenta.show',$estudiante->id).'" class="btn btn-sm btn-primary" >
                        VER CUENTA</a>&nbsp;&nbsp;
                        <a href= " #" class="btn btn-sm btn-success" >
                        REGISTRAR PAGO</a>&nbsp;&nbsp;
                        <a href= " #" class="btn btn-sm btn-success" >
                           ASIGNAR DESCUENTO</a>
                        ';
            })
//            ->addColumn('action2',function ($d){
//                return '';
//            })
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        $cuenta = Cuenta::where('estudiante_id',$id)->get();
        return view('cuenta.show', compact('estudiante','cuenta'));
    }

    public function datosCuenta(Request $request)
    {
        $datos = DB::table('cuentas')
            ->where('id','=',$request->cuenta)
            ->select('descuento','materias_reprobadas','monto_pagado','saldo','doc_respaldo')
            ->get();
        return $datos;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function estadoCuenta()
    {
        $estudiantes = Estudiante::fullName()->orderBy('id')->pluck('full_name','id');
        return view('cuenta.estadoCuenta',compact('estudiantes'));
    }

    public function listaEstudiantePrograma(Request $request)
    {
        $datos = DB::table('cuentas')
            ->join('programas','programas.id','=','cuentas.programa_id')
            ->join('gestiones','gestiones.id','=','cuentas.gestion_id')
            ->where('cuentas.estudiante_id','=',$request->estudiante_id)
            ->select('gestiones.anho','gestiones.edicion','gestiones.version','gestiones.grupo','programas.nombre','cuentas.id')
            ->get();
        return $datos;
    }

    public function asignarDescuento()
    {
        $estudiantes = Estudiante::fullName()->orderBy('id')->pluck('full_name','id');
        return view('cuenta.descuento',compact('estudiantes'));
    }

    public function confirmarDescuento(Request $request)
    {
        $cuenta = Cuenta::where('id',$request->get('programa_id'))->first();
        if($request->get('descuento')=='otro') {
            $desc = $request->get('descuentotxt');
            $cuenta->descuento = $desc; //Asignar descuento
            $cuenta->saldo = $cuenta->monto_programa - ($cuenta->monto_programa*$desc)/100;
            $cuenta->descripcion_descuento = $request->get('descuentoDescripcion');
        }else{
            if($request->get('descuento') == 'quince1'){
                $cuenta->descuento = 15;
                $cuenta->descripcion_descuento = "Descuento por inscripcion corporativa";
                $cuenta->saldo = $cuenta->monto_programa - ($cuenta->monto_programa*100)/15;
            }elseif ($request->get('descuento') == 'quince2'){
                $cuenta->descuento = 15;
                $cuenta->descripcion_descuento = "Trabajo en institucion publica";
                $cuenta->saldo = $cuenta->monto_programa - ($cuenta->monto_programa*100)/15;
            }elseif ($request->get('descuento') == 30){
                $cuenta->descuento = 30;
                $cuenta->descripcion_descuento = "Graduado por buen desempeño (Resolucion Vicerrectorado)";
                $cuenta->saldo = $cuenta->monto_programa - ($cuenta->monto_programa*30)/100;
            }elseif ($request->get('descuento') == 50){
                $cuenta->descuento = 50;
                $cuenta->descripcion_descuento = "Educacion Continua (Resolucion Vicerrectorado)";
                $cuenta->saldo = $cuenta->monto_programa - ( $cuenta->monto_programa* 50 )/ 100;

            }elseif ($request->get('descuento') == 100){
                $cuenta->descuento = 100;
                $cuenta->descripcion_descuento = "Graduado por Excelencia (Resolucion Vicerrectorado)";
                $cuenta->saldo = $cuenta->monto_programa - ( $cuenta->monto_programa * 100)/100;
            }
//                $descf= $request->get('descuento');
//            $cuenta->descuento = $descf; //A signar descuento
            //Colocar archivos
        }
        $archivo =  $request->file('comprobante'); //Obtengo el archivo\
        $nombreArchivo = $archivo->getClientOriginalName();
        $idEstudiante = $cuenta->estudiante_id;
        $rutaArchivo = Storage::disk('archivos')->putFileAs('descuentos', $archivo, $idEstudiante.'-'.$nombreArchivo);
        $ruta = storage_path($rutaArchivo);
        \Debugbar::info($rutaArchivo);
        \Debugbar::info($ruta);
        $cuenta->doc_respaldo = $idEstudiante.'-'.$nombreArchivo;
        $cuenta->save();
        return Redirect::back();
    }

    public function descargarArchivo($archivo)
    {
            return response()->download(storage_path('archivos/descuentos/' . $archivo), null, [], null);
    }
}
