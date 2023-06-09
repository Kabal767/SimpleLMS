@extends('layouts.app')

@section('template_title')
    {{ $curso->name ?? 'Show Curso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"> 
                                <div class="row text-center">

                                    <h1><span class="badge bg-primary"> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </span></h1>

                                </div>
                            </span>
                        </div>
                    </div>

                    <div class="card-body">

                        <!--Materias-->
                        <h4 class="ms-3 mb-3"> MATERIAS </h4>

                        <div class="mt3 ms-3 text-left">

                            <h4>
                            @foreach($curso->materias as $materia)
                            <span class="badge bg-primary"> {{$materia->name}} </span>
                            @endforeach
                            </h4>

                        </div>

                    </div>
                    
                    @livewire('cursos.curso-alumnos', ['curso' => $curso, 'years' => $years])

                </div>
            </div>
        </div>
    </section>
@endsection
