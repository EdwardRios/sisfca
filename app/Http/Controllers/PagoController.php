<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Estudiante;
use App\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\ElasticSearchHandler;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function createPago($id)
    {
        $estudiante = Estudiante::find($id);
        $cuentas = Cuenta::orderBy('id')->where('estudiante_id',$id)->get();
        return view('pago.crear',compact('estudiante','cuentas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtener id de la cuenta para que sume a su saldo
        $pago = new Pago();
        $cuenta = Cuenta::where('id',$request->get('cuenta_id'))->first();
        $sum = 0;
        $pago->nro_deposito = $request->get('nro_deposito');
        $pago->fecha_deposito = $request->get('fecha_deposito');
        $pago->cuenta_id = $request->get('cuenta_id');
        $pago->monto = $request->get('monto');
        if (($request->get('glosa'))=='nota'){
            $pago->glosa = 'Certificado de notas';
            $cuenta->certificado_nota = $request->get('monto');
        }elseif ($request->get('glosa')=='nodeudor'){
            $pago->glosa = 'Certificado de No Deudor';
            $cuenta->certificado_no_deudor = $request->get('monto');
        }elseif ($request->get('glosa')== 'otro') {
            $pago->glosa = $request->get('glosatxt');
            $sum = $cuenta->monto_pagado;
            $cuenta->monto_pagado= $sum + $request->get('monto');
        }

        if ($pago->save()) {
            $cuenta->save();
            return back()->with('msj', 'Registro Exitoso');
        }else
            return back()->with('msj','Error al guardar datos');

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

    public function listaDetallePago(Request $request)
    {
        $pagos = DB::table('pagos')
            ->join('cuentas','cuentas.id','=','pagos.cuenta_id')
            ->where('cuentas.estudiante_id', $request->estudiante_id)
            ->where('cuentas.id',$request->cuentaid)
            //->where('cuentas.id',$request->cuenta_id)
            ->select('pagos.*')
            ->get();

        return response()->json($pagos);
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
        //
    }
}

