<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exam
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $condition
 * @property $materia_id
 * @property $curso_id
 *
 * @property Curso $curso
 * @property Materia $materia
 * @property Mesa[] $mesas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Exam extends Model
{
    
    static $rules = [
		'condition' => 'required',
		'materia_id' => 'required',
		'curso_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['condition','materia_id','curso_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'curso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'materia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mesas()
    {
        return $this->hasMany('App\Models\Mesa', 'id_exam', 'id');
    }
    
    /**
     * The roles that belong to the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno')
        ->withPivot(['oral','written','callification','mesa_id', 'alumno_id','boolOral','boolWritten']);
    }
}
