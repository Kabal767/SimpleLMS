<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
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
 * @property $id_Curso
 *
 * @property Curso $curso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    static $rules = [
		'DNI' => 'required',
		'name' => 'required',
		'lastName' => 'required',
    'gender' => 'required',
    'birthDate' => 'required',

		'tel' => 'required',
    'locality' => 'required',
		'direction' => 'required',

		'birthPlace' => 'required',
		'origin' => 'required',
		'nation' => 'required',

		'id_Curso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DNI','name','lastName', 'gender', 'birthDate', 
    'tel', 'locality', 'direction',
    'birthPlace','origin','nation',
    'id_Curso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'id_Curso');
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
        ->withPivot(['year', 'condition', 'callification'])
      ;
    }
}
