@extends('layouts.app')

@section('template_title')
    Create Alumno
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">                
                
                @livewire('alumnos.alumno-reingress', ['alumno' => $alumno, 'cursos' => $cursos])

            </div>
        </div>
    </section>
@endsection