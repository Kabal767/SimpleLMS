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
                <!-- Repetir MODAL -->
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
                                {{ method_field('PUT') }}
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg me-md-2"> Confirmar </button>
                                </form>
                            </div>

                        </div>

                      </div>
                    </div>
                </div>

                <!-- Egresar MODAL -->
                <div class="modal fade" id="egress{{$alumno->DNI}}" tabindex="1" aria-labelledby="egress{{$alumno->DNI}}Label" aria-hidden="true">
                    <div class=" modal-dialog modal-lg">
                        <div class="modal-content">

                            <form method="POST" action="{{route('alumnos.egressAlumno', $alumno)}}">

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Egresar alumno: {{$alumno->name}} {{$alumno->lastName}} </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    Esta acción egresará al alumno de la escuela. Además cerrará las materias que esté 
                                    cursando de forma acorde con la nota aprobatoria provista.Las materias con un promedio igual o mayor a la 
                                    nota provista serán marcadas como aprobadas y no podrán ser modificadas. Las materias con un promedio 
                                    inferior a la nota provista serán marcadas como pendientes y seguirán abiertas a modificaciones y exámenes.
                                    <br>
                                    El alumno será marcado como egresado, no podrá ser reasignado ni marcado por abandono. Tampoco se lo podrá marcar por inasistencia o retiro.
                                    <br><br><strong> ESTA ACCIÓN ES IRREVERSIBLE! </strong>
                                </div>

                                <div class="modal-footer">

                                    <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                    
                                            <span class="input-group-text"> Nota aprobatoria </span>
                                            <input class="form-control" type="number" name="neededNote" id="neededNote" value=40 wire:model="selectedNote">
                    
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <ul class="list-group">
                                            <li class="list-group-item active fw-bold"> Materias que cursa el alumno </li>
                                            @foreach($alumno->materias()->where('condition','Cursando')->get() as $materia)
                                            <li class="list-group-item"> 
                                                {{$materia->name}}: {{$materia->pivot->average}} </li>
                                            @endforeach
                                        </ul>
                
                                    </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-lg me-md-2"> Confirmar </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <!-- Reasignar MODAL -->
                <div class="modal fade" id="reassign{{$alumno->DNI}}" tabindex="1" aria-labelledby="reassign{{$alumno->DNI}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form method="POST" action="{{route('alumnos.reassignAlumno', $alumno)}}">
                        {{ method_field('PUT') }}
                        @csrf
  
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Reasignar alumno: {{$alumno->name}} {{$alumno->lastName}} </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <div class="modal-body">
                            Esta acción reasignará al alumno a un nuevo curso de igual grado, también modificará el origen de sus materias en curso para coincidir
                            con el nuevo curso asignado. 
                            <br><br><strong> ESTA ACCIÓN ES REVERSIBLE </strong>
                          </div>

                          <div class="modal-footer">
                            <div class="input-group">
                                <span class="input-group-text"> Curso </span>
                                <select class="form-select" name="id_curso" id="id_curso">
                                    <option selected> Escoger curso </option>
                                    @foreach($cursos->where('curso',$alumno->curso->curso)->where('id', '<>', $alumno->curso->id) as $curso)
                                    <option value="{{$curso->id}}"> {{$curso->curso}}° {{$curso->div}} - Turno {{$curso->turno}} </option>
                                    @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="modal-footer">                            
                            <button type="submit" class="btn btn-primary btn-lg me-md-2"> Confirmar </button>
                          </div>

                        </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
