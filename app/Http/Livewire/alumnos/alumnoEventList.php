<?php

namespace App\Http\Livewire\Alumnos;

use App\Models\Alumno;
use App\Models\Evento;
use Livewire\Component;

class alumnoEventList extends Component
{
    public $alumno;
    public $events;

    public $afterDate = '2000-01-01';
    public $beforeDate = '3000-01-01';
    public $shownEvents;

    public function render(){

        $this->events = $this->alumno->eventos()->whereDate('date', '<', $this->beforeDate)->
        whereDate('date','>',$this->afterDate)->get();

        return view('livewire.alumnos.alumnoEventList');
    }
}