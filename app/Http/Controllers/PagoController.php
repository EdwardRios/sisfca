<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Estudiante;
use App\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $pago = new Pago($request->all());
        if ($pago->save())
            return back()->with('msj','Registro Exitoso');
        else
            return back()->with('msj','Registro Exitoso');

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
            ->where('cuentas.programa_id',$request->programa_id)
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
