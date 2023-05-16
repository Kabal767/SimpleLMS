<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Class Familiar
 * 
 *  @property $id
 *  @property $created_at
 *  @property $updated_at
 *  @property $relation
 *  @property $alumno_id
 *  @property $familiar_id
 * 
 *  @package App
 *  @mixin \Illuminate\Database\Eloquent\Builder
 */

 class Curso extends Model
 {
    static $rules = [
        'relation' => 'required',
        'alumno_id' => 'required',
        'familiar_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['relation','alumno_id','familiar_id'];

    /**
     * Get the user associated with the JointAlumnoFamiliar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumnos(): HasOne
    {
        return $this->hasOne('App\Models\Alumno');
    }

    /**
     * Get the user associated with the JointAlumnoFamiliar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familiares(): HasOne
    {
        return $this->hasOne('App\Models\Familiar');
    }
 }