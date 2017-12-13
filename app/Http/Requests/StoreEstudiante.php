<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEstudiante extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'registro' => 'required|unique:estudiantes|max:8',
            'carnet' => 'required|unique:estudiantes',
            'nombre' => 'required|min:3',
            'apellido' => 'required',
            'sexo' => 'required|not_in:0',
            'fechanac' => 'required',
            'ciciudad' => 'required',
            'carrera_id' => 'required',
            'telefono' => 'max:8'

        ];
    }
    public function messages(){

        return [
            'registro.required' => 'El registro es obligatorio',
            'registro.unique' => 'El registro ingresado ya existe',
            'carnet.required' => 'El carnet es obligatorio' ,
            'carnet.unique' => 'El carnet ingresado ya existe'
        ];
    }
}
