@extends('layouts.app')

@section('content')

<div class="container-fluid">


    <!-- Menu Container -->
    <div class="row gy-11">

        <!-- Upper Menu -->
        <div class="row align-items-center text-center gy-5">
            <!-- Lista de alumnos -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('alumnos.index') }}"> {{ __('Lista de Alumnos') }} </a>        </div>

            <!-- Lista de exámenes -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('exams.index') }}"> {{ __('Lista de Exámenes') }} </a>        </div>

            <!-- Nuevo Alumno -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('alumnos.create') }}"> {{ __('Nuevo Alumno') }} </a>        </div>
            
            <!-- Nuevo examen -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('exams.create') }}"> {{ __('Nuevo Exámen') }} </a>        </div>
        </div>

        <!-- Lower menu -->
        <div class="row align-items-center text-center gy-5">
            <!-- Lista de materias -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('materias.index') }}"> {{ __('Lista de Materias') }} </a>        </div>

            <!-- Lista de cursos -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('cursos.index') }}"> {{ __('Lista de Cursos') }} </a>        </div>

            <!-- Nueva materia -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('materias.create') }}"> {{ __('Nueva Materia') }} </a>        </div>
            
            <!-- Nuevo curso -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('cursos.create') }}"> {{ __('Nuevo Curso') }} </a>        </div>
        </div>
    </div>

</div>

@endsection