<?php

namespace App\Traits;

use App\Models\Change;
use App\Models\User;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait changeTrait{

    public function registerChange($object, $type){

        $now = Carbon::now();
        $user = Auth::user()->id;
        
        Change::create(['created_at' => $now, 'user_id' => $user, 'object_id' => $object, 'type' => $type]);

    }

}