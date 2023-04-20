<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as FortifyLoginResponse;

class LoginResponse implements FortifyLoginResponse
{

    public function toResponse($request){
        return redirect(RouteServiceProvider::HOME);
    }

}