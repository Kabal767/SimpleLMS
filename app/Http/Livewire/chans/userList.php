<?php

namespace App\Http\Livewire\Chans;

use App\Models\User;
use Livewire\Component;

class userList extends Component
{
    public $usuarios;

    public $searchInput;
    
    public $orderBy = 'name';
    public $orderIn = 'asc';

    
    public function render(){

        $this->usuarios = User::where('name', 'like', '%' . $this->searchInput . '%')->
        orderBy($this->orderBy, $this->orderIn)->get();
        return view('livewire.chan.userList');

    }

    public function order($sortBy){

        if($this->orderBy == $sortBy && $this->orderIn == 'asc'){
            $this->orderIn = 'desc';
        } else{
            $this->orderIn = 'asc';
        }

        $this->orderBy = $sortBy;

    }
}