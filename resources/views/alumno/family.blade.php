@extends('layouts.app')

@section('content')

<section class="content container-fluid">
    <div class="row">

        <!-- Hader with links to more details -->
        <div class="col-12 align-self-center text-center m-1">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{route('alumnos.show', $alumno->DNI)}}"> Datos personales </a>
                <a class="btn btn-primary" href="{{route('alumnos.toDos', $alumno->DNI)}}"> Desempeño académico </a>
                <a class="btn btn-primary disabled" href=""> Familiares </a>
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
                                    <h1><span class="badge bg-primary"> Sexo: {{$alumno->sex}} </span></h1>
                                </div>

                            </div>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Small form to add new pending materias -->
                    <form method="POST" action="{{ route('alumnos.addFamiliar', $alumno->DNI) }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 align-items-center ms-3">

                            <!-- Lista de familiares -->
                            <div class="col-auto">
                            <label for="familiar_id" class="col-form-label"> Nombre del Familiar</label></div>
                            <div class="col-auto">
                                <select class="form-select" name="familiar_id" id="familiar_id" aria-label="Default select example">
                                    <option selected>Seleccionar familiar</option>
                                    @foreach($familiars as $familiar)
                                        <option value="{{$familiar->id}}"> DNI:{{$familiar->DNI}}-{{$familiar->names}} {{$familiar->lastName}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="relation" class="col-form-label"> Tipo de relación </label></div>
                            <div class="col-auto">
                                <select class="form-select" name="relation" id="relation" aria-label="relation-select">
                                    <option selected> Seleccionar relación </option>
                                    <option value="Padre"> Padre </option>
                                    <option value="Madre"> Madre </option>
                                    <option value="Tutor"> Tutor </option>
                                    <option value="Abuelo"> Abuelo </option>
                                    <option value="Abuela"> Abuela </option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary"> Crear relación </button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary" href="{{ route('familiars.create') }}"> {{ __('Nuevo Familiar') }} </a>   </div>

                        </div>
                    </form>

                    <div class="card m-3">
                        <div class="card-header">
                            <h4> Familiares </h4>
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> DNI </th>
                                        <th> Nombres </th>
                                        <th> Apellido </th>
                                        <th> Teléfono </th>
                                        <th> Domicilio </th>
                                        <th> Nacionalidad </th>
                                        <th> E-Mail </th>
                                        <th> Relación </th>
                                        <th> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alumno->familiares as $familiar)
                                    <tr>
                                        <th scope="row"> {{$familiar->DNI}} </th>
                                        <td> {{$familiar->names}} </td>
                                        <td> {{$familiar->lastName}} </td>
                                        <td> {{$familiar->tel}} </td>
                                        <td> {{$familiar->direction}} </td>
                                        <td> {{$familiar->nation}} </td>
                                        <td> {{$familiar->mail}} </td>
                                        <td> {{$familiar->pivot->relation}} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a class="btn btn-primary ms-4" href="{{ route('alumnos.index') }}"> Regresar a la lista </a> 
                </div>
            </div>
        </div>

    </div>
</section>

@endsection