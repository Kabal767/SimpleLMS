<?php

namespace App\Http\Livewire\exams;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Exam;
use Livewire\Component;

class examForm extends Component
{
    public $cursos;
    public $materias;

    public $selectedCurso;
    public $selectedMateria;
    public $selectedCondition;

    public function mount($cursos, $materias){

        $this->selectedCondition = 'Final';

        $this->cursos = $cursos;
        $this->materias = $materias;
    }

    public function render(){

        $curso = Curso::find($this->selectedCurso);
        if($this->selectedCondition == 'Regular' || $this->selectedCondition == 'Adeudada' || $this->selectedCondition == 'Diciembre'){$curso = NULL;}
        if($curso == NULL){$this->materias = Materia::All();}
        else{$this->materias = $curso->materias()->get();}

        return view('livewire.exams.liveForm');
    }
}