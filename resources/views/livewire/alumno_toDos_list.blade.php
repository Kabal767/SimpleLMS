<div>

<!-- Lista de materias -->
<div class="card card-default m-3">
    <div class="card-header">
        <div class="row">
            <div class="col-auto">
                <h4>Materias</h4></div>

            <div class="col-auto">
                <select class="form-select form-select" wire:model="selectedCurso" name="origin_id" id="origin_id">
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}"> {{$curso->curso}}°{{$curso->div}} - Turno {{$curso->turno}} </option>
                    @endforeach
                    <option value="pending"> Pendiente </option>
                </select>
            </div>

        </div>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <thead>
                    <tr>
                    <th colspan="5"></th>
                    <th colspan="3" class="text-center"> Final </th>
                    <th colspan="3" class="text-center"> Diciembre </th>
                    <th colspan="3" class="text-center"> Febrero </th>
                    </tr>
                </thead>
                <tr>
                    <th> Nombre de materia </th>
                    <th> Condición </th>
                    <th> 1er Trimestre </th>
                    <th> 2do Trimestre </th>
                    <th> 3er Trimestre </th>
                    <th> Promedio </th>
                    <th>N°Mesa</th>
                    <th>Oral</th>
                    <th>Escrito</th>
                    <th>N°Mesa</th>
                    <th>Oral</th>
                    <th>Escrito</th>
                    <th>N°Mesa</th>
                    <th>Oral</th>
                    <th>Escrito</th>
                    <th> Calificación final </th>
                    <th> Acciones </th>
                </tr>
            </thead>
            <tbody>
                @foreach($shownMaterias as $materia)
                <tr>
                    <th scope="row"> {{$materia->name}} </th>
                    <td> {{$materia->pivot->condition}} </td>
                    <td> {{$materia->pivot->quarter1}} </td>
                    <td> {{$materia->pivot->quarter2}} </td>
                    <td> {{$materia->pivot->quarter3}} </td>
                    <td> {{$materia->pivot->average}} </td>
                    @php($exam = $alumno->exams->where('materia_id',$materia->id)->where('condition','Final')->first())
                        @if($exam == NULL)
                        <td>-/-</td>
                        <td>-/-</td>
                        <td>-/-</td>
                        @else
                        <td>N°{{$exam->pivot->mesa_id}}</td>
                        <td>{{$exam->pivot->oral}}</td>
                        <td>{{$exam->pivot->written}}</td>
                        @endif
                    @php($exam = $alumno->exams->where('materia_id',$materia->id)->where('condition','Diciembre')->first())
                        @if($exam == NULL)
                        <td>-/-</td>
                        <td>-/-</td>
                        <td>-/-</td>
                        @else
                        <td>N°{{$exam->pivot->mesa_id}}</td>
                        <td>{{$exam->pivot->oral}}</td>
                        <td>{{$exam->pivot->written}}</td>
                        @endif
                    @php($exam = $alumno->exams->where('materia_id',$materia->id)->where('condition','Regular')->first())
                        @if($exam == NULL)
                        <td>-/-</td>
                        <td>-/-</td>
                        <td>-/-</td>
                        @else
                        <td>N°{{$exam->pivot->mesa_id}}</td>
                        <td>{{$exam->pivot->oral}}</td>
                        <td>{{$exam->pivot->written}}</td>
                        @endif
                    <td> {{$materia->pivot->callification}} </td>
                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$materia->id}}" @if($materia->pivot->condition == 'Aprobada') disabled @endif> Modificar </button> </td>

                    

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- MODALS -->
@foreach($alumno->materias as $materia)
<div  class="modal fade modal-lg" id="modal{{$materia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('alumnos.updateMateria', [$alumno->DNI, $materia->id]) }}"  role="form" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header">
            <div class="col-6"><h1 class="modal-title fs-5" id="exampleModalLabel"> Alumno: {{$alumno->name}} {{$alumno->lastName}} </h1></div>
            <div class="col-5"><h1 class="modal-title fs-5" id="exampleModalLabel"> Materia: {{$materia->name}} </h1></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-auto">
                        <label for="q1" class="form-label"> Primer trimestre </label>
                        <input type="number" class="form-control" name="q1" id="q1" value="{{$materia->pivot->quarter1}}">
                    </div>

                    <div class="col-auto">
                        <label for="q2" class="form-label"> Segundo trimestre</label>
                        <input type="number" class="form-control" name="q2" id="q2" value="{{$materia->pivot->quarter2}}">
                    </div>

                    <div class="col-auto">
                        <label for="q3" class="form-label"> Tercer trimestre </label>
                        <input type="number" class="form-control" name="q3" id="q3" value="{{$materia->pivot->quarter3}}">
                    </div>

                    <div class="col-auto">
                        <label for="callification" class="form-label"> Calificación final </label>
                        <input type="number" class="form-control" name="callification" id="callification" value="{{$materia->pivot->callification}}">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
    

    </form>
</div>
@endforeach

</div>
