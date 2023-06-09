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
            'birthNation' => ['required','string'],
            'birthJurisdiction' => ['required','string'],
            'birthDepartment' => ['required','string'],
            'birthLocality' => ['required','string'],

            'tel' => ['required','numeric'],
            'mail' => ['email','nullable'],

            'jurisdiction' => ['required','string'],
            'department' => ['required','string'],
            'locality' => ['required','string'],
            'direction' => ['required','string'],

            'origin' => ['nullable','string'],
            'lastYear' => ['before:today','nullable'],
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

            'jurisdiction.required' => 'Por favor introduzca la jurisdicción',
            'jurisdiction.string' => 'Por favor introduzca un jurisdicción válido',
            'department.required' => 'Por favor introduzca el departamento',
            'department.string' => 'Por favor introduzca un departamento válido',
            'locality.required' => 'Por favor introduzca el localidad',
            'locality.string' => 'Por favor introduzca una localidad válida',
            'direction.required' => 'Por favor introduzca el domicilio',
            'direction.string' => 'Por favor introduzca un domicilio válido',

            'birthNation.required' => 'Por favor introduzca la nación de nacimiento del alumno',
            'birthNation.string' => 'Por favor introduzca una nación válida',
            'birthJurisdiction.required' => 'Por favor introduzca la jurisdicción',
            'birthJurisdiction.string' => 'Por favor introduzca una jurisdicción válida',
            'birthDepartment.required' => 'Por favor introduzca el departamento',
            'birthDepartment.string' => 'Por favor introduzca un departamento válido',
            'birthLocality.required' => 'Por favor introduzca la localidad',
            'birthLocality.string' => 'Por favor introduzca una localidad válida',

            'origin.string' => 'Por favor introduzca una escuela válida',
            'lastYear.before' => 'Por favor introduzca una fecha válida',

            'nation.required' => 'Por favor introduzca la nacionalidad del alumno',

            'id_curso.required' => 'Por favor seleccione un curso',
            'id_curso.exists' => 'El curso seleccionado no existe en nuestro sistema',
        ];
    }

}