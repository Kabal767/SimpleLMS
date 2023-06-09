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
                                            <span class="input-group-text" id="basic-addon1"> *Nacionalidad </span>
                                            <input type="text" class="form-control @error('nation') is-invalid @enderror"
                                             name="nation" id="nation" placeholder="Nacionalidad" value="{{old('nation')}}" required>
                                        </div>
                                        @error('nation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                    </li>
                                </ul>
                                
                                <ul class="list-group m-4">
                                    <li class="list-group-item active fw-bold"> Lugar de nacimiento </li>                                    
                                    <li class="list-group-item">

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Nación </span>
                                            <input type="text" class="form-control @error('birthNation') is-invalid @enderror" 
                                            name="birthNation" id="birthNation" placeholder="Nación" value="{{old('birthNation')}}" required>
                                        </div>
                                        @error('birthNation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Jurisdicción </span>
                                            <input type="text" class="form-control @error('birthJurisdiction') is-invalid @enderror" 
                                            name="birthJurisdiction" id="birthJurisdiction" placeholder="Jurisdicción" value="{{old('birthJurisdiction')}}" required>
                                        </div>
                                        @error('birthJurisdiction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Departamento </span>
                                            <input type="text" class="form-control @error('birthDepartment') is-invalid @enderror" 
                                            name="birthDepartment" id="birthDepartment" placeholder="Departamento" value="{{old('birthDepartment')}}" required>
                                        </div>
                                        @error('birthDepartment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Localidad </span>
                                            <input type="text" class="form-control @error('birthLocality') is-invalid @enderror" 
                                            name="birthLocality" id="birthLocality" placeholder="Localidad" value="{{old('birthLocality')}}" required>
                                        </div>
                                        @error('birthLocality')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                    </li>
                                </ul>

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
                                            <span class="input-group-text"> E-Mail </span>
                                            <input type="text" class="form-control @error('mail') is-invalid @enderror" 
                                            name="mail" id="mail" placeholder="Localidad" value="{{old('mail')}}">
                                        </div>
                                        @error('mail')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </li>
                                </ul>

                                
                            </div>

                            <div class="col-6">

                                <ul class="list-group m-4">
                                    <li class="list-group-item active fw-bold"> Domicilio actual </li>                                    
                                    <li class="list-group-item">

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Jurisdicción </span>
                                            <input type="text" class="form-control @error('jurisdiction') is-invalid @enderror" 
                                            name="jurisdiction" id="jurisdiction" placeholder="Jurisdicción" value="{{old('jurisdiction')}}" required>
                                        </div>
                                        @error('jurisdiction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Departamento </span>
                                            <input type="text" class="form-control @error('department') is-invalid @enderror" 
                                            name="department" id="department" placeholder="Departamento" value="{{old('department')}}" required>
                                        </div>
                                        @error('department')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Localidad </span>
                                            <input type="text" class="form-control @error('locality') is-invalid @enderror" 
                                            name="locality" id="locality" placeholder="Localidad" value="{{old('locality')}}" required>
                                        </div>
                                        @error('locality')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Calle/Barrio </span>
                                            <input type="text" class="form-control @error('direction') is-invalid @enderror" 
                                            name="direction" id="direction" placeholder="Calle/Barrio" value="{{old('direction')}}" required>
                                        </div>
                                        @error('direction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </li>
                                </ul>

                                <ul class="list-group ms-4 me-4 mb-4">
                                    <li class="list-group-item active fw-bold"> Escuela de origen </li>                                    
                                    <li class="list-group-item">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Nombre de escuela </span>
                                            <input type="text" class="form-control @error('origin') is-invalid @enderror" 
                                            name="origin" id="origin" placeholder="Escuela de origen" value="{{old('origin')}}">
                                        </div>
                                        @error('origin')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Último año de cursado </span>
                                            <input type="number" class="form-control @error('lastYear') is-invalid @enderror" 
                                            name="lastYear" id="lastYear" placeholder="Último año" value="{{old('lastYear')}}">
                                        </div>
                                        @error('lastYear')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Nación </span>
                                            <input type="text" class="form-control @error('originNation') is-invalid @enderror" 
                                            name="originNation" id="originNation" placeholder="Nación" value="{{old('originNation')}}">
                                        </div>
                                        @error('originNation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Jurisdicción </span>
                                            <input type="text" class="form-control @error('originJurisdiction') is-invalid @enderror" 
                                            name="originJurisdiction" id="originJurisdiction" placeholder="Jurisdicción" value="{{old('originJurisdiction')}}">
                                        </div>
                                        @error('originJurisdiction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Departamento </span>
                                            <input type="text" class="form-control @error('originDepartment') is-invalid @enderror" 
                                            name="originDepartment" id="originDepartment" placeholder="Departamento" value="{{old('originDepartment')}}">
                                        </div>
                                        @error('originDepartment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Localidad </span>
                                            <input type="text" class="form-control @error('originLocality') is-invalid @enderror" 
                                            name="originLocality" id="originLocality" placeholder="Localidad" value="{{old('originLocality')}}">
                                        </div>
                                        @error('originLocality')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> Dirección </span>
                                            <input type="text" class="form-control @error('originDirection') is-invalid @enderror" 
                                            name="originDirection" id="originDirection" placeholder="Dirección" value="{{old('originDirection')}}">
                                        </div>
                                        @error('originDirection')
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
