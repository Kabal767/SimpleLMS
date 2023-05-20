<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JointCursoMaterium
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $origin
 * @property $quarter1
 * @property $quarter2
 * @property $quarter3
 * @property $average
 * @property $callification
 * @property $condition
 * @property $year
 * @property $id_alumno
 * @property $id_materia
 *
 * @property Curso $curso
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JointAlumnoMateria extends Model
{
    protected $attributes = [
        'callification' => 0,
        'condition' => 'pendiente',
    ];

    static $rules = [
		'id_alumno' => 'required',
		'id_materia' => 'required',
        'origin' => 'required',
        'callification' => 'required',
        'condition' => 'required',
        'year' => 'required',
    ];    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_alumno','id_materia','callification','condition','year','origin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumno()
    {
        return $this->hasOne('App\Models\Alumno', 'id', 'id_alumno');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_materia');
    }
    

}
