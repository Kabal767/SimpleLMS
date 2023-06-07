<div>

    <div class="card-body">
        <div class="input-group mb-3">

          <span class="input-group-text"> Curso </span>
          <select class="form-select" wire:model="selectedCurso">
            <option value=""> Cualquiera </option>
            @for($i = 1; $i < 6; $i++)
                <option value="{{$i}}"> {{$i}}° Año </option>
            @endfor
          </select>

          <span class="input-group-text"> División </span>
          <select class="form-select" wire:model="selectedDiv">
            <option value=""> Cualquiera </option>
            <option value="A"> "A" </option>
            <option value="B"> "B" </option>
            <option value="C"> "C" </option>
            <option value="D"> "D" </option>
          </select>

          <span class="input-group-text"> Turno </span>
          <select class="form-select" wire:model="selectedTurno">
            <option value=""> Cualquiera </option>
            <option value="Mañana"> Turno mañana </option>
            <option value="Tarde"> Turno tarde </option>
            <option value="Noche"> Turno noche </option>
          </select>

          <a class="btn btn-primary" href="{{ route('cursos.create') }}"> Nuevo Curso </a>

        </div>

        <div class="card-body">
  
            @if($cursos->count())
        
              <table class="table">
                <thead>
                    <th scope="col" role="button" wire:click="order('curso')"> Año </th>
                    <th scope="col" role="button" wire:click="order('div')"> División </th>
                    <th scope="col" role="button" wire:click="order('turno')"> Turno </th>
                    <th> Cantidad de alumnos </th>
                    <th colspan="3"> Acciones </th>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    <tr>
                        <td> {{$curso->curso}}° Año </td>
                        <td> "{{$curso->div}}" </td>
                        <td> Turno {{$curso->turno}} </td>
                        <td> {{$curso->alumnos->count()}} </td>
                        <td> <a class="btn btn-primary" href="{{route('cursos.show', $curso->id)}}"> Detalles </a> </td>
                        <td> <a class="btn btn-primary" href="{{route('cursos.edit', $curso->id)}}"> Modificar </a> </td>
                        <td> 
                            <form action="{{ route('cursos.destroy', $curso) }}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Borrar </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>

            @else
  
              <h4> Sin resultados </h4>
        
            @endif

        </div>

    </div>
    

</div>