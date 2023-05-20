<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
use Livewire\Component;

class toDosList extends Component
{
    public $materias;
    public $cursos;
    public $alumno;
    public $exams;
    public $shownMaterias;
    public $selectedCurso;

    public function mount($materias, $cursos, $alumno){
        $this->cursos = $cursos;
        $this->alumno = Alumno::findOrFail($alumno);

        $this->selectedCurso = $this->alumno->id_curso;
    }

    public function render(){
        $this->shownMaterias = $this->alumno->materias()->where('origin', $this->selectedCurso)->get();
        return view('livewire.alumno_toDos_list');
    }
}
