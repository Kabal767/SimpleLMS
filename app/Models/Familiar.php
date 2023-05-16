<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Class Familiar
 * 
 *  @property $id
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
    static $rules = [
        'DNI' => 'required',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Alumno')
        ->withPivot(['relation']);
    }
 }