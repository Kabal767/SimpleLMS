<?php

namespace App\Http\Livewire\Alumnos;

use App\Models\Alumno;
use App\Models\Curso;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class alumnoEgress extends Component{
    
    public $alumno;
    public $materias;
    public $alumnoMaterias;

    public $selectedNote = 40;
    
    public function render(){   

        $relations = DB::table('alumno_materia')->where('condition','Cursando');

        $this->alumnoMaterias = $this->alumno->materias()->whereExists($relations)->get();
        
        return view('livewire.alumnos.alumnoEgress');
    }
}