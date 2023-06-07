@extends('layouts.app')

@section('template_title')
    Create Alumno
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default m-4">

                    <form method="POST" action="{{ route('alumnos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                    <div class="card-header">
                        <span class="card-title"> <h4 class="mt-2 ms-4"> CREAR NUEVO ALUMNO </h4> </span>
                    </div>

                    <div class="card-body">
                        <div class="row">
    
                            <div class="col-6">
                                <ul class="list-group m-4">
                                    <li class="list-group-item active fw-bold"> Datos personales </li>                                    
                                    <li class="list-group-item">

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *DNI </span>
                                            <input type="number" class="form-control @error('DNI') is-invalid @enderror" 
                                            name="DNI" id="DNI" placeholder="DNI" value="{{old('DNI')}}" required>
                                        </div>
                                        @error('DNI')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Nombre completo </span>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                            name="name" id="name" placeholder="Nombres" value="{{old('name')}}" required> 
                                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" 
                                            name="lastName" id="lastName" placeholder="Apellido" value="{{old('lastName')}}" required>   
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                        @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text"> *Sexo </span>
                                            <select class="form-control @error('sex') is-invalid @enderror" 
                                            name="sex" id="sex" required>
                                                <option> Escoger sexo del alumno </option>
                                                <option value="Femenino"> Femenino </option>
                                                <option value="Masculino"> Masculino </option>
                                            </select>
                                        </div>
                                        @error('sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">*Fecha de nacimiento</span>
                                            <input type="date" class="form-control @error('birthDate') is-invalid @enderror"
                                            name="birthDate" id="birthDate" value="{{old('birthDate')}}" required>
                                        </div>
                                        @error('birthDate')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">*Lugar de nacimiento</span>
                                            <input type="text" class="form-control @error('birthPlace') is-invalid @enderror"
                                            name="birthPlace" id="birthPlace" placeholder="Lugar de nacimiento" value="{{old('birthPlace')}}" required>
                                        </div>
                                        @error('birthPlace')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Nacionalidad </span>
                                            <input type="text" class="form-control @error('nation') is-invalid @enderror"
                                             name="nation" id="nation" placeholder="Nacionalidad" value="{{old('nation')}}" required>
                                        </div>
                                        @error('nation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                    </li>
                                </ul>
                            </div>

                            <div class="col-6">
                                <ul class="list-group m-4">
                                    <li class="list-group-item active fw-bold"> Datos de contacto </li>                                    
                                    <li class="list-group-item">

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text"> *Tel: </span>
                                            <input type="number" class="form-control @error('tel') is-invalid @enderror" 
                                            name="tel" id="tel" placeholder="Teléfono" value="{{old('tel')}}" required>
                                        </div>
                                        @error('tel')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> *Localidad </span>
                                            <input type="text" class="form-control @error('locality') is-invalid @enderror" 
                                            name="locality" id="locality" placeholder="Localidad" value="{{old('locality')}}" required>
                                        </div>
                                        @error('locality')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> *Domicilio </span>
                                            <input type="text" class="form-control @error('direction') is-invalid @enderror" 
                                            name="direction" id="direction" placeholder="Domicilio" value="{{old('direction')}}" required>
                                        </div>
                                        @error('direction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                    </li>
                                </ul>

                                <ul class="list-group ms-4 me-4 mb-4">
                                    <li class="list-group-item active fw-bold"> Información académica </li>                                    
                                    <li class="list-group-item">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Origen </span>
                                            <input type="text" class="form-control @error('origin') is-invalid @enderror" 
                                            name="origin" id="origin" placeholder="Escuela de origen" value="{{old('origin')}}">
                                        </div>
                                        @error('origin')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text"> *Curso </span>
                                            <select class="form-control @error('id_curso') is-invalid @enderror" 
                                            name="id_curso" id="id_curso" value="{{old('id_curso')}}" required>
                                                <option> Escoger curso </option>
                                                @foreach($cursos as $curso)
                                                <option value="{{$curso->id}}"> {{$curso->curso}}° "{{$curso->div}}" - Turno {{$curso->turno}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('id_curso')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                        <div class="col-6">
                            <a class="btn btn-danger btn-lg" href="{{route('alumnos.index')}}"> Cancelar </a>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary btn-lg me-md-2"> Confirmar cambios </button>
                        </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
