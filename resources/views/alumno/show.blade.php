@extends('layouts.app')

@section('template_title')
    {{ $alumno->name ?? 'Show Alumno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">

            <!-- Header with links to more details -->
            <div class="col-12 align-self-center text-center m-1">
                <div class="btn-group">
                    <a class="btn btn-primary disabled" href=""> Datos personales </a>
                    <a class="btn btn-primary" href="{{route('alumnos.toDos', $alumno->DNI)}}"> Desempeño académico </a>
                    <a class="btn btn-primary" href="{{route('alumnos.family', $alumno->DNI)}}"> Familiares </a>
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
                                        <h1><span class="badge bg-primary"> Sexo: {{$alumno->sex}} </span></h1>
                                    </div>

                                </div>                                 
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">

                            <!-- Datos de alumno -->
                            <div class="col-md-8">
                                
                                <div class="row">
                                    <div class="col-md-4">

                                        <!-- Datos personales -->
                                        <li class="list-group-item">
                                            <ul class="list-group m-2">
                                                <li class="list-group-item active fw-bold"> DOMICILIO </li>
                                                <li class="list-group-item"> Nacionalidad: {{$alumno->nation}} </li>
                                                <li class="list-group-item"> Jurisdicción: {{$alumno->jurisdiction}} </li>
                                                <li class="list-group-item"> Departamento: {{$alumno->department}} </li>
                                                <li class="list-group-item"> Localidad: {{$alumno->locality}} </li>
                                                <li class="list-group-item"> Domicilio: {{$alumno->direction}} </li>
                                            </ul>
                                        </li>

                                    </div>
                                    
                                    <div class="col-4">

                                        <!-- Lugar de nacimiento -->
                                        <li class="list-group-item">
                                            <ul class="list-group m-2">
                                                <li class="list-group-item active fw-bold"> DATOS DE NACIMIENTO </li>
                                                <li class="list-group-item"> Fecha de nacimiento: {{$alumno->birthDate}} </li>
                                                <li class="list-group-item"> Nación: {{$alumno->birthNation}} </li>
                                                <li class="list-group-item"> Jurisdicción: {{$alumno->birthJurisdiction}} </li>
                                                <li class="list-group-item"> Departamento: {{$alumno->birthDepartment}} </li>
                                                <li class="list-group-item"> Localidad: {{$alumno->birthLocality}} </li>
                                            </ul>
                                        </li>

                                    </div>

                                    <div class="col-4">

                                        <!-- Historia académica -->
                                        <li class="list-group-item">
                                            <ul class="list-group m-2">
                                                <li class="list-group-item active fw-bold"> HISTORIA ACADÉMICA </li>
                                                <li class="list-group-item"> Fecha de nacimiento: {{$alumno->origin}} </li>
                                                <li class="list-group-item"> Nación: {{$alumno->originNation}} </li>
                                                <li class="list-group-item"> Jurisdicción: {{$alumno->originJurisdiction}} </li>
                                                <li class="list-group-item"> Departamento: {{$alumno->originDepartment}} </li>
                                                <li class="list-group-item"> Localidad: {{$alumno->originLocality}} </li>
                                                <li class="list-group-item"> Direcciión: {{$alumno->originDirection}} </li>
                                            </ul>
                                        </li>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">

                                        <!-- Datos de contacto -->
                                        <li class="list-group-item">
                                            <ul class="list-group m-2">
                                                <li class="list-group-item active fw-bold"> CONTACTO </li>
                                                <li class="list-group-item"> Teléfono: {{$alumno->tel}} </li>
                                                <li class="list-group-item"> E-Mail: {{$alumno->mail}} </li>
                                            </ul> 
                                        </li>

                                    </div>
                                </div>

                            </div>    
                            
                            <!-- Datos de desempeño-->
                            <div class="col-md-4">
                                <div class="row justify-content-end">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <ul class="list-group list-group m-2">
                                                <li class="list-group-item active"> Inasistencias {{$alumno->cursos()->where('curso_id',$alumno->id_curso)->
                                                first()->pivot->inasistencias}} </li>
                                                <li class="list-group-item active"> Promedio: </li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <ul class="list-group list-group m-2">
                                                @foreach($materias as $materia)
                                                <li class="list-group-item list-group-item-primary">{{$materia->name}}: {{$materia->pivot->callification}}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="card-footer">
                        @livewire('alumnos.alumno-event-list', ['alumno' => $alumno])
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-primary ms-4" href="{{ route('alumnos.index') }}"> Regresar a la lista </a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
