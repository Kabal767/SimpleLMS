@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default m-4">
                <form method="POST" action="{{ route('familiars.update', $familiar->DNI) }}"  role="form" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf

                <div class="card-header">
                    <span class="card-title"> <h4>Editar familiar {{$familiar->names}} {{$familiar->lastName}} </h4> </span>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-6">
                            <ul class="list-group m-4">
                                <li class="list-group-item active fw-bold"> Datos personales </li>                                    
                                <li class="list-group-item">

                                    <div class="input-group mb-3">                                            
                                        <span class="input-group-text" id="basic-addon1"> *DNI </span>
                                        <input type="number" class="form-control @error('DNI') is-invalid @enderror" name="DNI" id="DNI" value="{{$familiar->DNI}}" readonly required>  
                                    </div>
                                    @error('DNI')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 

                                    <div class="input-group mb-3">                                            
                                        <span class="input-group-text" id="basic-addon1"> *Nombre completo </span>
                                        <input type="text" class="form-control @error('names') is-invalid @enderror" name="names" id="names" value="{{$familiar->names}}" placeholder="Nombres" required> 
                                        <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" value="{{$familiar->lastName}}" placeholder="Apellido" required>   
                                    </div>
                                    @error('names')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 

                                    <div class="input-group mb-1">                                         
                                        <span class="input-group-text" id="basic-addon1"> *Nacionalidad </span>                                            
                                        <input type="text" class="form-control @error('nation') is-invalid @enderror" name="nation" id="nation" value="{{$familiar->nation}}" placeholder="Nacionalidad" required> 
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
                                        <span class="input-group-text" id="basic-addon1"> *Tel: </span>
                                        <input type="number" class="form-control @error('tel') is-invalid @enderror" name="tel" id="tel" value="{{$familiar->tel}}" placeholder="Teléfono" required>
                                    </div>
                                    @error('tel')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"> E-Mail </span>
                                        <input type="email" class="form-control @error('mail') is-invalid @enderror" name="mail" id="mail" value="{{$familiar->mail}}" placeholder="E-Mail" required>
                                    </div>
                                    @error('mail')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" id="basic-addon1"> Domicilio </span>
                                        <input type="text" class="form-control @error('direction') is-invalid @enderror" name="direction" id="direction" value="{{$familiar->direction}}" placeholder="Domicilio" required>
                                    </div>
                                    @error('direction')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 

                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="row text-muted ms-4">
                        *Estos campos son obligatorios.
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