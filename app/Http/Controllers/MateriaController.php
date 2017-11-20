<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hola soy index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::orderBy('id')->pluck('nombre','id');
        return view('materia.create',compact('programas'));

    }

    public function listaTipoPrograma(Request $request)
    {
        $dat = Programa::select('nombre','id')
                ->where('tipo',$request->tipo)->get();
        return response()->json($dat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cantPro=Materia::where('programa_id',$request->get('programa_id'))->count();
        $tipoPro=Programa::select('tipo')->where('id',$request->get('programa_id'))->first();

        if (($tipoPro->tipo)=='Maestria' && $cantPro>17) return back()->with('msj','El programa elegido no puede tener mas de 18 materias');
        elseif (($tipoPro->tipo)=='Diplomado' && $cantPro>5) return back()->with('msj','El programa elegido no puede tener mas de 6 materias');
        elseif (($tipoPro->tipo)=='Especialidad' && $cantPro>11) return back()->with('msj','El programa elegido no puede tener mas de 12 materias');
        else {
            $materia= new Materia($request->all());
            if($materia->save()){
                return Redirect::back()->with('msj',1);;
            }else{
                return back()->with('msj','Error');
            };
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
        $materia = Materia::find($id);
        return view('materia.show', compact('materia'));
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
