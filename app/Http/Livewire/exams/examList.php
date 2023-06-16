<?php

namespace App\Http\Livewire\exams;

use App\Models\Curso;
use App\Models\Materia;
use App\Models\Exam;

class examList extends Component
{
    public $exams;

    public $selectedMateria;
    public $shownMaterias;

    public $selectedCurso;
    public $selectedCondition;

    public $orderBy = 'name';
    public $orderIn = 'asc';

    public function render(){

        //With this we found materias that correspond to the chosen curso
        $relations = Curso::where('id',$this->selectedCurso);
        $this->shownMaterias = Materia::whereExists($relations)->get();

        //With this we find the exams that correspond to the chosen curso and materia and orber by accordingly
        $this->exams = Exam::where('condition',$this->selectedCondition)->where('materia_id',$this->selectedMateria)->where('curso_id',$this->selectedCurso)->
        orderBy($this->orderBy, $this->orderIn)->get();
        
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