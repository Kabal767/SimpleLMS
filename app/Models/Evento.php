<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $created_at
 * @property $updated_at
 * @property $id
 * @property $user
 * @property $description
 * @property $type
 * @property $date
 * @property $hour
 * @property $file
 * @property $DNI_alumno
 * 
 * @property Alumno $alumno
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

 class Evento extends Model
{
    static $rules = [
        'id' => 'required',
        'user' => 'required',
        'description' => 'required',
        'type' => 'required',
        'date' => 'required',
        'hour' => 'required',
        'file' => 'nullable',
        'DNI_alumno' => 'required',
    ];
    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','user','description', 'type', 'date', 'hour', 'file', 'DNI_alumno'];

    /**
     * Get the user associated with the Evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumno(): HasOne
    {
        return $this->hasOne('App\Models\Alumno', 'DNI', 'DNI_alumno');
    }
};