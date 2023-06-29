<div>

    <div class="card card-default m-4">

        <form method="POST" action="{{ route('alumnos.promoteAlumno',$alumno->DNI) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            
            <div class="card-header">
                <span class="card-title"> <h4 class="mt-2 ms-4"> Promocionar al alumno: {{$alumno->name}} {{$alumno->lastName}} </h4> </span>
            </div>

            <div class="card-body">

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button btn-danger" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#importantInfo" aria-expanded="true" aria-controls="importantInfo">
                          INFORMACIÓN IMPORTANTE!
                        </button>
                      </h2>
                      <div id="importantInfo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong> Esta es la acción de promocionar alumno. </strong> Confirmar la acción trasladará al alumno al curso seleccionado. Además cerrará las materias que esté 
                          cursando de forma acorde con la nota aprobatoria provista. Las materias con un promedio igual o mayor a la nota provista serán marcadas como aprobadas y no podrán
                          ser modificadas. Las materias con un promedio inferior a la nota provista serán marcadas como pendientes y seguirán abiertas a modificaciones y exámenes.
                          
                          <br><br><strong> Por favor tenga en cuenta que esta acción es IRREVERSIBLE.</strong>
                        </div>
                      </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <div class="row m-3">
                    <div class="input-group">

                        <span class="input-group-text"> Curso al que promocionar </span>
                        <select class="form-select" name="curso" id="curso" wire:model="selectedCurso">
                            <option selected> Escoger curso </option>
                            @foreach($cursos as $curso)
                            <option value="{{$curso->id}}"> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </option>
                            @endforeach
                        </select>

                        <span class="input-group-text"> Nota aprobatoria </span>
                        <input class="form-control" type="number" name="neededNote" id="neededNote" value=4 wire:model="selectedNote">

                    </div>
                </div>

                <div class="row m-3">
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item active fw-bold"> Materias a las que se inscribirá el alumno </li>
                            @if($selectedCurso !== NULL)
                            @foreach($materias as $materia)
                            <li class="list-group-item"> {{$materia->name}} </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-6">

                        <ul class="list-group">
                            <li class="list-group-item active fw-bold"> Materias que cursa el alumno </li>
                            @foreach($alumnoMaterias as $materia)
                            <li class="list-group-item @if($materia->pivot->average >= $selectedNote) list-group-item-success @else list-group-item-danger @endIf"> 
                                {{$materia->name}}: {{$materia->pivot->average}} </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-danger btn-lg" href="{{route('alumnos.index')}}"> Cancelar </a>
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn btn-primary btn-lg" type="submit"> Confirmar promoción </button>
                    </div>
                </div>
            </div>

    </div>

</div>