@extends('layouts.app')

@section('template_title')
    Create Curso
@endsection

@section('css')
<!-- Select -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default m-4">

                    <div class="card-header">
                        <span class="card-title"> CREAR CURSO </span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cursos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            
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
                                class="select2"
                                data-style="btn-primary" title="Seleccionar Materias" multiple aria-label="materia select" required> 
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}"> {{ $materia->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                        </form>
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