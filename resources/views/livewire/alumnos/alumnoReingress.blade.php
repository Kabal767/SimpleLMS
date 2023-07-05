<div>

    <div class="card card-default m-4">

        <form method="POST" action="{{ route('alumnos.reingressAlumno',$alumno->DNI) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            
            <div class="card-header">
                <span class="card-title"> <h4 class="mt-2 ms-4"> Reingresar al alumno: {{$alumno->name}} {{$alumno->lastName}} </h4> </span>
            </div>

            <div class="card-body">

                <div class="accordion">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button btn-danger" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#importantInfo" aria-expanded="true" aria-controls="importantInfo">
                          INFORMACIÓN IMPORTANTE!
                        </button>
                      </h2>
                      <div id="importantInfo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong> Esta es la acción de reingresar alumno. </strong> Confirmar la acción regresará al alumno al estado cursando. También eliminará la relación que
                          el alumno tenga con el curso actual y creará una nueva con el curso seleccionado, registrándolo a las materias correspondientes. También creará un evento de
                          reingreso en el perfil del alumno.
                          
                          <br><br><strong> Por favor tenga en cuenta que esta acción es IRREVERSIBLE.</strong>
                        </div>
                      </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <div class="row m-3">
                    <div class="input-group">

                        <span class="input-group-text"> Curso al que reingresar </span>
                        <select class="form-select" name="id_curso" id="id_curso" wire:model="selectedCurso">
                            <option selected> Escoger curso </option>
                            @foreach($cursos as $curso)
                            <option value="{{$curso->id}}"> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </option>
                            @endforeach
                        </select>

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
                            <li class="list-group-item active fw-bold"> Materias que cursaba el alumno </li>
                            @foreach($alumnoMaterias as $materia)
                            <li class="list-group-item"> 
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
                        <button class="btn btn-primary btn-lg" type="submit"> Confirmar reingreso </button>
                    </div>
                </div>
            </div>

    </div>

</div>