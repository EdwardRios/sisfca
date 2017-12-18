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
            'carnet' => array('required',
                          'unique:docentes',
                          'numeric',
                             'max:999999999'
            ),
            'nombre' => array('required','min:3', 'regex:/^[a-zA-Z ]+$/u'),
            'apellido' => array('required','min:3', 'regex:/^[a-zA-Z ]+$/u'),
            'sexo' => 'required|not_in:0',
            'grado'=> 'required',
            'fechanac' => 'required',
            'ciciudad' => 'required',
            'curriculum' => 'mimetypes:application/pdf'
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
            'carnet.unique' => 'El carnet ingresado ya existe',
            'carnet.max' => 'El campo Carnet solo admite 8 digitos',
            'curriculum.mimetypes' => 'El archivo debe ser de formato PDF'
        ];
    }
}
