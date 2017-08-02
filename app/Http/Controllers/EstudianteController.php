<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
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
        $carreras = Carrera::orderBy('nombre')->pluck('nombre','id');
        return view('estudiante.create',compact('carreras'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiante();
        $estudiante->registro = $request->get('registro');
        $estudiante->carnet = $request->get('carnet');
        $estudiante->ciciudad= $request->get('ciciudad');
        $estudiante->nombre = $request->get('nombre');
        $estudiante->apellido = $request->get('apellido');
        $estudiante->sexo = $request->get('sexo');
        $estudiante->fechanac = $request->get('fechanac');
        $estudiante->telefono = $request->get('telefono');
        $estudiante->email= $request->get('email');
        $estudiante->domicilio= $request->get('domicilio');
        $estudiante->fechaegresado= $request->get('fechaegresado');
        $estudiante->ppg= $request->get('ppg');
        $estudiante->id_carrera= $request->get('id_carrera');
        $estudiante->save();
        return redirect()->route('estudiante.show',['estudiante'=> $estudiante->id]);
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
        return view('estudiante.show', compact('estudiante'));
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
