<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
use Livewire\Component;

class CursoMateria extends Component
{
    public $name;
    public $lastName;
    public $DNI;
    public $gender;
    public $course;

    public $phone;
    public $birthDate;
    public $direction;
    public $matters;

    public $cursos;
    public $materias;
    public $selectedCurso;

    public $currentStep = 1;
    public $maxSteps = 4;

    protected $listeners = ['noMatter'];

    public function mount(){
        $this->currentStep = 1;
        $this->cursos = Curso::where('div', 'A')->get();
        $this->selectedCurso = NULL;
        $this->materias = Materia::all();
    }

    public function render()
    {
        return view('livewire.curso-materia');
    }

    public function increaseStep(){
        if($this->currentStep < $this->maxSteps){
            $this->currentStep++;
        }
    }

    public function decreaseStep(){
        if($this->currentStep > 1){
            $this->currentStep--;
        }
    }

    public function noMatter($cur=0){
        $this->selectedCurso = Curso::where('id', $cur)->get();
        foreach($this->selectedCurso as $cur){
            $this->materias = $cur->materias;
        }
    }
}
