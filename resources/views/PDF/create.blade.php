@extends('layouts.app')

@section('template_title')
    Create Mesa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-header">
                        <h3>Lista de documentos generables alrededor del alumno</h3>
                    </div>

                    <div class="card-body">

                        <!-- Matriz Form-->
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                              Dropdown form
                            </button>
                            <form class="dropdown-menu p-4" method="POST" action="{{route('PDF.matriz')}}">                                
                                {{ method_field('PUT') }}
                                @csrf
                              <div class="mb-3">
                                <label for="alumno_DNI" class="form-label">Alumno</label>
                                <select class="form-control" name="alumno_DNI" id="alumno_DNI">
                                    <option selected> Escoger alumno </option>
                                    @foreach($alumnos as $alumno)
                                    <option value="{{$alumno->DNI}}"> {{$alumno->name}} {{$alumno->lastName}} </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary mt-3"> Generar Libro Matriz </button>
                              </div>
                            </form>
                        </div>

                        <!-- Matriz Form-->
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                              Dropdown form
                            </button>
                            <form class="dropdown-menu p-4" method="POST" action="{{route('PDF.boletin')}}">                                
                                {{ method_field('PUT') }}
                                @csrf
                              <div class="mb-3">
                                <label for="alumno_DNI" class="form-label">Alumno</label>
                                
                                <select class="form-control" name="alumno_DNI" id="alumno_DNI">
                                    <option selected> Escoger alumno </option>
                                    @foreach($alumnos as $alumno)
                                    <option value="{{$alumno->DNI}}"> {{$alumno->name}} {{$alumno->lastName}} </option>
                                    @endforeach
                                </select>
                                
                                <label for="curso_id" class="form-label"> Curso </label>
                                <select class="form-control" name="curso_id" id="curso_id">
                                    <option selected> Escoger curso </option>
                                    @foreach($cursos as $curso)
                                    <option value="{{$curso->id}}"> {{$curso->curso}}° {{$curso->div}} - Turno {{$curso->turno}} </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary mt-3"> Generar Boletín de calificaciones </button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection