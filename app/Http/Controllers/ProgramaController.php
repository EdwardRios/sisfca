<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramaRequest;
use App\Http\Requests\UpdateProgramaRequest;
use App\Materia;
use App\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::orderBy('tipo')->get();
        return view('programa.index',compact('programas'));
    }

    public function programTable()
    {
        $builder = Programa::select('id','codigo','nombre','tipo');
//        return Datatables::of(Estudiante::query()->select('nombre','apellido'))->make(true);
        return DataTables::of($builder)
            ->addColumn('action',function ($programa){
                return '<a href="'.route('programa.show',$programa->id).'"class="btn btn-xs btn-primary" style="font-size: 16px">
                        <i class="glyphicon glyphicon-edit"></i> Ver mas </a>&nbsp;
                        <a href="'.route('programa.edit',$programa->id).'"class="btn btn-xs btn-success" style="font-size: 16px">
                        <i class="glyphicon glyphicon-edit"></i> Editar </a>';
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
        return view('programa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramaRequest $request)
    {
        $programa = new Programa($request->all());
        $programa->save();
        return redirect()->route('programa.show',['programa'=>($programa->id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programa = Programa::find($id);
        $materia = Materia::select('nombre','nivel')->where('programa_id',$id)->get();
        $datosPrograma = DB::table('ofertas as o')
                        ->join('materias as m','m.id','=','o.materia_id')
                        ->join('gestiones as g','g.id','=','o.gestion_id')
                        ->join('docentes as d','d.id','=','o.docente_id')
                        ->where('m.programa_id','=', $id)
                        ->select('d.nombre as docente','d.apellido','m.nombre as modulo','g.grupo',
                                    'g.anho','g.version','g.edicion','o.fecha_inicio','o.fecha_fin')
                        ->get();
        return view('programa.show',compact('programa','materia','datosPrograma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = Programa::find($id);

        return view('programa.edit',compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramaRequest $request, $id)
    {
        $programa = Programa::where('id',$id)->first();
        $programa->fill($request->all());
        $programa->save();
        return view('programa.index');
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
