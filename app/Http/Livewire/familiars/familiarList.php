<?php

namespace App\Http\Livewire\Familiars;

use App\Models\Familiar;
use Livewire\Component;

class familiarList extends Component
{
    public $familiars;

    public $searchInput;
    public $shownFamiliars;

    public $orderBy = 'names';
    public $orderIn = 'asc';

    public function render(){

        $this->shownFamiliars = Familiar::where('names', 'like', '%' . $this->searchInput . '%')->
        orWhere('lastName', 'like', '%' . $this->searchInput . '%')->
        orWhere('DNI', 'like', '%' . $this->searchInput . '%')->
        orderBy($this->orderBy, $this->orderIn)
        ->get();

        return view('livewire.familiars.familiarList');
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