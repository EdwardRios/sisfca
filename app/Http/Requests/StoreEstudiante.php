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
            'registro' => 'required|unique:estudiantes',
            'carnet' => 'required|unique:estudiantes',
            'nombre' => 'required|min:3',
            'apellido' => 'required',
            'sexo' => 'required|not_in:0',
            'fechanac' => 'required'
        ];
    }
    public function messages(){

        return [
            'registro.required' => 'El regisotro es obligatorio',
            'registro.unique' => 'El registro ingresado ya existe',
            'carnet.required' => 'El carnet es obligatorio' ,
            'carnet.unique' => 'El carnet ingresado ya existe'
        ];
    }
}
