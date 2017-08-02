<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    public function index(){
        $name= 'Edward';
        $lastname = 'rios';
        //return view('index',['name' => $name]);
        //return view ('index', compact('name','lastname'));
        //return view('index')->with('nombre',$name); 
        $carreras =  Carrera::orderBy('id')->get();
        
        return view ('index', compact('carreras','name'));
    }
    public function create(){
        return 'Crear Carreras';
    }
    public function store(Request $request){
         return 'Aqui se procesan los datos recibir del formulario de crear y redirige a otra pagina como index o home';
    }
    public function show($id){
        return  'Aqui se mostrara los datos de una categoria realizada';
    }
    public function edit(){
        return 'Aqui se mostrara el formulario para editar la carrera';
    }
    public function update(Request $request,$id){
        return 'Aqui se mostrara el formulario para editar la carrera';
    }
    public function destroy($id){
        return 'Aqui va la logica para eliminar una categoria dada';
    }
    
}

