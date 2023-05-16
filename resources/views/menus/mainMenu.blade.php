@extends('layouts.app')

@section('content')

<div class="container-fluid">


    <!-- Menu Container -->
    <div class="row gy-11">

        <!-- Upper Menu -->
        <div class="row align-items-center text-center gy-5">
            <!-- Lista de alumnos -->
            <div class="col-3">
                <a class="btn btn-primary" href="{{ route('alumnos.index') }}"> <h4>{{ __('Lista de Alumnos') }}</h4> </a>        </div>
            <div class="col-3">
                <a class="btn btn-primary" href="{{ route('familiars.index') }}"> <h4>{{ __('Lista de Familiares') }}</h4> </a>        </div>

            <!-- Lista de exámenes -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('exams.index') }}"> <h4>{{ __('Lista de Exámenes') }}</h4> </a>        </div>

            <!-- Nuevo Alumno -->
            <div class="col-3">
                <a class="btn btn-primary" href="{{ route('alumnos.create') }}"> <h4>{{ __('Nuevo Alumno') }}</h4> </a>        </div>
            <div class="col-3">
                <a class="btn btn-primary" href="{{ route('familiars.create') }}"> <h4>{{ __('Nuevo Familiar') }}</h4> </a>        </div>
            
            <!-- Nuevo examen -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('exams.create') }}"> <h4>{{ __('Nuevo Exámen') }}</h4> </a>        </div>
        </div>

        <!-- Lower menu -->
        <div class="row align-items-center text-center gy-5">
            <!-- Lista de materias -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('materias.index') }}"> <h4>{{ __('Lista de Materias') }}</h4> </a>        </div>

            <!-- Lista de cursos -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('cursos.index') }}"> <h4>{{ __('Lista de Cursos') }}</h4> </a>        </div>

            <!-- Nueva materia -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('materias.create') }}"> <h4>{{ __('Nueva Materia') }}</h4> </a>        </div>
            
            <!-- Nuevo curso -->
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('cursos.create') }}"> <h4>{{ __('Nuevo Curso') }}</h4> </a>        </div>
        </div>
    </div>

</div>

@endsection