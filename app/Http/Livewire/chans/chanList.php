<?php

namespace App\Http\Livewire\Chans;

use App\Models\Change;
use Livewire\Component;

class chanList extends Component
{
    public $user;
    public $changes;

    public $shownChanges;

    public $searchInput;
    
    public $orderBy = 'id';
    public $orderIn = 'asc';

    
    public function render(){

        $this->shownChanges = Change::where('id', 'like', '%' . $this->searchInput . '%')->
        orWhere('user_id','like', '%' . $this->searchInput . '%')->
        orWhere('object_id','like', '%' . $this->searchInput . '%')->
        orderBy($this->orderBy, $this->orderIn)->get();

        if($this->user !== NULL){
            $this->shownChanges = $this->shownChanges->where('user_id',$this->user->id);
        }

        return view('livewire.chan.chanList');

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