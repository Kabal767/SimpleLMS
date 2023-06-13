<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $curso
 * @property $div
 * @property $turno
 *
 * @property Alumno[] $alumnos
 * @property Exam[] $exams
 * @property Jointcursomaterium[] $jointcursomaterias
 * @property Materia[] $materias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    static $rules = [
		'curso' => 'required',
		'div' => 'required|max:1',
		'turno' => 'required',
        'materias' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['curso','div','turno'];
 
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'id_Curso', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jointcursomaterias()
    {
        return $this->hasMany('App\Models\Jointcursomaterium', 'id_curso', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materias()
    {
        return $this->belongsToMany('App\Models\Materia');
    }
    
    /**
     * The roles that belong to the Curso
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno', 'alumno_curso','curso_id','alumno_DNI')
        ->withPivot(['year','inasistencias','condition']);
    }

}
