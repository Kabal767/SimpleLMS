@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card m-4">
                    <div class="card-header">
                        <h2> {{$familiar->names}} {{$familiar->lastName}} </h2>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card-body">
                            
                                <div class="row m-2">
                                    <h4> Detalles del familiar </h4>
                                </div>
                                <div class="row m-2">

                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item">
                                            <ul class="list-group">
                                                <li class="list-group-item fw-bold active"> DETALLES </li>
                                                <li class="list-group-item"> DNI: {{$familiar->DNI}}</li>
                                                <li class="list-group-item"> Nombre: {{$familiar->names}} </li>
                                                <li class="list-group-item"> Apellido: {{$familiar->lastName}} </li>
                                                <li class="list-group-item"> Nacionalidad: {{$familiar->nation}} </li>
                                            </ul>
                                        </li>

                                        <li class="list-group-item">
                                            <ul class="list-group">
                                                <li class="list-group-item fw-bold active"> DATOS DE CONTACTO</li>
                                                <li class="list-group-item"> Tel.: {{$familiar->tel}} </li>
                                                <li class="list-group-item"> E-Mail: {{$familiar->mail}} </li>
                                                <li class="list-group-item"> Domicilio: {{$familiar->direction}} </li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="col-8 border-start">
                            <div class="card-body">
                                
                                <div class="row m-2 border-bottom">
                                    <h4> Alumnos relacionados </h4>
                                </div>

                                <div class="row m-2 border-bottom">

                                    @livewire('familiars.alumno-attach-form', ['familiar' => $familiar])

                                </div> 

                                <div class="row m-2">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> DNI </th>
                                                <th> Nombres</th>
                                                <th> Apellido </th>
                                                <th> Relación</th>
                                                <th colspan="2" > Acciones </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($familiar->alumnos->count())
                                            @foreach($familiar->alumnos as $alumno)
                                            <tr>
                                                <th> {{$alumno->DNI}} </th>
                                                <td> {{$alumno->name}} </td>
                                                <td> {{$alumno->lastName}} </td>
                                                <td> {{$alumno->pivot->relation}} </td>
                                                <td> <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$alumno->DNI}}"> Modificar </a></td>

                                                <div class="modal fade" id="modal{{$alumno->DNI}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <form method="POST" action="{{ route('familiars.updateAlumno', [$familiar->DNI, $alumno->DNI]) }}"  role="form" enctype="multipart/form-data">
                                                    {{ method_field('PUT') }}
                                                    @csrf
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> {{$alumno->name}} {{$alumno->lastName}} </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <select class="form-select" id="relation" name="relation">
                                                                <option selected> Seleccionar relación </option>
                                                                <option value="Padre"> Padre </option>
                                                                <option value="Madre"> Madre </option>
                                                                <option value="Tutor"> Tutor </option>
                                                                <option value="Abuelo"> Abuelo </option>
                                                                <option value="Abuela"> Abuela </option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="input" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </form>
                                                </div>

                                                <td>
                                                    
                                                    <form action="{{ route('familiars.detachAlumno',[$familiar->DNI, $alumno->DNI]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"> Borrar relación </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr><th colspan="6"><h4> SIN RELACIONES </h4></th></tr>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                        <a class="btn btn-primary btn-lg" href="{{route('familiars.index')}}"> Regresar </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection