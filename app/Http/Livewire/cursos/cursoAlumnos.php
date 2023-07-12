<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Alumno;
use App\Models\Curso;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class cursoAlumnos extends Component
{
    public $curso;
    public $shownAlumnos;
    public $years;

    public $relations;

    public $selectedYear;
    public $searchInput;

    public $orderBy = 'DNI';
    public $orderIn = 'asc';

    public function mount(){
        $this->selectedYear = Carbon::now()->format('Y');
    }

    public function render(){
        $relations = DB::table('alumno_curso')->where('year', $this->selectedYear)->where('curso_id',$this->curso->id);

        //$this->shownAlumnos = Alumno::whereExists($relations)->get();
        $this->shownAlumnos = $this->curso->alumnos()->where('year', $this->selectedYear)->get();

        //dd($this->shownAlumnos);

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