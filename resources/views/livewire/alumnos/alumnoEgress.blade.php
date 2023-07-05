<div>

    <div class="card card-default m-4">

        <form method="POST" action="{{ route('alumnos.egressAlumno',$alumno->DNI) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            
            <div class="card-header">
                <span class="card-title"> <h4 class="mt-2 ms-4"> Egresar al alumno: {{$alumno->name}} {{$alumno->lastName}} </h4> </span>
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
                            <strong>Esta es la acción de egresar alumno.</strong> Confirmar la acción egresará al alumno de la escuela. 
                            Además cerrará las materias que esté 
                            cursando de forma acorde con la nota aprobatoria provista.Las materias con un promedio igual o mayor a la 
                            nota provista serán marcadas como aprobadas y no podrán ser modificadas. Las materias con un promedio 
                            inferior a la nota provista serán marcadas como pendientes y seguirán abiertas a modificaciones y exámenes.
                            <br>
                            El alumno será marcado como egresado, no podrá ser reasignado ni marcado por abandono. Tampoco se lo podrá marcar por inasistencia o retiro.
                            <br><br><strong> ESTA ACCIÓN ES IRREVERSIBLE! </strong>
                        </div>
                      </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <div class="row m-3">

                    <div class="col-6">
                        <div class="input-group">

                            <span class="input-group-text"> Nota aprobatoria </span>
                            <input class="form-control" type="number" name="neededNote" id="neededNote" value=4 wire:model="selectedNote">
                        </div>
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
                        <button class="btn btn-primary btn-lg" type="submit"> Confirmar egreso </button>
                    </div>
                </div>
            </div>

    </div>

</div>