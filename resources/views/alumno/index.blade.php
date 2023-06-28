@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card m-4">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h4 class="mt-2">ALUMNOS</h4>
                            </span>

                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    @livewire('alumnos.alumno-list', ['alumnos' => $alumnos, 'cursos' => $cursos])

                </div>

                @foreach($alumnos as $alumno)
                <div class="modal fade" id="repeat{{$alumno->DNI}}" tabindex="-1" aria-labelledby="repeat{{$alumno->DNI}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"> Repetir alumno: {{$alumno->name}} {{$alumno->lastName}} </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            Esta acción regresará las notas trimestrales y el promedio general de todas las materias en cursado del alumno a 0. También reiniciará sus faltas y
                            modificará el año de cursado a {{$alumno->cursos()->where('curso_id',$alumno->id_curso)->
                            first()->pivot->year + 1}}. 

                            <br><br> <strong> ESTA ACCIÓN ES IRREVERSIBLE!</strong>
                        </div>

                        <div class="modal-footer">

                            <div class="col-12">

                                <ul class="list-group m-3">
                                    <li class="list-group-item active fw-bold"> Materias que cursa el alumno </li>
                                    @foreach($alumno->materias()->where('condition', 'Cursando')->get() as $materia)
                                    <li class="list-group-item"> {{$materia->name}}: {{$materia->pivot->average}} </li>
                                    @endforeach
                                </ul>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <div class="col-6 text-end">
                                <form method="POST" action="{{route('alumnos.repeatAlumno', $alumno)}}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg me-md-2"> Confirmar </button>
                                </form>
                            </div>

                        </div>

                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
