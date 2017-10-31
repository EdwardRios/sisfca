<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Estudiante;
use DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CuentaController extends Controller
{
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
                        VER CUENTA</a>&nbsp;&nbsp;<a href= " '.route('pago.crear',$estudiante->id).'" class="btn btn-sm btn-success" >
                        REGISTRAR PAGO</a>';
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
            ->select('descuento','materias_reprobadas','monto_pagado','saldo')
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
}
