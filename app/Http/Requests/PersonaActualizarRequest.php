<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaActualizarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'dni' => ['required','numeric', 'digits:8','unique:personas,dni,'.$this->route('persona')],
            'paterno' => ['required'],
            'materno' => ['required'],
            'nombre' => ['required'],
            'sexo' => ['required'],
            'correo' => ['required'],
            'direccion' => ['required'],
            'celular' => ['required'],
            'fechanacimiento' => ['required'],
        ];
    }
}
