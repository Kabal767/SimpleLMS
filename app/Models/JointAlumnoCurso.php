<?php

/**
 *  Class Familiar
 * 
 *  @property $id
 *  @property $created_at
 *  @property $updated_at
 *  @property $condition
 *  @property $alumno_id
 *  @property $curso_id
 * 
 *  @package App
 *  @mixin \Illuminate\Database\Eloquent\Builder
 */

 class Curso extends Model
 {
    static $rules = [
        'condition' => 'required',
        'alumno_id' => 'required',
        'curso_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['condition','alumno_id','curso_id'];

    /**
     * Get the user associated with the JointAlumnoCurso
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumnos(): HasOne
    {
        return $this->hasOne('App\Models\Alumno');
    }

    /**
     * Get the user associated with the JointAlumnoCurso
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cursos(): HasOne
    {
        return $this->hasOne('App\Models\Curso');
    }
 }