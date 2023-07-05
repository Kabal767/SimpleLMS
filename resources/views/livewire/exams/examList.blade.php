<div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card-body">

        <h4 class="ms-4"> BUSCADOR </h4>

        <!-- We encapsulate in a row for correct padding of the input-group-->
        <div class="row m-3">

            <div class="input-group">
                <span class="input-group-text"> Curso </span>
                <select wire:model="selectedCurso" class="form-select">
                    <option selected value=""> Cualquiera </option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}"> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </option>
                    @endforeach
                </select>

                <span class="input-group-text"> Materia </span>
                <select wire:model="selectedMateria" class="form-select">
                    <option selected value=""> Cualquiera </option>
                    @foreach($shownMaterias as $materia)
                    <option value="{{$materia->id}}"> {{$materia->name}} </option>
                    @endforeach
                </select>

                <span class="input-group-text"> Condición </span>
                <select wire:model="selectedCondition" class="form-select">
                    <option selected value=""> Cualquiera </option>
                    <option value="Final"> Final </option>
                    <option value="Diciembre"> Diciembre </option>
                    <option value="Regular"> Regular </option>
                    <option value="Adeudada"> Adeudada </option>
                </select>
            </div>

        </div>

    </div>

    <div class="card-footer">
        <table class="table">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Fecha </th>
                    <th> Estado </th>
                    <th> Condición </th>
                    <th> Curso </th>
                    <th> Materia </th>
                    <th> Alumnos </th>
                    <th colspan="3"> Acciones </th>
                </tr>
            </thead>
            <tbody>
                @if($exams->count())
                @foreach($exams as $exam)
                <tr>
                    <th> {{$exam->id}} </th>
                    <th> {{$exam->mesas()->first()->Date}}</th>
                    <th> {{$exam->state}} </th>
                    <td> {{$exam->condition}} </td>
                    <td> 
                    @if($exam->curso == NULL)
                        -/-
                    @else
                        {{ $exam->curso->curso}}°{{ $exam->curso->div}} - Turno {{ $exam->curso->turno}}
                    @endif 
                    </td>
                    <td> {{$exam->materia->name}} </td>
                    <td> {{$exam->alumnos->count()}} </td>
                    <td> <a class="btn btn-primary" href="{{route('exams.showMesas', $exam->id)}}"> Detalles </a> </td>
                    <td> <a class="btn btn-primary @if($exam->state == 'Cerrado') disabled @endif" href="{{route('exams.close', $exam->id)}}"> Cerrar examen </a> </td>
                    <td>
                        <form action="{{ route('exams.destroy', $exam->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" @if($exam->state == 'Cerrado') disabled @endif> Borrar </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="7"> <h4> SIN RESULTADOS </h4> </th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    
    <div class="card-footer">
        <div class="row m-3">
            <a class="btn btn-primary" href="{{ url('/home') }}"> Retroceder </a>
        </div>
    </div>

</div>