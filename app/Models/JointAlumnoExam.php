<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Class Familiar
 * 
 *  @property $id
 *  @property $created_at
 *  @property $updated_at
 *  @property $oral
 *  @property $written
 *  @property $callification
 *  @property $mesa_id
 *  @property $alumno_id
 *  @property $exam_id
 * 
 *  @package App
 *  @mixin \Illuminate\Database\Eloquent\Builder
 */

 class JointAlumnoExam extends Model
 {
    static $rules = [
        'callification' => 'required',
        'oral' => 'required',
        'written' => 'required',
        'mesa_id' => 'required',
        'alumno_id' => 'required',
        'exam_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['callification','oral','written','mesa_id','alumno_id','exam_id'];

    /**
     * Get the user associated with the JointAlumnoExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumnos(): HasOne
    {
        return $this->hasOne('App\Models\Alumno');
    }

    /**
     * Get the user associated with the JointAlumnoExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mesas(): HasOne
    {
        return $this->hasOne('App\Models\Mesa');
    }

    /**
     * Get the user associated with the JointAlumnoExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exams(): HasOne
    {
        return $this->hasOne('App\Models\Exam');
    }

 }