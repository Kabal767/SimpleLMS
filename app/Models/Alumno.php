<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $created_at
 * @property $updated_at
 * @property $DNI
 * @property $Nombre
 * @property $Apellido
 * @property $tel
 * @property $Dirección
 * @property $birthPlace
 * @property $origin
 * @property $nation
 * @property $id_curso
 *
 * @property Curso $curso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    protected $primaryKey = 'DNI';
    public $incrementing  = false;
    
    static $rules = [
		'DNI' => 'required|unique:alumnos,DNI',
		'name' => 'required',
		'lastName' => 'required',
    'sex' => 'required',
    'birthDate' => 'required',

		'tel' => 'required',
    'locality' => 'required',
		'direction' => 'required',

		'birthPlace' => 'required',
		'origin' => 'required',
		'nation' => 'required',

		'id_curso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DNI','name','lastName', 'sex', 'birthDate', 
    'tel','mail',
    'jurisdiction','department', 'locality', 'direction',
    'birthNation','birthJurisdiction','birthDepartment','birthLocality',
    'origin','lastYear','originNation','originJurisdiction','originDepartment','originLocality','originDirection',
    'nation',
    'id_curso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'id_curso');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function JointAlumnoMateria()
    {
        return $this->hasMany('App\Models\JointAlumnoMateria', 'id', 'id_Alumno');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materias()
    {
      return $this->belongsToMany('App\Models\Materia')
        ->withPivot(['year', 'origin', 'condition', 'callification','quarter1','quarter2','quarter3','average'])
      ;
    }

    /**
     * The roles that belong to the Alumno
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familiares()
    {
        return $this->belongsToMany('App\Models\Familiar', 'alumno_familiar', 'alumno_DNI', 'familiar_DNI')
        ->withPivot(['relation']);
    }

    /**
     * The roles that belong to the Alumno
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos()
    {
        return $this->belongsToMany('App\Models\Curso', 'alumno_curso', 'alumno_DNI', 'curso_id')
        ->withPivot(['condition']);
    }

    /**
     * The roles that belong to the Alumno
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'alumno_exam', 'alumno_DNI', 'exam_id')
        ->withPivot(['oral','written','callification','mesa_id']);
    }
}
