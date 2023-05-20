<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mesa
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $Proffesor
 * @property $Date
 * @property $id_exams
 *
 * @property Exam $exam
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mesa extends Model
{
    
    static $rules = [
		'Proffesor' => 'required',
		'Date' => 'required',
		'id_exam' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Proffesor','Date','id_exam'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->hasOne('App\Models\Exam', 'id', 'id_exams');
    }
    

}
