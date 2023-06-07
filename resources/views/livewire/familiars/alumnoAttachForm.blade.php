<div>

    <form method="POST" action="{{ route('familiars.attachAlumno', $familiar->DNI)}}">
        @csrf
        <div class="input-group mb-2">
            
            <span class="input-group-text"> Alumno </span>
            <input type="text" class="form-control" wire:model="filter" aria-label="Filtro" placeholder="Filtro">
            <select class="form-select" id="alumno" name="alumno" placeholder="filtro" required>
                <option selected> Seleccionar alumno </option>
                @foreach($alumnos as $alumno)
                <option value="{{$alumno->DNI}}"> {{$alumno->name}} {{$alumno->lastName}} - {{$alumno->DNI}} </option>
                @endforeach
            </select>
            
            <select class="form-select" id="relation" name="relation" required>
                <option selected> Seleccionar relación </option>
                <option value="Padre"> Padre </option>
                <option value="Madre"> Madre </option>
                <option value="Tutor"> Tutor </option>
                <option value="Abuelo"> Abuelo </option>
                <option value="Abuela"> Abuela </option>
            </select>

            <button type="submit" class="btn btn-primary"> Confirmar </button>
        </div>
    </form>

</div>