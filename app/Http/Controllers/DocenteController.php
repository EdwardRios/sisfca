<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Http\Requests\StoreDocente;
use App\Http\Requests\UpdateDocente;
use App\Programa;
use Illuminate\Support\Facades\Redirect;
use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Docente;
use Yajra\DataTables\DataTables;

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
	public function index(Request $request)
	{
		$docentes = Docente::nombre($request->get('nombre'))->orderBy('id','desc')->paginate(10);
		return view('docente.index',compact('docentes'));

	}
    public function data()
    {
        $builder = Docente::select('id','codigo','nombre','apellido','sexo','carnet','grado');
//        return Datatables::of(Estudiante::query()->select('nombre','apellido'))->make(true);
        return DataTables::of($builder)
            ->editColumn('sexo',function ($e){
                if ($e->sexo== 'F') return 'Femenino';
                else return 'Masculino';
            })
            ->addColumn('action',function ($docente){
                return '<a href="./docente/'.$docente->id.'/edit"class="btn btn-success">
                        <i class="glyphicon glyphicon-edit"></i> Editar</a>&nbsp;&nbsp;<a href="./docente/'.$docente->id.'" class="btn btn-primary">
                        <i class="glyphicon glyphicon-edit"></i> Ver mas</a>';
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
//        dd($docente);
		if ($docente->save()){
            return Redirect::back()->with('msj',1);
        }else{
            return Redirect::back()->with('msj',2);
        };
//		return redirect()->route('docente.show', ['docente' => $docente->id]);
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
		$docente = Docente::where('id',$id)->first();
		return view('docente.edit',compact('docente'));
	}
    /**
     * Update the specified resource in storage.
     *
     * @param StoreDocente|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
	public function update(UpdateDocente $request, $id)
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
