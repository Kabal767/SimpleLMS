<div>

    <div class="card-footer">
        
        <div class="input-group">

            <span class="input-group-text"> Año de cursado </span>
            <select class="form-select" wire:model="selectedYear">
                @foreach($years as $year)
                    <option value="{{$year}}"> {{$year}} </option>
                @endforeach
            </select>

            <span class="input-group-text"> DNI/Nombre/Apellido </span>
            <input type="text" class="form-control" wire:model="searchInput" placeholder="DNI/Nombre/Apellido">

        </div>

    </div>

    <div class="card-footer">

        <table class="table">
            <thead>

                <th> DNI </th>
                <th> Nombres </th>
                <th> Apellido </th>
                <th> Promedio </th>
                <th> Inasistencias </th>
                <th> Condición </th>
                <th> Acciones </th>

            </thead>
            <tbody>
                @foreach($curso->alumnos as $alumno)
                <tr>
                    <th> {{$alumno->DNI}} </th>
                    <td> {{$alumno->name}} </td>
                    <td> {{$alumno->lastName}} </td>
                    <td> RECUERDA CODEAR ESTO </td>
                    <td> RECUERDA AÑADIR ESTO A LA TABLA PIVOT </td>
                    <td> RECUERDA AÑADIR ESTO A LA TABLA PIVOT </td>
                    <td> <a class="btn btn-primary" href="{{route('alumnos.show',$alumno->DNI)}}"> Detalles </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="card-footer">

        <h4 class="mt-2"><a class="btn btn-primary" href="{{route('cursos.index')}}"> Retroceder </a></h4>

    </div>

</div>