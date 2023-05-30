<div>

    <form method="POST" action="{{ route('exams.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {!! $errors->first('Name', '<div class="invalid-feedback">:message</div>') !!}

            <div class="col-auto m-2">
                <button name="but" id="but" type="submit" class="btn btn-primary"> Registrar examen </button>
            </div>

            @if($selectedCondition == 'Final' || $selectedCondition == 'Diciembre')

                <div class="col-auto m-2">
                    <label for="id_curso" class="form-label">Curso</label>
                    <select class="form-select form-select" name="id_curso" id="id_curso" wire:model="selectedCurso">
                        <option selected>Escoger curso</option>
                        @foreach($cursos as $curso)
                        <option value="{{$curso->id}}"> {{$curso->curso}}°{{$curso->div}} - Turno {{$curso->turno}} </option>
                        @endforeach
                    </select>
                </div>

            @endif

            <div class="col-auto m-2">
                <label for="id_materia" class="form-label">Materia</label>
                <select class="form-select form-select" name="id_materia" id="id_materia">
                    <option selected>Escoger materia</option>
                    @foreach($materias as $materia)
                    <option value="{{$materia->id}}"> {{$materia->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-auto m-2">
                <label for="Proffesor" class="form-label"> Profesor </label>
                <input type="text" class="form-control" name="Proffesor" id="Proffesor">
            </div>

            <div class="col-auto m-2">
                <label for="condition" class="form-label">Condición</label>
                <select class="form-select form-select" name="condition" id="condition" wire:model="selectedCondition">
                    <option value="Final" selected> Final </option>
                    <option value="Diciembre"> Diciembre </option>
                    <option value="Regular"> Regular </option>
                    <option value="Adeudada"> Adeudada </option>
                </select>
            </div>

            <div class="col-auto m-2">
                <label for="date" class="form-label"> Fecha </label>
                <input type="date" class="form-control" name="Date" id="Date">
            </div>
        </div>
    </form>

</div>