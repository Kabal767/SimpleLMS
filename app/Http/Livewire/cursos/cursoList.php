<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;

class cursoList extends Component
{
    public $cursos;
    public $materias;

    public $selectedDiv = '';
    public $selectedCurso = '';
    public $selectedTurno = '';

    public $orderBy = 'curso';
    public $orderIn = 'asc';

    public function render(){

        $this->cursos = Curso::orderBy($this->orderBy, $this->orderIn)->get();

        if($this->selectedCurso !== ""){
            $this->cursos = $this->cursos->where('curso',$this->selectedCurso);
        }

        if($this->selectedDiv !== ""){
            $this->cursos = $this->cursos->where('div',$this->selectedDiv);
        }

        if($this->selectedTurno !== ""){
            $this->cursos = $this->cursos->where('turno',$this->selectedTurno);
        }

        return view('livewire.cursos.cursoList');
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