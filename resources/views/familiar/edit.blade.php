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
                <form method="POST" action="{{ route('familiars.update', $familiar->id) }}"  role="form" enctype="multipart/form-data">
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
                                        <span class="input-group-text" id="basic-addon1"> DNI </span>
                                        <input type="number" class="form-control" name="DNI" id="DNI" value="{{$familiar->DNI}}" >     
                                    </div>

                                    <div class="input-group mb-3">                                            
                                        <span class="input-group-text" id="basic-addon1"> Nombre completo </span>
                                        <input type="text" class="form-control" name="names" id="names" value="{{$familiar->names}}" placeholder="Nombres"> 
                                        <input type="text" class="form-control" name="lastName" id="lastName" value="{{$familiar->lastName}}" placeholder="Apellido">   
                                    </div>

                                    <div class="input-group mb-3">                                         
                                        <span class="input-group-text" id="basic-addon1"> Nacionalidad </span>                                            
                                        <input type="text" class="form-control" name="nation" id="nation" value="{{$familiar->nation}}" placeholder="Nacionalidad"> 
                                    </div>

                                </li>
                            </ul>
                        </div>

                        <div class="col-6">
                            <ul class="list-group m-4">
                                <li class="list-group-item active fw-bold"> Datos de contacto </li>                                    
                                <li class="list-group-item">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"> Tel: </span>
                                        <input type="number" class="form-control" name="tel" id="tel" value="{{$familiar->tel}}" placeholder="Teléfono">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"> E-Mail </span>
                                        <input type="email" class="form-control" name="mail" id="mail" value="{{$familiar->mail}}" placeholder="E-Mail">
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"> Domicilio </span>
                                        <input type="text" class="form-control" name="direction" id="direction" value="{{$familiar->direction}}" placeholder="Domicilio">
                                    </div>
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