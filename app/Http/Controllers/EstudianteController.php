<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\DataTables;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $estudiante = Estudiante::nombre($request->get('nombre'))->paginate(10);
//        return view('estudiante.index',compact('estudiante'));
        return view('estudiante.index');
    }
    public function data()
    {
        $builder = Estudiante::select('id','registro','nombre','apellido','sexo','carnet','ciciudad');
//        return Datatables::of(Estudiante::query()->select('nombre','apellido'))->make(true);
        return Datatables::of($builder)
            ->editColumn('sexo',function ($e){
                if ($e->sexo== 'F') return 'Femenino';
                else return 'Masculino';
            })
            ->addColumn('action',function ($estudiante){
                return '<a href="'.route('estudiante.edit',$estudiante->id).'"class="btn btn-xs btn-primary">
                        <i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->make(true);
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
        $estudiante->carrera_id= $request->get('carrera_id');
        if($estudiante->save()){
            return Redirect::back()->with('msj',1);;
        }else{
            return back()->with('msj','Error');
        };
//        $estudiante->save();
//        return redirect()->route('estudiante.show',['estudiante'=> $estudiante->id]);
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
        return view('pago.show', compact('estudiante'));
    }

    public function detallesPDF()
    {

        //return view()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carreras = Carrera::orderBy('nombre')->pluck('nombre','id');
        $estudiante = Estudiante::where('id',$id)->first();
        return view('estudiante.edit',compact('estudiante','carreras'));
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
        $estudiante = Estudiante::where('id',$id)->first();
        $estudiante->fill($request->all());
        $estudiante->save();
        return Redirect::back()->with('msj',2);
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
