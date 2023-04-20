@extends('layouts.app')

@section('template_title')
    {{ $alumno->name ?? 'Show Alumno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Alumno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alumnos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $alumno->DNI }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $alumno->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $alumno->Apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Tel:</strong>
                            {{ $alumno->tel }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $alumno->Dirección }}
                        </div>
                        <div class="form-group">
                            <strong>Birthplace:</strong>
                            {{ $alumno->birthPlace }}
                        </div>
                        <div class="form-group">
                            <strong>Origin:</strong>
                            {{ $alumno->origin }}
                        </div>
                        <div class="form-group">
                            <strong>Nation:</strong>
                            {{ $alumno->nation }}
                        </div>
                        <div class="form-group">
                            <strong>Id Curso:</strong>
                            {{ $alumno->id_Curso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
