<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocente;
use Illuminate\Http\Request;
use App\Docente;
class DocenteController extends Controller
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
		$docentes = Docente::orderBy('nombre')->get();
		return view('docente.index',compact('docentes'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('docente.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDocente|Request $request
     * @return \Illuminate\Http\Response
     */
	public function store(StoreDocente $request)
	{

		$docente = new Docente($request->all());
//		$docente->codigo= $request->get('codigo');
//		$docente->nombre= $request->get('nombre');
//		$docente->apellido = $request->get('apellido');
//		$docente->carnet = $request->get('carnet');
//		$docente->ciciudad = $request->get('ciciudad');
//		$docente->fechanac = $request->get('fechanac');
//		$docente->sexo = $request->get('sexo');
//		$docente->grado = $request->get('grado');
//		$docente->telefono = $request->get('telefono');
//		$docente->email = $request->get('email');
//		$docente->domicilio = $request->get('domicilio');
		$docente->save();
		return redirect()->route('docente.show', ['docente' => $docente->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$docente = Docente::find($id);

		return view('docente.show', compact('docente'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$docente = Docente::where('id',$id)
            ->first();
		return view('docente.edit',compact('docente'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param StoreDocente|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
	public function update(StoreDocente $request, $id)
	{
        $docente = Docente::where('id',$id)->first();
        $docente->fill($request->all());
        $docente->save();
        return redirect()->route('docente.show',$docente);

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
