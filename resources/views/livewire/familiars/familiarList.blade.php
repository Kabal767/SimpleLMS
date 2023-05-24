<div>

  <div class="card-body">
    <div class="input-group mb-3">
      <span class="input-group-text"> Buscar </span>
      <input type="text" class="form-control" placeholder="Buscar" wire:model="searchInput">
      <a class="btn btn-primary" href="{{ route('familiars.create') }}"> Nuevo Familiar </a>
    </div>
  </div>

  <div class="card-body">

    @if($shownFamiliars->count())

      <table class="table">
          <thead>
            <tr>
              <th scope="col" role="button" wire:click="order('DNI')"> DNI </th>
              <th scope="col" role="button" wire:click="order('names')"> Nombres </th>
              <th scope="col" role="button" wire:click="order('lastName')"> Apellido </th>
              <th scope="col" role="button" wire:click="order('nation')"> Nacionalidad</th>
              <th scope="col" role="button" wire:click="order('direction')"> Domicilio </th>
              <th scope="col" role="button" wire:click="order('tel')"> Telefóno </th>
              <th scope="col" role="button" wire:click="order('mail')"> E-Mail</th>
              <th scope="col" colspan="3"> Acciones </th>
            </tr>
          </thead>
          <tbody>
              @foreach ($shownFamiliars as $familiar)
              <tr>
                  <th> {{$familiar->DNI}} </th>
                  <td> {{$familiar->names}} </td>
                  <td> {{$familiar->lastName}} </td>
                  <td> {{$familiar->nation}} </td>
                  <td> {{$familiar->direction}} </td>
                  <td> {{$familiar->tel}} </td>
                  <td> {{$familiar->mail}} </td>
                  <td> <a class="btn btn-primary" href="{{route('familiars.show', $familiar->id)}}"> Detalles </a></td>                  
                  <td> <a class="btn btn-primary" href="{{route('familiars.edit', $familiar->id)}}"> Modificar </a></td>                  
                  <td>
                    <form action="{{ route('familiars.destroy', $familiar) }}" method="POST">
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