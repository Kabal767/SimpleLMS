<div>

    <div class="card-footer">
        
        <div class="input-group">

            <span class="input-group-text"> Año de cursado </span>
            <select class="form-select" wire:model="selectedYear">
                @foreach($years as $year)
                    <option value="{{$year}}"> {{$year}} </option>
                @endforeach
            </select>

            {{$selectedYear}}
            {{$curso->id}}

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
                @foreach($shownAlumnos as $alumno)
                <tr>
                    <th> {{$alumno->DNI}} </th>
                    <td> {{$alumno->name}} </td>
                    <td> {{$alumno->lastName}} </td>
                    <td> {{$alumno->pivot->average}}</td>
                    <td> {{$alumno->pivot->inasistencias}}/30 </td>
                    <td> {{$alumno->pivot->condition}} </td>
                    <td> <a class="btn btn-primary" href="{{route('alumnos.show',$alumno->DNI)}}"> Detalles del Alumno </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="card-footer">

        <h4 class="mt-2"><a class="btn btn-primary" href="{{route('cursos.index')}}"> Retroceder </a></h4>

    </div>

</div>