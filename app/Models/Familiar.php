<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 *  Class Familiar
 * 
 *  @property $created_at
 *  @property $updated_at
 *  @property $DNI
 *  @property $names
 *  @property $lastName
 *  @property $tel
 *  @property $direction
 *  @property $nation
 *  @property $mail
 * 
 *  @package App
 *  @mixin \Illuminate\Database\Eloquent\Builder
 */

 class Familiar extends Model
 {
    protected $primaryKey = 'DNI';
    public $incrementing  = false;

    static $rules = [
        'names' => 'required',
        'lastName' => 'required',
        'tel' => 'required',
        'nation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DNI','names','lastName','tel','direction','nation','mail'];

    /**
     * The roles that belong to the Familiar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno','alumno_familiar','familiar_DNI','alumno_DNI')
        ->withPivot(['relation']);
    }
 }