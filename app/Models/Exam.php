<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exam
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $date
 * @property $condición
 * @property $id_Materia
 * @property $id_Curso
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
		'date' => 'required',
		'condición' => 'required',
		'id_Materia' => 'required',
		'id_Curso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','condición','id_Materia','id_Curso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'id_Curso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_Materia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mesas()
    {
        return $this->hasMany('App\Models\Mesa', 'id_exams', 'id');
    }
    

}
