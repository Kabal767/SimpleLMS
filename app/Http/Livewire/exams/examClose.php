<?php

namespace App\Http\Livewire\Exams;

use App\Models\Alumno;
use App\Models\Materia;
use App\Models\Exam;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class examClose extends Component{
    
    public $exam;
    public $mesas;

    public $selectedNote = 40;
    
    public function render(){   
        return view('livewire.exams.examClose');
    }
}