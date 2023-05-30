@extends('layouts.app')

@section('template_title')
@endsection

@section('content')

<div class="container-fluid">
    <div class="row m-1">

    <!-- Hader with links to more details -->
    <div class="col-12 align-self-center text-center m-1">
        <div class="btn-group">
            <a class="btn btn-primary" href="#"> Condición: {{$exam->condition}} </a>
            <a class="btn btn-primary" href="#"> Materia: {{$exam->materia->name}} </a>            
            <a class="btn btn-primary" href="#"> Curso: 
                @if($exam->curso != NULL)
                {{$exam->curso->curso}}°{{$exam->curso->div}} - Turno {{$exam->curso->turno}} 
                @elseif($exam->curso == NULL)
                NAN
                @endif
            </a>
        </div>
    </div>

    <div class="row m-1">
        <div class="col-4">
            <div class="card">
                <div class="card-header">            
                    <h4 class="card-title">Mesas</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> N°Mesa </th>
                                <th> Fecha</th>
                                <th> Profesor </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exam->mesas as $mesa)
                            <tr>
                                <th scope="row"> {{$mesa->id}} </th>
                                <td> {{$mesa->Date}} </td>
                                <td> {{$mesa->Proffesor}} </td>                              
                                <td> 
                                    <form action="{{ route('exams.eraseMesa',[$exam->id, $mesa->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> Borrar </button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('exams.addMesa', $exam->id) }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <td></td>
                                    <td> <input type="date" class="form-control" name="Date" id="Date"> </td>
                                    <td> <input type="text" class="form-control" name="Proffesor" id="Proffesor"></td>
                                    <td colspan="2"> <button type="submit" class="btn btn-primary"> + </button> </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">            
                    <h4 class="card-title"> Alumnos </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2"> Nombre completo </th>
                                <th> N° de Mesa </th>
                                <th> Oral</th>
                                <th> Escrito </th>
                                <th> Calificación final </th>
                                <th colspan="2"> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exam->alumnos as $alumno)
                            <tr>
                                <th scope="row"> {{$alumno->name}} </th>
                                <th> {{$alumno->lastName}} </th>
                                <td> N°{{$alumno->pivot->mesa_id}} </td>
                                <td> {{$alumno->pivot->oral}} </td>
                                <td> {{$alumno->pivot->written}} </td>
                                <td> {{$alumno->pivot->callification}}</td>
                                <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$alumno->DNI}}"> Modificar </button> </td>
                                <td> 
                                    <form action="{{ route('exams.eraseAlumno',[$exam->id, $alumno->DNI]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Borrar Alumno </button>
                                    </form>                                
                               
                                <div class="modal fade" id="modal{{$alumno->DNI}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{ route('exams.updateAlumno', [$exam->id, $alumno->DNI]) }}"  role="form" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"> {{$alumno->name}} {{$alumno->lastName}} </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <label for="oral" class="form-label"> Resultado del oral </label>
                                                        <input type="number" class="form-control" name="oral" id="oral" value="{{$alumno->pivot->oral}}">
                                                    </div>

                                                    <div class="col-auto">
                                                        <label for="written" class="form-label"> Resultado del escrito </label>
                                                        <input type="number" class="form-control" name="written" id="written" value="{{$alumno->pivot->written}}">
                                                    </div>

                                                    <div class="col-auto">
                                                        <label for="callification" class="form-label"> Resultado final </label>
                                                        <input type="number" class="form-control" name="callification" id="callification" value="{{$alumno->pivot->callification}}">
                                                    </div>

                                                    <div class="col-auto">                                                        
                                                        <label for="mesa_id" class="form-label"> Mesa </label>
                                                        <select class="form-select" id="mesa_id" name="mesa_id" value="{{$alumno->pivot->mesa_id}}">
                                                            @foreach($exam->mesas as $mesa)
                                                            <option value="{{$mesa->id}}"> Mesa N°{{$mesa->id}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="input" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                    
                            
                                    </form>
                                </div>
                            
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('exams.addAlumno', $exam->id) }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <td colspan="2"> 
                                        <select class="form-select" id="alumno_DNI" name="alumno_DNI">
                                            <option selected> Escoger alumno </option>
                                            @foreach($alumnos as $alumno)
                                            <option value="{{$alumno->DNI}}"> {{$alumno->DNI}} {{$alumno->name}} {{$alumno->lastName}}</option>
                                            @endforeach

                                        </select>
                                    </td>
                                    <td>                                         
                                        <select class="form-select" id="mesa_id" name="mesa_id">
                                            <option selected> Mesa </option>
                                            @foreach($exam->mesas as $mesa)
                                            <option value="{{$mesa->id}}"> Mesa N°{{$mesa->id}} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2"> <button type="submit" class="btn btn-primary"> + </button> </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   

    </div>
</div>


@endsection
