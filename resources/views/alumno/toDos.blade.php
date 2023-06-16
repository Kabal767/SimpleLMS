@extends('layouts.app')

@section('template_title')
    Create Alumno
@endsection

@section('content')

<section class="content container-fluid">
    <div class="row">

        <!-- Hader with links to more details -->
        <div class="col-12 align-self-center text-center m-1">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{route('alumnos.show', $alumno->DNI)}}"> Datos personales </a>
                <a class="btn btn-primary disabled" href="{{route('alumnos.toDos', $alumno->DNI)}}"> Desempeño académico </a>
                <a class="btn btn-primary" href="{{route('alumnos.family', $alumno->DNI)}}"> Familiares </a>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title"> 
                            <div class="row text-center">

                                <!-- Cabecera -->
                                <div class="col-3">
                                    <h1><span class="badge bg-primary"> {{$alumno->name}} {{$alumno->lastName}} </span></h1> 
                                </div>                               
                                <div class="col-3">
                                    <h1><span class="badge bg-primary"> DNI: {{$alumno->DNI}} </span></h1>
                                </div>
                                <div class="col-3">
                                    <h1><span class="badge bg-primary"> Curso: {{$curso->curso}}°{{$curso->div}} - Turno {{$curso->turno}}  </span></h1>
                                </div>
                                <div class="col-3">
                                    <h1><span class="badge bg-primary"> Sexo: {{$alumno->sex}} </span></h1>
                                </div>

                            </div>                                 
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Small form to add new pending materias -->
                    <form method="POST" action="{{ route('alumnos.addPending', $alumno->DNI) }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="materia_id" class="col-form-label">Materia</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" id="materia_id" name="materia_id" aria-label="materia_id" required>
                                    <option value="" selected> Seleccione una materia </option>
                                    @foreach($materias as $materia)
                                        <option value="{{$materia->id}}"> {{$materia->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="date" class="col-form-label">Año de cursado "(AA-MM-DD)"</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="date" name="date" class="form-control" value="{{$date}}" aria-label="date" >
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary"> Añadir materia </button>
                            </div>
                        </div>
                    </form>
                    
                    @livewire('to-dos-list', ['materias' => $alumno->materias, 'cursos' => $alumno->cursos, 'alumno' => $alumno])

                </div>
                <div class="card-footer">
                    <a class="btn btn-primary ms-4" href="{{ route('alumnos.index') }}"> Regresar a la lista </a> 
                </div>
            </div>
        </div>

    </div>
</section>

@endsection