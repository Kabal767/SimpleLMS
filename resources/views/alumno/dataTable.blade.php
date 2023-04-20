@extends('layouts.app')

@section('template_title')
    Alumno
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="float-right">
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
      {{ __('Create New') }}
    </a>
  </div>

<!-- Tabla de alumnos -->
<table class="table table-striped" id="alumnos">
    <!-- Cabecera de la tabla -->
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
        </tr>
    </thead>

    <!-- Cuerpo de la tabla-->
    <tbody>
        @foreach ($alumnos as $alumno)
        <tr>
            <td> {{$alumno->id}} </td>
            <td> {{$alumno->nombre}} </td>
            <td> {{$alumno->Apellido}} </td>
            <td> {{$alumno->Dirección}} </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section ('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- Identifying table in the script -->
    <script>
         $('#alumnos').DataTable();
    </script>

@endsection