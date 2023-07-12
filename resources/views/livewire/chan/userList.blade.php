<div>

    <div class="card-body">
      <div class="input-group mb-3">
        <span class="input-group-text"> Buscar </span>
        <input type="text" class="form-control" placeholder="Buscar" wire:model="searchInput">
      </div>
    </div>
    
    <div class="card-body">

        <table class="table">
            <thead>
              <tr>
                <th role="button" wire:click="order('id')"> ID </th>
                <th role="button" wire:click="order('name')"> Nombre </th>
                <th> N° de Cambios </th>
                <th role="button" wire:click="order('role')"> Rol </th>
                <th colspan="2"> Acciones </th>
              </tr>
              @foreach($usuarios as $usuario)
              <tr>
                <th> {{$usuario->id}} </th>
                <td> {{$usuario->name}} </td>
                <td> {{$usuario->name}} </td>
                <td> {{$usuario->role}} </td>
                <td> <a class="btn btn-primary" href="{{route('chans.showUser', $usuario->id)}}"> Detalles </a> </td>
                <td> <button class="btn btn-danger"> Borrar </button> </td>
              </tr>
              @endforeach
            </thead>
        </table>

    </div>

</div>