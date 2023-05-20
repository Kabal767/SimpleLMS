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
                    <th>N°Mesa</th>
                    <th>Oral</th>
                    <th>Escrito</th>
                    <th>N°Mesa</th>
                    <th>Oral</th>
                    <th>Escrito</th>
                    <th>N°Mesa</th>
                    <th>Oral</th>
                    <th>Escrito</th>
                    <th> Promedio </th>
                    <th> Calificación final </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach($shownMaterias as $materia)
                <tr>
                    <th scope="row"> {{$materia->Name}} </th>
                    <td> {{$materia->pivot->condition}} </td>
                    <td> {{$materia->pivot->quarter1}} </td>
                    <td> {{$materia->pivot->quarter2}} </td>
                    <td> {{$materia->pivot->quarter3}} </td>
                    <td> 
                        @if($exams->where('materia_id',$materia->id)->first() == NULL)
                        -/-
                        @else
                        N°{{$exams->where('materia_id',$materia->id)->first()->pivot->mesa_id}}
                        @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> {{$materia->pivot->average}} </td>
                    <td> {{$materia->pivot->callification}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
