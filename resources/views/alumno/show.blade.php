@extends('layouts.app')

@section('template_title')
    {{ $alumno->name ?? 'Show Alumno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">

            <!-- Hader with links to more details -->
            <div class="col-12 align-self-center text-center m-1">
                <div class="btn-group">
                    <a class="btn btn-primary disabled" href=""> Datos personales </a>
                    <a class="btn btn-primary" href="{{route('alumnos.toDos', $alumno->id)}}"> Desempeño académico </a>
                    <a class="btn btn-primary" href="{{route('alumnos.family', $alumno->id)}}"> Familiares </a>
                </div>
            </div>

            <!-- Información del alumno -->
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
                        
                        <div class="row">
                            <!-- Datos de alumno -->
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">

                                        <!-- Datos personales -->
                                        <li class="list-group-item">
                                            <ul class="list-group m-2">
                                                <li class="list-group-item active"> Fecha de nacimiento: {{$alumno->birthDate}} </li>
                                                <li class="list-group-item active"> Edad: </li>
                                                <li class="list-group-item active"> Nacionalidad: {{$alumno->nation}} </li>
                                                <li class="list-group-item active"> Lugar de nacimiento: {{$alumno->birthPlace}} </li>
                                            </ul>
                                        </li>

                                        <!-- Datos de contacto -->
                                        <li class="list-group-item">
                                            <ul class="list-group m-2">
                                                <li class="list-group-item active"> Teléfono: {{$alumno->tel}} </li>
                                                <li class="list-group-item active"> Domicilio: {{$alumno->direction}} </li>
                                                <li class="list-group-item active"> Origen: {{$alumno->origin}} </li>
                                            </ul> 
                                        </li>
                                    </ul>  
                                </div>
                            </div>    
                            
                            <!-- Datos de desempeño-->
                            <div class="col-md-6">
                                <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <ul class="list-group list-group m-2">
                                                <li class="list-group-item active"> Inasistencias </li>
                                                <li class="list-group-item active"> Promedio: </li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <ul class="list-group list-group m-2">
                                                @foreach($materias as $materia)
                                                <li class="list-group-item list-group-item-primary">{{$materia->Name}}: {{$materia->pivot->callification}}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
