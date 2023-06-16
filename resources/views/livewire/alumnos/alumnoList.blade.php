<div>

    <div class="card-body">
      <div class="input-group mb-3">
        <span class="input-group-text"> Buscar </span>
        <input type="text" class="form-control" placeholder="Buscar" wire:model="searchInput">
        <select class="form-select" wire:model="selectedCurso">
          <option value="" selected> Ningún curso seleccionado </option>
          @foreach($cursos as $curso)
            <option value="{{$curso->id}}"> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </option>
          @endforeach
          <option value="egresado"> Egresado </option>
        </select>
        <a class="btn btn-primary" href="{{ route('alumnos.create') }}"> Nuevo Alumno </a>
      </div>
    </div>
  
    <div class="card-body">
  
      @if($shownAlumnos->count())
  
        <table class="table">
            <thead>
              <tr>
                <th scope="col" role="button" wire:click="order('DNI')"> DNI </th>
                <th scope="col" role="button" wire:click="order('name')"> Nombres </th>
                <th scope="col" role="button" wire:click="order('lastName')"> Apellido </th>
                <th scope="col" role="button" wire:click="order('sex')"> Sexo </th>
                <th scope="col" role="button" wire:click="order('birthDate')"> Fecha de nacimiento </th>
                <th scope="col" role="button" wire:click="order('birthPlace')"> Lugar de nacimiento </th>
                <th scope="col" role="button" wire:click="order('nation')"> Nacionalidad</th>
                <th scope="col" role="button" wire:click="order('tel')"> Telefóno </th>
                <th scope="col" role="button" wire:click="order('locality')"> Localidad </th>
                <th scope="col" role="button" wire:click="order('direction')"> Domicilio </th>
                <th scope="col" colspan="3"> Acciones </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($shownAlumnos as $alumno)
                <tr>
                    <th> {{$alumno->DNI}} </th>
                    <td> {{$alumno->name}} </td>
                    <td> {{$alumno->lastName}} </td>
                    <td> {{$alumno->sex}} </td>
                    <td> {{$alumno->birthDate}} </td>
                    <td> {{$alumno->birthLocality}} </td>
                    <td> {{$alumno->nation}} </td>
                    <td> {{$alumno->tel}} </td>
                    <td> {{$alumno->locality}} </td>
                    <td> {{$alumno->direction}} </td>
                    <td> <a class="btn btn-primary" href="{{route('alumnos.show', $alumno->DNI)}}"> Detalles </a></td>                  
                    <td> <a class="btn btn-primary" href="{{route('alumnos.edit', $alumno->DNI)}}"> Modificar </a></td>                  
                    <td>
                      <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
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