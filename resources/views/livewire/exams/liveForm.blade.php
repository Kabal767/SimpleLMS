<div>

    <form method="POST" action="{{ route('exams.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
        <div class="row m-3">
            {!! $errors->first('Name', '<div class="invalid-feedback">:message</div>') !!}

            <div class="input-group">
                
                <span class="input-group-text"> Condición </span>
                <select class="form-select" name="condition" id="condition" wire:model="selectedCondition">
                    <option value="Final" selected> Final </option>
                    <option value="Diciembre"> Diciembre </option>
                    <option value="Regular"> Regular </option>
                    <option value="Adeudada"> Adeudada </option>
                </select>

                @if($selectedCondition == 'Final' || $selectedCondition == 'Diciembre')
                <span class="input-group-text"> Curso </span>
                <select class="form-select" name="id_curso" id="id_curso" wire:model="selectedCurso">
                    <option selected> Escoger curso </option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}"> {{$curso->curso}}°{{$curso->div}} - Turno {{$curso->turno}} </option>
                    @endforeach
                </select>
                @endif

                <span class="input-group-text"> Materia </span>
                <select class="form-select" name="id_materia" id="id_materia">
                    <option selected>Escoger materia</option>
                    @foreach($materias as $materia)
                    <option value="{{$materia->id}}"> {{$materia->name}} </option>
                    @endforeach
                </select>

                <span class="input-group-text"> Profesor </span>
                <input type="text" class="form-control" name="Proffesor" id="Proffesor">

                <span class="input-group-text"> Fecha </span>
                <input type="date" class="form-control" name="Date" id="Date">

                <button type="submit" class="btn btn-primary"> Registrar examen </button>

            </div>
        </div>
    </form>

</div>