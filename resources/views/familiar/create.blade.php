@extends('layouts.app')

@section('template_title')
    Create Alumno
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach
                @endif

                @includeif('partials.errors')

                <div class="card card-default m-4">
                    <form method="POST" action="{{ route('familiars.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
    
                    <div class="card-header">
                        <span class="card-title"> <h4 class="mt-2"> CREAR NUEVO FAMILIAR </h4> </span>
                    </div>
    
                    <div class="card-body">
                        <div class="row">
    
                            <div class="col-6">
                                <ul class="list-group m-4">
                                    <li class="list-group-item active fw-bold"> Datos personales </li>                                    
                                    <li class="list-group-item">
    
                                        
                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *DNI </span>
                                            <input type="number" class="form-control @error('DNI') is-invalid @enderror" name="DNI" id="DNI" placeholder="DNI"
                                            value="{{old('DNI')}}" required>
                                        </div>
                                        @error('DNI')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 


                                        <div class="input-group mb-3">                                            
                                            <span class="input-group-text" id="basic-addon1"> *Nombre completo </span>
                                            <input type="text" class="form-control @error('names') is-invalid @enderror" name="names" id="names" placeholder="Nombres"
                                            value="{{old('names')}}" required> 
                                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="Apellido"
                                            value="{{old('lastName')}}" required>   
                                        </div>
                                        @error('names')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                        @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
    
                                        <div class="input-group mb-3">                                         
                                            <span class="input-group-text" id="basic-addon1"> *Nacionalidad </span>                                            
                                            <input type="text" class="form-control @error('nation') is-invalid @enderror" name="nation" id="nation" placeholder="Nacionalidad"
                                            value="{{old('nation')}}" required> 
                                        </div>
                                        @error('nation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                         
                                            <span class="input-group-text" id="basic-addon1"> *Jurisdicción </span>                                            
                                            <input type="text" class="form-control @error('jurisdiction') is-invalid @enderror" name="jurisdiction" id="jurisdiction" placeholder="Jurisdicción"
                                            value="{{old('jurisdiction')}}" required> 
                                        </div>
                                        @error('jurisdiction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                         
                                            <span class="input-group-text" id="basic-addon1"> *Departamento </span>                                            
                                            <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" id="department" placeholder="Departamento"
                                            value="{{old('department')}}" required> 
                                        </div>
                                        @error('department')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">                                         
                                            <span class="input-group-text" id="basic-addon1"> *Localidad </span>                                            
                                            <input type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" id="locality" placeholder="Localidad"
                                            value="{{old('locality')}}" required> 
                                        </div>
                                        @error('locality')
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
                                            <span class="input-group-text" id="basic-addon1"> *Tel: </span>
                                            <input type="number" class="form-control @error('tel') is-invalid @enderror" name="tel" id="tel" placeholder="Teléfono"
                                            value="{{old('tel')}}" required>
                                        </div>
                                        @error('tel')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"> E-Mail </span>
                                            <input type="email" class="form-control @error('mail') is-invalid @enderror" name="mail" id="mail" placeholder="E-Mail"
                                            value="{{old('mail')}}" required>
                                        </div>
                                        @error('mail')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"> Domicilio </span>
                                            <input type="text" class="form-control @error('direction') is-invalid @enderror" name="direction" id="direction" placeholder="Domicilio"
                                            value="{{old('direction')}}" required>
                                        </div>
                                        @error('direction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                    </li>
                                </ul>
                            </div>
    
                        </div>
                    </div>
    
                    <div class="card-footer">
                        <div class="row">
                        <div class="col-6 float-right">
                            <a class="btn btn-danger btn-lg" href="{{route('familiars.index')}}"> Cancelar </a>
                        </div>
                        <div class="col-6 float-left">
                            <button type="submit" class="btn btn-primary btn-lg"> Confirmar cambios </button>
                        </div>
                        </div>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection