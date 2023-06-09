<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Carbon\Carbon;
use Livewire\Component;

class cursoAlumnos extends Component
{
    public $curso;
    public $shownAlumnos;
    public $years;

    public $selectedYear;
    public $searchInput;

    public $orderBy = 'DNI';
    public $orderIn = 'asc';

    public function mount(){
        $this->selectedYear = Carbon::now()->format('Y');
    }

    public function render(){
        return view('livewire.cursos.cursoAlumnos');
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