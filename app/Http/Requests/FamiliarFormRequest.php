<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FamiliarFormRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules()
    {
        $rules = [
            'DNI' => [Rule::unique('familiars')->ignore($this->familiar), 'required'],
            'names' => 'required',
            'lastName' => 'required',
            'tel' => ['required','numeric'],
            'nation' => 'required',
            'direction' => ['required','string'],
            'mail' => 'email',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'DNI.required' => 'Por favor introduzca el DNI del familiar',
            'DNI.unique' => 'Este DNI ya se encuentra en uso',
            'names.required' => 'Por favor introduzca los nombres del familiar',
            'lastName.required' => 'Por favor introduzca el apellido del familiar',
            'tel.required' => 'Por favor introduzca el N° de teléfono del familiar',
            'tel.numeric' => 'Por favor introduzca un número de teléfono válido',
            'nation.required' => 'Por favor introduzca la nacionalidad del familiar',
            'direction.required' => 'Por favor introduzca el domicilio del familiar',
            'direction.string' => 'Por favor introduzca un domicilio válido',
            'mail.email' => 'Introduzca un email válido',
        ];
    }

}