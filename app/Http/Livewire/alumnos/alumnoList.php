<?php

namespace App\Http\Livewire\Alumnos;

use App\Models\Alumno;
use Livewire\Component;

class alumnoList extends Component
{
    public $alumnos;
    public $cursos;

    public $searchInput;
    public $selectedCurso = '';
    public $shownAlumnos;

    public $orderBy = 'name';
    public $orderIn = 'asc';

    public function render(){

        $alumnos = Alumno::where('name', 'like', '%' . $this->searchInput . '%')->
        orWhere('lastName', 'like', '%' . $this->searchInput . '%')->
        orWhere('DNI', 'like', '%' . $this->searchInput . '%')->
        orderBy($this->orderBy, $this->orderIn)->get();

        if($this->selectedCurso !== ""){
        $this->shownAlumnos = $alumnos->where('id_curso',$this->selectedCurso);}
        else{$this->shownAlumnos = $alumnos;}

        return view('livewire.alumnos.alumnoList');
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