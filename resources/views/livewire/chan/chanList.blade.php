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
                <th role="button" wire:click="order('user_id')"> Usuario </th>
                <th role="button" wire:click="order('object_id')"> Objeto </th>
                <th colspan="2" role="button" wire:click="order('type')"> Tipo </th>
                <th role="button" wire:click="order('created_at')"> Fecha de creación </th>
              </tr>
              @foreach($shownChanges as $change)
              <tr>
                <th> {{$change->id}} </th>
                <td> {{$change->user_id}} </td>
                <td> {{$change->object_id}} </td>
                <td colspan="2"> {{$change->type}} </td>
                <td> {{$change->created_at}} </td>
              </tr>
              @endforeach
            </thead>
        </table>

    </div>

</div>