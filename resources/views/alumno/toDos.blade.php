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
                <a class="btn btn-primary" href="{{route('alumnos.show', $alumno->id)}}"> Datos personales </a>
                <a class="btn btn-primary disabled" href="{{route('alumnos.toDos', $alumno->id)}}"> Desempeño académico </a>
                <a class="btn btn-primary" href="{{route('alumnos.family', $alumno->id)}}"> Familiares </a>
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
                                    <h1><span class="badge bg-primary"> Sexo: {{$alumno->gender}} </span></h1>
                                </div>

                            </div>                                 
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Small form to add new pending materias -->
                    <form method="POST" action="{{ route('alumnos.addPending', $alumno->id) }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                            <label for="alumno_id" class="col-form-label">ID de Alumno</label>
                            </div>
                            <div class="col-auto">
                            <input type="text" id="alumno_id" name="alumno_id" class="form-control" aria-label="alumno_id" value="{{$alumno->id}}" disabled>
                            </div>
                            <div class="col-auto">
                                <label for="materia_id" class="col-form-label">Materia</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" id="materia_id" name="materia_id" aria-label="materia_id" required>
                                    <option value="" selected> Seleccione una materia </option>
                                    @foreach($materias as $materia)
                                        <option value="{{$materia->id}}"> {{$materia->Name}} </option>
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
                    
                    @livewire('to-dos-list', ['materias' => $alumno->materias, 'cursos' => $alumno->cursos, 'alumno' => $alumno->id])

                    <!-- Lista de materias -->
                    <div class="card card-default m-3">
                        <div class="card-header">
                            <h4>Materias pendientes</h4>
                        </div>
                      <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Nombre de materia </th>
                                    <th> Condición </th>
                                    <th> 1er Trimestre </th>
                                    <th> 2do Trimestre </th>
                                    <th> 3er Trimestre </th>
                                    <th> Promedio </th>
                                    <th> Calificación final </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection