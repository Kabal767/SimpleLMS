<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $Name
 *
 * @property Exam[] $exams
 * @property Jointcursomaterium[] $jointcursomaterias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materia extends Model
{
    
    static $rules = [
		'Name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'id_Materia', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jointcursomaterias()
    {
        return $this->hasMany('App\Models\Jointcursomaterium', 'id_materia', 'id');
    }

    public function cursos(){
        return $this->belongsToMany('App\Models\Curso');
    }
    
    //Relation with alumnos
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jointAlumnoMateria()
    {
        return $this->hasMany('App\Models\JointAlumnoMateria', 'id_Materia', 'id');
    }

    public function alumnos(){
        return $this->belongsToMany('App\Models\Alumno');
    }
}
