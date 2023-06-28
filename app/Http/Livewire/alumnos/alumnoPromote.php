<?php

namespace App\Http\Livewire\Alumnos;

use App\Models\Alumno;
use App\Models\Curso;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class alumnoPromote extends Component{
    
    public $alumno;
    public $cursos;
    public $materias;
    public $alumnoMaterias;

    public $selectedCurso;
    public $selectedNote = 40;
    
    public function render(){   

        if($this->selectedCurso != NULL)  {
        $this->materias = Curso::findOrFail($this->selectedCurso)->materias;
        }

        $relations = DB::table('alumno_materia')->where('condition','Cursando');

        $this->alumnoMaterias = $this->alumno->materias()->whereExists($relations)->get();
        
        return view('livewire.alumnos.alumnoPromote');
    }
}