<div class=" bboxox-info padding-1">
    <div class="box-body p-2">
    </div>
    <div class="box-footer mt20">        
        <form method="POST" action="{{ route('alumnos.store') }}">
            @csrf

            <input id="name" name="name" type="text" class="form-control" placeholder="Nombres" required>
            <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Apellido" required>
            <input id="DNI" name="DNI" type="text" class="form-control" placeholder="DNI" required>
            <select id="gender" name="gender" class="form-control" required>
                <option value="" selected> Seleccionar género </option>
                <option value="M"> Masculino </option>
                <option value="F"> Femenino </option>
                <option value="O"> Otro </option>
            </select>
            <input id="birthDate" name="birthDate" type="date" class="form-control" placeholder="DNI" required>

            <input id="tel" name="tel" type="text" class="form-control" placeholder="Teléfono" required>
            <input id="locality" name="locality" type="text" class="form-control" placeholder="Localidad" required>
            <input id="direction" name="direction" type="text" class="form-control" placeholder="Dirección" required>

            <input id="birthPlace" name="birthPlace" type="text" class="form-control" placeholder="Lugar de nacimiento" required>
            <input id="origin" name="origin" type="text" class="form-control" placeholder="Origen" required>
            <input id="nation" name="nation" type="text" class="form-control" placeholder="Nacionalidad" required>

            <select id="id_Curso" name="id_Curso" class="form-control" required>
                    <option value="" selected> Seleccione un curso </option>
                @foreach($cursos as $curso)
                    <option value="{{$curso->id}}"> {{$curso->curso}}° "{{$curso->div}}" {{$curso->turno}}  </option>
                @endforeach
            </select>

            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>