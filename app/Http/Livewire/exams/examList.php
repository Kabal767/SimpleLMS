<?php

namespace App\Http\Livewire\exams;

use App\Models\Curso;
use App\Models\Materia;
use App\Models\Exam;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class examList extends Component
{
    public $exams;
    public $cursos;

    public $selectedMateria;
    public $shownMaterias;

    public $selectedCurso;
    public $selectedCondition;

    public $orderBy = 'id';
    public $orderIn = 'asc';

    public function render(){

        $this->exams=Exam::orderBy($this->orderBy, $this->orderIn)->get();
        $this->shownMaterias = Materia::orderBy('name','desc')->get();

        //With this we find materias that correspond to the chosen curso
        if($this->selectedCurso !== "" && $this->selectedCurso !== NULL){
            $this->exams = $this->exams->where('curso_id',$this->selectedCurso);

            $this->shownMaterias = Curso::findOrFail($this->selectedCurso)->materias()->get();
        }


        if($this->selectedMateria !== "" && $this->selectedMateria !== NULL){
            $this->exams = $this->exams->where('materia_id',$this->selectedMateria);
        }

        if($this->selectedCondition !== "" && $this->selectedCondition !== NULL){
            $this->exams = $this->exams->where('condition',$this->selectedCondition);
        }
        
        return view('livewire.exams.examList');
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