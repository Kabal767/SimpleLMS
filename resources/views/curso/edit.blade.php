@extends('layouts.app')

@section('template_title')
    Update Curso
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default m-4">

                    <form method="POST" action="{{ route('cursos.update', $curso->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                    <div class="card-header">
                        <span class="card-title"> MODIFICAR CURSO {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </span>
                    </div>

                    <div class="card-body">
            
                            <h4 class="ms-3 mb-3"> MATERIAS ACTUALES </h4>

                            <div class="mt3 ms-3 text-left">
                
                              <h4>
                              @foreach($curso->materias as $materia)
                              <span class="badge bg-primary"> {{$materia->name}} </span>
                              @endforeach
                              </h4>
                
                            </div>

                            <div class="row m-4">
                                <label for="materias"> Nuevas materias </label>
                                <label class="text-muted" for="materias"><small> Estas materias reemplazarán a las actuales. </small></label>
                                <select name="materias[]" id="materias" 
                                class="select2"
                                data-style="btn-primary" title="Seleccionar Materias" multiple aria-label="materia select" required> 
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}"> {{ $materia->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                    </div>

                    <div class="card-footer">
                        
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-danger btn-lg" href="{{route('cursos.index')}}"> Cancelar </a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary btn-lg me-md-2"> Registrar curso </button>
                            </div>
                        </div>

                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Logic -->
@section('js')
    
<script>
    //This one gives format to the select2 class
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>

<!-- Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection