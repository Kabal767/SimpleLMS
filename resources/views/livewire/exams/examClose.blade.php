<div>
    
    <div class="card card-default m-4">

        <form method="POST" action="{{route('exams.closeExam', $exam->id)}}" role="form" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf

            <div class="card-header">
                <span class="card-title"> <h4 class="mt-2 ms-4"> Cerrar examen </h4> </span>
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
                        <strong> Esta es la acción de cerrar examen. </strong> Confirmar la acción impedirá la futura modificación de los archivos del exámen. También aprobará
                        o desaprobará a los alumnos de acuerdo a la nota aprovatoria provista. Según la naturaleza del examen, los alumnos aproboados podrían ver la calificació
                        final de su materia modificada por el resultado del examen. 
                        
                        <br><br><strong> Por favor tenga en cuenta que esta acción es IRREVERSIBLE.</strong>
                        </div>
                    </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <div class="input-group">
                    
                    <span class="input-group-text"> Nota aprobatoria </span>
                    <input type="number" wire:model="selectedNote" class="form-control" name="selectedNote" id="selectedNote">

                </div>

                <div class="row m-3">

                    @foreach($exam->mesas as $mesa)

                        <div class="col-4">
                        <ul class="list-group">
                            <li class="list-group-item active fw-bold"> Mesa N° {{$mesa->id}} </li>
                            @foreach($exam->alumnos()->where('mesa_id',$mesa->id)->get() as $alumno)
                            <li class="list-group-item
                            @if($alumno->pivot->callification >= $selectedNote) list-group-item-success @else list-group-item-danger @endIf"> 
                            {{$alumno->name}} {{$alumno->lastName}} : {{$alumno->pivot->callification}} </li>
                            @endforeach
                        </ul>
                        </div>

                    @endforeach

                </div>

            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-danger btn-lg" href="{{route('exams.index')}}"> Cancelar </a>
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn btn-primary btn-lg" type="submit"> Confirmar cierre de examen </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>