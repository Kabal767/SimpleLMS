<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JointCursoMaterium
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $id_curso
 * @property $id_materia
 *
 * @property Curso $curso
 * @property Materia $materia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JointCursoMaterium extends Model
{
    
    static $rules = [
		'id_curso' => 'required',
		'id_materia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_curso','id_materia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'id_curso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_materia');
    }
    

}
