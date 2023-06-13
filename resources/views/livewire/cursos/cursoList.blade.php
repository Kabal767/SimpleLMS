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

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mainModal">
            Nuevo Curso
          </button>

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
                        <td> 
                          <a class="btn btn-primary" href="{{route('cursos.edit',$curso->id)}}"> Modificar </a>
                        </td>
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
    
    
    <!--MODALS-->
    <!--Main modal-->
    <div wire:ignore class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="mainModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <form method="POST" action="{{ route('cursos.store') }}"  role="form" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
            <span class="card-title mt-3"><h3> CREAR CURSO </h3></span>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            <div class="row m-4">

              <div class="input-group">
                  <span class="input-group-text"> AÑO </span>
                  <input type="number" class="form-control" name="curso" id="curso" placeholder="N°">

                  <span class="input-group-text"> DIVISIÓN </span>
                  <select class="form-select" name="div" id="div">
                      <option selected> Escoger división </option>
                      <option value="A"> "A" </option>
                      <option value="B"> "B" </option>
                      <option value="C"> "C" </option>
                      <option value="D"> "D" </option>
                  </select>

                  <span class="input-group-text"> TURNO </span>
                  <select class="form-select" name="turno" id="turno">
                      <option value="Mañana"> Mañana </option>
                      <option value="Tarde"> Tarde </option>
                      <option value="Noche"> Noche </option>
                  </select>
              </div>

            </div>

            <div class="row m-4">
                <label for="materias"> Materias </label>
                <select name="materias[]" id="materias" 
                class="select2" style="width:100%"
                data-style="btn-primary" title="Seleccionar Materias" multiple aria-label="materia select" required> 
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}"> {{ $materia->name }} </option>
                    @endforeach
                </select>
            </div>

          </div>

          <div class="modal-footer">

            <div class="row text-end">
                  <button type="submit" class="btn btn-primary btn-lg me-md-2"> Registrar curso </button>
            </div>

          </div>
        </form>

        </div>
      </div>
    </div>

    <!--Modify Modals-->
    @foreach($cursos as $curso)
    <div wire:ignore class="modal fade" id="modify{{$curso->id}}" tabindex="-1" aria-labelledby="mainModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <form method="POST" action="{{ route('cursos.update',$curso->id) }}"  role="form" enctype="multipart/form-data">
          @csrf

          <div class="modal-header">
            <span class="card-title mt-3"><h3> MODIFICAR CURSO {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </h3></span>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            
            <h4 class="ms-3 mb-3"> MATERIAS ACTUALES </h4>

            <div class="mt3 ms-3 text-left">

              <h4>
              @foreach($curso->materias as $materia)
              <span class="badge bg-primary"> {{$materia->name}} </span>
              @endforeach
              </h4>

            </div>

            <div class="row m-4">
                <label for="materias"> Materias </label>
                <select name="materias[]" id="materias" 
                class="select2{{$curso->id}}" style="width:100%"
                data-style="btn-primary" title="Seleccionar Materias" multiple aria-label="materia select" required> 
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}"> {{ $materia->name }} </option>
                    @endforeach
                </select>
            </div>

          </div>

          <div class="modal-footer">

            <div class="row text-end">
                  <button type="submit" class="btn btn-primary btn-lg me-md-2"> Confirmar cambios </button>
            </div>

          </div>
        </form>

        </div>
      </div>
    </div>
    @endforeach

    
<!-- Logic -->
@section('js')
    
<script>
    $('.select2').select2({
      dropdownParent: $('#mainModal')
    });
</script>

<!--
<script>
  $('select21').select2({
    dropdownParent: $('#modify')
  });
</script>
-->

<!-- Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection

</div>