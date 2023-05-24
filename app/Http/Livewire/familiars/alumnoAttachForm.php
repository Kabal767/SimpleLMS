<?php

namespace App\Http\Livewire\Familiars;

use App\Models\Alumno;
use Livewire\Component;

class alumnoAttachForm extends Component
{

    public $familiar;
    public $alumnos;
    public $filter;

    public function render(){
        $this->alumnos = Alumno::where('DNI', 'like', '%' . $this->filter . '%')->
        orWhere('name', 'like', '%' . $this->filter . '%')->
        orWhere('lastName', 'like', '%' . $this->filter . '%')->
        orderBy('name', 'asc')->get();
        
        return view('livewire.familiars.alumnoAttachForm');
    }

}
