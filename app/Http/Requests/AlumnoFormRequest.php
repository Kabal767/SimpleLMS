<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
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
            'DNI' => [Rule::unique('alumnos')->ignore($this->alumno), 'required'],
            'name' => ['required','string'],
            'lastName' => ['required','string'],
            'sex' => ['required','string'],
            'birthDate' => ['required','date','before:today'],

            'tel' => ['required','numeric'],
            'locality' => ['required','string'],
            'direction' => ['required','string'],

            'birthPlace' => ['required', 'string'],
            'origin' => ['nullable','string'],
            'nation' => 'required',

            'id_curso' => ['required','exists:cursos,id'],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'DNI.required' => 'Por favor introduzca el DNI del alumno',
            'DNI.unique' => 'Este DNI ya se encuentra en uso',

            'name.required' => 'Por favor introduzca los nombres del alumno',
            'name.string' => 'Por favor introduzca un nombre válido',
            'lastName.required' => 'Por favor introduzca el apellido del alumno',
            'lastName.string' => 'Por favor introduzca un apellido válido',

            'sex.required' => 'Por favor escoja el sexo del alumno',
            
            'birthDate.required' => 'Por favor seleccione la fecha de nacimiento del alumno',
            'birthDate.date' => 'Por favor introduzca una fecha válida',
            'birthdate.before' => 'Por favor introduzca una fecha antes de hoy',
            
            'tel.required' => 'Por favor introduzca el N° de teléfono del alumno',
            'tel.numeric' => 'Por favor introduzca un número de teléfono válido',

            'locality.required' => 'Por favor introduzca la localidad del alumno',
            'locality.string' => 'Por favor introduzca una localidad válida',

            'direction.required' => 'Por favor introduzca el domicilio del familiar',
            'direction.string' => 'Por favor introduzca un domicilio válido',

            'birthPlace.required' => 'Por favor introduzca el lugar de nacimiento del alumno',
            'birthPlace.string' => 'Por favor introduzca un lugar de nacimiento válido',

            'origin.string' => 'Por favor introduzca una escuela válida',

            'nation.required' => 'Por favor introduzca la nacionalidad del alumno',

            'id_curso.required' => 'Por favor seleccione un curso',
            'id_curso.exists' => 'El curso seleccionado no existe en nuestro sistema',
        ];
    }

}