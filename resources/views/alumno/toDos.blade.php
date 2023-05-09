@extends('layouts.app')

@section('template_title')
    Create Alumno
@endsection

@section('content')

<div class=" bboxox-info padding-1">
    <div class="box-body p-2">
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

        <!-- Card container -->
        <!-- Tabla de materias pendientes -->
        <div class="card card-default">
            <div class="card-header">
                <h4>Materias pendientes</h4>
            </div>
          <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th> Nombre de materia </th>
                        <th> Año de materia </th>
                        <th> Condición </th>
                        <th> Promedio </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumno->materias as $materia)
                        <tr>
                            <th scope="row"> {{$materia->Name}} </th>
                            <td> {{$materia->pivot->year}} </td>
                            <td> {{$materia->pivot->condition}} </td>
                            <td> {{$materia->pivot->callification}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
        <strong>Dni:</strong>
        <h1>{{ $alumno->name}}</h1>
    </div>
</div>

@endsection