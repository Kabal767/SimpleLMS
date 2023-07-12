<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mesa
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $user_id
 * @property $object_id
 * @property $type
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Change extends Model
{    
    static $rules = [
		'user_id' => 'required',
		'object_id' => 'required',
		'type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','object_id','type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
