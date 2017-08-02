<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class StoreDocente extends FormRequest
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
            'codigo' => 'required|unique:docentes',
            'carnet' => 'required|unique:docentes',
            'nombre' => 'required|min:3',
            'apellido' => 'required',
            'sexo' => 'required|not_in:0',
            'grado'=> 'required',
            'fechanac' => 'required'
        ];
    }

    /**
     *
     */
    public function messages(){

        return [
            'codigo.required' => 'El codigo es obligatorio',
            'codigo.unique' => 'El codigo dado ya existe',
            'carnet.required' => 'El carnet es obligatorio' ,
            'carnet.unique' => 'El carnet ingresado ya existe'
        ];
    }
}
