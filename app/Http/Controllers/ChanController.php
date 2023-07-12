<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chan;

/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class ChanController extends Controller
{
    public function indexChan()
    {
        $chans = Chan::all();

        return view('chan.indexChan', compact('chans'));
    }

    public function indexUser()
    {
        $users = User::all();

        return view('chan.indexUser', compact('users'));
    }

    public function showUser(User $user){

        return view('chan.showUser', compact('user'));
    }
}